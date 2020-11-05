@extends('layouts.master')
@section('title', 'Tambah User')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Input User</h1>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">

                    <form action="{{ route('tambah-user-simpan') }}" method="POST">
                        @csrf
                        <input type="hidden" name="creator" value="@if ($message = Session::get('id_user'))
                        {{ $message }}
                        @endif">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Nama Lengkap</label>
                                        <input type="text" placeholder="Input Nama Lengkap" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Email</label>
                                        <input type="email" placeholder="Masukan Email Perusahaan" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Kode Wilayah</label>
                                        <select class="form-control" name="kode_wilayah" id="kode_wilayah">
                                           
                                            <option value=""></option> 
                                            @foreach ($data_kode_wilayah as $item)
                                                <option value="{{ $item->id }}"> {{ $item->kode_wilayah}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* level User</label>
                                        <select class="form-control" name="grup" id="grup">
                                            <option value=""></option> 
                                            <option value="1">User</option> 
                                            <option value="2">Admin</option> 
                                        </select><br>
                                        <label><i>password default : 12345678</i></label>
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
