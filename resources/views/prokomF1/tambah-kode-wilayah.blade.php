@extends('layouts.master')
@section('title', 'Tambah Kode Wilayah')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Input Wilayah Untuk Prokom Sales & Commercial</h1>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">

                    <form action="{{ route('prokomF1-simpan-kode-wilayah') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Nama Wilayah </label>
                                        <input type="text" placeholder="Input Nama Wilayah" name="wilayah" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Kode/singkatan Wilayah</label>
                                        <input type="text" placeholder="Kode/singkatan wilayah" name="kode_wilayah" class="form-control">
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
@endsection

@push('page-script')

@endpush
