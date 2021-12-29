@extends('admin.layouts.main')

@section('page_content')

<section class="content-header">
    <h1>
        Template Surat
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/page/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
        </li>
        <li class="active">Template Surat</li>
    </ol>
</section>

<div class="content">
    <div id="pesan"></div>
    <div class="row">
        <div class="col-md-3">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        <i class="fa fa-plus"></i> Form Tambah Template
                    </h3>
                </div>
                <form action="" id="tambahTemplate" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="kode"> Kode Surat </label>
                            <input type="number" class="form-control" name="kode" id="kode" placeholder="Masukkan kode Surat">
                            @csrf
                        </div>
                        <div class="form-group">
                            <label for="nama"> Nama Surat </label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama Surat">
                        </div>
                        <div class="form-group">
                            <label for="singkatan"> Singkatan Surat </label>
                            <input type="text" class="form-control" name="singkatan" id="singkatan" placeholder="Masukkan singkatan Surat">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button id="tambah" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-9">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        Data Template Surat
                    </h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped" id="tableTemplateSurat">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <td>Kode Surat</td>
                                <td>Nama Surat</td>
                                <td>Singkatan Surat</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    loadTemplate();
    
    function loadTemplate() {
        let empTable = document.getElementById("tableTemplateSurat").getElementsByTagName("tbody")[0];
        empTable.innerHTML = "";
        
        $.ajax({
            url: "{{ url('/page/admin/template_surat/show') }}",
            type: "get",
            success: function (response) {
                let no = 1;
                for (let key in response) {
                    if (response.hasOwnProperty(key)) {
                        let val = response[key];
                        
                        let newRow = empTable.insertRow(-1);
                        let noCell = newRow.insertCell(0);
                        let noSuratCell = newRow.insertCell(1);
                        let namaSuratCell = newRow.insertCell(2);
                        let singkatanSuratCell = newRow.insertCell(3);
                        let aksiCell = newRow.insertCell(4);
                        
                        noCell.innerHTML = no++;
                        noSuratCell.innerHTML = val['no_surat'];
                        namaSuratCell.innerHTML = val['nama_surat'];
                        singkatanSuratCell.innerHTML = val['singkatan_surat'];
                        aksiCell.innerHTML = '<button class="btn btn-danger btn-sm" id="hapusTemplate" data-id="'+val['id']+'"><i class="fa fa-trash-o"></i></button>';
                    }
                }
            }
        })
    }
    
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('input[name="_token"]').attr('value')
            }
        });

        $("body").on('click', '#hapusTemplate', function () {
            let id = $(this).data('id');

            $.ajax({
                url: "{{ url('/page/admin/template_surat') }}/"+id,
                type: 'post',
                data: { _method: 'delete' },
                success: function (response) {
                    if (response == 1) {
                        $("#pesan").html('<div class="alert alert-success">Berhasil!</div>');
                        loadTemplate();
                    } else {
                        $("#pesan").html('<div class="alert alert-danger">Gagal!</div>');
                    }
                }
            })
        })
    });
    
    (function($,W,D) {
        var JQUERY4U = {};
        JQUERY4U.UTIL =
        {
            setupFormValidation: function()
            {
                $("#tambahTemplate").validate({
                    ignore: "",
                    rules: {
                        nama: {
                            required: true
                        },
                        kode: {
                            required: true
                        },
                        singkatan: {
                            required: true
                        }
                    },
                    
                    messages: {
                        nama: {
                            required: "Nama harap di isi!"
                        },
                        kode: {
                            required: "Slug harap di isi!"
                        },
                        singkatan: {
                            required: "Singkatan harap di isi!"
                        }
                    },
                    
                    submitHandler: function(form) {
                        let kode = $("#kode").val().trim();
                        let nama = $("#nama").val().trim();
                        let singkatan = $("#singkatan").val().trim();
                        
                        $.ajax({
                            url: "{{ url('/page/admin/template_surat') }}",
                            type: 'post',
                            data: {
                                no_surat: kode,
                                nama_surat: nama,
                                singkatan_surat: singkatan
                            },
                            success: function (response) {
                                if (response == 1) {
                                    $("#pesan").html('<div class="alert alert-success">Berhasil!</div>');
                                    loadTemplate();

                                    $("#kode").val('');
                                    $("#nama").val('');
                                    $("#singkatan").val('');
                                } else {
                                    $("#pesan").html('<div class="alert alert-danger">Gagal!</div>');
                                }
                            }
                        })
                    }
                });
            }
        }
        
        $(D).ready(function($) {
            JQUERY4U.UTIL.setupFormValidation();
        });
        
    })(jQuery, window, document);
</script>

@endsection