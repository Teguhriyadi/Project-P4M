<label for="id_rt">RT</label>
<select name="id_rt" id="id_rt" class="form-control">
    <option value="">Pilih RT</option>
    @foreach ($rt as $r)
    <option value="{{ $r->id }}">{{ $r->rt }}</option>
    @endforeach
</select>
