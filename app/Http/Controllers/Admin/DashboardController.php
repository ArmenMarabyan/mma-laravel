<?php

namespace Mma\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Mma\Http\Controllers\Controller;
use Mma\Fighter;
use Mma\Article;
use Mma\User;

class DashboardController extends Controller
{
    public function index() {
    	if(view()->exists("admin.dashboard")) {
    		$fighters = Fighter::orderBy("id", "desc")->paginate(10);
    		$articles = Article::orderBy("id", "desc")->paginate(10);
    		$users = User::orderBy("id", "desc")->paginate(10);

    		return view("admin.dashboard", [
    			'articles'                  => $articles,
    			'articlesCount'             => $articles->total(),
    			'fighters'                 	=> $fighters,
                'fightersCount'             => $fighters->total(),
                'users'                 	=> $users,
                'usersCount'             => $users->total()
    		]);
    	}else{
    		abort(404);
    	}
    }
}