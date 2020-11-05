<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class prokomMetodeKlaimController extends Controller
{
    public function index(){
        $data_metode = DB::table('metode_klaim')->where('status','1')->get();
        return view('prokomF1.index-metode-klaim',['data_metode' => $data_metode]);
    }

     public function tambah(){
        return view('prokomF1.tambah-metode-klaim');
    }

    public function simpan(Request $request){
        $status = '1';
        DB::insert('insert into metode_klaim (
            metode_klaim,
            status) values (?,?)', [
            $request->metode_klaim,
            $status
            ]);
        return redirect()->route('prokomF1-index-metode-klaim')->with('Metode Klaim ditambahkan');
    }

    public function detail(Request $request, $id)
    {
        $data_metode = DB::table('metode_klaim')->where('status','1')->orderBy('metode_klaim','asc')->get();
        return view('prokomF1-edit-metode-klaim',['data_metode'=>$data_metode]);
    }

    public function edit($id)
    {
        $data_metode = DB::table('metode_klaim')->where('status','1')->orderBy('metode_klaim','asc')->get();
        $parameter_uji = DB::table('metode_klaim')->where('id',$id)->orderBy('metode_klaim','ASC')->get();
        return view('prokomF1\edit-metode-klaim',['data_metode'=>$data_metode,'parameter_uji' => $parameter_uji]);
    }

    public function update(Request $request,  $id)
    {
        $status = '1';
        DB::table('metode_klaim')
              ->where('id', $id)
              ->update(['metode_klaim'=>$request->metode_klaim, 'status'=>$status]);

        return redirect()->route('prokomF1-index-metode-klaim')
                        ->with('success','Data berhasil di update');
    }

    public function hapus(Request $request){
        DB::table('metode_klaim')
                ->where('id', $request->id)
                ->update(['status' => 0]);
        return redirect()->back();
    }
}
