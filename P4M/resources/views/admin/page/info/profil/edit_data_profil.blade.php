<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="form-group">
    <label for="batas"> Batas </label>
    <input type="text" class="form-control" name="batas" id="batas" placeholder="Batas" value="{{ $edit->batas }}">
</div>
<div class="form-group">
    <label for="desa"> Desa </label>
    <input type="text" class="form-control" name="desa" id="desa" placeholder="Masukkan Nama Desa" value="{{ $edit->desa }}">
</div>
<div class="form-group">
    <label for="kecamatan"> Kecamatan </label>
    <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="{{ $edit->kecamatan }}">
</div>
