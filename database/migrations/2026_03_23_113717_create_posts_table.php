<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create a new table named "posts"
        Schema::create('posts', function (Blueprint $table) {
            // Primary key column (auto-incrementing ID)
            $table->id();

            // Foreign key column referencing users table
            // user_id stores which user created the post
            // constrained() automatically links to users.id
            // cascadeOnDelete() means:
            // if a user is deleted, all their posts are also deleted
            $table->foreignId(column: 'user_id')->constrained()->cascadeOnDelete();

            // Title of the blog post
            // string = VARCHAR(255)
            $table->string(column: 'title');

            // SEO-friendly URL slug
            // Example: "laravel-12-complete-guide"
            // unique() ensures no duplicate slug exists
            $table->string(column: 'slug')->unique();

            // Short summary of the post
            // nullable() means this field is optional
            $table->text(column: 'excerpt')->nullable();

            // Full blog content
            // longText allows storing large amount of text
            $table->longText(column: 'content');

            // Path or filename of the featured image
            // Example: "posts/image1.jpg"
            // nullable() because image upload is optional
            $table->string(column: 'featured_image')->nullable();

            // Status of the post
            // enum restricts values to only these options:
            // draft     → post is still being written
            // published → visible to public
            // archived  → old post, not active
            // default value is "draft"
            $table->enum('status', ['draft', 'published', 'archived'])->default(value: 'draft');

            // Stores the date and time when the post is published
            // nullable because draft posts are not published yet
            $table->timestamp(column: 'published_at')->nullable();

            // Adds two automatic columns:
            // created_at → when record created
            // updated_at → when record last updated
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
