@php
use Carbon\Carbon;
use App\Models\Model\Komentar;
$komentar = Komentar::latest()->paginate(6);
@endphp

<div class="single_bottom_rightbar">
    <h2><i class="fa fa-comments"></i> Komentar Terbaru</h2>
    <div id="mostPopular2" class="tab-pane fade in active" role="tabpanel">
        <ul id="ul-menu">
            <div class="box-body">
                @if ($komentar->count())
                <marquee onmouseover="this.stop()" onmouseout="this.start()" scrollamount="3" direction="up" width="100%" height="250" align="center" behavior=”alternate”>
                    <ul class="sidebar-latest" id="li-komentar">
                        @foreach ($komentar as $k)
                        <li>
                            <table class="table table-bordered table-striped dataTable table-hover">
                                <thead class="bg-gray disabled color-palette">
                                    <tr>
                                        <th><a href="/artikel/{{ $k->getArtikel->slug }}" style="color: black"><i class="fa fa-comment"></i> Artikel {{ $k->getArtikel->judul }}</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <font color='green'><small>{{ Carbon::createFromFormat('Y-m-d H:i:s', $k->created_at)->isoFormat('D MMMM Y H:m:s') }}</small></font><br/>{{ Str::limit($k->pesan, 100, '...') }}<a href="/artikel/{{ $k->getArtikel->slug }}">selengkapnya</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                        @endforeach
                    </ul>
                </marquee>
                @else
                <h4>
                    Belum Ada Komentar
                </h4>
                @endif
            </div>
        </ul>
    </div>
</div>
