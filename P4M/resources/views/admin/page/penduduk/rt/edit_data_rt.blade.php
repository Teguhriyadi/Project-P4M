<input type="hidden" name="id" value="{{ $edit->id }}">
<div class="form-group">
    <label for="id_rw">RW</label>
    <select class="form-control select2" name="id_rw" id="id_rw">
        <option value="">- Silahkan cari RW -</option>
        @foreach ($data_rw as $rw)
            <option value="{{ $rw->id }}" {{ $rw->id == $edit->id_rw ? 'selected' : '' }}>{{ $rw->rw }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="rt"> RT </label>
    <input type="text" class="form-control" name="rt" id="rt" placeholder="Masukkan RT" value="{{ $edit->rt }}">
</div>
<script>
    $(function() {
        $(".select2").select2()
    });
</script>
