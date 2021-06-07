<table width="100%" style="border-bottom:double; border-width:9px; ">
    <tr>
        <td rowspan="4"><img src="./image/logo.png"></td>
        <td align="center">
            <h3>YAYASAN BINA NUSANTARA</h3>
        </td>
    </tr>
    <tr>
        <td align="center">
            <h2>SMK BINA NUSANTARA SEMARANG</h2>
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
                Nominal
            </td>
        </tr>
        @foreach ($gunabayar as $g)
        <tr>
            @php
                $p = App\Models\Pembayaran::where('nis',$nis)->where('idgunabayar',$g->id)->sum('jumlahbayar');
            @endphp
            <td>{{ $g->gunabayar }}</td>
            <td>{{ $p }}</td>
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
    <img src="./image/TTD BARCODE.jpeg" height="75" width="75"></td>
</div>
<div align="right">
    Eka Aribawa,S.Pd.I
</div>