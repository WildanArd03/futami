@extends('layouts.master')
@section('title', 'Prokom Metode Klaim')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Home List Metode Klaim </h1>
        </div>

        <div class="section-body">
            <div class="title m-b-md">
                <a href="{{ route('prokomF1-tambah-metode-klaim') }}" class="btn btn-info">Tambah Data</a>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>NO.</th>
                        <th>Meode Klaim</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($data_metode as $no => $data)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $data->metode_klaim }}</td>
                            
                                
                                    <form action="{{ route('prokomF1-hapus-metode-klaim', $data->id) }}" method="post"
                                        class="d-inline">
                                        <td><a href=" {{ Route('prokomF1-edit-metode-klaim', $data->id) }}" class="btn btn-success">Edit</a>
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit" name="id"
                                            value="{{ $data->id }}">Hapus</button>
                                    </form>
                       
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
