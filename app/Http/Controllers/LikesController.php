<?php

namespace Mma\Http\Controllers;

use Illuminate\Http\Request;
use Mma\Like;
use Mma\Article;
use Auth;

class LikesController extends Controller
{
	public function index(Request $request) {
		if($request->ajax()) {
			$data = $request->input('data');
			$user = Auth::user();
	        if($user) {
	        	$userId = $user->id;
	            $articleId = $data['articleId'];
	            $value = $data['value'];

	            
	            if($value == 1) {
	            	$likesValue = Like::where('article_id', $articleId)->where('user_id', $userId)->first();
	            	if(is_null($likesValue)) {
	            		Like::create(['article_id' => $articleId, 'user_id' => $userId, 'value' => $value]);
	            		\DB::update('UPDATE articles SET likes=likes+1 WHERE id=?', array($articleId));
	            	} else {
	            		if ($likesValue->value == 1) {
	            			\DB::delete('DELETE FROM likes WHERE article_id=? AND user_id=?', array($articleId, $userId));
	            			\DB::update('UPDATE articles SET likes=likes-1 WHERE id=?', array($articleId));
	            		} else {
	            			\DB::update('UPDATE likes SET value=1 WHERE article_id=? AND user_id=?', array($articleId, $userId));
							\DB::update('UPDATE articles SET likes=likes+2 WHERE id=?', array($articleId));
	            		}
	            	}
	            } else {
	            	$likesValue = Like::where('article_id', $articleId)->where('user_id', $userId)->first();
	            	if(is_null($likesValue)) {
	            		Like::create(['article_id' => $articleId, 'user_id' => $userId, 'value' => $value]);
	            		\DB::update('UPDATE articles SET likes=likes-1 WHERE id=?', array($articleId));
	            	} else {
	            		if ($likesValue->value == -1) {
	            			\DB::delete('DELETE FROM likes WHERE article_id=? AND user_id=?', array($articleId, $userId));
	            			\DB::update('UPDATE articles SET likes=likes+1 WHERE id=?', array($articleId));
	            		} else {
	            			\DB::update('UPDATE likes SET value=-1 WHERE article_id=? AND user_id=?', array($articleId, $userId));
							\DB::update('UPDATE articles SET likes=likes-2 WHERE id=?', array($articleId));
	            		}
	            	}
	            }
	        }

	        $article = Article::where('id', $data['articleId'])->first();
	        echo $article->likes;

			exit();
		}
	}
}
