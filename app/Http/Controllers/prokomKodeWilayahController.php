<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class prokomKodeWilayahController extends Controller
{
    public function index(){
        $data_wilayah = DB::table('kode_wilayah')->where('status','1')->get();
        return view('prokomF1.index-kode-wilayah',['data_wilayah' => $data_wilayah]);
    }

     public function tambah(){

        return view('prokomF1.tambah-kode-wilayah');
    }
    
    public function hapus(Request $request){
        DB::table('kode_wilayah')
                ->where('id', $request->id)
                ->update(['status' => 0]);
        return redirect()->back();
    }

    public function simpan(Request $request){
        $status = '1';
        DB::insert('insert into kode_wilayah (
            wilayah,
            kode_wilayah,
            status) values (?,?,?)', [
            $request->wilayah,
            $request->kode_wilayah,
            $status
            ]);
        return redirect()->route('prokomF1-index-kode-wilayah')->with('Kode wilayah ditambahkan');
    }

    public function detail(Request $request, $id)
    {
        $data_kode_wilayah = DB::table('kode_wilayah')->where('status','1')->orderBy('kode_wilayah','asc')->get();
        return view('prokomF1-edit-kode-wilayah',['data_kode_wilayah'=>$data_kode_wilayah]);
    }

    public function update(Request $request,  $id)
    {
        $status = '1';
        DB::table('kode_wilayah')
              ->where('id', $id)
              ->update(['wilayah'=>$request->wilayah, 'kode_wilayah' => $request->kode_wilayah, 'status'=>$status]);

        return redirect()->route('prokomF1-index-kode-wilayah')
                        ->with('success','Data berhasil di update');
    }

    public function edit($id)
    {
        $data_kode_wilayah = DB::table('kode_wilayah')->where('status','1')->orderBy('kode_wilayah','asc')->get();
        $parameter_uji = DB::table('kode_wilayah')->where('id',$id)->orderBy('wilayah','ASC')->get();
        return view('prokomF1\edit-kode-wilayah',['data_kode_wilayah'=>$data_kode_wilayah,'parameter_uji' => $parameter_uji]);
    }

}
