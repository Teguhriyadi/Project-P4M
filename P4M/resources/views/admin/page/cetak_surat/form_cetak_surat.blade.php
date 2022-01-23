@extends('admin.layouts.main')

@section('title', 'Keluarga')

@section('page_content')

<section class="content-header">
    <h1>
        @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
        </li>
        <li class="active">@yield('title')</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <a href="{{ url('/page/admin/cetak_surat') }}" class="btn btn-social btn-info btn-flat btn-sm">
                        <i class="fa fa-arrow-left"></i> Kembali ke Daftar Cetak Surat
                    </a>
                </div>
                <form id="main" name="main" method="POST" class="form-horizontal">
                    @method("PUT")
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-4 col-lg-4"> NIK / Nama </label>
                            <div class="col-sm-8">
                                <select name="id_penduduk" id="id_penduduk" class="form-control input-sm select2" width="100%" onchange="formAction('main')">
                                    <option value="">-- Cari NIK / Nama Penduduk /</option>
                                    @foreach ($data_penduduk as $penduduk)
                                    <option value="{{ $penduduk->id }}">
                                        {{ $penduduk->nama }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-4 col-lg-4"> Tempat / Tanggal Lahir / Umur </label>
                            <div class="col-sm-4">
                                <input type="text" name="" id="" class="form-control input-sm" value="">
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="" id="" class="form-control input-sm">
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="" id="" class="form-control input-sm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-4 col-lg-4"> Alamat </label>
                            <div class="col-sm-8">
                                <input type="text" name="" id="" class="form-control input-sm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-4 col-lg-4"> Pendidikan / Warga Negara / Agama </label>
                            <div class="col-sm-4">
                                <input type="text" name="" id="" class="form-control input-sm">
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="" id="" class="form-control input-sm">
                            </div>
                            <div class="col-sm-2">
                                <input type="text" name="" id="" class="form-control input-sm">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-4 col-lg-4"> Nomor Surat </label>
                            <div class="col-sm-8">
                                <input type="text" name="" id="" class="form-control input-sm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-4 col-lg-4"> Keperluan </label>
                            <div class="col-sm-8">
                                <textarea name="" id="" rows="3" class="form-control input-sm" placeholder="Keperluan"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-4 col-lg-4"> Keterangan </label>
                            <div class="col-sm-8">
                                <textarea name="" id="" rows="3" class="form-control input-sm" placeholder="Keterangan"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-4 col-lg-4"> Berlaku Dari - Sampai </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control input-sm">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control input-sm">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-4 col-lg-4"> Tertanda Atas Nama </label>
                            <div class="col-sm-8">
                                <select name="" id="" class="form-control input-sm select2" width="100%"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-4 col-lg-4"> Staf Pemerintah Desa </label>
                            <div class="col-sm-8">
                                <select name="" id="" class="form-control input-sm select2" width="100%"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-4 col-lg-4"> Menjabat Sebagai </label>
                            <div class="col-sm-8">
                                <select name="" id="" class="form-control input-sm select2" width="100%"></select>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="reset" class="btn btn-social btn-danger btn-flat btn-sm">
                            <i class="fa fa-times"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-social bg-purple btn-flat btn-sm pull-right">
                            <i class="fa fa-file-word-o"></i> Unduh RTF
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@section('page_scripts')

<script type="text/javascript">
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
