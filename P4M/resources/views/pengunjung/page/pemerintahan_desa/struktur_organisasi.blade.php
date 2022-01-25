@extends('pengunjung/layouts/main')

@section('title', 'Struktur Organisasi Desa')

@section('page_content')
<style>
  #tree {
    width: 100%;
    height: 100%;
  }

  /*partial*/
  [lcn='hr-team']>rect {
    fill: #FFCA28;
  }

  [lcn='sales-team']>rect {
    fill: #F57C00;
  }

  [lcn='top-management']>rect {
    fill: #f2f2f2;
  }

  [lcn='top-management']>text,
  .assistant>text {
    fill: #aeaeae;
  }

  [lcn='top-management'] circle,
  [lcn='assistant'] {
    fill: #aeaeae;
  }

  .assistant>rect {
    fill: #ffffff;
  }

  .assistant [data-ctrl-n-menu-id]>circle {
    fill: #aeaeae;
  }

  .it-team>rect {
    fill: #b4ffff;
  }

  .it-team>text {
    fill: #039BE5;
  }

  .it-team>[data-ctrl-n-menu-id] line {
    stroke: #039BE5;
  }

  .it-team>g>.ripple {
    fill: #00efef;
  }

  .hr-team>rect {
    fill: #fff5d8;
  }

  .hr-team>text {
    fill: #ecaf00;
  }

  .hr-team>[data-ctrl-n-menu-id] line {
    stroke: #ecaf00;
  }

  .hr-team>g>.ripple {
    fill: #ecaf00;
  }

  .sales-team>rect {
    fill: #ffeedd;
  }

  .sales-team>text {
    fill: #F57C00;
  }

  .sales-team>[data-ctrl-n-menu-id] line {
    stroke: #F57C00;
  }

  .sales-team>g>.ripple {
    fill: #F57C00;
  }


</style>
</style>
<div id="printableArea">
  <h4 class="catg_titile" style="font-family: Oswald"><font color="#FFFFFF">@yield('title')</font></h4>
  <div class="post_commentbox">
    <span class="meta_date">
      <i class="fa fa-user"></i>Administrator&nbsp;
      <i class="fa fa-eye"></i>0 Kali Dibaca&nbsp;
    </span>
  </div>
  <div class="single_page_content" style="margin-bottom:10px;">
    <div id="tree"></div>
  </div>
</div>

<script src="{{ url('/backend/template') }}/bower_components/orgchart/orgchart.js"></script>

<script type='text/javascript'>
  var chart = new OrgChart(document.getElementById("tree"), {
    enableSearch: false,
    editForm: {
      buttons: false
    },
    template: 'ana',
    mouseScrool: OrgChart.action.scroll,
    nodeBinding: {
      field_0: "name",
      field_1: "title",
      img_0: "img"
    },
    nodes: [
    <?php foreach($data_struktur as $struktur) {
      echo '{ id: '.$struktur->id.', pid: '.$struktur->staf_id.', name: "'.$struktur->getPegawai->nama.'", title: "'.$struktur->getJabatan->nama_jabatan.'", img:"/gambar/gambar_user.png", tags: ["it-team-member"] },';
    } ?>
    ]
  });
</script>

@endsection
