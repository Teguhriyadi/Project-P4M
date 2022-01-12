@extends('admin.layouts.main')

@section('page_title', 'Dashboard')

@section('page_content')

<section class="content-header">
  <h1>
    Dashboard
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{ url('/page/admin/dashboard') }}">
        <i class="fa fa-dashboard"></i> Home
      </a>
    </li>
    <li class="active">Blank page</li>
  </ol>
</section>
{{-- {{ request()->segment(3) }} --}}
<section class="content">
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua">
          <i class="ion ion-ios-gear-outline"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text">
            Data Users
          </span>
          <span class="info-box-number">
            90 <small>&</small>
          </span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua">
          <i class="ion ion-ios-gear-outline"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text">
            Data Users
          </span>
          <span class="info-box-number">
            90 <small>&</small>
          </span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua">
          <i class="ion ion-ios-gear-outline"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text">
            Data Users
          </span>
          <span class="info-box-number">
            90 <small>&</small>
          </span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua">
          <i class="ion ion-ios-gear-outline"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text">
            Data Users
          </span>
          <span class="info-box-number">
            90 <small>&</small>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      
      <div id="tree"></div>
      
    </div>
    <div class="col-md-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">
            Terakhir Login
          </h3>
          <div class="pull-right">
            <a href="{{ url('/page/admin/terakhir_login') }}" class="btn btn-primary btn-sm">
              <i class="fa fa-search"></i> Selengkapnya
            </a>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
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
                  <td class="text-center">{{ $terakhir_login->terakhir_login }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
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
