<?php

namespace App\Http\Controllers\otentikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;



class OtentikasiController extends Controller
{
    public function index(){
        return view('otentikasi.login');
    }
    public function lihatuser(){
        $datauser = DB::table('users')->orderBy('name','ASC')->get();
        return view('otentikasi.index',['datauser'=>$datauser]);
    }
    public function login(request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $name = Auth::user()->name;
            $grup = Auth::user()->grup;
            $id_user = Auth::user()->id;
            session(['berhasil_login'=> true, 'namanya'=>$name, 'grupnya'=>$grup,'id_user'=>$id_user]);
            return redirect('/home');
        }
        return redirect('/login')->with('message',"Email atau Password salah!!!");
    }
    
    public function tambah(){
        $data_kode_wilayah = DB::table('kode_wilayah')->where('status','1')->orderBy('kode_wilayah','asc')->get();
        return view('otentikasi.tambah-user', [
            'data_kode_wilayah'=>$data_kode_wilayah,
        ]);
    }
    public function simpan(Request $request){
        //dd($request->all());
        $data_kode_wilayah = DB::table('kode_wilayah')->where('status','1')->orderBy('kode_wilayah','asc')->get();
        DB::table('users')->insert(
            array(
                'name' => $request->name,
                'email' => $request->email,
                'kode_wilayah'=> $request->kode_wilayah,
                'grup' => $request->grup,
                'creator' => $request->creator,
                'password' => bcrypt('12345678'),
                'remember_token' => $request->_token,
            )
        );
        return redirect()->route('lihat-user');
    }
    public function profile(){
        $id_user = session()->get('id_user');
        $get_user = $creator=DB::table('users')->where('id',$id_user)->get();
        return view('otentikasi.profile',['datauser'=> $get_user]);
    }
    public function profilesimpan(Request $request){ 
        if($request->password==""){
            DB::table('users')
              ->where('id', session()->get('id_user'))
              ->update(['name' => $request->name,
                      'email' => $request->email,
                    ]);
        }else{
        DB::table('users')
              ->where('id', session()->get('id_user'))
              ->update(['name' => $request->name,
                      'email' => $request->email,
                      'password' => bcrypt($request->password)
                    ]);
        }
        return redirect()->back();
    }
    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('/home');
    }
}
