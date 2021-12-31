@extends('admin.layouts.main')

@section('page_content')

<section class="content-header">
    <h1>
        Info Profil Desa
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
        </li>
        <li class="active">Data Info Alamat</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            @if ($data_visi_misi->count())
                @foreach ($data_visi_misi as $visi_misi)
                <form action="{{ url('/page/admin/visi_misi') }}/{{ $visi_misi->id }}" method="POST">
                    @method("PUT")
                @endforeach
            @else
            <form action="{{ url('/page/admin/visi_misi') }}" method="POST">
            @endif
                @csrf
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">
                            @if ($data_visi_misi->count())
                            <i class="fa fa-edit"></i> Edit Visi & Misi
                            @else
                            <i class="fa fa-plus"></i> Tambah Data Visi & Misi
                            @endif
                        </h3>
                    </div>
                    <div class="box-body">
                        @if ($data_visi_misi->count())
                            @foreach ($data_visi_misi as $visi_misi)
                            <div class="form-group">
                                <textarea name="visi" id="visi" cols="80" rows="10">
                                    {{ $visi_misi->visi }}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <textarea name="misi" id="misi" cols="80" rows="10">
                                    {{ $visi_misi->misi }}
                                </textarea>
                            </div>
                            @endforeach
                        @else
                        <div class="form-group">
                            <textarea name="visi" id="visi" cols="80" rows="10">
                                Visi
                            </textarea>
                        </div>
                        <div class="form-group">
                            <textarea name="misi" id="misi" cols="80" rows="10">
                                Misi
                            </textarea>
                        </div>
                        @endif
                    </div>
                    <div class="box-footer">
                        @if ($data_visi_misi->count())
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-edit"></i> Simpan
                        </button>
                        @else
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                        @endif
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-refresh"></i> Batal
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@section('page_scripts')

<script src="{{ url('/backend/template') }}/bower_components/ckeditor/ckeditor.js"></script>

<script type="text/javascript">

    $(function() {
        CKEDITOR.replace('visi'),
        CKEDITOR.replace('misi')
    })

</script>

@endsection
