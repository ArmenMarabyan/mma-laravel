<?php
namespace Mma\Http\Controllers;
use Illuminate\Http\Request;
use Mma\Article;

class SearchController extends Controller
{

	/**
     * search articles
     *
     * @return void
     */
    public function index(Request $request) {
    	$query = trim(htmlspecialchars($request->input("search")));

        //ajax search
    	if($request->ajax()) {
    		if($query != "") {
    			$results = Article::where("name", "LIKE", "%" . $query . "%")
                           ->orWhere("short_description", "LIKE", "%" . $query . "%")
                           ->orWhere("description", "LIKE", "%" . $query . "%")
                           ->orWhere("source", "LIKE", "%" . $query . "%")
                           ->take(10)->get();

                return view("site.search_ajax", [
	               "results"=>$results
	            ]);
    		}
    		die();
    	}

        if($query != "") {
            $results = Article::where("name", "LIKE", "%" . $query . "%")
                       ->orWhere("short_description", "LIKE", "%" . $query . "%")
                       ->orWhere("description", "LIKE", "%" . $query . "%")
                       ->orWhere("source", "LIKE", "%" . $query . "%")
                       ->paginate(10);

            $topArticles = Article::orderBy('views','desc')->take(4)->get();

            $results->appends($request->only('search'));
            return view("site.search", [
                "results"    =>$results,
                'query'      => $query,
                'topArticles'=>$topArticles
            ]);
        }else {
        	return redirect()->back();
        }
	}
}