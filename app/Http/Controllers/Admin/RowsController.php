<?php

namespace App\Http\Controllers\Admin;

use App\Models\Columns;
use App\Models\Rows;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RowsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $rows = Rows::all();
        $columns = Columns::all();
        return view('admin.rows.index')
            ->with('columns', $columns)
            ->with('rows', $rows);
    }

    public function create(){
        $columns = Columns::all();
        return view('admin.rows.create')
            ->with('columns', $columns);
    }

    public function store(Request $data){
        $columns = Columns::all();
        $rules = array();
        foreach($columns as $col){
            $rules[$col->slug] = $col->type;
        }

        $this->validate($data, $rules);


        $data = $data->toArray();
        unset($data['_token']);
//        dd($data);
//        Rows::create($data);
        DB::table('rows')->insert($data);

        return redirect()->route('admin.rows.index');
    }

    public function edit($id){
        $rows = Rows::where('id', $id)->first();
        $columns = Columns::all();
        return view('admin.rows.edit')
            ->with('columns', $columns)
            ->with('row', $rows);
    }

    public function update(Request $data, $id){

        $columns = Columns::all();
        $rules = array();
        foreach($columns as $col){
            $rules[$col->slug] = $col->type;
        }

        $this->validate($data, $rules);

        $data = $data->toArray();
        unset($data['_token']);
        unset($data['_method']);

        DB::table('rows')->where('id', $id)->update($data);
//        Rows::where('id', $id)->update($data);

        return redirect()->route('admin.rows.index');
    }

    public function destroy(){
        return view('admin.rows.create');
    }
}
