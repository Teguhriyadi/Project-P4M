<label for="id_rw">RW</label>
<select name="id_rw" id="id_rw" class="form-control">
    <option value="">Pilih RW</option>
    @foreach ($rw as $r)
    <option value="{{ $r->id }}">{{ $r->rw }}</option>
    @endforeach
</select>

<script>
    $("#id_rw").change(function () {
        let id_rw = $(this).val();

        $.ajax({
            type: "POST",
            url: "{{ url('page/admin/dashboard/coba/combobox/ambil-rt') }}",
            data: { id_rw: id_rw },
            success: function(data){
                $("#rt").html(data);
            }
        });
    })
</script>
