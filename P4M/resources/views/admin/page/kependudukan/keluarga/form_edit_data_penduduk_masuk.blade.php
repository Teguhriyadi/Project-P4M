<div class="form-group">
    <label for="no_kk"> Nomor KK </label>
    <input type="text" name="no_kk" id="no_kk" class="form-control input-sm" placeholder="Masukkan No. KK">
</div>
<div class="form-group">
    <label for="alamat"> Alamat </label>
    <textarea name="alamat" id="alamat" class="form-control input-sm" cols="30" rows="5" placeholder="Alamat Jalan / Perumahan"></textarea>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="dusun"> Dusun </label>
            <select name="dusun" id="dusun" class="form-control input-sm select2">
                <option value="">- Pilih -</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="rw"> RW </label>
            <select name="rw" id="rw" class="form-control input-sm">
                <option value="">- Pilih -</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="rt"> RT </label>
            <select name="rt" id="rt" class="form-control input-sm">
                <option value="">- Pilih -</option>
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="tanggal_cetak"> Tanggal Cetak Kartu Keluarga </label>
    <input type="date" name="tanggal_cetak" id="tanggal_cetak" class="form-control input-sm">
</div>
<div class="form-group">
    <label for="kelas_sosial"> Kelas Sosial </label>
    <select name="" id="" class="form-control input-sm">
        <option value="">- Pilih -</option>
        @foreach ($data_keluarga_sejahtera as $data)
        <option value="{{ $data->id }}">
            {{ $data->nama }}
        </option>
        @endforeach
    </select>
</div>
