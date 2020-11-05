<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Kelengkapan Document</title>
    <style type="text/css">
        @page {
            margin: 0.2cm 0.2cm 0.2cm 0.2cm;
        }
        table {
            font-family: 'Candara', Times, serif, sans-serif;
            border-collapse: collapse;
            font-size: 14px;
            table-layout: auto;
            width: 100%;
        }
        td,
        th {
            border: 1px solid #000000;
            padding: 5px;
        }
        tr {
            font-size: 13px;
        }
        .kiri{
            text-align: left;
        }
        .kotak{
            border: 1px #000 solid;
            height: 25px;
            width: 25px;
        }
        .tng{
            text-align: center;
        }
    </style>
</head>
<body>
    <table>
        <tbody>
            <tr>
                <th rowspan="4"><img src="{{ public_path('assets/img/savoria.jpg') }}" width="81"></th>
                <th width="600px">PT SAVORIA ADI RASA</th>
            </tr>
            <tr>
                <th>FORMULIR</th>
            </tr>
            <tr>
                <th style="font-size: 14px; border-bottom: none;">PROPOSAL AKTIVITAS</th>
            </tr>
            <tr>
                <th style="font-size: 15px; border-top: none;">LAMPIRAN 2. KELENGKAPAN DOKUMEN</th>
            </tr>
        </tbody>
    </table>
    <table>
    @foreach ($kelengkapan_dokumen as $no => $datanya)
        <tbody>
            <tr>
                <th style="border-top: none; padding: 10px; padding-top: 22; font-size: 16px; text-align: left; border-right:none; border-bottom: none;" width="125px"><span style="margin-left: 14px;">VENDOR :</span></th>
                <th width="25px" style="border-top: none; padding-top: 20; border-left:none; border-right: none; border-bottom: none;"><div class="kotak" style="font-size: 18px;">@php if( $datanya->vendor==0 ) echo "V" @endphp </div></th>
                <th width="80px" style="text-align: left; padding-top: 20; border-left:none; border-top: none; border-right: none; border-bottom: none;">Lama</th>
                <th width="25px" style="border-top: none; padding-top: 20; border-left:none; border-right: none; border-bottom: none;"><div class="kotak" style="font-size: 18px;">@php if( $datanya->vendor==1 ) echo "V" @endphp</div></th>
                <th width="80px" style="text-align: left; padding-top: 20; border-left:none; border-top: none; border-right: none; border-bottom: none;">Baru</th>
                <th style="text-align: left; border-left:none; padding-top: 20; border-top: none; border-bottom: none;"><span>( Beri tanda v )</span></th>
            </tr>
        </tbody>
    </table>
    <table>
        <tr>
            <th style="border-top: none; padding: 20px; padding-top: 10px; padding-bottom: 10px; border-bottom: none;" align="center">
                <table>
                    <tr>
                        <th colspan="2" style="text-align: left; font-weight: bold;">Dokumen yang harus dilengkapi vendor baru :</th>
                        <th width="140px" align="center">Perlu (v) / Tidak</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th width="20px">1.</th>
                        <td class="kiri" width="400px">Form Vendor</td>
                        <td class="tng">@php if($datanya->form_vendor==1) echo "V" @endphp</td>
                        <td class="tng">@php if($datanya->form_vendor==0) echo "V" @endphp</td>
                    </tr>
                    <tr>
                        <th>2.</th>
                        <th class="kiri">NPWP</th>
                        <td class="tng">@php if($datanya->npwp==1) echo "V" @endphp</td>
                        <td class="tng">@php if($datanya->npwp==0) echo "V" @endphp</td>
                    </tr>
                    <tr>
                        <th>3.</th>
                        <td class="kiri">SPPKP</td>
                        <th class="tng">@php if($datanya->sppkp==1) echo "V" @endphp</th>
                        <th class="tng">@php if($datanya->sppkp==0) echo "V" @endphp</th>
                    </tr>
                    <tr>
                        <th>4.</th>
                        <td class="kiri">Surat Pernyataan NON PKP (jika tidak menerbitkan Faktur Pajak)</th>
                        <td class="tng">@php if($datanya->surat_pernyataan_non_pkp==1) echo "V" @endphp</td>
                        <td class="tng">@php if($datanya->surat_pernyataan_non_pkp==0) echo "V" @endphp</td>
                    </tr>
                    <tr>
                        <th>5.</th>
                        <th class="kiri">Surat Kepemilikan Rekening Bermaterai</th>
                        <th class="tng">@php if($datanya->surat_kepemilikan_rekening_bermaterai==1) echo "V" @endphp</th>
                        <th class="tng">@php if($datanya->surat_kepemilikan_rekening_bermaterai==0) echo "V" @endphp</th>
                    </tr>
                    <tr>
                        <th>6.</th>
                        <th class="kiri">Surat Pernyataan Pemotongan PPH 21</th>
                        <th class="tng">@php if($datanya->surat_pernyataan_pemotongan_pph==1) echo "V" @endphp</th>
                        <th class="tng">@php if($datanya->surat_pernyataan_pemotongan_pph==0) echo "V" @endphp</th>
                    </tr>
                    <tr>
                        <th colspan="2" style="text-align: left; font-weight: bold;">Kelengkapan dokumen penagihan :</th>
                        <th>Perlu (v) / Tidak</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th width="20px">1.</th>
                        <th class="kiri">Kwitansi / Invoice bermaterai atas nama PT Savoria Kreasi Rasa</th>
                        <th class="tng">@php if($datanya->kwitansi==1) echo "V" @endphp</th>
                        <th class="tng">@php if($datanya->kwitansi==0) echo "V" @endphp</th>
                    </tr>
                    <tr>
                        <th>2.</th>
                        <th class="kiri">Faktur Pajak atas nama PT Savoria Kreasi Rasa</th>
                        <th class="tng">@php if($datanya->faktur==1) echo "V" @endphp</th>
                        <th class="tng">@php if($datanya->faktur==0) echo "V" @endphp</th>
                    </tr>
                    <tr>
                        <th>3.</th>
                        <th class="kiri">Surat perjanjian kerjasama / Prokom</th>
                        <th class="tng">@php if($datanya->surat_perjanjian==1) echo "V" @endphp</th>
                        <th class="tng">@php if($datanya->surat_perjanjian==0) echo "V" @endphp</th>
                    </tr>
                    <tr>
                        <th>4.</th>
                        <th class="kiri">Berita Acara Serah Terima (BAST)/Surat Jalan/Report / Dokumentasi</th>
                        <th class="tng">@php if($datanya->bast==1) echo "V" @endphp</th>
                        <th class="tng">@php if($datanya->bast==0) echo "V" @endphp</th>
                    </tr>
                    <tr>
                        <th>5.</th>
                        <th class="kiri">Faktur Penjualan</th>
                        <th class="tng">@php if($datanya->faktur_penjualan==1) echo "V" @endphp</th>
                        <th class="tng">@php if($datanya->faktur_penjualan==0) echo "V" @endphp</th>
                    </tr>
                    <tr>
                        <th>6.</th>
                        <th class="kiri">Copy PO</th>
                        <th class="tng">@php if($datanya->copy_po==1) echo "V" @endphp</th>
                        <th class="tng">@php if($datanya->copy_po==0) echo "V" @endphp</th>
                    </tr>
                    <tr>
                        <th>7.</th>
                        <th class="kiri">Quotation dengan rincian biaya</th>
                        <th class="tng">@php if($datanya->quotation==1) echo "V" @endphp</th>
                        <th class="tng">@php if($datanya->quotation==0) echo "V" @endphp</th>
                    </tr>
                    <tr>
                        <th>8.</th>
                        <th class="kiri">Lampiran (sesuai deskripsi di  bawah)</th>
                        <th class="tng">@php if($datanya->quotation==1) echo "V" @endphp</th>
                        <th class="tng">@php if($datanya->quotation==0) echo "V" @endphp</th>
                    </tr>
                </table>
                @endforeach
            </th>
        </tr>
        <tr>
        @foreach ($kelengkapan_dokumen as $no => $datanya)
            <th style=" border-top: none; padding: 20px; padding-top:0; text-align: left; border-bottom: none;">
                <table>
                    <tr>
                        <th style="border:none; text-align:left;" colspan="3">Deskripsi lampiran :</th>
                    </tr>
                @php
                 $no=1;
                @endphp
                @foreach ($lampiran->where('no_proposal', $datanya->no_proposal) as $lampir)
                    <tr>
                        <th width="25px">{{ $no++ }}</th>
                        <td width="400px">{{ $lampir->lampiran}}</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
                </table>
            @endforeach
            </th>
        </tr>
        <tr>
            <th style=" border-top: none; padding: 20px; padding-top:0; text-align: left;">
                <table>
                    <tr>
                        <th width="190px">User / Sales Admin</th>
                        <th>Accounting</th>
                        <th width="190px">Procurement (jika ada PR)</th>
                    </tr>
                    <tr>
                        <th height="60px"></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th height="20px">@if ($message = Session::get('namanya')){{ $message }}@endif</th>
                        <th></th>
                        <th></th>
                    </tr>
                </table>
            </th>
        </tr>
    </table>
</body>
</html>