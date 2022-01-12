@php
    use App\Models\Model\Artikel;
    setlocale(LC_ALL, 'id_ID', 'id', 'ID');
    $artikel = Artikel::latest()->paginate(6);
@endphp
<div class="single_bottom_rightbar">
    <h2>
        <i class="fa fa-archive"></i>
        Artikel Terbaru
    </h2>
    <div class="tab-content" style="padding-top: 0;">
        <div id="" class="active" role="">
            @foreach ($artikel as $a)
            <table id="ul-menu">
                <tr>
                    <td colspan="2">
                        <span class="meta_date">{{ $a->created_at->formatLocalized("%d %B %Y") }} | <i class="fa fa-eye"></i> 0 Kali</span>
                    </td>
                </tr>
                <tr>
                    <td valign="top" align="justify">
                        <a href="/artikel/{{ $a->slug }}">
                            <img width="25%" style="float:left; margin:0 8px 4px 0;" class="img-fluid img-thumbnail" src="{{ url('storage/'.$a->image) }}"/>
                            <small><font color="green">{{ $a->judul }}</font></small>
                        </a>
                    </td>
                </tr>
            </table>
            @endforeach
        </div>
    </div>
</div>