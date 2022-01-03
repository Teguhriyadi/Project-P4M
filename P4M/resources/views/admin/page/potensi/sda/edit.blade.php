<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="form-group">
    <label for="jenis"> Jenis </label>
    <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Masukkan Data Jenis" value="{{ $edit->jenis }}">
</div>
<div class="form-group">
    <label for="luas"> Luas </label>
    <input type="text" class="form-control" name="luas" id="luas" placeholder="0" value="{{ $edit->luas }}">
</div>
<div class="form-group">
    <label for="lokasi"> Lokasi </label>
    <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Masukkan Data Lokasi" value="{{ $edit->lokasi }}">
</div>
