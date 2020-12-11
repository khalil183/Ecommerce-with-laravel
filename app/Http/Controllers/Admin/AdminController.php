<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        return view('admin.index');
    }

    public function adminLogin(){
        return view('admin.auth.login');
    }

    public function sellsReport(){
        return view('admin.sellReport');
    }

    public function todaySellsReport(Request $req){
        $orders=DB::table('orders')
                    ->where('order_day',$req->date)
                    ->orderBy('order_id','DESC')->get();
        $total=DB::table('orders')
                    ->where('order_day',$req->date)
                    ->orderBy('order_id','DESC')
                    ->sum('order_total');
        $today="Today";
        return view('admin.sellReport',compact('orders','total','today'));
    }

    public function monthSellsReport(Request $req){
        $m=date('Y-').$req->month;
        $orders=DB::table('orders')
                    ->where('order_month',$m)
                    ->orderBy('order_id','DESC')->get();
        $total=DB::table('orders')
                    ->where('order_month',$m)
                    ->orderBy('order_id','DESC')
                    ->sum('order_total');

        if($req->month==01){
            $month="January";
        }else if($req->month==02){
            $month="February";
        }else if($req->month==03){
            $month="March";
        }else if($req->month==04){
            $month="April";
        }else if($req->month==05){
            $month="May";
        }else if($req->month==06){
            $month="June";
        }else if($req->month==07){
            $month="July";
        }else if($req->month=='08'){
            $month="August";
        }else if($req->month=='09'){
            $month="September";
        }else if($req->month==10){
            $month="October";
        }else if($req->month==11){
            $month="November";
        }else{
            $month="December";
        }

        return view('admin.sellReport',compact('orders','total','month'));

    }

    public function yearlySellsReport(Request $req){
        $orders=DB::table('orders')
                    ->where('order_year',$req->year)
                    ->orderBy('order_id','DESC')->get();
        $total=DB::table('orders')
                    ->where('order_year',$req->year)
                    ->orderBy('order_id','DESC')
                    ->sum('order_total');
        $year=$req->year;
        return view('admin.sellReport',compact('orders','total','year'));
    }

}


