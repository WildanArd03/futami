@extends('layouts.master')
@section('title','Tambah data')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>CRUD Tambah Data </h1>
    </div>
  </section>
  <div class="section-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>HTML5 Form Basic</h4>
          </div>
        <form action="{{ route('crud-simpan')}}" method="POST">
            @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Kode Barang</label>
                  <input type="text" name="kode_barang" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Kode Barang</label>
                  <input type="text" name="nama_barang" class="form-control">
                </div>
              </div>
            </div>
             <div class="card-footer text-right">
            <button class="btn btn-primary mr-1" type="submit">Submit</button>
            <button class="btn btn-secondary" type="reset">Reset</button>
          </div>
        </form>
        </div>

      </div>
    </div>
  </div>
@endsection 

@push('page-script')
    
@endpush
    

