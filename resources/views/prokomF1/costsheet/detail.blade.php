@extends('layouts.master')
@section('title', 'Detail data')

@section('content')
    <section class="section">

           <div class="section-header">
            <a href="{{ route('costsheet-print', $cost_sheet->id) }}?no_proposal={{$cost_sheet->no_proposal}}" class="badge badge-info text-right mt-2 mr-2">Print</a> <h1>   Edit Cost Sheet Untuk Prokom Sales & Commercial< </h1>
        <div class="section-header">
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">

                    <form id="myTable" action="{{ route('costsheet-update', $cost_sheet->id) }}?no_proposal={{$cost_sheet->no_proposal}}" method="POST">
                        @csrf
                        <input type="hidden" name="creator" value="
                        @if ($message = Session::get('id_user'))
                        {{ $message }}
                        @endif">
                        <input type="hidden" name="no_proposal" value="{{$cost_sheet->no_proposal}}" >
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Cost Center / GL Account</label>
                                        <select class="form-control" name="item_cost" id="item_cost">
                                             @foreach ($item_cost->where('id', $cost_sheet->item_cost) as $selected_item)
                                                <option value="{{$selected_item->id}}">{{ $selected_item->id_cost_center }} -
                                                    {{ $selected_item->id_item }} - {{ $selected_item->name }}</option>
                                                @endforeach
                                               <option value="">---Silahkan pilih jika ingin mengganti---</option> 
                                            {{-- show cost center list --}}
                                            @foreach ($item_cost as $item)
                                                <option value="{{ $item->id }}">{{ $item->id_cost_center }} -
                                                    {{ $item->id_item }} - {{ $item->name }}</option>
                                            @endforeach
                                           
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Rata-rata penjualan (toko atau kegiatan): </label>
                                        <input type='number' id="total_sum_value2" class="form-control" name="avg_penjualan" value="{{$avg_penjualan->avg_penjualan}}" />

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Target Penjualan (selama Periode Program) (B) </label>
                                        <input type='number' class="form-control tpenjualan" id="target" name="target" value="{{ $target->target }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label >Estimasi Biaya Program yang dikeluarkan : (A) </label>
                                        <?php 
                                             $total_rincian = 0
                                        ?>
                                        @foreach($rincian as $rincian_data)
                                         <?php $total_rincian += $rincian_data->biaya ?>
                                        @endforeach
                                        <!-- <label id="total_sum_value" type='number' class="form-control" >0</label> -->
                                        <input id="total_sum_value" type='text' class="form-control" disabled value="{{$total_rincian}}" />
                                    </div>
                                </div>
                            </div>
                            <label><b>Rincian Budget Yang Dikeluarkan: </b> </label>
                            <div class="table-responsive">  
                                <table class="table table-bordered" id="dynamic_field">  
                                    <tr>  
                                        <td>
                                            <input type="text" name="name[]" class="form-control" value="{{$rincian[0]->name}}"  placeholder="masukan rincian budget"/>
                                        </td>  
                                         <td>
                                            <input type='number' name="biaya[]" class="form-control txtCal" value="{{$rincian[0]->biaya}}"  placeholder="masukan budget dalam bentuk angka" />
                                        </td>  
                                        <td>
                                            <button type="button" name="add" id="add" class="btn btn-success">+</button>
                                        </td>  
                                    </tr>  
                                    @foreach($rincian as $key => $rincian_data)
                                        @if($key > 0)
                                        <tr id="row{{$key}}">  
                                            <td>
                                                <input type="text" name="name[]" class="form-control" value="{{$rincian_data->name}}"  placeholder="masukan rincian budget"/>
                                            </td>  
                                             <td>
                                                <input type='number' name="biaya[]" class="form-control txtCal" value="{{$rincian_data->biaya}}" placeholder="masukan budget dalam bentuk angka" />
                                            </td>  
                                            <td>
                                               <button type="button" name="remove" id="{{$key}}" class="btn btn-danger btn_remove">-</button>
                                            </td>  
                                        </tr>  
                                        @endif
                                    @endforeach
                                </table>  
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group" >
                                        <label>% Biaya vs Penjualan (Selama Periode Program) </label>
                                        <?php 
                                        $rata_rata = ($total_rincian/$target->target);
                                         ?>
                                        <!-- <label id="biaya_vs_penjualan" type='number' class="form-control" >0</label> -->
                                        <input type='text' class="form-control " id="biaya_vs_penjualan" value="{{round($rata_rata,2)}}%" readonly />
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="">
                                <div class="col-md-12">
                                    <div class="text-left">
                                        <button class="btn btn-primary mr-1" type="submit">Simpan</button>
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
<!-- Tambah -->
<script>
    $(document).ready(function(){
        $('#qty').on('keyup change',function(){
    $('#result').val($(this).val() * 2);
    });
    
        
    $("#myTable").on('input', '.txtCal', function () {
           var calculated_total_sum = 0;
         
           $("#myTable .txtCal").each(function () {
               var get_textbox_value = $(this).val();
               if ($.isNumeric(get_textbox_value)) {
                  calculated_total_sum += parseFloat(get_textbox_value);
                  }                  
                });
                  $("#total_sum_value").val(calculated_total_sum);
           });
    
    });
</script>
<script>
    $(document).ready(function(){     
    $("#myTable").on('input', '.tpenjualan', function () {
           var calculated_biaya = $("#total_sum_value").val();
           var hasil;
           $("#myTable .tpenjualan").each(function () {
               var get_textbox_value = $(this).val();
               if ($.isNumeric(get_textbox_value)) {
                 hasil = calculated_biaya /= parseFloat(get_textbox_value);
                  }                  
                });
                  $("#biaya_vs_penjualan").val(hasil.toFixed(2) + "%");
           });
    
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){      
      var postURL = "<?php echo url('addmore'); ?>";
      var i = 1;  
      var max = 20;


      $('#add').click(function(){  
           i++;  
           if ( i <= max ) {
            $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" class="form-control"  placeholder="masukan rincian budget"/></td><td><input type="number" name="biaya[]" class="form-control txtCal" placeholder="masukan budget dalam bentuk angka" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">-</button></td></tr>');  
                $("#dynamic_field").append(html);
                     i++;
                 }else{
                    alert("dah maximal gan");
                 }
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove(); 
           if (i == 2) {
            i++
           } 
           i--;
      });  

    });  
</script>
@endpush