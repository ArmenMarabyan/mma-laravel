<?php

namespace Mma\Http\Controllers;

use Illuminate\Http\Request;
use Mma\Http\Requests\FeedbackRequest;

class FeedbackController extends Controller
{
   /**
     * show feedback form
     *
     * 
     */
    public function index() {
    	return view('site.pages.feedback');
    }

    /**
     * send mail
     *
     * 
     */
    public function sendMail(FeedbackRequest $request) {
    	if($request->isMethod('post')) {
    		return redirect('feedback')->withMessage('Письмо отправлено успещно!');
    	}
    	return view('site.pages.feedback');
    }
}
