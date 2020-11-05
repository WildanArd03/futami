@extends('layouts.master')
@section('title', 'Daftar parameter uji')

@section('content')
    <section class="section">
        <div class="section-header">
        
        <h1>Silahkan ubah dan klik simpan atau <a href="{{  route('ketentuanklaim.index')}}" class="btn btn-info">Kembali</a> </h1> 
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
                    @foreach ($parameter_uji  as $no => $item)
                        <form action="{{ route('ketentuanklaim.update',$item->id) }}" method="POST">
                        @method('PUT')
                        <label for="">Nama Pengajuan Klaim</label><br>
                        <textarea   name="name" class="form-control" style="height: 100px">{{$item->name}}</textarea><br>
                        <div class="form-group">
                            <label>* Jenis Program</label>
                            <select class="form-control" name="jenis_program" id="jenis_program">
                                @foreach ($data_jenis_program->where('id', $item->jenis_program) as $item)
                                <option value="{{$item->id}}">{{ $item->jenis_program }}</option>
                                @endforeach
                                <option value="">---Silahkan pilih jika ingin mengganti jenis program---</option>
                                @foreach ($data_jenis_program as $item)
                                <option value="{{$item->id}}">{{ $item->jenis_program }}</option>
                                @endforeach
                            </select>
                        </div>

                            @csrf
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    @endforeach
            </div>

        </div>
    </div>
    </div>
@endsection

@push('page-script')

@endpush
