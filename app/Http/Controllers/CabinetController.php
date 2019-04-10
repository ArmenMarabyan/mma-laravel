<?php

namespace Mma\Http\Controllers;

use Mma\Services\ModelService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mma\User;
use Auth;
use Image;

class CabinetController extends Controller
{

	protected $modelService;

	public function __construct(ModelService $modelService)
	{
	    $this->modelService = $modelService;
	}

    public function edit(Request $request) {
    	$user = Auth::user();
    	if($request->isMethod('post')) {
    		$this->validate($request, [
	            'name' => 'required|max:255|string',
	        ]);
	        $data = $request->except('_token', 'image');
	        //change or add user image
	        $imagePath = '/assets/images/users/user_' .$user->id.'.jpg';
	        $this->modelService->handleUploadedImage($imagePath, 150);
	        
	        User::where('id', $user->id)->update($data);

	        return redirect()->back()->with('message','Профиль обновлен!');
    	}
    	

    	return view('site.cabinet.edit', [
    		'user' => $user
    	]);
    }
}
