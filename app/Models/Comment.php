<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'commented_by',
        'post_id',
        'body'
    ];
    
    public function commentor()
    {
        return $this->belongsTo(User::class, 'commented_by');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
