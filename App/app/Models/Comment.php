<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "body",
        "postId",
    ];

    public function Post(): BelongsTo
    {
        return $this->belongsTo(Post::class, "postId");
    }
}
