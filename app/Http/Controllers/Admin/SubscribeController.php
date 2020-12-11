<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class SubscribeController extends Controller
{
    public function subscriber(){
        $subscribers=DB::table('subscribers')
                        ->join('users','subscribers.user_id','users.id')
                        ->get();
        return view('admin.subscribers',compact('subscribers'));
    }
}
