@extends('layouts.master')
@section('title','CRUD')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>Home CRUD </h1>
    </div>

    <div class="section-body">
      <div class="title m-b-md">
      <a href="{{ route('crud-tambah') }}" class="btn btn-info">Tambah Data</a>
      <table class="table table-striped table-bordered">
        <tr>
          <th>NO.</th>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
        </tr>
        @foreach ($data_barang as $no => $data_barang)
        <tr>
          <td> {{$no+1}} </td>
          <td>{{$data_barang -> kode_barang}}</td>
          <td>{{$data_barang -> nama_barang}}</td>
          
        </tr>
        @endforeach
      </table>
    </div>
    </div>
  </section>
@endsection 

@push('page-script')
    
@endpush
    

