<input type="hidden" name="id_kk" value="{{ $detail->nik_kepala }}">
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover" width="100%">
        <thead class="bg-purple">
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">NIK</th>
                <th>Nama</th>
                <th class="text-center">Hubungan</th>
            </tr>
        </thead>
        <tbody>
            @php
                use App\Models\Model\Penduduk;

                $data_penduduk = Penduduk::where("id_kk", $detail->nik_kepala)
                ->where("id_kk", "!=", NULL)
                ->get();
            @endphp

            @foreach ($data_penduduk as $data)
            <tr>
                <td class="text-center">{{ $loop->iteration }}.</td>
                <td class="text-center">{{ $data->nik }}</td>
                <td>{{ $data->nama }}</td>
                <td class="text-center">
                    @if (empty($data->getHubungan->nama))
                    <i>
                        <b>
                            BELUM TERISI
                        </b>
                    </i>
                    @else
                    {{ $data->getHubungan->nama }}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="form-group">
    <label for="selectPenduduk"> NIK / Nama Penduduk <span>(dari penduduk yang tidak memiliki KK)</span> </label>
    <select name="id_penduduk" id="selectPenduduk" class="form-control input-sm select2" width="100%">
        <option value="">- Pilih -</option>
        @php
            $getPenduduk = Penduduk::where("id_kk", NULL)
            ->where("kk_level", "!=", 1)
            ->get();
        @endphp
        @forelse($getPenduduk as $data)
        <option value="{{ $data->id }}">
            NIK : {{ $data->nik }} - {{ $data->nama }} - {{ $data->getHubungan->nama }}
        </option>
        @empty
        <option disabled>
            Tidak Ada Data
        </option>
        @endforelse
    </select>
</div>

<script>
    $(function() {
        $("#selectPenduduk").select2()
    });
</script>
