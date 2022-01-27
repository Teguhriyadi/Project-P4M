@php
    use App\Models\Model\Artikel;
    use Carbon\Carbon;
    $artikel = Artikel::latest()->paginate(6);
@endphp
<div class="single_bottom_rightbar">
    <h2>
        <i class="fa fa-archive"></i>
        Artikel Terbaru
    </h2>
    <div class="tab-content" style="padding-top: 0;">
        <div id="" class="active" role="">
            @if ($artikel->count())
            @foreach ($artikel as $a)
            <table id="ul-menu">
                <tr>
                    <td colspan="2">
                        <span class="meta_date">{!! Carbon::createFromFormat('Y-m-d H:i:s', $a->created_at)->isoFormat('D MMMM Y') !!} | <i class="fa fa-eye"></i> {{ $a->getCount->count() }} Kali</span>
                    </td>
                </tr>
                <tr>
                    <td valign="top" align="justify">
                        <a href="{{ url('') }}/artikel/{{ $a->slug }}">
                            <img width="25%" style="float:left; margin:0 8px 4px 0;" class="img-fluid img-thumbnail" src="{{ url('storage/'.$a->image) }}" onerror="this.onerror=null; this.src='{{ url('/frontend/img/no-images.png') }}'"/>
                            <small><font color="green">{{ $a->judul }}</font></small>
                        </a>
                    </td>
                </tr>
            </table>
            @endforeach
            @else
            <h4>
                Belum Ada Komentar
            </h4>
            @endif
        </div>
    </div>
</div>
