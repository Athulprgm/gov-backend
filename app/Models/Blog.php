<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
        'image_url',
        'parent_id',
        'reshare_id',
    ];

    /**
     * Get the author of the blog.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the parent blog if this is a reply.
     */
    public function parent()
    {
        return $this->belongsTo(Blog::class, 'parent_id');
    }

    /**
     * Get the replies/comments to this blog.
     */
    public function replies()
    {
        return $this->hasMany(Blog::class, 'parent_id');
    }

    /**
     * Get the original blog if this is a reshare/retweet.
     */
    public function reshare()
    {
        return $this->belongsTo(Blog::class, 'reshare_id');
    }

    /**
     * Get the reshares/retweets of this blog.
     */
    public function reshares()
    {
        return $this->hasMany(Blog::class, 'reshare_id');
    }

    /**
     * Get the reactions for this blog.
     */
    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }
}
