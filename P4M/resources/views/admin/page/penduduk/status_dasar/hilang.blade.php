@php
use Carbon\Carbon;
use App\Models\Model\Penduduk;
$penduduk = Penduduk::where('id_status_dasar', 4)->get()
@endphp
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header">
                <h3>Penduduk Hilang</h3>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table id="hilang" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Aksi</th>
                                <th>Nama</th>
                                <th>No. KK</th>
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                                <th>Dusun</th>
                                <th>RW</th>
                                <th>RT</th>
                                <th>Umur</th>
                                <th>Tanggal Terdaftar</th>
                                <th>Tanggal Diubah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penduduk as $p)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-social btn-flat btn-info btn-sm" data-toggle="dropdown"><i class='fa fa-arrow-circle-down'></i> Pilih Aksi</button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ url('page/admin/kependudukan/penduduk/'.$p->id) }}" class="btn btn-social btn-flat btn-block btn-sm"><i class="fa fa-list-ol"></i> Lihat Detail Biodata Penduduk</a>
                                            </li>
                                            <li>
                                                <form action="{{ url('page/admin/kependudukan/penduduk/'.$p->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-social btn-flat btn-block btn-sm btn-delete"><i class="fa fa-trash-o"></i> Hapus</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->kk_sebelumnya }}</td>
                                <td>{{ $p->nama_ayah }}</td>
                                <td>{{ $p->nama_ibu }}</td>
                                <td>{{ $p->getDusun->dusun }}</td>
                                <td>{{ $p->getRw->rw }}</td>
                                <td>{{ $p->getRt->rt }}</td>
                                <td>{{ date("Y") - date('Y', strtotime($p->tgl_lahir)) }}</td>
                                <td>{{ Carbon::createFromFormat('Y-m-d H:i:s', $p->created_at)->isoFormat('D MMMM Y') }}</td>
                                <td>{{ Carbon::createFromFormat('Y-m-d H:i:s', $p->updated_at)->isoFormat('D MMMM Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('document').ready(function() {
        $("#hilang").DataTable();

        $('.table').on('show.bs.dropdown', function (e) {
            var table = $(this),
            menu = $(e.target).find('.dropdown-menu'),
            tableOffsetHeight = table.offset().top + table.height(),
            menuOffsetHeight = $(e.target).offset().top + $(e.target).outerHeight(true) + menu.outerHeight(true);

            // console.log(menuOffsetHeight);

            if (menuOffsetHeight > tableOffsetHeight)
            {
                table.css("padding-bottom", menuOffsetHeight - tableOffsetHeight);
                $('.table')[0].scrollIntoView(false);
            }

        });

        $('.table').on('hide.bs.dropdown', function () {
            $(this).css("padding-bottom", 0);
        })
    });
</script>
