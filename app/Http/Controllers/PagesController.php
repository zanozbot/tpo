<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;

class PagesController extends Controller
{
	public function homePage(){
		if(Auth::check()){
			echo "Logged in";
			return view('pages.welcome');
		} else {
			return view('pages.login');
		}
	}
}