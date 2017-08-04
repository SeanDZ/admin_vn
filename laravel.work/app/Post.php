<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $table = 'posts';
    protected $guarded=[];//不能被插入的字段
//    protected $fillable=[];//可以被插入的字段
    public $timestamps = true;
}
