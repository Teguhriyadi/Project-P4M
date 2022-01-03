@extends('admin.layouts.main')

@section('page_title', 'Dashboard')

@section('page_content')

<section class="content-header">
    <h1>
        Data Struktur Pemerintahan
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

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div id="tree"></div>
        </div>
    </div>
</section>

@endsection

@section('page_scripts')

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
