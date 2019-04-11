<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Word;
use App\Models\User;
use App\Models\Memory;
use Auth;
use DB;
use Carbon\Carbon;
use Exception;
use App\Models\Lesson;
use function MongoDB\BSON\toJSON;

class StatisticalController extends Controller
{
    public function index()
    {
        $range_month = \Carbon\Carbon::now()->subDays(config('setting.numberMonth'));
        $range_year = \Carbon\Carbon::now()->subDays(config('setting.numberDay'));
        $sum_year = DB::table('memories')
            ->where('created_at', '<=', $range_year)
            ->where('user_id',Auth::user()->user_id)
            ->where('status',config('setting.status_learned'))
            ->whereYear('created_at', '=', date("Y"))
            ->count();
        $sum_month = DB::table('memories')
            ->where('created_at', '<=', $range_month)
            ->where('user_id',Auth::user()->user_id)
            ->where('status',config('setting.status_learned'))
            ->whereMonth('created_at', '=', date("n"))
            ->whereYear('created_at', '=', date("Y"))
            ->count();

        return view('statistical.index', compact('sum_month', 'sum_year'));
    }

    public  function chart($value){
        if($value == 1)
        {
            $range_month = \Carbon\Carbon::now()->subDays(config('setting.numberMonth'));
            $stats = DB::table('memories')
                ->select(DB::raw('month(created_at) as day'), DB::raw('COUNT(*) as value'))
                ->where('user_id',Auth::user()->user_id)
                ->where('status',config('setting.status_learned'))
                ->where('created_at', '<=', $range_month)
                ->whereYear('created_at', '=', date("Y"))
                ->groupBy('day')
                ->orderBy('day', 'ASC')
                ->get()->toJson();
        }
        else
        {
            $range_year = \Carbon\Carbon::now()->subDays(config('setting.numberDay'));
            $stats = DB::table('memories')
                ->select(DB::raw('DATE_FORMAT(created_at,"%d-%m-%Y") as day'), DB::raw('COUNT(*) as value'))
                ->where('user_id',Auth::user()->user_id)
                ->where('status',config('setting.status_learned'))
                ->where('created_at', '<=', $range_year)
                ->whereMonth('created_at', '=', date("n"))
                ->whereYear('created_at', '=', date("Y"))
                ->groupBy('day')
                ->orderBy('day', 'ASC')
                ->get()->toJson();
        }
        
        return $stats;
    }
}
