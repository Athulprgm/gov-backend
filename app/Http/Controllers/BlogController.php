<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Reaction;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of blogs (timeline / user activities).
     */
    public function index(Request $request)
    {
        $userId = auth('sanctum')->id();
        
        $query = Blog::with(['user', 'reshare.user'])
            ->withCount([
                'replies',
                'reshares',
                'reactions as likes_count' => function ($q) {
                    $q->where('type', 'like');
                },
                'reactions as dislikes_count' => function ($q) {
                    $q->where('type', 'dislike');
                }
            ]);

        if ($userId) {
            $query->withExists([
                'reactions as is_liked' => function ($q) use ($userId) {
                    $q->where('user_id', $userId)->where('type', 'like');
                },
                'reactions as is_disliked' => function ($q) use ($userId) {
                    $q->where('user_id', $userId)->where('type', 'dislike');
                }
            ]);
        }

        // Apply filters if viewing a specific profile
        if ($request->has('user_id')) {
            $profileUserId = $request->query('user_id');
            $type = $request->query('type', 'posts');

            if ($type === 'likes') {
                $query->whereHas('reactions', function ($q) use ($profileUserId) {
                    $q->where('user_id', $profileUserId)->where('type', 'like');
                });
            } elseif ($type === 'replies') {
                $query->where('user_id', $profileUserId)->whereNotNull('parent_id');
            } else {
                // default posts
                $query->where('user_id', $profileUserId)->whereNull('parent_id');
            }
        } else {
            // General timeline: only show top-level posts / reshares, not direct replies
            $query->whereNull('parent_id');
        }

        $blogs = $query->orderBy('created_at', 'desc')->get();

        return response()->json($blogs);
    }

    /**
     * Store a newly created blog post, reply, or reshare.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'nullable|string|max:500',
            'image_url' => 'nullable|string',
            'parent_id' => 'nullable|integer|exists:blogs,id',
            'reshare_id' => 'nullable|integer|exists:blogs,id',
        ]);

        if (empty($validated['content']) && empty($validated['image_url']) && empty($validated['reshare_id'])) {
            return response()->json(['message' => 'Post cannot be empty.'], 422);
        }

        $blog = Blog::create([
            'user_id' => $request->user()->id,
            'content' => $validated['content'] ?? null,
            'image_url' => $validated['image_url'] ?? null,
            'parent_id' => $validated['parent_id'] ?? null,
            'reshare_id' => $validated['reshare_id'] ?? null,
        ]);

        return response()->json($this->loadBlogDetails($blog->id), 201);
    }

    /**
     * Display a specific blog thread.
     */
    public function show($id)
    {
        $blog = $this->loadBlogDetails($id);
        
        $userId = auth('sanctum')->id();
        $repliesQuery = Blog::where('parent_id', $id)
            ->with(['user', 'reshare.user'])
            ->withCount([
                'replies',
                'reshares',
                'reactions as likes_count' => function ($q) {
                    $q->where('type', 'like');
                },
                'reactions as dislikes_count' => function ($q) {
                    $q->where('type', 'dislike');
                }
            ]);

        if ($userId) {
            $repliesQuery->withExists([
                'reactions as is_liked' => function ($q) use ($userId) {
                    $q->where('user_id', $userId)->where('type', 'like');
                },
                'reactions as is_disliked' => function ($q) use ($userId) {
                    $q->where('user_id', $userId)->where('type', 'dislike');
                }
            ]);
        }

        $replies = $repliesQuery->orderBy('created_at', 'asc')->get();

        return response()->json([
            'blog' => $blog,
            'replies' => $replies
        ]);
    }

    /**
     * Delete a blog post.
     */
    public function destroy(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->user_id !== $request->user()->id && !$request->user()->is_admin) {
            return response()->json(['message' => 'Unauthorized deletion request.'], 403);
        }

        $blog->delete();

        return response()->json(['message' => 'Post deleted successfully.']);
    }

    /**
     * React (like / dislike) to a blog post.
     */
    public function react(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|in:like,dislike',
        ]);

        $blog = Blog::findOrFail($id);
        $userId = $request->user()->id;
        $type = $request->type;

        $existing = Reaction::where('user_id', $userId)
            ->where('blog_id', $id)
            ->first();

        if ($existing) {
            if ($existing->type === $type) {
                // Remove reaction if clicked again
                $existing->delete();
            } else {
                // Update to new reaction
                $existing->update(['type' => $type]);
            }
        } else {
            // Add new reaction
            Reaction::create([
                'user_id' => $userId,
                'blog_id' => $id,
                'type' => $type
            ]);
        }

        return response()->json($this->loadBlogDetails($id));
    }

    /**
     * Fetch user profile metadata.
     */
    public function showProfile($id)
    {
        $user = User::findOrFail($id);
        return response()->json([
            'user' => $user
        ]);
    }

    /**
     * Update current user's profile metadata.
     */
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:500',
            'location' => 'nullable|string|max:100',
            'website' => 'nullable|string|max:255',
            'avatar' => 'nullable|string',
            'cover_photo' => 'nullable|string',
        ]);

        $user->update($validated);

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user
        ]);
    }

    /**
     * Helper to load comprehensive blog metrics and state.
     */
    private function loadBlogDetails($id)
    {
        $userId = auth('sanctum')->id();
        
        $query = Blog::with(['user', 'reshare.user'])
            ->withCount([
                'replies',
                'reshares',
                'reactions as likes_count' => function ($q) {
                    $q->where('type', 'like');
                },
                'reactions as dislikes_count' => function ($q) {
                    $q->where('type', 'dislike');
                }
            ]);

        if ($userId) {
            $query->withExists([
                'reactions as is_liked' => function ($q) use ($userId) {
                    $q->where('user_id', $userId)->where('type', 'like');
                },
                'reactions as is_disliked' => function ($q) use ($userId) {
                    $q->where('user_id', $userId)->where('type', 'dislike');
                }
            ]);
        }

        return $query->findOrFail($id);
    }
}
