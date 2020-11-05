@extends('layouts.master')
@section('title', 'Input Lampiran Dokumen')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Input Lampiran Dokumen Untuk Prokom Sales & Commercial</h1>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">

                    <form  id="myTable"  action="{{ route('kelengkapan-dokumen-simpan') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>* Vendor Baru/Lama </label>
                                        <input type="text" name="vendor" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Lampiran</button>
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
        var html =
            '<div name="tambahan" id="tambahan" class="col-md-3"><div class="form-group"><input type="number" name="biaya[]" class="form-control txtCal"/></div></div><div class="col-md-9"><div class="form-group"><input type="button" name="remove" id="remove" value="-" class="btn btn-danger"></div></div>';
        var max = 20;
        var x = 2;

        $("#add").click(function() {
            if (x <= max) {
                $("#biayanya").append(html);
                x++;
            }else{
                alert("dah maximal gan");
            }
        });

        $("#biayanya").on('click', '#remove', function() {
            // $(this).closest('div').remove();
            $('#tambahan').remove();
            x--;
        });

    });

</script>
@endpush
