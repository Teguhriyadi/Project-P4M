<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="form-group">
    <label for="jenis_organisasi"> Jenis Organisasi </label>
    <input type="text" class="form-control" name="jenis_organisasi" id="jenis_organisasi" value="{{ $edit->jenis_organisasi }}" >
</div>
<div class="form-group">
    <label for="jumlah_anggota"> Jumlah Anggota </label>
    <input type="text" class="form-control" name="jumlah_anggota" id="jumlah_anggota" value="{{ $edit->jumlah_anggota }}" >
</div>
<div class="form-group">
    <label for="lokasi"> Lokasi </label>
    <input type="text" class="form-control" name="lokasi_sdk" id="lokasi"  value="{{ $edit->lokasi == NULL ? '-' : $edit->lokasi }}">
</div>
