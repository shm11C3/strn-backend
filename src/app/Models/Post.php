<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ulid',
        'auth_id',
        'category_uuid',
        'title',
        'content',
        'is_draft',
        'is_publish',
        'is_deleted',
        'created_at',
        'updated_at',
    ];

    /**
     * 投稿のカテゴリーを取得　
     */
    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'category_uuid', 'uuid');
    }

    /**
     * 投稿のユーザーを取得
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'auth_id', 'auth_id');
    }

    /**
     * `is_draft`と`is_publish`を検証
     *
     * @param boolean $is_draft
     * @param boolean $is_publish
     * @return boolean
     */
    public function isValid_isDraft(bool $is_draft, bool $is_publish): bool
    {
        return !($is_draft * $is_publish);
    }
}
