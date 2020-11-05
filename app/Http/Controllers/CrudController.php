<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    public function index(){
        $data_barang = DB::table('crud')->get();
        return view('crud.index',['data_barang' => $data_barang]);
        
    }

    public function tambah(){
        return view('crud.tambah');
    }

    public function simpan(Request $request){
        DB::insert('insert into crud (kode_barang, nama_barang) values (?, ?)', [$request->kode_barang, $request->nama_barang]);
        // dd($request->all());
        return redirect()->route('crud-index');
    }
}
