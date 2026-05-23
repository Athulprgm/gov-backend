<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Project::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json(['message' => 'Unauthorized admin access required.'], 403);
        }

        $validated = $request->validate([
            'id' => 'sometimes|string|unique:projects,id',
            'category_ml' => 'required|string|max:255',
            'category_en' => 'required|string|max:255',
            'title_ml' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'district_ml' => 'required|string|max:255',
            'district_en' => 'required|string|max:255',
            'description_ml' => 'required|string',
            'description_en' => 'required|string',
            'investment' => 'required|string|max:255',
            'percentage' => 'required|integer|between:0,100',
            'before_text_ml' => 'required|string',
            'before_text_en' => 'required|string',
            'after_text_ml' => 'required|string',
            'after_text_en' => 'required|string',
            'before_img' => 'nullable|string',
            'after_img' => 'nullable|string',
        ]);

        if (empty($validated['id'])) {
            $slug = Str::slug($validated['title_en']);
            // Make sure ID is unique
            $count = Project::where('id', 'LIKE', "{$slug}%")->count();
            $validated['id'] = $count > 0 ? "{$slug}-" . ($count + 1) : $slug;
        }

        $project = Project::create($validated);

        return response()->json($project, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json(['message' => 'Unauthorized admin access required.'], 403);
        }

        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'category_ml' => 'sometimes|required|string|max:255',
            'category_en' => 'sometimes|required|string|max:255',
            'title_ml' => 'sometimes|required|string|max:255',
            'title_en' => 'sometimes|required|string|max:255',
            'district_ml' => 'sometimes|required|string|max:255',
            'district_en' => 'sometimes|required|string|max:255',
            'description_ml' => 'sometimes|required|string',
            'description_en' => 'sometimes|required|string',
            'investment' => 'sometimes|required|string|max:255',
            'percentage' => 'sometimes|required|integer|between:0,100',
            'before_text_ml' => 'sometimes|required|string',
            'before_text_en' => 'sometimes|required|string',
            'after_text_ml' => 'sometimes|required|string',
            'after_text_en' => 'sometimes|required|string',
            'before_img' => 'sometimes|nullable|string',
            'after_img' => 'sometimes|nullable|string',
        ]);

        $project->update($validated);

        return response()->json($project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json(['message' => 'Unauthorized admin access required.'], 403);
        }

        $project = Project::findOrFail($id);
        $project->delete();

        return response()->json(['message' => 'Project deleted successfully']);
    }
}
