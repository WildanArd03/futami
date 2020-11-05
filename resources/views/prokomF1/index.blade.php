@extends('layouts.master')
@section('title', 'Sales & Commercial')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Home Sales & Commercial </h1>
        </div>
        <div class="section-body">
            <div class="table-responsive">
                <a href="{{ route('prokomF1-tambah') }}" class="btn btn-success">Tambah Data</a><br><br>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th width="50px">NO.</th>
                        <th style="text-align: center" colspan="2">No Proposal</th>
                        <th >L1. Cost Sheet</th>
                        <th>Kelengkapan Dokumen</th>
                    </tr>
                    @foreach ($data_prokomf1 ?? '' as $no => $datanya)
                        <tr>
                            <td> {{ $no + 1 }} </td>
                            <td style="text-align: center"><b>{{ $datanya->nomor_proposal }}</b></td>
                            <td>
                            <a href="{{ route('prokomF1-print', $datanya->id) }}" class="badge badge-info">Print</a>
                            <a href="{{ route('prokomF1-detail',$datanya->id) }}" class="badge badge-warning">Edit</a>
                            @if ($message = Session::get('grupnya') == '1')
                                <a href="{{ route('prokomF1-hapus', $datanya->id) }}"
                                    class="badge badge-danger">Hapus</a>
                                    
                            @endif
                            </td>
                            <td>
                                @if ($datanya->l1_cost_sheet=="") 
                                    <a href="{{route('prokomF1-tambah-chost-sheet')}}?no_proposal={{$datanya->nomor_proposal}}" class="badge badge-success">+</a> 
                                @else
                                <a href="{{ route('costsheet-detail',$datanya->id )}}?no_proposal={{$datanya->nomor_proposal}}" class="badge badge-info">edit</a> 
                                <a href="{{ route('costsheet-print',$datanya->id )}}?no_proposal={{$datanya->nomor_proposal}}" class="badge badge-info">print</a> 
                                @endif
                            </td>
                            <td>
                                @if ($datanya->kelengkapan_dokumen=="") 
                                <a href="{{route('kelengkapan-dokumen-tambah')}}?no_proposal={{$datanya->nomor_proposal}}" class="badge badge-success">+</a> 
                                @else
                                <a href="{{ route('kelengkapan-dokumen-detail',$datanya->id )}}?no_proposal={{$datanya->nomor_proposal}}" class="badge badge-info">edit</a> 
                                <a href="{{route('kelengkapan-dokumen-print',$datanya->kelengkapan_dokumen)}}" class="badge badge-info">print</a> 
                            @endif
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
