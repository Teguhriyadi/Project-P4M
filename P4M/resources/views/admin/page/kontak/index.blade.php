@extends('admin.layouts.main')

@section('title', 'Data Kotak Pesan')

@section('page_content')

<section class="content-header">
    <h1>
        @yield("title")
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-home"></i> Home
            </a>
        </li>
        <li class="active">@yield("title")</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-envelope-o"></i> Kotak Pesan
                    </h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="kontaktable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">No. HP</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_kontak as $kontak)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $kontak->nama }}</td>
                                    <td class="text-center">{{ $kontak->email }}</td>
                                    <td class="text-center">{{ $kontak->no_hp }}</td>
                                    <td class="text-center">
                                        <a href="" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
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

<script>
    $(function (){
        $('#kontaktable').DataTable({
            columnDefs: [
                { orderable: false, targets: [0,4] }
            ],
        })
    })
</script>

@endsection
