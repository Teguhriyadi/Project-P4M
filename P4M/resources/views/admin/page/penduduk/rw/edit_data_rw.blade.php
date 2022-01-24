<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="form-group">
    <label for="idDusun">Dusun</label>
    <select name="id_dusun" id="idDusun" class="form-control input-sm select2" style="width: 100%">
        <option value="">- Pilih -</option>
        @foreach ($data_dusun as $dusun)
        <option value="{{ $dusun->id }}" {{ $edit->id_dusun == $dusun->id ? "selected" : '' }}>
            {{ $dusun->dusun }}
        </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="rw"> RW </label>
    <input type="text" class="form-control" name="rw" id="rw" placeholder="Masukkan RW" value="{{ $edit->rw }}">
</div>

<script type="text/javascript">
    $(function() {
        $("#idDusun").select2()
    });
</script>
