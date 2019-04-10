<?php

namespace Mma\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Mma\Http\Controllers\Controller;
use Mma\User;
use File;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(view()->exists("admin.users.index")) {
            $users = User::orderBy('id', 'desc')->paginate(10);


            
            return view("admin.users.index", [
                'users' => $users
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
        //
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
    public function destroy(User $user)
    {
        $id = $user->id;
        $path = '/assets/images/users/user_' .$id.'.jpg';

        if(file_exists(public_path() . $path)) {
            File::delete(public_path() . $path);
        }
        
        $user->delete();
        
        return redirect()->route('admin.users.index')->with('success', ['Пользователь успешно удален']);
    }
}
