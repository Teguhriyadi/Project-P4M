<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="form-group">
    <label for="id_dusun">Dusun</label>
    <select name="id_dusun" id="id_dusun" class="form-control">
        @foreach ($data_dusun as $dusun)
        <option value="{{ $dusun->id }}" {{ $edit->id_dusun == $dusun->id ? "selected" : '' }}>{{ $dusun->dusun }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="rw"> RW </label>
    <input type="text" class="form-control" name="rw" id="rw" placeholder="Masukkan RW" value="{{ $edit->rw }}">
</div>
