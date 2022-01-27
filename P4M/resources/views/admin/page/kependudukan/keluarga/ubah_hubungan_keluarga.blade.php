<input type="hidden" name="id_penduduk" value="{{ $detail->id }}">
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <td width="40%">NIK</td>
                <td width="60%">
                    : {{ $detail->nik }}
                </td>
            </tr>
            <tr>
                <td>Nama Penduduk</td>
                <td>
                    : {{ $detail->nama }}
                </td>
            </tr>
        </tbody>
    </table>
</div>

<hr>

<div class="form-group">
    <label for="kk_level"> Hubungan </label>
    <select name="kk_level" id="kk_level" class="form-control input-sm select2" width="100%">
        <option value="">--- PILIH HUBUNGAN ---</option>
        @foreach ($data_hubungan as $data)
        <option value="{{ $data->id }}" {{ $detail->kk_level == $data->id ? 'selected' : '' }} >
            {{ $data->nama }}
        </option>
        @endforeach
    </select>
</div>

<script type="text/javascript">
$(".select2").select2();
</script>
