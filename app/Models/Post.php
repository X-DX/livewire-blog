<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Pest\Support\Str;

class Post extends Model
{
    // Mass assignable fields
    // These columns are allowed to be inserted using Post::create()
    // Protects from mass assignment security issues
    protected $fillable = [
        'user_id',  // which user created the post
        'title',    // post title
        'slug',     // SEO friendly URL
        'excerpt',  // short description
        'content',  // full blog content
        'featured_image',   // image path
        'status',           // draft/published/archived
        'published_at'      // publish date
    ];

    // Type casting
    // Converts database value into proper PHP datatype automatically
    protected $casts = [
        // converts published_at string into Carbon datetime object
        // so we can use date methods like:
        // ->format()
        // ->diffForHumans()
        'published_at' => 'datetime',
    ];

    // Relationship: Post belongs to User
    // Each post is created by one user
    public function user(): BelongsTo
    {
        return $this->belongsTo(related: User::class);
    }

    // create slug
    // Automatically generate slug before saving post
    protected static function boot(): void
    {
        // call parent boot method
        parent::boot();

        // model event: runs before record is created
        static::creating(callback: function ($post): void {
            // check if slug is empty
            if (empty($post->slug)) {
                // generate SEO friendly slug from title
                // example:
                // "Laravel Beginner Guide"
                // becomes
                // "laravel-beginner-guide"
                $post->slug = Str::slug($post->title);
            }
        });
    }
}
