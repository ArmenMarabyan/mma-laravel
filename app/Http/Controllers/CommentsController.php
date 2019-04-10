<?php

namespace Mma\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Mma\Comment;
use Mma\Article;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->except('_token', 'comment_post_ID', 'comment_parent');
        
        $data['article_id'] = $request->input('comment_post_ID');
        $data['parent_id'] = $request->input('comment_parent');
        $user = \Auth::user();

        if($user) {
            $data['name'] = $user->name;
            $data['user_id'] = $user->id;
        }

        $validator = Validator::make($data, [
            'article_id' => 'integer|required',
            'parent_id' => 'integer|required',
            'user_comment' => 'string|required',
        ]);

        $validator->sometimes(['name'], 'required|max:255', function($input) {
            return !\Auth::check();
        });

        if($validator->fails()) {
            return \Response::json(['errors' => $validator->errors()->all()]);
        }
        $comment = new Comment($data);

        $post = Article::find($data['article_id']);
        $post->comments()->save($comment);

        $comment->load('user');
        $data['id'] = $comment->id;

        $view_comment = view('site.one_comment')->with('data', $data)->render();
        return \Response::json(['success' => TRUE, 'comment' => $view_comment, 'data' => $data]);

        exit();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
