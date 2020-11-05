@extends('layouts.master')
@section('title', 'Tambah Cost Sheet')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Input Cost Sheet Untuk Prokom Sales & Commercial</h1>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">

                    <form id="myTable" action="{{ route('prokomF1-simpan-chost-sheet') }}" method="POST">
                        @csrf
                        <input type="hidden" name="creator" value="
                        @if ($message = Session::get('id_user'))
                        {{ $message }}
                        @endif">
                        <input type="hidden" name="no_proposal" value=" @php
                        echo $_GET["no_proposal"];
                    @endphp" >
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Cost Center / GL Account</label>
                                        <select class="form-control" name="item_cost" id="item_cost">
                                            {{-- null --}}
                                            <option value=""></option> 
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
                                        <input type='number' id="total_sum_value2" class="form-control" name="avg_penjualan" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Target Penjualan (selama Periode Program) (B) </label>
                                        <input type='number' class="form-control tpenjualan" id="target" name="target"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label >Estimasi Biaya Program yang dikeluarkan : (A) </label>
                                        <!-- <label id="total_sum_value" type='number' class="form-control" >0</label> -->
                                        <input id="total_sum_value" type='text' class="form-control" disabled >
                                    </div>
                                </div>
                            </div>

                            {{-- start biaya --}}
                            <label><b>Rincian Budget Yang Dikeluarkan: </b> </label>
                            <div class="row"  id="biayanya">
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type="text" name="name[]" class="form-control"  placeholder="masukan rincian budget"/>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type='number' name="biaya[]" class="form-control txtCal" placeholder="masukan budget dalam bentuk angka" />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group" >
                                        <input type="button" name="add" id="tambah" value="+" class="btn btn-success">
                                    </div>
                                </div>
                            </div>
                            <div id="root">
                            <br>
                            </div>
                            {{-- end biaya --}}

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group" >
                                        <label>% Biaya vs Penjualan (Selama Periode Program) </label>
                                        <!-- <label id="biaya_vs_penjualan" type='number' class="form-control" >0</label> -->
                                        <input type='text' class="form-control " id="biaya_vs_penjualan" readonly />
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
// Ini buat elemennya, lebih bagus kalo pake WebComponent
// Pake Polymer LitHTML juga bisa
const entry = `
<div class="row">
    <div class="col-3">
        <div class="form-group">
            <input name="name[]" class="form-control"  placeholder="masukan rincian budget"/>
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <input type="number" id="contoh" placeholder="masukan budget dalam bentuk angka" name="biaya[]" class="form-control txtCal"/>
        </div>
    </div>
    <div class="hapus col-3">
        <div class="form-group">
            <button class="btn btn-danger" >-</button>
        </div>
    </div>
</div>    
`
function stringToHtml(stringHtml) {
  const temp = document.createElement('div')
  temp.innerHTML = stringHtml
  return temp.firstElementChild
}
function createEntry(id) {
  const entryEl = stringToHtml(entry)
  entryEl.querySelector('button').addEventListener('click', () => {
    removeEntry(id)
    entryEl.remove()
  })
  return entryEl
}
function addEntry(id, element) {
  entries.set(id, element)
  rerender()
}
function removeEntry(id) {
  entries.delete(id)
  rerender()
}
const parentEl = document.querySelector('#root')
const buttonTambah = document.querySelector('#tambah')
const entries = new Map()
let counter = 1
buttonTambah.addEventListener('click', () =>
  addEntry(counter, createEntry(counter++))
)
function rerender() {
  parentEl.innerHTML = ''
  entries.forEach(value => parentEl.appendChild(value))
}
        // $(document).ready(function() {
        //     var html =
        //         '<div class="col-3"><div class="form-group"><input name="name[]" class="form-control"  placeholder="masukan rincian budget"/></div></div><div class="col-md-3"><div class="form-group"><input type="number" placeholder="masukan budget dalam bentuk angka" name="biaya[]" class="form-control txtCal"/></div></div><div class="col-md-6"><div class="form-group"><input type="button" name="remove" id="remove" value="-" class="btn btn-danger"></div></div>';
        //     var max = 20;
        //     var x = 2;
        //     $("#add").click(function() {
        //         if (x <= max) {
        //             $("#biayanya").append(html);
        //             x++;
        //         }else{
        //             alert("dah maximal gan");
        //         }
        //     });
        //     $("#biayanya").on('click', '#remove', function() {
        //         // $(this).closest('div').remove();
        //         $('#tambahan').remove();
        //         x--;
        //     });
        // });
    </script>
@endpush