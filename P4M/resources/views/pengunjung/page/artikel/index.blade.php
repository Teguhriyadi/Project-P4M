@extends('pengunjung/layouts/main')

@section('page_content')

@php
    use Illuminate\Support\Str;
@endphp

<div id="artikel"></div>

@endsection

@section('page_scripts')

<script>
    loadArtikel();

    function search() {
        let value = $("#cari").val().trim();

        $.ajax({
            url:'/artikel/load',
            type:'POST',
            data: {term: value, _token: '{{ csrf_token() }}'},
            success: function(response){

                $("#artikel").empty();
                $("#artikel").html(response);

            }
        });
    }

    function loadArtikel() {
        $.get('/artikel/load', function (data) {
            $("#artikel").html(data);
        })
    }
</script>

@endsection
