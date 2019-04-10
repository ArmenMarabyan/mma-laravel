<?php

namespace Mma\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Mma\Http\Requests\Admin\ArticleFormRequest;
use Mma\Http\Controllers\Controller;
use Mma\Services\ModelService;
use Mma\Article;
use Mma\Comment;
use Mma\Like;
use Image;
use File;

class ArticleController extends Controller
{

    protected $modelService;

    public function __construct(ModelService $modelService)
    {
        $this->modelService = $modelService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(view()->exists("admin.articles.index")) {
            $articles = Article::orderBy('id', 'desc')->paginate(10);

            return view("admin.articles.index", [
                'articles' => $articles
            ]);
        }else{
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(view()->exists('admin.articles.create')) {
            return view("admin.articles.create");
        }else {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleFormRequest $request)
    {
        if($request->isMethod('POST')) {
            $data = $request->except('files', '_token','image');
            $id = Article::create($data)->id;

            if($id) {
                $imagePath = '/assets/images/articles/article_' .$id.'.jpg';
                $this->modelService->handleUploadedImage($imagePath);
            }
            return redirect()->route('admin.articles.index')->with('success', ['Статья успешно добавлена']);
        }
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
    public function edit(Article $article)
    {
        if(view()->exists("admin.articles.edit")) {
            return view("admin.articles.edit", [
                'article' => $article,
            ]);
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleFormRequest $request, Article $article)
    {
        if($request->isMethod('put')) {
            $data = $request->except('image');

            $id = $article->id;
            $imagePath = '/assets/images/articles/article_' .$id.'.jpg';
            $this->modelService->handleUploadedImage($imagePath);

            $article->update($data);

            return redirect()->route('admin.articles.index')->with('success', ['Статья успешно изменена']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {               
        $id = $article->id;
        $path = '/assets/images/articles/article_' .$id.'.jpg';

        if(file_exists(public_path() . $path)) {
            File::delete(public_path() . $path);
        }
        Comment::where('article_id', $id)->delete();
        Like::where('article_id', $id)->delete();
        $article->delete();
        
        return redirect()->route('admin.articles.index')->with('success', ['Cтатья успешно удалена']);
    }
}
