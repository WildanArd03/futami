<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class prokomJenisProgramController extends Controller
{
    
    public function index(){
        $data_jenis = DB::table('jenis_program')->get();
        return view('prokomF1.index-jenis-program',['data_jenis' => $data_jenis]);
        
    }

    public function tambah(){
        return view('prokomF1.tambah-jenis-program');
        
    }
    public function hapus(Request $request){
        // return $request;
        //untuk script hapus
        // DB::table('jenis_program')->where('id',$request->id)->delete();
        return redirect()->route('prokomF1-index-jenis-program')->with('Jenis program dihapus');
    }

    public function simpan(Request $request){
        DB::insert('insert into jenis_program (
            jenis_program) values (?)', [
            $request->jenis_program]);
        return redirect()->route('prokomF1-index-jenis-program')->with('Jenis program ditambahkan');
    }

    

}
