@extends('layouts.master')
@section('title', 'Tambah parameter uji')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Input parameter uji</h1>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">

                    <form action="{{ route('ketentuanklaim.store') }}" method="POST">
                        @csrf
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="form-group">
                                        <label>* Jenis Program</label><br>
                                        <select class="form-control" name="jenis_program" id="jenis_program">
                                            <option value=""></option> 
                                            @foreach ($data_jenis_program as $item)
                                            <option value="{{ $item->id }}"> {{ $item->jenis_program }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group" id="lampirannya">
                                        <input type="button" name="add" id="add" value="+" name="add" id="add" class="btn btn-success mt-2 mb-2"> 
                                        <label>* Ketentuan Klaim</label><br>
                                       1. 
                                         <textarea  placeholder="Masukan Ketentuan Klaim" name="name[]" class="form-control"style="height: 50px"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                </form>
            </div>

        </div>
    </div>
    </div>
@endsection

@push('page-scripts')
<script type="text/javascript">
    $(document).ready(function() {
        var x = 2;
        $("#add").click(function() {
            var html = x + '.' + '<textarea name="name[]" placeholder="Masukan Ketentuan Klaim" class="form-control" style="height: 50px"></textarea><br>'
            $("#lampirannya").append(html);
            x++;
        });
    });

</script>
@endpush
