<input type="hidden" name="no_kk" value="{{ $detail->no_kk }}">
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover" width="100%">
        <thead class="bg-purple">
            <tr>
                <th class="text-center">No.</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Hubungan</th>
            </tr>
        </thead>
        <tbody>
            @php
                use App\Models\Model\Penduduk;
                $getData = Penduduk::where("id_rtm", $detail->no_kk)->get();
            @endphp
            @foreach ($getData as $data)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}.</td>
                    <td>{{ $data->nik }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->getHubunganRtm->nama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="form-group">
    <label for="nikKepala"> NIK / Nama Penduduk </label>
    <select name="nik" id="nikKepala" class="form-control input-sm select2" width="100%">
        <option value="">- Pilih -</option>
        @php
            $ambilData = Penduduk::where("id_rtm", NULL)->get();
        @endphp
        @forelse ($ambilData as $ambil)
            <option value="{{ $ambil->id }}">
                NIK : {{ $ambil->nik }} - {{ $ambil->nama }} - {{ $ambil->getHubungan->nama }}
            </option>
        @empty
            <option disabled>
                DATA TIDAK ADA
            </option>
        @endforelse
    </select>
</div>

<script>
    $(function() {
        $("#nikKepala").select2()
    });
</script>
