@extends('admin.layouts.main')

@section('title', 'Sarana Agama')

@section('page_content')

@php
    function selected($a, $b, $opt=0)
	{
		if ($a == $b)
		{
			if ($opt)
				echo "checked='checked'";
			else echo "selected='selected'";
		}
	}
@endphp

<section class="content-header">
    <h1>
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li><a href="/page/admin">Dashboard</a></li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <a href="{{ url('/page/admin/program_bantuan') }}" class="btn btn-social btn-primary btn-flat btn-sm">
                        <i class="fa fa-arrow-left"></i> Kembali ke Daftar Program Bantuan
                    </a>
                    <a href="{{ url('/page/admin/program_bantuan/'.$detail->id.'/rincian') }}" class="btn btn-social btn-info btn-flat btn-sm">
                        <i class="fa fa-arrow-left"></i> Kembali ke Rincian Program Bantuan
                    </a>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h5>
                                <b>Rincian Program</b>
                            </h5>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <tbody>
                                        <tr>
                                            <td width="20%">Nama Program</td>
                                            <td width="1%">:</td>
                                            <td>
                                                {{ $detail->nama }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sasaran Peserta</td>
                                            <td>:</td>
                                            <td>
                                                @if ($detail->sasaran == 1)
                                                Penduduk Perorangan
                                                @elseif ($detail->sasaran == 2)
                                                Keluarga - KK
                                                @elseif ($detail->sasaran == 3)
                                                Rumah Tangga
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Masa Berlaku</td>
                                            <td>:</td>
                                            <td>
                                                {{ $detail->tanggal_mulai }} - {{ $detail->tanggal_berakhir }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <td>
                                                {{ $detail->deskripsi }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <h5>
                                        <b>Tambah Peserta Program</b>
                                    </h5>
                                    <hr>
                                    <form id="main" name="main" method="POST" class="form-horizontal">
                                        @method("PUT")
                                        @csrf
                                        <div class="form-group">
                                            <label for="" class="col-sm-4 col-lg-3 "> Cari Nama Kepala Rumah Tangga</label>
                                            <div class="col-sm-8">
                                                <select name="" id="" class="form-control input-sm select2" onchange="formAction('main')" width="100%">
                                                    <option value="">- Pilih -</option>
                                                    @foreach ($data_keluarga as $keluarga)
                                                        <option value="{{ $keluarga->getDataPenduduk->nik }}">
                                                            {{ $keluarga->getDataPenduduk->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @foreach ($data_keluarga as $keluarga)
                                            @if ($keluarga->getDataPenduduk->nik)
                                                Hmae
                                            @endif
                                        @endforeach
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('page_scripts')

<script>
    function formAction(idForm, action, target = '')
    {
        if (target != '')
        {
            $('#'+idForm).attr('target', target);
        }
        $('#'+idForm).attr('action', action);
        console.log();
        $('#'+idForm).submit();
    }
</script>

@endsection
