<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class prokomKetentuanKlaimController extends Controller
{
    public function index(){
        $jenis_program = DB::table('jenis_program')->orderBy('jenis_program','ASC')->get();
        $ketentuan_klaim = DB::table('ketentuan_klaim')->orderBy('jenis_program','ASC')->get();
        return view('prokomF1.ketentuanklaim.index',['ketentuan_klaim' => $ketentuan_klaim,'jenis_program' => $jenis_program]);
        
    }
    public function create(){
        $data_jenis_program = DB::table('jenis_program')->where('status','1')->orderBy('jenis_program','asc')->get();

        return view('prokomF1.ketentuanklaim.tambah',['data_jenis_program'=>$data_jenis_program,]);
       
   }
   public function store(Request $request){
    $name = $request->name;
    for($count = 0; $count < count($name); $count++){
        $data = array(
            'name' => $name[$count],
            'jenis_program' => $request->jenis_program,
        );
        $insert_data[] = $data; 
    }
    DB::table('ketentuan_klaim')->insert($insert_data);

    
    return Redirect()->route('ketentuanklaim.index') -> with('success','berhasil menambah data');
    }

    public function update(Request $request,  $id)
    {
        DB::table('ketentuan_klaim')
              ->where('id', $id)
              ->update(['name' => $request->name,'jenis_program'=>$request->jenis_program]);

        return redirect()->route('ketentuanklaim.index')
                        ->with('success','Data berhasil di update');
    }

    public function edit($id)
    {
        $data_jenis_program = DB::table('jenis_program')->where('status','1')->orderBy('jenis_program','asc')->get();
        $parameter_uji = DB::table('ketentuan_klaim')->where('id',$id)->orderBy('name','ASC')->get();
        return view('prokomF1.ketentuanklaim.edit',['data_jenis_program'=>$data_jenis_program,'parameter_uji' => $parameter_uji]);
    }

    public function destroy($id)

    {
        // dd($id);
        
        DB::table('ketentuan_klaim')->where('id','=', $id)->delete();
        
        return redirect()->route('ketentuanklaim.index') -> with('deleted','berhasil menghapus');
    }

}
