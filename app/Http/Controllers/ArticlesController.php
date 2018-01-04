<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
	//
	public function index()
	{
		return view('articles.article', ['articles' => Article::all()]);
//		return "fuck";
	}
	
	public function create()
	{
//		return view('articles.create');
		return "fuck";
	}
	
	public function store(Request $request)
	{
//		return view('articles.create');
		
		
		$article = new Article();
		$article->name = $request->input('name');
		$article->string = $request->input('string');
		$article->save();

//		echo "zzz";
//		return redirect('/store');
//		return view('articles.article');
	
	}
	
	public function update(Request $request, $id)
	{
//		$article=new Article();
//		$row=\App\Article::find($id);
//		$row->string="fuuuuuuuuuuuuck";
//		$row->save();
		return view('articles.create',['id'=>$id]);
//		return "zzz";
	}
	
	public function edit(Request $request,$id){
		$row=\App\Article::find($id);
		$row->name=$request->input('name');
		$row->string=$request->input('string');
		$row->save();
	}
}
