<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
</head>
<body>

<table width="100%" style="border-bottom:double; border-width:9px; ">
    <tr>
        <td rowspan="5"><img src="../image/logo.png"></td>
        <td align="center">
            &nbsp;
        </td>
    </tr>
    <tr>
        <td align="center">
            <h4>Yayasan Bina Nusantara Semarang</h4> <br>
            <h3>SMK BINA NUSANTARA SEMARANG</h3>
        </td>
    </tr>
    <tr>
        <td align="center">Jl. Kemantren No. 5 Kel.Wonosari Kec.Ngaliyan, Kota Semarang</td>
    </tr>
    <tr>
        <td align="center">website : binusasmg.sch.id, WA : 081391501186</td>
    </tr>

</table>

<div align="right">
    Semarang, {{ gmdate('d F Y') }}
</div>
<table>
    <tr>
        <td>No.</td>
        <td>:</td>
        <td>{{ $nosurat }}/{{ $bulansurat }}/{{ $tahunsurat }}</td>
    </tr>
    <tr>
        <td>Lamp.</td>
        <td>:</td>
        <td>-</td>
    </tr>
    <tr>
        <td>Hal</td>
        <td>:</td>
        <td>Pemberitahuan</td>
    </tr>
</table>
<p> Kepada Yth,<br>
    Bapak / Ibu Orang Tua Wali Murid <br>
    {{ $nama }} <br>
    Kelas {{ $kelas }}<br>
    Di tempat</p>

Assalamu'alaikum Wr. Wb.<br>
&nbsp; &nbsp; &nbsp; &nbsp;Puji syukur kita panjatkan kehadirat Allah SWT atas limpahan karunia-Nya, semoga bapak / ibu selalu dalam lindungan-Nya. Bersama datangnya surat ini kami informasikan :
<div>&nbsp;</div>
<table align="center" width="75%">
    <tbody>
        <tr>
            <td colspan="2" align="center" style="font-weight: bold; font-size:15">
                Kekurangan Biaya Pendidikan
            </td>
        </tr>
    </tbody>
