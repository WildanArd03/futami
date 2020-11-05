@extends('layouts.master')
@section('title', 'Detail data')

@section('content')
@foreach ($data_prokomf1 as $no => $datanya)
    <section class="section">
        
        <div class="section-header">
            <a href="{{ route('prokomF1-print', $datanya->id) }}" class="badge badge-info text-right mt-2 mr-2">Print</a> <h1>   Detail Data Prokom </h1>
           
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form action="{{ route('prokomF1-update', $datanya->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="disiapkan_oleh" value="@if ($message = Session::get('id_user'))
                        {{ $message }}
                        @endif">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tanggal Diajukan : </label>
                                            <label>{{ \Carbon\Carbon::parse($datanya->tanggal_diajukan)->locale('id')->isoFormat('DD MMMM Y') }} </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Revisi yang ke : </label>
                                            <input  name="revisi_ke" class="form-control"  value="{{ $datanya->revisi_ke}}" readonly> 
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>* Kepada Yth:</label>
                                            <input type="text" name="kepada_yth" class="form-control" value="{{ $datanya->kepada_yth }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>* Diketahui CC:</label>
                                            <input type="text" name="di_ketahui" class="form-control" value="{{ $datanya->di_ketahui }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>* Nomor Proposal</label>
                                            <input type="text" name="nomor_proposal" class="form-control" value="{{ $datanya->nomor_proposal }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>* Jenis Program</label>
                                            <select class="form-control" name="jenis_program" id="jenis_program">
                                                @foreach ($data_jenis_program->where('id', $datanya->jenis_program) as $item)
                                                <option value="{{$item->id}}">{{ $item->jenis_program }}</option>
                                                @endforeach
                                                <option value="">---Silahkan pilih jika ingin mengganti jenis program---</option>
                                                @foreach ($data_jenis_program as $item)
                                                <option value="{{$item->id}}">{{ $item->jenis_program }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>* Nama Program</label>
                                            <input type="text" name="nama_program" class="form-control" value="{{ $datanya->nama_program }}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>* Brand / Item</label>
                                            <input type="text" name="brand_item" class="form-control" value="{{ $datanya->brand_item }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Kode RKB</label>
                                        <input type="text" name="kode_rkb" class="form-control" value="{{ $datanya->kode_rkb }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>No PR</label>
                                        <input type="text" placeholder="Jangan Diisi Jika Tidak Ada PR" name="no_pr" class="form-control" value="{{ $datanya->no_pr }}">
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-12">
                                    <label>* Periode Program</label>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Start Program</label>
                                        <input type="date" id="periode_program_start" name="periode_program_start"
                                        class="form-control" value="{{ \Carbon\Carbon::parse($datanya->periode_program_start)->locale('id')->isoFormat('YYYY-MM-D') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Selesai Program</label>
                                        <input type="date" id="periode_program_end" name="periode_program_end"
                                        class="form-control" value="{{ \Carbon\Carbon::parse($datanya->periode_program_end)->locale('id')->isoFormat('YYYY-MM-D') }}">
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Area Program</label>
                                        <input type="text" name="area_program" class="form-control" value="{{ $datanya->area_program }}">
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Region Program</label>
                                        <input type="text" name="region_program" class="form-control" value="{{ $datanya->region_program}}">
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Channel Program</label>
                                        <select class="form-control" name="channel_program" id="channel_program">
                                            @foreach ($data_channel_program->where('id', $datanya->channel_program) as $item)
                                            <option value="{{$item->id}}">{{ $item->channel_program }}</option>
                                            @endforeach
                                            <option value="">---Silahkan pilih jika ingin mengganti channel program---</option>
                                            @foreach ($data_channel_program as $item)
                                            <option value="{{$item->id}}">{{ $item->channel_program }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Background / Informasi</label>
                                        <textarea class="form-control" name="background_informasi"  style="height: 100px">{{ $datanya->background_informasi}}</textarea>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Mekanisme Program</label>
                                        <textarea class="form-control" name="mekanisme_program" style="height: 100px">{{ $datanya->mekanisme_program}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Ketentuan & Catatan khusus</label>
                                        <textarea class="form-control" name="ketentuan_catatan" style="height: 100px">{{ $datanya->ketentuan_catatan}}</textarea>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> PIC Brand / Commercial</label>
                                        <input class="form-control" name="pic_brand_commercial" value="{{ $datanya->pic_brand_commercial}}">
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>PIC Sales & Distribution</label>
                                        <input class="form-control" name="pic_sales_distribution"value="{{ $datanya->pic_sales_distribution}}" >
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>PIC Finance & Accounting</label>
                                        <input class="form-control" name="pic_finance_accounting"value="{{ $datanya->pic_finance_accounting}}" >
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Klaim Tagihan Ke</label>
                                        <select class="form-control" name="klaim_tagihan_ke" id="klaim_tagihan_ke">
                                            @foreach ($klaim->where('id', $datanya->klaim_tagihan_ke) as $item)
                                            <option value="{{$item->id}}">{{ $item->klaim_tagihan_ke }}</option>
                                            @endforeach
                                            <option value="">---Silahkan pilih jika ingin mengganti klaim tagihan ---</option>
                                            @foreach ($klaim as $item)
                                            <option value="{{$item->id}}">{{ $item->klaim_tagihan_ke }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Metode Klaim</label>
                                        <select class="form-control" name="metode_klaim" id="metode_klaim">
                                            <option value="{{$datanya->metode_klaim}}">{{ $datanya->metode_klaim }}</option>
                                            <option value="">---Silahkan pilih jika ingin mengganti klaim tagihan ---</option>
                                            <option>Potong Faktur Penjualan</option>
                                            <option>Rafraksi Toko</option>
                                            <option>Free Good</option>
                                            <option>Invoice/Tagihan</option>
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
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tanggal Batas Klaim</label>
                                        <input type="date" name="batas_akhir_klaim" id="batas_akhir_klaim"
                                        class="form-control"value="{{ \Carbon\Carbon::parse($datanya->batas_akhir_klaim)->locale('id')->isoFormat('YYYY-MM-D') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Ketentuan Tambahan Operasional :</label>
                                        <input class="form-control" value="{{ $datanya->ketentuan_tambahan_operasional}}" name="ketentuan_tambahan_operasional" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>L1. Cost </label>
                                    
                                        @if ($datanya->l1_cost_sheet=="")
                                        <input class="form-control" value="Belum Membuat L1 Cost Sheet" disabled>
                                        @else
                                            <input class="form-control"  value="{{$datanya->l1_cost_sheet}}" name="l1_cost_sheet" readonly >
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>L2. Kelengkapan Dokumen </label>
                                    
                                        @if ($datanya->l1_cost_sheet=="")
                                        <input class="form-control" value="Belum Membuat L2 Kelengkapan " disabled>
                                        @else
                                            <input class="form-control" value="{{$datanya->kelengkapan_dokumen}}"  name="kelengkapan_dokumen" readonly>
                                        @endif
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-12">
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                  </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    @endforeach
    @endsection
    
    @push('page-script')
    
    @endpush
    