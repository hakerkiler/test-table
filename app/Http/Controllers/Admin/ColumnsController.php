<?php

namespace App\Http\Controllers\Admin;

use App\Models\Columns;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ColumnsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $columns = Columns::all();
        return view('admin.columns.index')
            ->with('columns', $columns);
    }

    public function create(){
        return view('admin.columns.create');
    }

    public function store(Request $data){

        $columns = new Columns();

        $columns->name = $data->name;
        $columns->slug = Str::slug($data->name);
        $columns->type = $data->type;
        $columns->order = $data->order;
        if($columns->save()){
            Schema::table('rows', function($table) use ($columns)
            {
                $type = $columns->type;
                $table->$type($columns->slug);
            });
        }

        return redirect()->route('admin.columns.index');
    }

    public function edit($id){
        $columns = Columns::where('id', $id)->first();
        return view('admin.columns.edit')
            ->with('column', $columns);
    }

    public function update(Request $data, $id){

        $columns = Columns::where('id', $id)->first();

        Schema::table('users', function($table) use ($columns)
        {
            $table->dropColumn($columns->slug);
        });

        $columns->name = $data->name;
        $columns->slug = Str::slug($data->name);
        $columns->type = $data->type;
        $columns->order = $data->order;
        if($columns->save()){
            Schema::table('rows', function($table) use ($columns)
            {
                $type = $columns->type;
                $table->$type($columns->slug);
            });
        }

        return redirect()->route('admin.columns.index');
    }

    public function destroy(){
        return view('admin.columns.create');
    }
}