</table>
<table align="center" width="70%" border="1" style="border: solid;">
    <tbody>
        <tr>
            <td style="width: 50%;" align="center">
                Keterangan
            </td>
            <td style="width: 40%;" align="center">
                Nominal Kekurangan
            </td>
        </tr>
        @php
            $idkelasxi = App\Models\Kelas::where('tingkat','XI')
                ->where('jurusan',$jurusankelas)
                ->value('id');
            $idkelasx = App\Models\Kelas::where('tingkat','X')
                ->where('jurusan',$jurusankelas)
                ->value('id');
        @endphp
        @if ($tingkatkelas == 'XII')
            @foreach ($gunabayarspp as $g)
                @php
                    $p = App\Models\Pembayaran::where('nis',$nis)
                    ->where('idgunabayar',$g->id)
                    ->where('idkelas',$idkelasx)
                    ->sum('jumlahbayar');
                    $cek = intval($g->wajibbayar) - intval($p);
                @endphp
                @if ($cek == 0)
                @else
                    <tr>
                        <td>
                            {{ $g->gunabayar }} Kelas X-{{  $jurusankelas }}
                        </td>
                        <td>
                            Rp. {{ number_format($cek, 0, ".", ".") . ",-" }}
                        </td>
                    </tr>
                @endif
            @endforeach
            @foreach ($gunabayarspp as $g)
                @php
                    $p = App\Models\Pembayaran::where('nis',$nis)
                    ->where('idgunabayar',$g->id)
                    ->where('idkelas',$idkelasxi)
                    ->sum('jumlahbayar');
                    $cek = intval($g->wajibbayar) - intval($p);
                @endphp
                @if ($cek == 0)
                @else
                    <tr>
                        <td>
                            {{ $g->gunabayar }} Kelas XI-{{  $jurusankelas }}
                        </td>
                        <td>
                            Rp. {{ number_format($cek, 0, ".", ".") . ",-" }}
                        </td>
                    </tr>
                @endif
            @endforeach
            @foreach ($gunabayarspp as $g)
                @php
                    $p = App\Models\Pembayaran::where('nis',$nis)
                    ->where('idgunabayar',$g->id)
                    ->where('idkelas',$idkelas)
                    ->sum('jumlahbayar');
                    $cek = intval($g->wajibbayar) - intval($p);
                @endphp
                @if ($cek == 0)
                @else
                    <tr>
                        <td>
                            {{ $g->gunabayar }} Kelas XII-{{  $jurusankelas }}
                        </td>
                        <td>
                            Rp. {{ number_format($cek, 0, ".", ".") . ",-" }}
                        </td>
                    </tr>
                @endif
            @endforeach
        @elseif ($tingkatkelas == 'XI')
            @foreach ($gunabayarspp as $g)
                @php
                    $p = App\Models\Pembayaran::where('nis',$nis)
                    ->where('idgunabayar',$g->id)
                    ->where('idkelas',$idkelasx)
                    ->sum('jumlahbayar');
                    $cek = intval($g->wajibbayar) - intval($p);
                @endphp
                @if ($cek == 0)
                @else
                    <tr>
                        <td>
                            {{ $g->gunabayar }} Kelas X-{{  $jurusankelas }}
                        </td>
                        <td>
                            Rp. {{ number_format($cek, 0, ".", ".") . ",-" }}
                        </td>
                    </tr>
                @endif
            @endforeach
            @foreach ($gunabayarspp as $g)
                @php
                    $p = App\Models\Pembayaran::where('nis',$nis)
                    ->where('idgunabayar',$g->id)
                    ->where('idkelas',$idkelasxi)
                    ->sum('jumlahbayar');
                    $cek = intval($g->wajibbayar) - intval($p);
                @endphp
                @if ($cek == 0)
                @else
                    <tr>
                        <td>
                            {{ $g->gunabayar }} Kelas XI-{{  $jurusankelas }}
                        </td>
                        <td>
                            Rp. {{ number_format($cek, 0, ".", ".") . ",-" }}
                        </td>
                    </tr>
                @endif
            @endforeach
        @else
            @foreach ($gunabayarspp as $g)
                @php
                    $p = App\Models\Pembayaran::where('nis',$nis)
                    ->where('idgunabayar',$g->id)
                    ->where('idkelas',$idkelas)
                    ->sum('jumlahbayar');
                    $cek = intval($g->wajibbayar) - intval($p);
                @endphp
                @if ($cek == 0)
                @else
                    <tr>
                        <td>
                            {{ $g->gunabayar }} Kelas X-{{  $jurusankelas }}
                        </td>
                        <td>
                            Rp. {{ number_format($cek, 0, ".", ".") . ",-" }}
                        </td>
                    </tr>
                @endif
            @endforeach
        @endif
        @foreach ($gunabayarug as $g)
        <tr>
            @php
                $p = App\Models\Pembayaran::where('nis',$nis)
                ->where('idgunabayar',$g->id)
                ->sum('jumlahbayar');
                $cek = intval($g->wajibbayar) - intval($p);
            @endphp
            @if ($cek == 0 || $cek <=0)
            @else
                <tr>
                    <td>
                        {{ $g->gunabayar }}
                    </td>
                    <td>
                        Rp. {{ number_format($cek, 0, ".", ".") . ",-" }}
                    </td>
                </tr>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
<div>
    &nbsp;
</div>
<p> Kami berdoa semoga bapak / ibu senantiasa diberikan kelapangan dan keberkahan rizki dan ilmu yang diperoleh anak-anak bermanfaat.<br>
    &nbsp;&nbsp;&nbsp;&nbsp;Demikian pemberitahuan ini kami sampaikan, atas perhatian kami ucapkan terima kasih.<br>
    Wassalamu'alaikum Wr. Wb.</p>
<div align="right">
    Kepala Sekolah,
</div>
<div align="right">
    <img src="../image/TTD BARCODE.jpeg" height="75" width="75"></td>
</div>
<div align="right">
    Eka Aribawa,S.Pd.I
</div>
<script>
    window.load = print_d();

    function print_d() {
        window.print();
    }
</script>
</body>
</html>
