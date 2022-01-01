@extends('pengunjung/layouts/main')

@section('title', 'Data Desa')

@section('page_content')

<div class="row mt-5">
    <div class="col-md-8">
        <div id="main">
            <div class="main">
                <div class="main_body">
                    <h2>Data Penduduk (Tahun <span id="tahunDiTuju">{{ date('Y') }}</span>)</h2>
                    <br>
                    <select class="form-control" name="tahun" id="tahun">
                        <option value="">Pilih Tahun</option>
                        @for ($i = 2015; $i <= date('Y'); $i++)    
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tablePenduduk">
                            <thead>
                                <tr>
                                    <th>RW/Dusun</th>
                                    <th>Laki-Laki</th>
                                    <th>Perempuan</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
    </div>
    
    @include('pengunjung/page/data_desa/submenu')
    
</div>

<script>
    loadData({{ date('Y') }});

    function loadData(tahun){
        let table = document.getElementById('tablePenduduk').getElementsByTagName('tbody')[0];
        table.innerHTML = '';

        $.ajax({
            url: '{{ url("data-desa/rt-rw") }}',
            type: "post",
            data: {
                tahun: tahun,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.length > 0) {
                    for(let key in response) {
                        if(response.hasOwnProperty(key)) {
                            let val = response[key];

                            let newRow = table.insertRow(-1);
                            let dusunCell = newRow.insertCell(0);
                            let lakiCell = newRow.insertCell(1);
                            let perempuanCell = newRow.insertCell(2);
                            let jumlahCell = newRow.insertCell(3);

                            dusunCell.innerHTML = val['dusun'];
                            lakiCell.innerHTML = val['laki_laki'];
                            perempuanCell.innerHTML = val['perempuan'];
                            jumlahCell.innerHTML = val['jumlah'];
                        }
                    }
                } else {
                    let newRow = table.insertRow(0);
                    let emptyCell = newRow.insertCell(0);
                    emptyCell.colSpan = "4";
                    emptyCell.innerHTML = "Tidak ada data";
                }
            }
        })
    }

    $(document).ready(function() {
        $("#tahun").on('change', function() {
            let tahun = $(this).val();
            $("#tahunDiTuju").html(tahun);
            loadData(tahun);
        })
    })
</script>

@endsection
