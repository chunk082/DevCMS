<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $table = 'article_comments';

    protected $fillable = [
        'comment', 'news_id', 'user_id'
    ];

    public $timestamps = false; // Disable timestamps

    protected $casts = [
        'created_at' => 'datetime',
    ];
    
    public function news()
    {
        return $this->belongsTo(News::class, 'news_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}