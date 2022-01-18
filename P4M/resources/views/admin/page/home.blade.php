@extends('admin.layouts.main')

@section('title', 'Dashboard')

@section('page_content')

@php
    use Carbon\Carbon;
@endphp

<section class="content-header">
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li class="active">Dashboard</li>
    </ol>
</section>

<section class="content">
    <div class="alert alert-success" style="font-size: 17px">
        Selamat Datang <strong>{{ auth()->user()->name }}</strong>! <br>
        Anda login sebagai <strong>{{ auth()->user()->getHakAkses->nama_hak_akses }}</strong>.
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-6 col-xs-6">
                            <div class="small-box bg-purple">
                                <div class="inner">
                                    <h3>{{ $data_dusun }}</h3>
                                    <p>Jumlah Dusun</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{ url('page/admin/data/dusun') }}" class="small-box-footer">
                                    Selengkapnya <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-6">
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>{{ $data_penduduk }}</h3>
                                    <p>Jumlah Penduduk</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{ url('page/admin/kependudukan/penduduk') }}" class="small-box-footer">
                                    Selengkapnya <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-lg-6 col-xs-6">
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>150</h3>
                                    <p>New Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    Selengkapnya <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-6">
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3>150</h3>
                                    <p>New Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    Selengkapnya <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">
                        Terakhir Login
                    </h3>
                    <div class="pull-right">
                        <a href="{{ url('/page/admin/pengaturan/terakhir_login') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-search"></i> Selengkapnya
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Name</th>
                                    <th class="text-center">Terakhir Login</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_terakhir_login as $terakhir_login)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $terakhir_login->nama }}</td>
                                    <td class="text-center">{{ Carbon::createFromFormat('Y-m-d H:i:s', $terakhir_login->terakhir_login)->isoFormat('LLLL') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">

            <div id="tree"></div>

        </div>
        <div class="col-md-6">

        </div>
    </div>
</section>

<script src="{{ url('/backend/template') }}/bower_components/orgchart/orgchart.js"></script>

<script type='text/javascript'>
    var chart = new OrgChart(document.getElementById("tree"), {
        template: 'mila',
        mouseScrool: OrgChart.action.scroll,
        enableDragDrop: true,
        nodeBinding: {
            field_0: "name",
            field_1: "title",
            img_0: "img"
        },
        nodes: [
        <?php foreach($data_struktur as $struktur) {
            echo '{ id: '.$struktur->id.', pid: '.$struktur->staf_id.', name: "'.$struktur->getPegawai->nama.'", title: "'.$struktur->getJabatan->nama_jabatan.'", img:"/gambar/gambar_user.png" },';
        } ?>
        ]
    });
    chart.on('click', function(sender, args){
        sender.editUI.show(args.node.id, false);
        return false;
    });
    chart.on('drop', function(sender, draggedNodeId, droppedNodeId) {
        $.ajax({
            url: '/page/admin/dashboard_ubah',
            type: 'POST',
            data: {staf_id: droppedNodeId, id: draggedNodeId},
            success: function(response) {
                if (response == 1) {
                    swal('Selamat!', 'Data berhasil diubah', 'success');
                } else {
                    swal('Maaf!', 'Data gagal diubah!', 'error');
                }
            }
        })
    })
</script>

@endsection

@section('page_scripts')


@if (session("success"))

<script type="text/javascript">

    swal({
        title: "Berhasil!",
        text: "{{ session('success') }}",
        icon: "success",
        button: "OK",
    });

</script>

@endif

@endsection
