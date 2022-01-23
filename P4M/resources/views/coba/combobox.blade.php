@extends('admin.layouts.main')

@section('title', 'Dashboard')

@section('page_content')

<section class="content">
    <div class="form-group">
        <label for="id_dusun">Dusun</label>
        <select name="id_dusun" id="id_dusun" class="form-control">
            <option value="">Pilih Dusun</option>
            @foreach ($dusun as $d)
            <option value="{{ $d->id }}">{{ $d->dusun }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="id_rw">RW</label>
        <select name="id_rw" id="id_rw" class="form-control"></select>
    </div>
    <div class="form-group">
        <label for="id_rt">RT</label>
        <select name="id_rt" id="id_rt" class="form-control"></select>
    </div>
</section>

@endsection


@section('page_scripts')
<script>
    $(document).ready(function () {
        $("#id_dusun").change(function () {
            let id_dusun = $(this).val();

            $.ajax({
                type: "POST",
                url: "{{ url('page/admin/dashboard/coba/combobox/ambil-rw') }}",
                data: { id_dusun: id_dusun },
                success: function(data){
                    $("#id_rw").html(data);
                }
            });
        })
        $("#id_rw").change(function () {
            let id_rw = $(this).val();

            $.ajax({
                type: "POST",
                url: "{{ url('page/admin/dashboard/coba/combobox/ambil-rt') }}",
                data: { id_rw: id_rw },
                success: function(data){
                    $("#id_rt").html(data);
                }
            });
        })
    })
</script>
@endsection
