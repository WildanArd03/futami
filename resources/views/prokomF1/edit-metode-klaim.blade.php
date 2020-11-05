@extends('layouts.master')
@section('title', 'Edit Metode Klaim')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Metode Klaim</h1>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">

                    @foreach ($parameter_uji  as $no => $item)
                    <form action="{{ route('prokomF1-edit-metode-klaim', $item->id) }}" method="POST">
                    @method('PUT')
                        <div class="card-body">
                            <div class="row">
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Metode Klaim </label>
                                        <input type="text" placeholder="Input Metode Klaim" name="metode_klaim" value="{{$item->metode_klaim}}" class="form-control">
                                    </div>
                                </div>
                                
                                @csrf
                                <div class="col-md-12">
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
                @endforeach
            </div>

        </div>
    </div>
    </div>
@endsection

@push('page-script')

@endpush
