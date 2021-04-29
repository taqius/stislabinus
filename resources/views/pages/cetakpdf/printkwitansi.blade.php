<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
</head>
<body>
    <center>
        <table border='0' width='80%' style="padding: 10px;">
            <tr>
                <td rowspan="2" style="text-align: right;" width='15%'>
                    <img src="{{ asset('image/logo.jpg') }}" width="90%">
                </td>
                <td style="text-align: center;font-size: large;font-weight: bold;" colspan="5">
                SMK BINA NUSANTARA SEMARANG
            </td>
        </tr>
        <tr>
            <td style="text-align: center;" colspan="5">
                Jl. Kemantren No. 5 Wonosari, Ngaliyan - Semarang: Telp 024-8662971
            </td>
        </tr>
        <tr>
            <td style="border-top: black;" colspan="6">
                <hr style="border: 2px solid;">
            </td>
        </tr>
        <tr>
            <td colspan="6" style="text-align: center;">
                Kwitansi Pembayaran Sah
            </td>
        </tr>
        <tr>
            <td colspan="2" style="font-weight: bold;" width="15%">
                Telah terima dari
            </td>
            <td width="3%" colspan="2">
                :
            </td>
            <td style="font-weight: bold;" colspan="2" width="72%">
                {{ $cari->nama }}
            </td>
        </tr>
        <tr>
            <td colspan="2" style="font-weight: bold;">
                Kelas
            </td>
            <td width="3%" colspan="2">
                :
            </td>
            <td style="font-weight: bold;" colspan="2">
                {{ $cari->tingkat }} - {{ $cari->jurusan }}
            </td>
        </tr>
        <tr>
            <td colspan="2" style="font-weight: bold;">
                Uang Sebesar
            </td>
            <td width="3%" colspan="2">
                :
            </td>
            <td style="font-weight: bold;" colspan="2">
                Rp. {{ number_format($cari->jumlahbayar, 0, ".", ".") . ",-" }}
            </td>
        </tr>
        <tr>
            <td colspan="2" style="font-weight: bold;">
                Guna Pembayaran
            </td>
            <td width="3%" colspan="2">
                :
            </td>
            <td style="font-weight: bold;" colspan="2">
                {{ $cari->gunabayar }} - {{ $cari->tahun }}
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
            <td style="font-weight: bold;text-align: center;" width="35%">
                Semarang, {{ $cari->tanggalcetak }}
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
            <td style="font-weight: bold;text-align: center;">
                Bendahara,
            </td>
        </tr>
        <tr>
            <td colspan="6">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="6">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
            <td>
                &nbsp;
            </td>
            <td style="font-weight: bold;text-align: center;">
                {{ auth()->user()->name }}
            </td>
        </tr>
    </table>
</center>
</body>
</html>
