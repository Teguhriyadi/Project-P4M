<link rel="stylesheet" href="{{ url('backend/template/plugins/timepicker/bootstrap-timepicker.min.css') }}">

<input type="hidden" name="id_penduduk" value="{{ $edit->id }}">
<div class="form-group">
    <label for="status">Status Dasar Baru</label>
    <select name="status_dasar" id="status_dasar" class="form-control input-sm select2" width="100%">
        <option value="">- Pilih -</option>
        @foreach ($data_status_dasar as $status_dasar)
        <option value="{{ $status_dasar->id }}">
            {{ $status_dasar->nama  }}
        </option>
        @endforeach
    </select>
</div>
<div class="form-group mati">
    <label for="tempat_meninggal">Tempat Meninggal</label>
    <input type="text" class="form-control input-sm" name="meninggal_di" id="meninggal_di">
</div>
<div class="form-group pindah">
    <div class="form-group">
        <label for="tujuan_pindah">Tujuan Pindah</label>
        <select name="ref_pindah" class="form-control input-sm select2">
            <option value="">- Pilih -</option>
            @foreach ($data_ref_pindah as $ref_pindah)
            <option value="{{ $ref_pindah->id }}">
                {{ $ref_pindah->nama }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="alamat_tujuan">Alamat Tujuan Pindah</label>
        <textarea name="alamat_tujuan" id="alamat_tujuan" class="form-control input-sm" placeholder="Alamat Tujuan Pindah"></textarea>
    </div>
</div>
<div class="form-group">
    <label for="tgl_peristiwa">Tanggal Peristiwa</label>
    <div class="input-group input-group-sm date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input type="text" class="form-control input-sm pull-right tgl_minimal" id="tgl_1" name="tgl_peristiwa">
    </div>
</div>
<div class="form-group">
    <label for="tgl_laporan">Tanggal Laporan</label>
    <div class="input-group input-group-sm date">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input type="text" class="form-control input-sm pull-right tgl_minimal" id="tgl_lapor" name="tgl_lapor">
    </div>
</div>
<div class="form-group">
    <label for="catatan">Catatan</label>
    <textarea name="catatan" id="catatan" class="form-control input-sm"></textarea>
    <span>
        *mati/hilang terangkan penyebabnya, pindah tuliskan alamt pindah
    </span>
</div>

<script src="{{ url('backend/template/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ url('backend/template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('backend/template/plugins/timepicker/bootstrap-datetimepicker.min.js') }}"></script>


<script type="text/javascript">
    $(function() {
        $("#status_dasar").select2()
    });
</script>

<script>
    $('#tgl_1').datetimepicker(
	{
		format: 'YYYY-MM-DD',
		locale:'id'
	});
	$('#tgl_lapor').datetimepicker(
	{
		format: 'YYYY-MM-DD',
		locale:'id'
	});
    $('document').ready(function()
    {
        $('#status_dasar').change(function()
        {
            if ($(this).val() == '3' || $(this).val() == '2')
            {
                if ($(this).val() == '3')
                {
                    $('.pindah').show();
                    $("select[name='ref_pindah']").addClass('required');
                    $("textarea[name='alamat_tujuan']").addClass('required');
                    $('.mati').hide();
                    $("input[name='meninggal_di']").removeClass('required');
                }
                else
                {
                    $('.mati').show();
                    $("input[name='meninggal_di']").addClass('required');
                    $('.pindah').hide();
                    $("select[name='ref_pindah']").removeClass('required');
                    $("textarea[name='alamat_tujuan']").removeClass('required');
                }
            }
            else
            {
                $('.pindah').hide();
                $("select[name='ref_pindah']").removeClass('required');
                $("textarea[name='alamat_tujuan']").removeClass('required');
                $('.mati').hide();
                $("input[name='meninggal_di']").removeClass('required');
            }
        });
        $('#status_dasar').trigger('change');

        setTimeout(function() {
            $("#tgl_lapor").rules('add', {
                tgl_lebih_besar: "input[name='tgl_peristiwa']",
                messages: {
                    tgl_lebih_besar: "Tanggal lapor harus sama atau lebih besar dari tanggal peristiwa."
                }
            })
        }, 500);
    });
</script>
