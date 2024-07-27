<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
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
            'content_id' => 'required|exists:contents,id',
            'user_id' => 'required|exists:users,id',
            'content' => 'required|string',
        ];
    }
}
