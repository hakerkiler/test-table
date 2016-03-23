<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Columns;
use App\Models\Rows;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $columns = Columns::all();
        return view('home')
            ->with('columns', $columns);
    }

    /**
     * @return mixed
     */
    public function getBasicObjectData()
    {
        $users = Rows::select('*');

        return Datatables::of($users)->make();
    }
}
