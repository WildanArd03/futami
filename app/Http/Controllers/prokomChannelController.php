<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class prokomChannelController extends Controller
{
    public function index(){
        $data_channel = DB::table('channel_program')->where('status','1')->get();
        return view('prokomF1.index-channel-program',['data_channel' => $data_channel]);
    }

     public function tambah(){

        return view('prokomF1.tambah-channel-program');
    }
     public function hapus(){

        return redirect()->route('prokomF1-index-channel-program');
    }

    public function simpan(Request $request){
        $status = '1';
        DB::insert('insert into channel_program (
            channel_program,
            kode_channel,
            status,
            keterangan) values (?,?,?,?)', [
            $request->channel_program,
            $request->kode_channel,
            $status,
            $request->keterangan
            ]);
        return redirect()->route('prokomF1-index-channel-program')->with('Channel program ditambahkan');
    }
}
