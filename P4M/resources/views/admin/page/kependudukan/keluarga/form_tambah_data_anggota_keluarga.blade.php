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

                $data_penduduk = Penduduk::where("id_kk", $detail->id_kk)
                ->where("id_hubungan", "!=", NULL)
                ->get();
            @endphp

            @foreach ($data_penduduk as $data)
            <tr>
                <td class="text-center">{{ $loop->iteration }}.</td>
                <td class="text-center">{{ $data->nik }}</td>
                <td>{{ $data->nama }}</td>
                <td class="text-center">{{ $data->getHubungan->nama }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="form-group">
    <label for=""> NIK / Nama Penduduk <span>(dari penduduk yang tidak memiliki KK)</span> </label>
    <select name="" id="" class="form-control input-sm select2" width="100%">
        <option value="">- Pilih -</option>
        @php
            $getPenduduk = DB::table("tb_penduduk")
                        ->where("id_kk", $detail->id_kk)
                        ->where("id_hubungan", NULL)
                        ->get();
        @endphp
        @foreach ($getPenduduk as $data)
        <option value="">
            {{ $data->nama }}
        </option>
        @endforeach
    </select>
</div>
