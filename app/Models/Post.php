<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $timestamps = false;
    protected $fillable = ['body','user_id'];


    //relashioships

    public function user()
    {
    	return $this-> belongsTo(User::class,'user_id');
    }


    public function comments()
    {
    	return $this-> hasMany(Comment::class, 'post_id')
    }
}
