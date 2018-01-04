<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedController extends Controller
{
	public function index()
	{
		$test = array('gg', 'xd', 'ff', 'qq');
		return view('hello', ['test' => $test]);
		
	}
}
