@extends('pengunjung/layouts/main')

@section('title', 'Permohonan Surat')

@section('page_content')

<div id="printableArea">

    <div class="single_page_area" style="margin-bottom:10px;">
        <h2 class="post_title" style="font-family: Oswald; margin-bottom: 3rem;">@yield('title')</h2>

        <h5 style="margin-bottom: 2rem">Silahkan lengkapi semua isian sesuai dengan data yang diperlukan</h5>

        <form action="">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" name="nik" id="nik">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenis_surat">Pilih Jenis Surat</label>
                        <select name="jenis_surat" id="jenis_surat" class="form-control">
                            <option value="">Surat Keterangan Domisili</option>
                            <option value="">Surat Keterangan Tidak Mampu</option>
                            <option value="">Surat Keterangan Usaha</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control" rows="5"></textarea>
            </div>
            <div class="form-group">
                <button type="reset" class="btn btn-warning"><i class="fa fa-refresh"></i> Reset</button>
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-paper-plane"></i> Kirim</button>
            </div>
        </form>
    </div>
</div>

@endsection
