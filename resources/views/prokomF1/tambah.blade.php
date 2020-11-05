@extends('layouts.master')
@section('title', 'Tambah data')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data Prokom </h1>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">

                    <form action="{{ route('prokomF1-simpan') }}" method="POST">
                        @csrf
                        <input type="hidden" name="disiapkan_oleh" value="@if ($message = Session::get('id_user'))
                        {{ $message }}
                        @endif">
                        <input type="hidden" name="status" value="1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tanggal Diajukan : </label>
                                        <label>{{ date('d F Y') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Kepada Yth:</label>
                                        <input type="text" name="kepada_yth" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Diketahui CC:</label>
                                        <input type="text" name="di_ketahui" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Nomor Proposal</label>
                                        <input type="text" id="myText" name="nomor_proposal" value="{{ $no_sample }}"  class="form-control" required readonly="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Jenis Program</label><br>
                                        <select class="form-control" name="jenis_program" id="jenis_program">
                                            <option value=""></option> 
                                            @foreach ($data_jenis_program as $item)
                                            <option value="{{ $item->id }}"> {{ $item->jenis_program }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Nama Program</label>
                                        <input type="text" name="nama_program" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Brand / Item</label>
                                        <input type="text" name="brand_item" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Kode RKB</label>
                                        <input type="text" name="kode_rkb" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>No PR</label>
                                        <input type="text" placeholder="Jangan Diisi Jika Tidak Ada PR" name="no_pr"
                                            class="form-control">
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <label>* Periode Program</label>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Start Program</label>
                                        <input type="date" id="periode_program_start" name="periode_program_start"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Selesai Program</label>
                                        <input type="date" id="periode_program_end" name="periode_program_end"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Area Program</label>
                                        <input type="text" id="area_program" name="area_program" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Region Program</label>
                                        <input type="text" id="region_program" name="region_program" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Channel Program</label>
                                        <select class="form-control" name="channel_program" id="channel_program">
                                           
                                            <option value=""></option> 
                                            @foreach ($data_channel_program as $item)
                                                <option value="{{ $item->id }}"> {{ $item->kode_channel}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Background / Informasi</label>
                                        <textarea class="form-control" name="background_informasi"
                                            style="height: 100px"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Mekanisme Program</label>
                                        <textarea class="form-control" name="mekanisme_program"
                                            style="height: 100px"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Ketentuan & Catatan khusus</label>
                                        <textarea class="form-control" name="ketentuan_catatan"
                                            style="height: 100px"></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> PIC Brand / Commercial</label>
                                        <input class="form-control" name="pic_brand_commercial">
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>PIC Sales & Distribution</label>
                                        <input class="form-control" name="pic_sales_distribution">
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>PIC Finance & Accounting</label>
                                        <input class="form-control" name="pic_finance_accounting">
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Klaim Tagihan Ke</label>
                                        <select class="form-control" name="klaim_tagihan_ke" id="klaim_tagihan_ke">
                                            <option value=""></option> 
                                            @foreach ($klaim_tagihan_ke as $item)
                                            <option value="{{ $item->id }}"> {{ $item->klaim_tagihan_ke }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Metode Klaim</label>
                                        <select class="form-control" name="metode_klaim" id="metode_klaim">
                                            <option value=""></option> 
                                            @foreach ($data_metode as $item)
                                            <option value="{{ $item->metode_klaim }}"> {{ $item->metode_klaim }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Faktur Pajak</label>
                                        <select class="form-control" name="faktur_pajak" id="metode_klaim">
                                            <option>Faktur PPN (PKP)</option>
                                            <option>Faktur NON PKP</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Tanggal Batas Klaim</label>
                                        <input type="date" name="batas_akhir_klaim" id="batas_akhir_klaim" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Ketentuan & Catatan khusus</label>
                                        <textarea class="form-control" name="ketentuan_catatan"
                                            style="height: 100px"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group text-right mb-5">
                                    {{-- <input type="button" onclick="myFunction()" class="btn btn-success" value="L1. Cost Sheet"> --}}
                                    {{-- <a href=" {{route ('prokomF1-tambah-chost-sheet')}}?noproposal" class="btn btn-success">L1. Cost Sheet </a> --}}
                                    {{-- <a href=" {{route('kelengkapan-dokumen-tambah')}} " class="btn btn-success">L2. Kelengkapan Dokumen </a> --}}
                                    <button class="btn btn-info" type="submit">Submit</button>
                                </div>
                                
                                
                            </div>
                        </div>
                        
                    </form>
                </div>
                
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')


<script>
    function myFunction() {
        var x = document.getElementById("myText").value;
        location.replace("{{route ('prokomF1-tambah-chost-sheet')}}?no_proposal="+x);
    }
    </script>
@endpush
