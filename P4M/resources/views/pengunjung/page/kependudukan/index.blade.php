@extends('pengunjung/layouts/main')

@section('title', 'Data Penduduk Arahan Lor')

@section('page_content')

<style>
    #petaDesa iframe {
        width: 100%;
        height: 400px;
    }
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
    <table class="table table-bordered" id="example3">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Dusun</th>
      <th scope="col">RT / RW</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($kependudukan as $penduduk)
      <tr>
          <td class="text-center">{{ $loop->iteration }}</td>
          <td>{{ $penduduk->nama }}</td>
          <td>{{ $penduduk->getKelamin->nama }}  </td>
          <td>{{ $penduduk->getDusun->dusun }}</td>
          <td>{{ $penduduk->getRt->rt }} / {{$penduduk->getRw->rw}}</td>
      </tr>
      @endforeach
  </tbody>
</table>
    </div>
</div>

@endsection

@section('page_scripts')
<link rel="stylesheet" href="http://127.0.0.1:8000/backend/template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<script src="http://127.0.0.1:8000/backend/template/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="http://127.0.0.1:8000/backend/template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
    $(function () {
        $('#example1').DataTable({
            scrollX: true,
        }),
        $('#example3').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>

@endsection