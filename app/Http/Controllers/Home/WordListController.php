<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Carbon\Carbon;
use Exception;
use App\Models\Lesson;
use App\Repositories\WordRepository;

class WordListController extends Controller
{
    protected $word;

    public function __construct(WordRepository $word)
    {
        $this->word = $word;
    }

	public function show($id)
    {
        $lesson = Lesson::whereId($id)->first();
        $word = $lesson->words()->inRandomOrder()->limit(config('setting.word.number_page'))->get();

        return view('words.index', compact('lesson', 'word'));
    }

	public function create()
	{
		//
	}

    public function doFavorite(Request $request)
    {
        try {
            $user = Auth::user();
            $word_id = DB::table('memories')
                ->whereWordId($request->id)
                ->whereUserId($user->id)
                ->exists();

            if (!$word_id) {
                $user->words()->attach($request->id, [
                    'status' => config('setting.true'),
                    'user_id' => $user->id,
                    'learn_time' => Carbon::now(),
                ]);

                return redirect()->back();
            } else {
                $word_status = DB::table('memories')->whereWordId($request->id)->whereUserId($user->id)->whereStatus(config('setting.true'))->exists();
                if ($word_status) {
                    $user->words()->updateExistingPivot($request->id, ['status' => config('setting.false')]);
                } else {
                    $user->words()->updateExistingPivot($request->id, ['status' => config('setting.true')]);
                }

                return redirect()->back();
            }
        } catch (Exception $e) {
            return redirect()->back()->with('status', trans('word.add_error'));
        }
    }

    public function reviewWord()
    {
        $words = $this->word->wordFilter(config('setting.word.number_page'));

        return view('words.review', compact('words'));
    }

    public function filterWord($status)
    {
        if(\Request::ajax())
        {
            $words = $this->word->wordFilter(config('setting.word.number_page'));

            if ($status != 'all') {
                $words = $this->word->wordFilterWhere(config('setting.word.number_page'), $status);
            }
            $data = \View::make('widgets.word', ['words' => $words])->render();

            return \response()->json(['data' => $data]);
        }
    }

}
