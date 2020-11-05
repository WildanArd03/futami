@extends('layouts.master')
@section('title', 'Ketentuan Klaim')

@section('content')
    <section class="section">
        <div class="section-header">
        
        <h1><a href="{{ route('ketentuanklaim.create') }}" class="btn btn-info">Tambah Data</a>   Ketentuan Klaim </h1> 
        </div>
    </section>
    <div class="section-body">
        
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    @if ($message = Session::get('deleted'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <table class="table table-striped table-bordered table-sm" >
                        <tr>
                            <th width="10px">NO.</th>
                            <th>Jenis Program</th>
                            <th>Ketentuan Klaim</th>
                            <th>Action</th>
                        </tr>
                        
                        @foreach ($ketentuan_klaim  as $no => $item)
                        <tr>
                        <td>{{ $no+1}}</td>
                        @foreach ($jenis_program->where('id', $item->jenis_program ) as $no=> $items)
                        <td >
                        {{ $items->jenis_program }}
                         </td>
                        @endforeach
                            <td>{{Str::limit($item->name,120)}}...</td>
                            <td> <form action="{{ route('ketentuanklaim.destroy',$item->id) }}" method="POST">
                                {{-- <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a> --}}
                                <a class="btn btn-primary" href="{{ route('ketentuanklaim.edit',$item->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form></td>
                        </tr>
                        @endforeach
                    </table>   
                   
                        
            </div>

        </div>
    </div>
    </div>
@endsection

@push('page-script')

@endpush
