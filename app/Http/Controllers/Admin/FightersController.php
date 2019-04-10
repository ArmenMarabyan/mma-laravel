<?php

namespace Mma\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Mma\Http\Requests\Admin\FighterFormRequest;
use Mma\Http\Controllers\Controller;
use Mma\Services\ModelService;
use Mma\Fighter;
use Image;
use File;

class FightersController extends Controller
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
        if(view()->exists("admin.fighters.index")) {
            $fighters = Fighter::orderBy('id', 'desc')->paginate(10);
            
            return view("admin.fighters.index", [
                'fighters' => $fighters
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
        if(view()->exists('admin.fighters.create')) {
            return view("admin.fighters.create");
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
    public function store(FighterFormRequest $request)
    {
        if($request->isMethod('POST')) {

            $data = $request->except('files', '_token', 'image');

            $id = Fighter::create($data)->id;

            if($id) {
                $imagePath = '/assets/images/fighters/fighter_' .$id.'.jpg';
                $this->modelService->handleUploadedImage($imagePath, 500, 400);
            }
            return redirect()->route('admin.fighters.index')->with('success', ['Боец успешно добавлен']);
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
    public function edit(Fighter $fighter)
    {
        if(view()->exists("admin.fighters.edit")) {
            return view("admin.fighters.edit", [
                'fighter' => $fighter,
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
    public function update(FighterFormRequest $request, Fighter $fighter)
    {
        if($request->isMethod('put')) {
            $data = $request->except('image');

            $id = $fighter->id;
            $imagePath = '/assets/images/fighters/fighter_' .$id.'.jpg';
            $this->modelService->handleUploadedImage($imagePath, 500, 400);

            $fighter->update($data);

            return redirect()->route('admin.fighters.index')
                            ->with('success', ['Раздел бойца успешно изменена']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fighter $fighter)
    {
        $id = $fighter->id;
        $path = '/assets/images/fighters/fighter_' .$id.'.jpg';

        if(file_exists(public_path() . $path)) {
            File::delete(public_path() . $path);
        }
        
        $fighter->delete();
        
        return redirect()->route('admin.fighters.index')->with('success', ['Боец успешно удален']);
    }
}
