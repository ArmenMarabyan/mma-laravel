<?php

namespace Mma\Http\Controllers;

use Illuminate\Http\Request;
use Mma\Fighter;
use Mma\Article;


class FighterController extends Controller
{

	/**
     * fighters list
     *
     * @return view with fighters list
     */
    protected function fightersList() {
		if(view()->exists("site.fighters.index")) {
    		$fighters = Fighter::paginate(6);

	    	return view("site.fighters.index", [
	    		'fighters' => $fighters
	    	]);
	    }else{
	    	abort(404);
	    }
	}

	/**
     * fighter page
     *
     * 
     */
	protected function fighter($alias) {
		if(view()->exists("site.fighters.view")) {
			$alias = trim(htmlspecialchars($alias));
    		$fighter = Fighter::where('alias', $alias)->first();

			if($fighter) {
				//get fighter name 
				$fighterName=trim(substr($fighter->name, 0, strpos($fighter->name, "(")));
				if($fighterName) {
					//
					$fighterNewsList = Article::where("name", "LIKE", "%" . $fighterName . "%")
	                               ->orWhere("short_description", "LIKE", "%" . $fighterName . "%")
	                               ->orWhere("description", "LIKE", "%" . $fighterName . "%")
	                               ->take(10)->get();
				}else {
					$fighterNewsList = [];
				}
				

		    	return view("site.fighters.view", [
		    		'fighter'         => $fighter,
		    		'fighterNewsList' => $fighterNewsList,
		    		'fighterName'     => $fighterName
		    	]);
			}else{
		    	abort(404);
		    }
	    }else{
	    	abort(404);
	    }
	}
    public function index($alias="") {
    	if($alias) {
    		return $this->fighter($alias);
    	}else {
    		return $this->fightersList();
    	}
    	
    }
}
