<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class kelengkapandokumenController extends Controller
{
    public function tambah(){
        return view('prokomF1.kelengkapandokumen.tambah');
    }
    public function detail(Request $request,$id){
    
        $kelengkapan_dokumen = DB::table('kelengkapan_dokumen')->where('no_proposal',$request->no_proposal)->get();
        $lampiran = DB::table('lampiran')->where('no_proposal',$request->no_proposal)->get();
        return view('prokomF1.kelengkapandokumen.detail',[
        'kelengkapan_dokumen' => $kelengkapan_dokumen,
        'lampiran' => $lampiran,
            ]);
    }
    public function update(Request $request,$id){
        $lampiran = $request->lampiran;
        $kwitansi = $request->kwitansi;
        $faktur = $request->faktur;
        $surat_perjanjian = $request->surat_perjanjian;
        $bast = $request->bast;
        $faktur_penjualan = $request->faktur_penjualan;
        $copy_po = $request->copy_po;
        $quotation = $request->quotation;
        $form_vendor = $request->form_vendor;
        $npwp = $request->npwp;
        $sppkp = $request->sppkp;
        $surat_pernyataan_non_pkp = $request->surat_pernyataan_non_pkp;
        $surat_kepemilikan_rekening_bermaterai = $request->surat_kepemilikan_rekening_bermaterai;
        $surat_pernyataan_pemotongan_pph = $request->surat_pernyataan_pemotongan_pph;
        if($request->vendor=='1'){
            $form_vendor = '1';
            $npwp = '1';
            $sppkp = '1';
            $surat_pernyataan_non_pkp = '1';
            $surat_kepemilikan_rekening_bermaterai = '1';
            $surat_pernyataan_pemotongan_pph = '1';
        }else if ($request->vendor=='0'){
            $form_vendor = '0';
            $npwp = '0';
            $sppkp = '0';
            $surat_pernyataan_non_pkp = '0';
            $surat_kepemilikan_rekening_bermaterai = '0';
            $surat_pernyataan_pemotongan_pph = '0';
        }
        DB::table('kelengkapan_dokumen')
                  ->where('id', $id)
                  ->update([
                    'vendor' => $request->vendor,
                    'form_vendor' => $form_vendor,
                    'npwp' => $npwp,
                    'sppkp' => $sppkp,
                    'surat_pernyataan_non_pkp' => $surat_pernyataan_non_pkp,
                    'surat_kepemilikan_rekening_bermaterai' => $surat_kepemilikan_rekening_bermaterai,
                    'surat_pernyataan_pemotongan_pph' => $surat_pernyataan_pemotongan_pph,
                    'kwitansi' => $kwitansi,
                    'faktur' => $faktur,
                    'surat_perjanjian' => $surat_perjanjian,
                    'bast' => $bast,
                    'faktur_penjualan' => $faktur_penjualan,
                    'copy_po' => $copy_po,
                    'quotation' => $quotation,
                    'no_proposal' => $request->no_proposal
    
                ]);
        DB::table('lampiran')->where('no_proposal',$request->no_proposal)->delete();
                for($count = 0; $count < count($lampiran); $count++){
                    $data = array(
                    'lampiran' => $lampiran[$count],
                    'creator' => $request->creator,
                    'no_proposal'=> $request->no_proposal
                    );
                $insert_data[] = $data; 
                }
            DB::table('lampiran')->insert($insert_data);
    
    
        return redirect()->route('prokomF1-index');
    
        
        }


    public function index(){
        $kd=DB::table('kelengkapan_dokumen')->get();
        return view('prokomF1.kelengkapandokumen.index',['kd'=>$kd]);
        }

    public function print(Request $request,$id){
        $kelengkapan_dokumen = DB::table('kelengkapan_dokumen')->where('id',$request->id)->get();
        $lampiran = DB::table('lampiran')->get();
        //Download as pdf
        $pdf = \PDF::setOptions(['isRemoteEnabled' => true])
            ->loadView('prokomF1.kelengkapandokumen.printKelengkapandokumen', [
               'kelengkapan_dokumen' => $kelengkapan_dokumen,
               'lampiran' => $lampiran,
            ])
            ->setPaper('a4', 'potrait');
        return $pdf->stream($request->no_proposal);
    }


    public function simpan(Request $request){
        $lampiran = $request->lampiran;
        $kwitansi = $request->kwitansi;
        $faktur = $request->faktur;
        $surat_perjanjian = $request->surat_perjanjian;
        $bast = $request->bast;
        $faktur_penjualan = $request->faktur_penjualan;
        $copy_po = $request->copy_po;
        $quotation = $request->quotation;
        $form_vendor = $request->form_vendor;
        $npwp = $request->npwp;
        $sppkp = $request->sppkp;
        $surat_pernyataan_non_pkp = $request->surat_pernyataan_non_pkp;
        $surat_kepemilikan_rekening_bermaterai = $request->surat_kepemilikan_rekening_bermaterai;
        $surat_pernyataan_pemotongan_pph = $request->surat_pernyataan_pemotongan_pph;
        if($request->vendor=='1'){
            $form_vendor = '1';
            $npwp = '1';
            $sppkp = '1';
            $surat_pernyataan_non_pkp = '1';
            $surat_kepemilikan_rekening_bermaterai = '1';
            $surat_pernyataan_pemotongan_pph = '1';
        }else if ($request->vendor=='0'){
            $form_vendor = '0';
            $npwp = '0';
            $sppkp = '0';
            $surat_pernyataan_non_pkp = '0';
            $surat_kepemilikan_rekening_bermaterai = '0';
            $surat_pernyataan_pemotongan_pph = '0';
        }
        for($count = 0; $count < count($lampiran); $count++){
            $data = array(
                'lampiran' => $lampiran[$count],
                'creator' => $request->creator,
                'no_proposal'=> $request->no_proposal
            );
            $insert_data[] = $data; 
        }
        DB::table('lampiran')->insert($insert_data);
        DB::table('kelengkapan_dokumen')->insert(
            array(
                'vendor' => $request->vendor,
                'form_vendor' => $form_vendor,
                'npwp' => $npwp,
                'sppkp' => $sppkp,
                'surat_pernyataan_non_pkp' => $surat_pernyataan_non_pkp,
                'surat_kepemilikan_rekening_bermaterai' => $surat_kepemilikan_rekening_bermaterai,
                'surat_pernyataan_pemotongan_pph' => $surat_pernyataan_pemotongan_pph,
                'kwitansi' => $kwitansi,
                'faktur' => $faktur,
                'surat_perjanjian' => $surat_perjanjian,
                'bast' => $bast,
                'faktur_penjualan' => $faktur_penjualan,
                'copy_po' => $copy_po,
                'quotation' => $quotation,
                'no_proposal' => $request->no_proposal
                ));
         
         $id_kelengkapan_dokumen = DB::table('kelengkapan_dokumen')->where('no_proposal',$request->no_proposal)->first()->id;
       // dd($id_kelengkapan_dokumen);
        DB::table('prokomf1')
            ->where('nomor_proposal', $request->no_proposal)
            ->update([
                    'kelengkapan_dokumen' => $id_kelengkapan_dokumen
                ]);
        return redirect()->route('prokomF1-index');
        // return redirect()->back();
    }
    public function simpanlampiran(Request $request){
        
    }
}
