<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $table = 'my_posts';
    // protected $primarykey = 'post_id';
    // public $timestamp = false;

    public function user() {
        return $this->belongsTo('App\User');
        /*
        this
        هو
        post

        يخص لل
        user
        */
    }
}
