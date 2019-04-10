<?php

namespace Mma\Http\Controllers;

use Illuminate\Http\Request;
use Mma\Article;
use DB;

class ArticleController extends Controller
{
     public function view($alias) {
    	if(view()->exists("site.articles.view")) {
    		
    		$alias = trim(htmlspecialchars($alias));
    		$article = Article::where('alias',$alias)->first();

    		if($article) {
    			$latestArticles = Article::orderBy('id','desc')
    											->where('alias', '!=', $alias )
    											->take(3)
    											->get();
    			//get article comments list
    			$com = $article->comments->groupBy('parent_id');
            
	    		//article views update
	    		DB::table('articles')->where('alias', $alias)->increment('views', 1);
		    	return view("site.articles.view", [
		    		'article'        => $article,
		    		'latestArticles' => $latestArticles,
		    		'com' 			 => $com
		    	]);
    		}else{
		    	abort(404);
		    }
    		
	    }else{
	    	abort(404);
	    }
    }
}
