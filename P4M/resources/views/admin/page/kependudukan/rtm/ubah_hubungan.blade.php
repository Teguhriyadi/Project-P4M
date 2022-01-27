<input type="hidden" name="id_penduduk" value="{{ $edit->id }}">
<div class="form-group">
    <label for="idHubungan"> Hubungan </label>
    <select name="idHubungan" id="idHubungan" class="form-control input-sm select2" width="100%">
        <option value="">- Pilih -</option>
        @foreach ($data_rtm_hubungan as $data)
        <option value="{{ $data->id }}" {{ ($edit->rtm_level == $data->id) ? 'selected' : '' }} >
            {{ $data->nama }}
        </option>
        @endforeach
    </select>
</div>

<script type="text/javascript">
    $(function() {
        $("#idHubungan").select2()
    });
</script>
