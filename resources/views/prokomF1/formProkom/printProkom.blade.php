<!DOCTYPE html>
<html>

<head>
    
    <style>
        @page {
            margin: 0.2cm 0.2cm 0.2cm 0.2cm;
        }
        td img {
            /* display: block; */
            margin-left: 0;
            margin-right: 0;
            margin-top: 0;
            margin-bottom: 0;

        }
        table {
            font-family: 'Times New Roman', Times, serif, sans-serif;
            border-collapse: collapse;
            font-size: 12px;
            table-layout: auto;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #000000;
            text-align: left;
            padding: 5px;

        }

        tr {
            font-size: 12px;
        }

    </style>
    <title>PRINT FORM PROKOM</title>
</head>

<body>

    <table >
        @foreach ($data_prokomf1 as $no => $datanya)
            <tbody>
                <tr >
                    <td colspan="2" rowspan="4" align="center"><<img src="savoria.jpg"width="100px"
                            width="100PX">
                    </td>
                    <td colspan="4" style=" text-align: center; "><b> PT SAVORIA KREASI RASA</b></td>
                    <td>Doc No.</td>
                    <td>SKR/COM/FM/04/001</td>
                </tr>
                <tr>
                    <td colspan="4" style=" text-align: center"><b>FORMULIR</b></td>
                    <td>Issued Date</td>
                    <td>01 Juni 2020</td>
                </tr>
                <tr>
                    <td colspan="4" style=" text-align: center" rowspan="2"><b>PROKOM SALES COMMERCIAL</b></td>
                    <td>Rev No.</td>
                    <td>00</td>
                </tr>
                <tr>
                    <td>Page</td>
                    <td>1 of 3</td>
                </tr>
                <tr>
                    <td colspan="8"></td>
                </tr>
                <tr>
                    <td colspan="2">Kepada Yth</td>
                    <td colspan="6">: {{ $datanya->kepada_yth }}</td>
                </tr>
                <tr>
                    <td colspan="2">Diketahui Oleh</td>
                    <td colspan="6">: {{ $datanya->di_ketahui }}</td>
                </tr>
                <tr>
                    <td colspan="2">Nomor Proposal</td>
                    <td colspan="6">: {{ $datanya->nomor_proposal }}</td>
                </tr>
                <tr>
                    <td colspan="2">Tanggal Pengajuan</td>
                    <td colspan="6">:
                        {{ \Carbon\Carbon::parse($datanya->tanggal_diajukan)->locale('id')->isoFormat('DD MMMM Y') }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Brand / Item</td>
                    <td colspan="6">: {{ $datanya->brand_item }} </td>
                </tr>
                <tr>
                    <td colspan="2">Kode RKB</td>
                    <td colspan="6">: {{ $datanya->kode_rkb }}</td>
                </tr>
                <tr>
                    <td colspan="2">PR/Non PR</td>
                    <td colspan="6">: {{ $datanya->no_pr }}</td>
                </tr>
                <tr>
                    <td colspan="2">Jenis Program</td>
                    <td colspan="6">:
                        @foreach ($data_jenis_program->where('id', $datanya->jenis_program) as $item)
                            {{ $item->jenis_program }}
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Nama Program</td>
                    <td colspan="6">: {{ $datanya->nama_program }}</td>
                </tr>
                <tr>
                    <td colspan="2">Periode Program</td>
                    <td colspan="6">:
                        {{ \Carbon\Carbon::parse($datanya->periode_program_start)->locale('id')->isoFormat('DD MMMM Y') }}
                        sampai
                        {{ \Carbon\Carbon::parse($datanya->periode_program_end)->locale('id')->isoFormat('DD MMMM Y') }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Area Program</td>
                    <td colspan="6">: {{ $datanya->area_program }}</td>
                </tr>
                <tr>
                    <td colspan="2">Region Program</td>
                    <td colspan="6">: {{ $datanya->region_program }}</td>
                </tr>
                <tr>
                    <td colspan="8"></td>
                </tr>
                <tr>
                    <td colspan="2">Channel Program</td>
                    <td colspan="6">:
                        @foreach ($data_channel_program->where('id', $datanya->channel_program) as $item)
                            {{ $item->channel_program }}
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td style=" text-align: center">1 </td>
                    <td colspan="7">Background / Informasi : <br>
                        {{ $datanya->background_informasi }}
                    </td>
                </tr>
                <tr>
                    <td style=" text-align: center" rowspan="3">2</td>
                    <td colspan="7">Mekanisme program : <br>
                        {{ $datanya->mekanisme_program }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Ketentuan & Catatan Khusus : </td>
                    <td colspan="5">{{ $datanya->ketentuan_catatan }}</td>
                </tr>
                <tr>
                    <td colspan="7">
                        Informasi / Kontak : <br>
                        - PIC Brand / Commercial : {{ $datanya->pic_brand_commercial }}<br>
                        - PIC Sales & Distribution : {{ $datanya->pic_sales_distribution }}<br>
                        - PIC Finance & Accounting : {{ $datanya->pic_finance_accounting }}<br>
                    </td>
                </tr>
                <tr>
                    <td style=" text-align: center"  rowspan="7">3</td>
                    <td colspan="7">Mekanisme Klaim : </td>
                </tr>
                <tr>
                    <td colspan="7">Klaim Tagihan Ke :
                        @foreach ($klaim->where('id', $datanya->klaim_tagihan_ke) as $item)
                            {{ $item->klaim_tagihan_ke }}
                        @endforeach 
                        
                    </td>
                </tr>
                <tr>
                    <td colspan="7">Metode Klaim : {{ $datanya->metode_klaim }}</td>
                </tr>
                <tr>
                    <td colspan="7">Faktur Pajak : {{ $datanya->faktur_pajak }}</td>
                </tr>
                <tr>
                    <td colspan="7">Tanggal Batas Klaim : 
                        {{ \Carbon\Carbon::parse($datanya->batas_akhir_klaim)->locale('id')->isoFormat('DD MMMM Y') }}
                    </td>
                </tr>
                <tr>
                    <td colspan="7">Ketentuan & Prosedur Klaim : 
                        <br>
                        @php
                            $i = 1 ;
                        @endphp 
                        @foreach ($ketentuan_klaim->where('jenis_program', $datanya->jenis_program) as  $item)
                        @php echo $i++; @endphp. {{ $item->name }}<br>
                        @endforeach 
                    </td>

                </tr>
                <tr>
                    <td colspan="7">Ketentuan Tambahan Operasional: {{ $datanya->ketentuan_tambahan_operasional }}</td>
                </tr>
                <tr>
                    <td colspan="3" style=" text-align: center">Disiapkan Oleh:</td>
                    <td colspan="2" style=" text-align: center">Direview Oleh:</td>

                    <td colspan="3" style=" text-align: center">Disetujui Oleh:</td>
                </tr>
                <tr >
                    <td colspan="3" style=" text-align: center"><br><br><br><br></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr >
                    <td colspan="3" style=" text-align: center"><u>  @foreach ($creator->where('id', $datanya->disiapkan_oleh) as $item)
                        {{ $item->name }}
                    @endforeach </u><br>Sales Commercial</td>
                    <td>Sales Admin</td>
                    <td>Budget Control</td>
                    <td>Head Dept Sales</td>
                    <td>Head Dept Sales</td>
                    <td>Head of BU</td>
                </tr>
            </tbody>
        @endforeach
    </table>

</body>

</html>