@extends('pengunjung/layouts/main')

@section('page_content')
<style>
    @media only screen and (max-width: 378px) {
        .kepala-desa {
            width: 100%;
        } 
    }
</style>

<div class="row">
    <div class="col-md-8">
        <div id="main">
            <div class="main">
                <div class="main_title">Prakata Kepala Desa</div>
                <div class="main_body">
                    <div class="row">
                        <div class="col-md-12">
                            <img class="img-fluid kepala-desa" src="{{ url('/frontend') }}/img/logo-kabupaten.png" alt="" width="250" align="left" style="margin:5px 20px 20px 0px">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente maxime quas totam minus laborum velit porro enim, provident eveniet accusamus impedit commodi a quos earum consequuntur fugiat, est itaque et illo quibusdam natus! Porro optio recusandae, voluptatem maiores non, harum libero numquam nobis maxime odio et dolores illo. Atque facilis placeat ipsum aut animi consectetur deserunt veritatis, harum exercitationem nobis earum asperiores, sit tempore. Nulla voluptate numquam, quos. Nulla, dignissimos amet consequuntur eum pariatur quaerat? Reiciendis veniam, blanditiis. Pariatur soluta omnis beatae delectus assumenda? Temporibus qui totam ipsum corrupti accusamus doloribus architecto ipsa ex error. Magnam voluptatem explicabo, exercitationem amet libero, delectus numquam maxime. Obcaecati, quo alias ea ab rem quidem magnam fugit, similique voluptatem aliquam optio illo. Vitae nesciunt illo hic repellat laboriosam qui, et consequuntur expedita iusto cumque quae tenetur mollitia non doloremque aut quaerat earum iure voluptas veniam nihil veritatis facere libero autem. Iste et recusandae ex tempore expedita voluptatibus, blanditiis dignissimos, neque autem. Omnis molestias numquam fuga itaque unde sed atque fugit. Quas natus amet voluptate sint molestias nostrum aliquid ea corrupti doloremque explicabo laborum mollitia qui ipsa officiis quo reprehenderit labore quia soluta illo necessitatibus, nesciunt! Praesentium dolores ducimus officia totam enim expedita, nisi, dignissimos nam voluptatum voluptate, minima et. Maiores temporibus corrupti reprehenderit ipsa modi non consectetur eius labore perspiciatis, accusantium reiciendis ab et vitae ex maxime, facere similique illum architecto quam eligendi nulla dolorem sint! Officiis debitis fugit illum assumenda cum, eveniet perferendis odio accusamus earum veritatis corrupti consequatur cumque consectetur, mollitia adipisci!
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div id="main">
            <div class="main">
                <div class="main_title">Berita Terbaru</div>
                <div class="main_body">
                    <div class="academy-blog-posts">
                        <div class="row">
                            @foreach ($data_berita as $berita)
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <div class="single-blog-post wow fadeInUp" data-wow-delay="300ms">
                                    <div class="blog-post-thumb mb-15">
                                        <img src="{{ url('storage/'.$berita->image) }}" alt="" style="width: 100%; margin: 0 auto;">
                                    </div>
                                    <div style="height:110px">
                                        <h4><a href="#"  class="post-title" style="font-size: 18px">{{ $berita->judul }}</a></h4>
                                        <div class="post-meta"><p>Posting: {{ $berita->created_at->formatLocalized("%d %B %Y") }} </p></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div id="main">
            <div class="main">
                <div class="main_title">Galeri</div>
                <div class="main_body">
                    <div class="row gallery clearfix">
                        @foreach ($data_galeri as $galeri)
                        <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                            <div style="margin-bottom:20px;">
                                <a href="" title="Munjungan">
                                    <img src="{{ url('storage/'.$galeri->gambar) }}" alt="Munjungan" width="100%">
                                    <p>Munjungan</p>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <hr/>
    </div>
    <div class="col-md-4">
        <div id="widget">
            <div class="widget">
                <div class="widget_title">Kontak</div>
                <div class="widget_body">
                    
                    <b>Alamat :</b>
                    <p>Arahan Lor kecamatan Arahan, Indramayu, Jawa Barat, Indonesia.</p>
                    <b><i class="fa fa-phone"></i> Telepon :</b>
                    <p>0000000</p>
                    <b><i class="fa fa-desktop"></i> Website :</b>
                    <p>arahanlor.go.id</p></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
