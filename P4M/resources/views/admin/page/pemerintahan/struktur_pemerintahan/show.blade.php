@extends('admin.layouts.main')

@section('title', 'Data Struktur Pemerintahan')

@section('page_content')

<style>
  
</style>

<section class="content-header">
    <h1>
      @yield('title')
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> Home
            </a>
        </li>
        <li class="active">@yield('title')</li>
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
  $.get('/page/admin/pemerintahan/struktur_pemerintahan/showChart').done(function(response) {
    let chart = new OrgChart(document.getElementById("tree"), {
      template: 'polina',
      mouseScrool: OrgChart.action.scroll,
      enableDragDrop: true,
      nodeBinding: {
        field_0: "name",
        field_1: "title",
        img_0: "img"
      },
      nodes: response.nodes 
    });
    
    chart.on('click', function(sender, args){
      sender.editUI.show(args.node.id, false);
      return false;
    });
  
    chart.on('drop', function(sender, draggedNodeId, droppedNodeId) {
      $.ajax({
        url: '/page/admin/pemerintahan/struktur_pemerintahan/dropChart',
        type: 'POST',
        data: {id: draggedNodeId, staf_id: droppedNodeId},
        success: function(data) {
          if (data == 1) {
            swal('Wooww!', 'Data anda berhasil diubah', 'success');
          } else {
            swal('Ooops!', 'Data anda gagal diubah', 'error');
          }
        }
      })
    })

  });
</script>

@endsection
