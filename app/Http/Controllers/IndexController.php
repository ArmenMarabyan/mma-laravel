<?php

namespace Mma\Http\Controllers;

use Illuminate\Http\Request;
use Mma\Article;

class IndexController extends Controller
{
	/**
     * Showing main page
     *
     * @return view
     */
    public function index(Request $request) {
    	if(view()->exists("site.index")) {
    		//sort by
    		$sort = 'id';
    		if ($request->has('sort')) {
                $sort = trim(htmlspecialchars($request->get('sort')));
    			
	        }
            //sorted articles
    		$articles = Article::where('main_article', 0)
    									->orderBy($sort,'desc')
    									->paginate(3);

    		$topArticles = Article::where('main_article',0)
    									->orderBy('views','desc')
    									->take(4)->get();
            //header article
    		$mainArticle = Article::where('main_article',1)
    									->orderBy('created_at', 'desc')
    									->first();

	    	return view("site.index", [
	    		'articles'    => $articles,
	    		'topArticles' => $topArticles,
	    		'mainArticle' => $mainArticle
	    	]);
	    }else{
	    	abort(404);
	    }
    }
}
