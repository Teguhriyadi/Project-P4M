@extends('pengunjung/layouts/main')

@section('title', 'Kontak')

@section('page_content')

<div class="row">
    <div class="col-md-6">
        <div id="widget">
            <div class="widget">
                <div class="widget_title">
                    Kontak
                </div>
                <div class="widget_body">
                    <b>Alamat :</b>
                    <p>Arahan Lor kecamatan Arahan, Indramayu, Jawa Barat, Indonesia.</p>
                    <b><i class="fa fa-phone"></i> Telepon :</b>
                    <p>0000000</p>
                    <b><i class="fa fa-desktop"></i> Website :</b>
                    <p>arahanlor.go.id</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div id="main">
            <div class="main">
                <div class="main_title">
                    Kontak
                </div>
                <div class="main_body">
                    <div class="row mt-3">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <form action="{{ url('/kirim_pesan') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Anda *" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Anda *" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor Telepon Anda *" required>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="pesan" id="pesan" rows="8" placeholder="Pesan *" required></textarea>
                                </div>
                                <button type="submit" value="submit" name="submit" class="btn btn-primary">
                                    KIRIM
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
