@extends('layouts.master')
@section('title', 'Tambah Kelengkapan Dokumen')

@section('content')
    <section class="section">
        <div class="section-header">
            <a href="{{ route('prokomF1-index')}}" class="btn btn-success mr-5">Kembali</a>
            <h1>Input Kelengkapan Dokumen Untuk Prokom Sales & Commercial</h1>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">

                    <form action="{{ route('kelengkapan-dokumen-simpan') }}" method="POST">
                        @csrf
                        <input type="hidden" name="creator" value="
                        @if ($message = Session::get('id_user'))
                        {{ $message }}
                        @endif">
                        <input type="hidden" name="no_proposal" value="
                        @php
                        echo $_GET['no_proposal'];
                        @endphp" >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Vendor Baru/Lama </label><br>
                                        <input type="radio" name="vendor" value="0" id="vendor" checked> Lama <br>
                                        <input type="radio" name="vendor" value="1" id="vendor"> Baru <br>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <u><b> Kelengkapan dokumen penagihan :</b></u><br><br>
                                    <div class="form-group">
                                        <label>1. Kwitansi / Invoice bermaterai atas nama PT Savoria Kreasi Rasa
                                        </label><br>
                                        <input type="radio" name="kwitansi" value="0" id="kwitansi" checked>Tidak  <br>
                                        <input type="radio" name="kwitansi" value="1" id="kwitansi"> Ya <br>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>2. Faktur Pajak atas nama PT Savoria Kreasi Rasa</label><br>
                                        <input type="radio" name="faktur" value="0" id="faktur"  checked> Tidak <br>
                                        <input type="radio" name="faktur" value="1" id="faktur"> Ya <br>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>3. Surat perjanjian kerjasama / Prokom</label><br>
                                        <input type="radio" name="surat_perjanjian" value="0" id="surat_perjanjian" checked>Tidak <br>
                                        <input type="radio" name="surat_perjanjian" value="1" id="surat_perjanjian">  Ya <br>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>4. Berita Acara Serah Terima (BAST)/Surat Jalan/Report /
                                            Dokumentasi</label><br>
                                        <input type="radio" name="bast" value="0" id="bast"  checked>  Tidak<br>
                                        <input type="radio" name="bast" value="1" id="bast"> Ya <br>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>5. Faktur Penjualan</label><br>
                                        <input type="radio" name="faktur_penjualan" value="0" id="faktur_penjualan"  checked> Tidak <br>
                                        <input type="radio" name="faktur_penjualan" value="1" id="faktur_penjualan"> Ya <br>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>6. Copy PO</label><br>
                                        <input type="radio" name="copy_po" value="0" id="copy_po" checked> Tidak <br>
                                        <input type="radio" name="copy_po" value="1" id="copy_po"> Ya <br>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>7. Quotation dengan rincian biaya</label><br>
                                        <input type="radio" name="quotation" value="0" id="quotation" checked>Tidak  <br>
                                        <input type="radio" name="quotation" value="1" id="quotation"> Ya <br>
                                    </div>
                                </div>

                                
                                <div class="col-md-12" id="biayanya">
                                    <label>8. Lampiran</label><br>
                                    <u><b>Deskripsi Lampiran: </b></u><br>                                        
                                    <input type="button" name="add" id="add" value="+"  class="btn btn-success mt-2 mb-2">
                                    <input type="button" id="hapus" value="-" name="hapus" class="btn btn-danger mt-2 mb-2">
                                    <div class="form-group" id="lampirannya">
                                        Lampiran 1 
                                        <textarea name="lampiran[]" class="form-control" style="height: 100px"></textarea><br>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                                    </div>
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
<script type="text/javascript">
    $(document).ready(function() {
        var max = 8;
        var x = 2;
        

        $("#add").click(function() {
            if (x <= max) {
                var html = '<div class="form-group" id="remove">lampiran' + x + '<textarea name="lampiran[]" class="form-control" style="height: 100px"></textarea><br></div>'
                $("#lampirannya").append(html);
                x++;
            }else{
                alert("dah maximal gan");
            }
        });

        $("#hapus").click(function() {
            $('#remove').remove();
            if ( x == 2) {
                alert("Tidak bisa hapus lagi")
                x++;
            }
            x--;
        });

    });

</script>
@endpush
