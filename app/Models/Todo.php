<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'category_id',
        'is_complete',
    ];

    public function categories(): BelongsTo 
    {
        return $this->belongsTo(Category::class);
    }
}