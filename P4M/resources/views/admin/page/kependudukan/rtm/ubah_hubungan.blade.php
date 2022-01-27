<div class="form-group">
    <label for="id_hubungan"> Hubungan </label>
    <select name="" id="" class="form-control input-sm select2" width="100%">
        <option value="">- Pilih -</option>
        @foreach ($data_rtm_hubungan as $data)
            <option value="{{ $data->id }}">
                {{ $data->nama }}
            </option>
        @endforeach
    </select>
</div>
