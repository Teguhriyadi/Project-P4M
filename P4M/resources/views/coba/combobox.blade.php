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
    <div class="form-group" id="rw"></div>
    <div class="form-group" id="rt"></div>
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
                    $("#rw").html(data);
                }
            });
        })
    })
</script>
@endsection
