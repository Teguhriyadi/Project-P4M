<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="form-group">
    <label for="batas"> Batas </label>
    <input type="text" class="form-control input-sm" name="batas" id="batas" placeholder="Masukkan Batas" value="{{ $edit->batas }}">
</div>
<div class="form-group">
    <label for="desa"> Desa </label>
    <input type="text" class="form-control input-sm" name="desa" id="desa" placeholder="Masukkan Nama Desa" value="{{ $edit->desa }}">
</div>
<div class="form-group">
    <label for="kecamatan"> Kecamatan </label>
    <input type="text" class="form-control input-sm" name="kecamatan" id="kecamatan" placeholder="Masukkan Nama Kecamatan" value="{{ $edit->kecamatan }}">
</div>
