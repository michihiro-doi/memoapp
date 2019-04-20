<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Memo;
use App\Customer;

class MemoController extends Controller
{
    /*
     * The Memo repository instance.
     */
    protected $memos;
    /**
     * Create a new controller instance.
     *
     * @param  Memo  $memos
     * @return void
     */
    public function __construct(Memo $memos){
        $this->memos = $memos;
    }

    public function index(){
        $memos = $this->memos->all();
        return view("/memo/index",["memos"=>$memos]);
    }

    public function add(){
        return view("/memo/add");
    }

    public function create(Request $request){
        $this->memos->create(['text' => $request->text, 
            'customer_id' => $request->customer_id, 
            'user_id' => $request->user_id,]);
        return redirect("/memo/index");
    }
}