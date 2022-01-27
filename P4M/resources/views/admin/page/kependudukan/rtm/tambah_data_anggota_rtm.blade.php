<input type="hidden" name="no_kk" value="{{ $edit->no_kk }}">
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover" width="100%">
        <thead class="bg-purple">
            <th class="text-center">No.</th>
            <th>NIK</th>
            <th>Nama</th>
            <th class="text-center">Hubungan</th>
        </thead>
        <tbody>
            @php
                use App\Models\Model\Penduduk;
                $data_penduduk = Penduduk::where("id_rtm", $edit->no_kk)->get();
            @endphp
            @foreach ($data_penduduk as $penduduk)
            <tr>
                <td class="text-center">{{ $loop->iteration }}.</td>
                <td>{{ $penduduk->nik }}</td>
                <td>{{ $penduduk->nama }}</td>
                <td class="text-center">{{ $penduduk->getHubunganRtm->nama }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="form-group">
    <label for="selectPenduduk"> NIK / Nama Penduduk </label>
    <select name="id_penduduk" id="selectPenduduk" class="form-control input-sm select2" width="100%">
        <option value="">- Pilih -</option>
        @php
            $getData = Penduduk::where("id_rtm", NULL)->get();
        @endphp
        @foreach ($getData as $data)
        <option value="{{ $data->id }}">
            NIK : {{ $data->nik }} - {{ $data->nama }} - {{ $data->getHubungan->nama }}
        </option>
        @endforeach
    </select>
</div>

<script>
    $(function() {
        $("#selectPenduduk").select2()
    });
</script>
