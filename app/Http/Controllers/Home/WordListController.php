<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Word;
use App\Models\User;
use Auth;

class WordListController extends Controller
{
	public function index()
	{
		$userId = Auth::user()->id;
		$word = Word::where('user_id', $userId)->paginate(config('setting.word.number_page'));

		return view('words.index', compact('word'));
	}    

	public function create()
	{
		//
	}   

    public function show($id)
    {
    	//
    }
}
