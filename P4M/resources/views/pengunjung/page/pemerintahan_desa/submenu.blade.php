<style>
    #widget ul li {
        list-style: circle;
        margin-left: 20px;
        margin-bottom: 10px;
    }
</style>

<div class="col-md-4">

    <div id="widget">
        <div class="widget">
            <div class="widget_title">Sub Menu</div>
            <div class="widget_body">
                <ul>
                    <li>
                        <a href="{{ url('') }}/pemerintahan-desa/visi-misi" class="text-primary">Visi Misi</a>
                    </li>
                    <li>
                        <a href="{{ url('') }}/pemerintahan-desa/struktur-organisasi" class="text-primary">Struktur Organisasi</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @include('pengunjung/widget/widget_berita_terbaru')
    @include('pengunjung/widget/widget_maps_desa')
    @include('pengunjung/widget/widget_maps_kantor_desa')
    @include('pengunjung/widget/widget_kontak')
</div>
