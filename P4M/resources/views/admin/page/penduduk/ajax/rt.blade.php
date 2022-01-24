<label for="id_rt">RT</label>
<select name="id_rt" id="id_rt" class="form-control input-sm select2" width="100%">
    <option value="">Pilih RT</option>
    @foreach ($rt as $r)
    <option value="{{ $r->id }}">
        {{ $r->rt }}
    </option>
    @endforeach
</select>

<script type="text/javascript">
    $(function() {
        $("#id_rt").select2()
    });
</script>
