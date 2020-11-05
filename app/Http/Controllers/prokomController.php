<?php

namespace App\Http\Controllers;
set_time_limit(0);
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
use PDF;

class prokomController extends Controller

{
    public function index(){
        $data_prokomf1 = DB::table('prokomf1')->where('status','1')->where('disiapkan_oleh', Session::get('id_user'))->orderBy('id','asc')->get();
        $cost_sheet = DB::table('cost_sheet')->get();
        $kelengkapan_dokumen = DB::table('kelengkapan_dokumen')->get();

        return view('prokomF1.index',['data_prokomf1' => $data_prokomf1,
            'kelengkapan_dokumen'=>$kelengkapan_dokumen,
            'cost_sheet'=>$cost_sheet]);
        
    }

    public function detail(Request $request){
        $data_jenis_program = DB::table('jenis_program')
            ->where('status','1')
            ->orderBy('jenis_program','asc')
            ->get();
        $data_channel_program = DB::table('channel_program')
            ->where('status','1')
            ->orderBy('channel_program','asc')
            ->get();
        $data_prokomf1 = DB::table('prokomf1')
            ->where('id',$request->id)
            ->get();
        $no_proposal=$data_prokomf1[0]->nomor_proposal;
        $creator=DB::table('users')
            ->get();
        $data_metode = DB::table('metode_klaim')
            ->where('status','1')
            ->orderBy('metode_klaim','asc')
            ->get();
        $klaim=DB::table('klaim_tagihan_ke')
            ->get();
        return view('prokomF1.detail',['data_prokomf1' => $data_prokomf1,
        'data_jenis_program'=>$data_jenis_program,
        'data_channel_program'=>$data_channel_program,
        'creator'=>$creator,
        'data_metode'=>$data_metode,
        'klaim'=>$klaim]);
    }

    public function print(Request $request){
        $data_jenis_program = DB::table('jenis_program')
            ->where('status','1')
            ->orderBy('jenis_program','asc')
            ->get();
        $data_channel_program = DB::table('channel_program')
            ->where('status','1')
            ->orderBy('channel_program','asc')
            ->get();
        $data_prokomf1 = DB::table('prokomf1')
            ->where('id',$request->id)
            ->get();
        $no_proposal=$data_prokomf1[0]->nomor_proposal;
        $creator=DB::table('users')
            ->get();
        $klaim=DB::table('klaim_tagihan_ke')
            ->get();
        $ketentuan_klaim=DB::table('ketentuan_klaim')
            // ->where('jenis_program'->$data_prokomf1[0]->jenis_program)
            ->get();

        // $pdf = PDF::loadview('prokomF1.formProkom.printProkom',['pegawai'=>$data_prokomf1]);
        // return $pdf->download('laporan-pegawai-pdf.pdf');

        //Download as pdf
        // $pdf = \PDF::setOptions(['isRemoteEnabled' => true])
            $pdf = PDF::loadView('prokomF1.formProkom.printProkom', [
                'data_prokomf1' => $data_prokomf1,
                'data_jenis_program'=>$data_jenis_program,
                'data_channel_program'=>$data_channel_program,
                'creator'=>$creator,
                'klaim'=>$klaim,
                'ketentuan_klaim'=>$ketentuan_klaim,
            ])
            ->setPaper('a4', 'potrait');
        // return view('prokomF1.formProkom.printProkom', [
        //     'data_prokomf1' => $data_prokomf1,
        //     'data_jenis_program'=>$data_jenis_program,
        //     'data_channel_program'=>$data_channel_program,
        //     'creator'=>$creator,
        //     'klaim'=>$klaim,
        // ]);
        //stream pdf file name as nomor proposal
        return $pdf->stream($no_proposal.".pdf");
        // return $pdf->download('prokomF1-pdf');
    }
    
    
    public function tambah(Request $request){
        $cc = $request->input('di_ketahui');
        //$reg = DB::table('users')->where('id',$request->disiapkan_oleh)->get()[0]->kode_wilayah;
        //$get_kode = DB::table('kode_wilayah')->where('id',$reg)->get()[0]->kode_wilayah;
        $reg = session()->get('kode_wilayah');
        $get_kode = DB::table('users')->where('id',$reg)->get();
        $collections = DB::table('prokomf1')->max('id')+1;
        //$angka = '4521';
        $no_sample = $get_kode."/".$cc."/".sprintf("%04s", $collections);
        //dd($get_kode);


        $data_kode_wilayah = DB::table('kode_wilayah')->where('status','1')->orderBy('kode_wilayah','asc')->get();
        $data_jenis_program = DB::table('jenis_program')->where('status','1')->orderBy('jenis_program','asc')->get();
        $data_channel_program = DB::table('channel_program')->where('status','1')->orderBy('channel_program','asc')->get();
        $data_metode = DB::table('metode_klaim')->where('status','1')->orderBy('metode_klaim','asc')->get();
        $klaim = DB::table('klaim_tagihan_ke')->get();
            return view('prokomF1.tambah',[
            'data_kode_wilayah'=>$data_kode_wilayah,   
            'data_jenis_program'=>$data_jenis_program,
            'data_channel_program'=>$data_channel_program,
            'data_metode'=>$data_metode,
            'klaim_tagihan_ke'=>$klaim,
            ],compact('no_sample'));
        
    }

