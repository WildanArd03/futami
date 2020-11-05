@extends('layouts.master')
@section('title', 'Profile User')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile User</h1>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">

                    <form action="{{ route('profile-user-simpan') }}" method="POST">
                        @csrf
                        @foreach ($datauser as $item)
                            
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input value="{{$item->name}}" type="text" placeholder="Input Nama Lengkap" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email Anda</label>
                                        <input value="{{$item->email}}" type="email" placeholder="Masukan Email Perusahaan" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Ganti Password</label>
                                        <input type="text" placeholder="Silahkan isi untuk mengganti password" name="password" class="form-control">
                                    </div>
                                </div>
                                
                                
                                
                                <div class="col-md-12">
                                    <div class="card-footer text-right">
                                        <button class="btn btn-info mr-1" type="submit">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @endforeach
                    </form>
                </div>
                
            </div>
        </div>
    </div>
@endsection

@push('page-script')

@endpush
