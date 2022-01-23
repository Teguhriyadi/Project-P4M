<h4>
    Identitas Pada Kartu Peserta
</h4>
<hr>

<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="form-group">
    <label for="no_id_kartu" class="col-sm-4 col-lg-4"> Nomor Kartu Peserta </label>
    <div class="col-sm-8">
        <input type="text" name="no_id_kartu" id="no_id_kartu" class="form-control input-sm" placeholder="Masukkan Nomor Kartu Peserta" value="{{ $edit->no_id_kartu }}">
    </div>
</div>
<div class="form-group">
    <label for="kartu_peserta" class="col-sm-4 col-lg-4">Gambar Kartu Peserta</label>
    <div class="col-sm-8">
        <input type="file" name="kartu_peserta" id="kartu_peserta" class="form-control input-sm">
        <span class="help-block"><code> Kosongkan jika tidak ingin mengunggah gambar</code></span>
    </div>
</div>
<div class="form-group">
    <label for="kartu_nik" class="col-sm-4 col-lg-4"> NIK </label>
    <div class="col-sm-8">
        <input type="text" name="kartu_nik" id="kartu_nik" class="form-control input-sm" placeholder="Masukkan NIK"  value="{{ $edit->kartu_nik }}">
    </div>
</div>
<div class="form-group">
    <label for="kartu_nama" class="col-sm-4 col-lg-4"> Nama </label>
    <div class="col-sm-8">
        <input type="text" name="kartu_nama" id="kartu_nama" class="form-control input-sm" placeholder="Masukkan Nama" value="{{ $edit->kartu_nama }}">
    </div>
</div>
<div class="form-group">
    <label for="kartu_tempat_lahir" class="col-sm-4 col-lg-4"> Tempat Lahir </label>
    <div class="col-sm-8">
        <input type="text" name="kartu_tempat_lahir" id="kartu_tempat_lahir" class="form-control input-sm" placeholder="Masukkan Tempat Lahir" value="{{ $edit->kartu_tempat_lahir }}">
    </div>
</div>
<div class="form-group">
    <label for="kartu_tanggal_lahir" class="col-sm-4 col-lg-4"> Tanggal Lahir </label>
    <div class="col-sm-8">
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right datepicker" name="kartu_tanggal_lahir" placeholder="Tgl. Lahir" value="{{ $edit->kartu_tanggal_lahir }}">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="kartu_alamat" class="col-sm-4 col-lg-4"> Alamat </label>
    <div class="col-sm-8">
        <input type="text" name="kartu_alamat" id="kartu_alamat" class="form-control input-sm" placeholder="Masukkan Data Alamat" value="{{ $edit->kartu_alamat }}">
    </div>
</div>
