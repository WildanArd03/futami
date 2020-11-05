@extends('layouts.master')
@section('title', 'Sales & Commercial')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Daftar user </h1>
        </div>
        <div class="section-body">
            <div class="table-responsive">
                {{-- <a href="{{ route('prokomF1-tambah') }}" class="btn btn-success">Tambah Data</a><br><br> --}}
                <table class="table table-bordered table-striped">
                    <tr>
                        <th width="50px">NO.</th>
                        <th >Nama</th>
                        <th >Email</th>
                        <th >Action</th>
                    </tr>
                    @foreach ($datauser  as $no => $datanya)
                        <tr>
                            <td> {{ $no + 1 }} </td>
                            <td>{{$datanya->name}} </td>
                            <td>{{$datanya->email}}</td>
                            <td>
                                <a class="btn btn-primary" href="#">edit</a>
                                <a class="btn btn-danger" href="#">hapus </a>
                                <a class="btn btn-warning" href="#">reset password </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection

@push('page-script')

@endpush
