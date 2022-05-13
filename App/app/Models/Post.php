<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "body",
        "userId",
    ];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, "userId");
    }

    public function Comments(): HasMany
    {
        return $this->hasMany(Comment::class, "postId");
    }

}
