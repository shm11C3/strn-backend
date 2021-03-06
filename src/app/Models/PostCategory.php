<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'created_at',
        'updated_at',
    ];

    /**
     * カテゴリーの投稿を取得
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'uuid', 'category_uuid');
    }
}
