@php
    use Carbon\Carbon;
    use App\Models\Model\Profil;
	$profil = Profil::first();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ url('backend/template/plugins/cetak') }}/960.css" type="text/css" media="screen">
    <link rel="stylesheet" href="{{ url('backend/template/plugins/cetak') }}/screen.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ url('backend/template/plugins/cetak') }}/print-preview.css" type="text/css" media="screen">
    <link rel="stylesheet" href="{{ url('backend/template/plugins/cetak') }}/print.css" type="text/css" media="print" />
    <script src="{{ url('backend/template/plugins/cetak') }}/jquery.tools.min.js"></script>
    <script src="{{ url('backend/template/plugins/cetak') }}/jquery.print-preview.js" type="text/javascript" charset="utf-8"></script>

    <script type="text/javascript">
        $(function()
        {
            $("#feature > div").scrollable({interval: 2000}).autoscroll();

            $('#aside').prepend('<a class="print-preview">Cetak </a>');
            $('a.print-preview').printPreview();

            var code = 80;
            $.printPreview.loadPrintPreview();
        });
    </script>
</head>

<body>
    <div id="content" class="container_12 clearfix">
        <div id="content-main" class="grid_7">
            <link href="{{ url('backend/template/plugins/cetak') }}/surat.css" rel="stylesheet" type="text/css" />
            <table width="100%" style="border: solid 0px black; text-align: left; margin-bottom: -15px;">
                <tr>
                    <td width="8%">NIK</td>
                    <td width="2%">:</td>
                    <td width="90%">{{ $penduduk->nik }}</td>
                </tr>
                <tr>
                    <td width="8%">No.KK</td>
                    <td width="2%">:</td>
                    <td width="90%">{{ $penduduk->kk_sebelumnya }}</td>
                </td>
            </tr>
        </table>
        <table width="100%" style="border: solid 0px black; text-align: center;">
            <tr>
                <td align="center">
                    <img src="/frontend/img/logo-desa.png" alt="Senggig1 " height="225" width="225"  class="logo_mandiri">
                </tr>
                <tr>
                </td>
                <td>
                    <h3>BIODATA PENDUDUK WARGA NEGARA INDONESIA</h3>
                    <h5>{{ 'Kab. '.$profil->kabupaten }}, {{ 'Kec. '.$profil->kecamatan }}, {{ 'Desa '.$profil->nama_desa }} </h5>
                </td>
            </tr>
        </table>
        <table width="100%" style="border: solid 0px black; padding: 10px;">
            <tr>
                <td><b>DATA PERSONAL</b></td>
            </tr>
            <tr>
                <td width="220">Nama Lengkap</td><td width="2%">:</td>
                <td>{{ $penduduk->nama }}</td>
                <td rowspan="18" style="vertical-align: top;">
                </td>
            </tr>
            <tr>
                <td>Tempat Lahir</td><td >:</td>
                <td>{{ $penduduk->tempat_lahir }}</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td><td >:</td>
                <td>{{ Carbon::createFromFormat('Y-m-d', $penduduk->tgl_lahir)->isoFormat('D MMMM Y') }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td><td >:</td>
                <td>{{ $penduduk->getKelamin->nama }}</td>
            </tr>
            <tr>
                <td>Agama</td><td >:</td>
                <td>{{ $penduduk->getAgama->nama }}</td>
            </tr>
            <tr>
                <td>Pendidikan Terakhir</td><td >:</td>
                <td>{{ $penduduk->getPendidikan->nama }}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td><td >:</td>
                <td>{{ $penduduk->getPekerjaan->nama }}</td>
            </tr>
            <tr>
                <td>Golongan Darah</td><td>:</td>
                <td>{{ $penduduk->getGolonganDarah->nama }}</td>
            </tr>
            <tr>
                <td>Status Kawin</td><td >:</td>
                <td>{{ $penduduk->getKawin->nama }}</td>
            </tr>
            <tr>
                <td>Hubungan dalam Keluarga</td><td >:</td>
                <td>{{ $penduduk->getHubungan->nama }}</td>
            </tr>
            <tr>
                <td>Warga Negara</td><td >:</td>
                <td>{{ $penduduk->getWargaNegara->nama }}</td>
            </tr>
            <tr>
                <td>NIK Ayah</td><td >:</td>
                <td>{{ $penduduk->nik_ayah }}</td>
            </tr>
            <tr>
                <td>Nama Ayah</td><td >:</td>
                <td>{{ $penduduk->nama_ayah }}</td>
            </tr>
            <tr>
                <td>NIK Ibu</td><td >:</td>
                <td>{{ $penduduk->nik_ibu }}</td>
            </tr>
            <tr>
                <td>Nama Ibu</td><td >:</td>
                <td>{{ $penduduk->nama_ibu }}</td>
            </tr>
            <tr>
                <td>Nomor Telpon/HP</td><td >:</td>
                <td>{{ $penduduk->telepon }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td >:</td>
                <td>
                    {{ $penduduk->getRt->rt }} / {{ $penduduk->getRw->rw }} - {{ $penduduk->getDusun->dusun }}
                </td>
            </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="center" scope="col" width="40%">Yang Bersangkutan</td>
                <td align="center" scope="col" width="10%">&nbsp;</td>
                <td align="center" scope="col" width="50%">{{ 'Desa '.$profil->nama_desa }}, {{ Carbon::now()->isoFormat("D MMMM Y") }}</td>
            </tr>
            <tr>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">Kepala {{ 'Desa '.$profil->nama_desa }}</td>
            </tr>
            <tr>
                <td align="center" colspan="3" height="90px">&nbsp;</td>
            </tr>
            <tr>
                <td align="center"><b>{{ $penduduk->nama }}</b></td>
                <td align="center">&nbsp;</td>
                <td align="center">
                    <b>
                        <?php
                            use App\Models\Model\StrukturPemerintahan;
                            $getData = StrukturPemerintahan::where("jabatan_id", $data->id)
                                ->first();
                        ?>
                        {{ $getData->getPegawai->nama }}
                    </b>
                </td>
            </tr>
        </table>
    </div>
    <div id="aside">
    </div>
</div>
</body>
