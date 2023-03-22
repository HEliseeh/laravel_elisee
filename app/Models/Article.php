<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'title',
        'body',
        'user_id',
        'image',
    ];
    
    protected $appends = [
        'author', 'comments'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getAuthorAttribute()
    {
        return $this->user->name;
    }

    public function getCommentsAttribute()
    {
        return $this->comments()->with('user')->get();
    }
}
