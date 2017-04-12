<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obisk

class PlanController extends Controller
{
    public function index() {
        $obiski = Obisk::all();

    	return view('pages.plan', ['obiski' => $obiski]);
    }

    public function create(Request $request) {
    	
    }
}
