<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\Post;
use App\Model\user\Category;



class PostController extends Controller
{
    public function posts(Post $post){

    	// return $post;

    	return view('user.posts', compact('post'));
    }

    public function tag(){
    	
    	
    }

    
}
