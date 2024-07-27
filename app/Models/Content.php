<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public static function rules(): array
    {
        return [
            'author_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'slug' => 'required|string|unique:contents',
            'status' => 'required|string|in:draft,published',
            'type' => 'required|string|in:post',
            'comment_status' => 'required|string|in:open,closed',
            'image' => 'nullable|image',
        ];
    }
}
