<div class="form-group">
    <label for="no_kk"> Nomor KK </label>
    <input type="text" name="no_kk" id="no_kk" class="form-control input-sm" placeholder="Masukkan No. KK" value="{{ $edit->no_kk }}">
</div>
<div class="form-group">
    <label for="alamat"> Alamat </label>
    <textarea name="alamat" id="alamat" class="form-control input-sm" cols="30" rows="5" placeholder="Alamat Jalan / Perumahan">{{ $edit->alamat }}</textarea>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
<<<<<<< HEAD
            <label for="dusun"> Dusun </label>
            <select name="dusun" id="dusun" class="form-control input-sm select2">
                <option value="">- Pilih -</option>
                @foreach ($data_desa as $dusun)
                    @if ($edit->getPenduduk->id_dusun == $dusun->id)
                    <option value="{{ $edit->id }}" selected>
                        {{ $dusun->dusun }}
                    </option>
                    @else
                    <option value="{{ $dusun->id }}">
                        {{ $dusun->dusun }}
                    </option>
                    @endif
=======
            <label for="id_dusun">Dusun</label>
            <select name="id_dusun" id="id_dusun" class="form-control input-sm select2" width="100%">
                <option value="">Pilih Dusun</option>
                @foreach ($data_dusun as $d)
                <option value="{{ $d->id }}">
                    {{ $d->dusun }}
                </option>
>>>>>>> 8918f43dab49aba578a29652befe7e02b06f8e58
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group" id="rw"></div>
    </div>

    <div class="col-md-4">
        <div class="form-group" id="rt"></div>
    </div>
</div>
<div class="form-group">
    <label for="tanggal_cetak"> Tanggal Cetak Kartu Keluarga </label>
    <input type="date" name="tanggal_cetak" id="tanggal_cetak" class="form-control input-sm">
</div>
<div class="form-group">
    <label for="kelas_sosial"> Kelas Sosial </label>
    <select name="kelas_sosial" id="kelas_sosial" class="form-control input-sm">
        <option value="">- Pilih -</option>
        @foreach ($data_keluarga_sejahtera as $data)
        <option value="{{ $data->id }}">
            {{ $data->nama }}
        </option>
        @endforeach
    </select>
</div>


<script>
    $(".select2").select2();
    $(document).ready(function () {
        $("#id_dusun").change(function () {
            let id_dusun = $(this).val();

            $.ajax({
                type: "POST",
                url: "{{ url('page/admin/dashboard/coba/combobox/ambil-rw') }}",
                data: { id_dusun: id_dusun },
                success: function(data){
                    $("#rw").html(data);
                }
            });
        })
    })
</script>
