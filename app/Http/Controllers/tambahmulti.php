<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class tambahmulti extends Controller
{
    public function simpan(Request $request){
        // dd($request->input('txtFullname'));
        $fullname = $request->txtFullname;
        $email = $request->txtEmail;
        $phone = $request->txtPhone;
        $alamat = $request->txtAddress;
        for($count = 0; $count < count($fullname); $count++)
        {
            $data = array(
                'fullname' => $fullname[$count],
                'email'  => $email[$count],
                'phone'  => $phone[$count],
                'alamat'  => $alamat[$count]
            );
            $insert_data[] = $data; 
        }
        
        DB::table('lampiran')->insert(
            array('lampiran' => $request->lampiran)
        );
        DB::table('tambah_multi')->insert($insert_data);
        return redirect()->back();
    }
}
