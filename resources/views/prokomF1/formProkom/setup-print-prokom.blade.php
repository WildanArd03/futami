<!DOCTYPE html>
<html>

<head>
    <style>
        @page {
            margin: 0.2cm 0.2cm 0.2cm 0.2cm;
        }

        table {
            font-family: 'Times New Roman', Times, serif, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
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
</head>

<body>
    <table>
        @foreach ($data_prokomf1 as $no => $datanya)
        <tbody>
            <tr>
                <td colspan="2" rowspan="4"><img src="{{asset('/assets/img/SavoriaLogo.png')}}" width="100 px"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4" rowspan="2"></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="2">Nomor Proposal</td>
                <td colspan="6">: {{$datanya->nomor_proposal}}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="8"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="7"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="7"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="7"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="7"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="7"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"></td>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"></td>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2"></td>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="6"></td>
            </tr>
            <tr>
                <td colspan="3" style="align-items: center; text-align: center">Disiapkan Oleh:</td>
                {{-- <td></td> --}}
                <td   colspan="2" style="align-items: center; text-align: center">Direview Oleh:</td>
                
                <td  colspan="3" style="align-items: center; text-align: center">Disetujui Oleh:</td>
            </tr>
            <tr>
                <td colspan="3" style="align-items: center; text-align: center" >get session user</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" style="align-items: center; text-align: center"> Sales Commercial</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
        @endforeach
    </table>

</body>

</html>
