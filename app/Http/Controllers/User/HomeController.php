<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\Post;
use App\Model\user\Category;



class HomeController extends Controller
{
	public function index(){
		
		$posts = Post::where('status', 1)->orderBy('created_at', 'desc')->simplePaginate(5);
		return view('user.home', compact('posts'));
	}

	public function category($category){

	   $category = Category::where('name', $category);
	   dd($category);
	}

	public function tag(){
		return $request->all();
	}

}
