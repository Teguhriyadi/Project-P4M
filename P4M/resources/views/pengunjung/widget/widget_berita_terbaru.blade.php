@php
    use App\Models\Model\Berita;
    setlocale(LC_ALL, 'id_ID', 'id', 'ID');
    $berita = Berita::latest()->paginate(6);
@endphp
<div class="single_bottom_rightbar">
    <h2>
        <i class="fa fa-archive"></i>
        Berita Terbaru
    </h2>
    <div class="tab-content" style="padding-top: 0;">
        <div id="" class="active" role="">
            @foreach ($berita as $b)
            <table id="ul-menu">
                <tr>
                    <td colspan="2">
                        <span class="meta_date">{{ $b->created_at->formatLocalized("%d %B %Y") }} | <i class="fa fa-eye"></i> 0 Kali</span>
                    </td>
                </tr>
                <tr>
                    <td valign="top" align="justify">
                        <a href="/berita/{{ $b->slug }}">
                            <img width="25%" style="float:left; margin:0 8px 4px 0;" class="img-fluid img-thumbnail" src="{{ url('storage/'.$b->image) }}"/>
                            <small><font color="green">{{ $b->judul }}</font></small>
                        </a>
                    </td>
                </tr>
            </table>
            @endforeach
        </div>
    </div>
</div>