@extends('layouts.master')
@section('title', 'Prokom Channel Program')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Home List Channel Program </h1>
        </div>

        <div class="section-body">
            <div class="title m-b-md">
                <a href="{{ route('prokomF1-tambah-channel-program') }}" class="btn btn-info">Tambah Data</a>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>NO.</th>
                        <th>Channel Program</th>
                        <th>Kode Channel</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($data_channel as $no => $datanya)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $datanya->channel_program }}</td>
                            <td>{{ $datanya->kode_channel }}</td>
                            <td><a href="#" class="btn btn-success">Edit</a>
                                @if ($message = Session::get('grupnya') == '1')
                                    <form action="{{ route('prokomF1-channel-program-hapus', $datanya->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit" name="id"
                                            value="{{ $datanya->id }}">Hapus</button>
                                    </form>
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
