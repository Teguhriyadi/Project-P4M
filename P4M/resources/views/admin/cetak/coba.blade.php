@php
use Carbon\Carbon;
use App\Models\Model\Profil;
$profil = Profil::first();
function bulanRomawi($bln)
{
    $bulan = '';
    switch ($bln) {
        case '01':
        $bulan = 'I';
        break;
        case '02':
        $bulan = 'II';
        break;
        case '03':
        $bulan = 'III';
        break;
        case '04':
        $bulan = 'IV';
        break;
        case '05':
        $bulan = 'V';
        break;
        case '06':
        $bulan = 'VI';
        break;
        case '07':
        $bulan = 'VII';
        break;
        case '08':
        $bulan = 'VIII';
        break;
        case '09':
        $bulan = 'IX';
        break;
        case '10':
        $bulan = 'X';
        break;
        case '11':
        $bulan = 'XI';
        break;
        case '12':
        $bulan = 'XII';
        break;
    }

    return $bulan;
}
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body style="overflow-x: hidden">
    <table align="center">
        <tr>
            <td><img src="/storage/{{ $profil->gambar }}" width="70" height="70"></td>
            <td width="500">
                <center>
                    <font size="4" style="text-transform: uppercase">PEMERINTAH KABUPATEN {{ $profil->kabupaten }}</font><br>
                    <font size="4" style="text-transform: uppercase">KECAMATAN {{ $profil->kecamatan }}</font><br>
                    <font size="5" style="text-transform: uppercase"><b>DESA {{ $profil->nama_desa }}</b></font><br>
                    <font size="2">Jl. Raya Arahan, Arahan Lor, Arahan, Kabupaten Indramayu, Jawa Barat 45211</font>
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr style="border-top: 2px solid black; margin-bottom: 0; bottom: 0;">
            </td>
        </tr>
    </table>
    <br>

    <table align="center">
        <tr>
            <td align="center" style="text-decoration: underline; font-size: 18px; font-weight: bold; text-transform: uppercase;">
                Surat {{ "asas" }}
            </td>
        </tr>
        <tr>
            <td align="center">Nomor: {{ '001' }}/{{ "asas" }}/{{ bulanRomawi(date('m')) }}/{{ date('Y') }}</td>
        </tr>
    </table>
    <br>

    <table align="center">
        <tr>
            <td width="570" align="justify">
                Yang bertanda tangan dibawah ini Kepala Desa {{ $profil->nama_desa }}, Kecamatan {{ $profil->kecamatan }}, Kabupaten {{ $profil->kabupaten }}
                menerangkan dengan sebenarnya, bahwa:
            </td>
        </tr>
    </table>
    <br>
    <table align="center" width="560">
        <tr>
            <td>Nama</td>
            <td>: <b>{{ "asasas" }}</b></td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>: {{ "asasas" }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: {{ "asasas" }}</td>
        </tr>
        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>: {{ "asasas" }}</td>
        </tr>
        <tr>
            <td>Warga Negara</td>
            <td>: {{ "asasas" }}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>: {{ "asasas" }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>: {{"asasas"}}</td>
        </tr>
        <tr>
            <td>Status Pernikahan</td>
            <td>: {{ "asasas" }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td width="390">: Dusun {{ "asasas" }}, RT. {{ "asasas" }} RW. {{ "asasas" }}, Desa {{ $profil->nama_desa }}, Kecamatan {{ $profil->kecamatan }}, Kabupaten {{ $profil->kabupaten }}, {{ $profil->provinsi }}, {{ $profil->kode_pos }}</td>
        </tr>
    </table>
    <br>
    <table align="center">
        <tr>
            <td width="570" align="justify">
                Dengan ini menerangkan bahwa yang bersangkutan adalah warga di Desa {{ $profil->nama_desa }}, Kecamatan {{ $profil->kecamatan }},
                Kabupaten {{ $profil->kabupaten }}.
                {{ "asasas" }}.
                <br>
                <br>
                {{ "asasas" }}
                <br>
                <br>
                Demikian surat yang keterangan ini dibuat, atas perhatian dan kerjasamanya kami ucapkan terimakasih
            </td>
        </tr>
    </table>
    <br>

    <table align="center" width="570">
        <tr>
            <td>
                <table align="right" width="">
                    <tr>
                        <td align="center">{{ $profil->nama_desa }}, {{ Carbon::now()->isoFormat("D MMMM Y") }}</td>
                    </tr>
                    <tr>
                        <td align="center" style="margin-right: 21px;">{{ "asasas" }} {{ $profil->nama_desa }}</td>
                    </tr>
                    <tr>
                        <td height="75"></td>
                    </tr>
                    <tr>
                        <td align="center" style="font-weight: bold; text-decoration: underline;">
                            {{"asasas"}}
                        </td>
                    </tr>
                    <tr>
                        <td align="center">NIP. {{ "asasas" }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
