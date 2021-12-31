@extends('pengunjung/layouts/main')

@section('title', 'Kontak')

@section('page_content')

<div class="row mt-5">
    <div class="col-md-6">
        <div id="widget">
            <div class="widget">
                <div class="widget_title">
                    Kontak
                </div>
                <div class="widget_body">
                    @foreach ($data_alamat as $alamat)
                    <b>Alamat :</b>
                    <p>{{ $alamat->alamat }}</p>
                    <b><i class="fa fa-phone"></i> Telepon :</b>
                    <p> {{ $alamat->no_telepon }} </p>
                    <b><i class="fa fa-desktop"></i> Website :</b>
                    <p>{{ $alamat->website }}</p>
                    @endforeach
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
