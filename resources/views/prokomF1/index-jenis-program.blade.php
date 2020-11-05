@extends('layouts.master')
@section('title', 'Prokom Jenis Program')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Home List Jenis Program </h1>
        </div>

        <div class="section-body">
            <div class="title m-b-md">
                <a href="{{ route('prokomF1-tambah-jenis-program') }}" class="btn btn-info">Tambah Data</a>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>NO.</th>
                        <th>Jenis Program</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($data_jenis as $no => $datanya)
                        <tr>
                            <td>{{ $no + 1 }} </td>
                            <td>{{ $datanya->jenis_program }}</td>
                            <td>
                                <a href="#" class="btn btn-success">Edit</a>
                                @if ($message = Session::get('grupnya') == '1')
                                    <form action="{{ route('prokomF1-jenis-program-hapus', $datanya->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit" name="id"
                                            value="{{ $datanya->id }}">Hapus</button>
                                    </form>
                                    {{-- <a href="#" class="badge badge-danger">Hapus
                                        <form action="{{ route('prokomF1-jenis-program-hapus', $datanya->id) }}" id=''
                                            class="d-inline" method="post"></form>
                                    </a> --}}

                            </td>
                        </tr>
                    @endif

                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection

@push('page-script')

@endpush
