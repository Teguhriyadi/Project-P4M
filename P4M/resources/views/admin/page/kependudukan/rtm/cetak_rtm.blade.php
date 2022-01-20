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
    <div id="container">
        <link href="https://demo.opensid.or.id/assets/css/report.css" rel="stylesheet" type="text/css">
        <!-- Print Body -->
        <div id="body">
            <div align="center">
                <h3>KARTU RUMAH TANGGA</h3>
                <h4>SALINAN</h4>
                <h5>No. {{ $detail->no_kk }} </h5>
            </div>
            <br>
            <table width="100%" cellpadding="3" cellspacing="4">
                <tr>
                    <td width="100">Nama KK</td>
                    <td width="600">: {{ $detail->getDataPenduduk->nama }}</td>
                    <td width="160">Kecamatan</td>
                    <td width="150">: BAKONGAN</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: MANGSIT </td>
                    <td>Kabupaten/Kota</td>
                    <td>: Aceh Selatan</td>
                </tr>
                <tr>
                    <td>RT / RW</td>
                    <td>: 004 / -</td>
                    <td>Kode Pos</td>
                    <td>: 83355</td>
                </tr>
                <tr>
                    <td>Kelurahan/Desa</td>
                    <td>: </td>
                    <td>Provinsi</td>
                    <td>: ACEH</td>
                </tr>
            </table>
            <br>
            <table class="border thick ">
                <thead>
                    <tr class="border thick">
                        <th width="7">No</th>
                        <th width='180'>Nama</th>
                        <th width='100'>NIK</th>
                        <th width='100'>NOMOR KK</th>
                        <th width='100'>Jenis Kelamin</th>
                        <th width='100'>Tempat Lahir</th>
                        <th width='120'>Tanggal Lahir</th>
                        <th width='100'>Agama</th>
                        <th width='100'>Pendidikan</th>
                        <th width='100'>Pekerjaan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    use App\Models\Model\Penduduk;
                    $getData = Penduduk::where("id_rtm", $detail->no_kk)->get();
                    @endphp
                    @foreach ($getData as $data)
                    <tr class="data">
                        <td align="center" width="2">{{ $loop->iteration }}.</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->nik }}</td>
                        <td>{{ $data->getRtm->no_kk }}</td>
                        <td>{{ $data->getKelamin->nama }}</td>
                        <td>{{ $data->tempat_lahir }}</td>
                        <td>{{ $data->tgl_lahir }}</td>
                        <td>{{ $data->getAgama->nama }}</td>
                        <td>{{ $data->getPendidikan->nama }}</td>
                        <td>{{ $data->getPekerjaan->nama }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <table class="border thick ">
                <thead>
                    <tr class="border thick">
                        <th width="7">No</th>
                        <th width='150'>Status Perkawinan</th>
                        <th width='240'>Status Hubungan dalam Keluarga</th>
                        <th width='140'>Kewarganegaraan</th>
                        <th width='170'>Nama Ayah</th>
                        <th width='170'>Nama Ibu</th>
                        <th width='70'>Golongan darah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getData as $data)
                    <tr class="data">
                        <td align="center" width="2">{{ $loop->iteration }}</td>
                        <td>{{ $data->getKawin->nama }}</td>
                        <td>{{ $data->getHubunganRtm->nama }}</td>
                        <td>{{ $data->getWargaNegara->nama }}</td>
                        <td>{{ $data->nama_ayah }}</td>
                        <td>{{ $data->nama_ibu }}</td>
                        <td align="center">{{ $data->getGolonganDarah->nama }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <table width="100%" cellpadding="3" cellspacing="4">
                <tr>
                    <td width="25%"></td>
                    <td width="50%"></td>
                    <td width="25%" align="center">Indramayu, {{ Carbon::now()->isoFormat('D MMMM Y') }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td width="25%" align="center">KEPALA RUMAH TANGGA</td>
                    <td width="50%"></td>
                    <td align="center" width="150">KEPALA DESA </td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr><td>&nbsp;</td></tr>
                <tr><td>&nbsp;</td></tr>
                <tr><td>&nbsp;</td></tr>
                <tr>
                    <td width="25%" align="center">{{ $detail->getDataPenduduk->nama }}</td>
                    <td width="50%"></td>
                    <td width="25%" align="center" width="150">MUHAMMAD ILHAM </td>
                </tr>
            </table>
        </div>
        <label>Tanggal cetak : &nbsp; </label>{{ Carbon::now()->isoFormat('D MMMM Y') }}</div>
        <div id="aside"></div>
    </div>
</body>

</html>
