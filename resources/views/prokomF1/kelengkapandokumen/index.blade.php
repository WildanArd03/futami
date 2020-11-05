@extends('layouts.master')
@section('title', 'Kelengkapan Dokumen')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Daftar L2. Kelengkapan Dokumen</h1>
        </div>
        <div class="section-body">
            <div class="title m-b-md">
                {{-- <a href="{{ route('kelengkapan-dokumen-tambah') }}" class="btn btn-info" >Tambah Data</a> --}}
                <table class="table table-striped table-bordered table-sm" >
                    <tr>
                        <th width="50px">NO.</th>
                        <th>Kelengkapan Dokumen</th>
                        <th>Lampiran</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($kd as $no => $item)
                    
                    <tr>
                    <td> {{$no+1}} </td>
                        <td>{{$item->vendor}}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection

@push('page-script')

@endpush