    public function update(Request $request){
        // dd($request->all());
        
        $revisi = $request->revisi_ke + 1;
        // dd($revisi);
        
    
    
    $kiweri=DB::table('prokomf1')
    ->insert(array(
        'kepada_yth'=> $request->kepada_yth, 
        'nomor_proposal'=>$request->nomor_proposal, 
        'kode_rkb'=>$request->kode_rkb, 
        'nama_program'=>$request->nama_program, 
        'di_ketahui'=>$request->di_ketahui, 
        'brand_item'=>$request->brand_item, 
        'area_program'=>$request->area_program, 
        'region_program'=>$request->region_program, 
        'revisi_ke'=> $revisi,    
        'channel_program'=>$request->channel_program, 
        'background_informasi'=>$request->background_informasi, 
            'ketentuan_catatan'=>$request->ketentuan_catatan, 
            'pic_brand_commercial'=>$request->pic_brand_commercial, 
            'pic_sales_distribution'=>$request->pic_sales_distribution, 
            'pic_finance_accounting'=>$request->pic_finance_accounting,  
            'mekanisme_program'=>$request->mekanisme_program, 
            'no_pr'=>$request->no_pr, 
            'klaim_tagihan_ke'=>$request->klaim_tagihan_ke, 
            'metode_klaim'=>$request->metode_klaim, 
            'faktur_pajak'=>$request->faktur_pajak,  
            'disiapkan_oleh'=>$request->disiapkan_oleh, 
            'batas_akhir_klaim'=>$request->batas_akhir_klaim, 
            'periode_program_start'=>$request->periode_program_start, 
            'periode_program_end'=>$request->periode_program_end,
            'jenis_program'=>$request->jenis_program,
            'status'=>'1', 
            'ketentuan_tambahan_operasional'=>$request->ketentuan_tambahan_operasional,
            'l1_cost_sheet'=>$request->l1_cost_sheet,
            'kelengkapan_dokumen'=>$request->kelengkapan_dokumen,

        ));
        if($kiweri==true){
            DB::table('prokomf1')
            ->where('id', $request->id)
            ->update(['status' => 0]);
        return redirect()->route('prokomF1-index');        
        }else
        echo"gagal";
        }
            
        public function hapus(Request $request){
        DB::table('prokomf1')
                ->where('id', $request->id)
                ->update(['status' => 0]);
        return redirect()->back();
        }

    public function simpan(Request $request){

        $cc = $request->input('di_ketahui');
        $reg = DB::table('users')->where('id',$request->disiapkan_oleh)->get()[0]->kode_wilayah;
        $get_kode = DB::table('kode_wilayah')->where('id',$reg)->get()[0]->kode_wilayah;
        //$reg = session()->get('kode_wilayah');
        //$get_kode = DB::table('users')->where('id',$reg)->get();
        $collections = DB::table('prokomf1')->max('id')+1;
        //$angka = '4521';
        $no_sample = $get_kode."/".$cc."/".sprintf("%04s", $collections);
        //dd($no_sample);

        $revisi_ke = '0';
        $status = '1';

        // return $request;
        DB::insert('insert into prokomf1 (
            kepada_yth, 
            nomor_proposal, 
            kode_rkb, 
            nama_program, 
            di_ketahui, 
            brand_item, 
            area_program, 
            region_program, 
            revisi_ke, 
            channel_program, 
            background_informasi, 
            ketentuan_catatan, 
            pic_brand_commercial, 
            pic_sales_distribution, 
            pic_finance_accounting,  
            mekanisme_program, 
            no_pr, 
            klaim_tagihan_ke, 
            metode_klaim, 
            faktur_pajak,  
            disiapkan_oleh, 
            batas_akhir_klaim, 
            periode_program_start, 
            periode_program_end,
            jenis_program,
            status, 
            ketentuan_tambahan_operasional
        )

         values (
             ?,?,?,?,?,
             ?,?,?,?,?,
             ?,?,?,?,?,
             ?,?,?,?,?,
             ?,?,?,?,?,
             ?,?)',

         [$request->kepada_yth, 
         $no_sample, 
         $request->kode_rkb, 
         $request->nama_program, 
         $request->di_ketahui, 
         $request->brand_item, 
         $request->area_program, 
         $request->region_program, 
         $revisi_ke, 
         $request->channel_program, 
         $request->background_informasi, 
         $request->ketentuan_catatan, 
         $request->pic_brand_commercial, 
         $request->pic_sales_distribution, 
         $request->pic_finance_accounting,  
         $request->mekanisme_program, 
         $request->no_pr, 
         $request->klaim_tagihan_ke, 
         $request->metode_klaim, 
         $request->faktur_pajak,  
         $request->disiapkan_oleh, 
         $request->batas_akhir_klaim, 
         $request->periode_program_start, 
         $request->periode_program_end,
         $request->jenis_program,
         $status,
         $request->ketentuan_tambahan_operasional
         ]);
        // dd($request->all());
        return redirect()->route('prokomF1-index');
    }
}
