@extends('pengunjung/layouts/main')

@section('title', 'Visi Misi')

@section('page_content')

<div id="printableArea">
    <h4 class="catg_titile" style="font-family: Oswald"><font color="#FFFFFF">Visi Misi Desa Arahan Lor</font></h4>
    <div class="post_commentbox">
        <span class="meta_date">
            <i class="fa fa-user"></i>Administrator&nbsp;
            <i class="fa fa-eye"></i>0 Kali Dibaca&nbsp;
        </span>
    </div>
    <div class="single_page_content" style="margin-bottom:10px;">
        
       @foreach ($data_visimisi as $vm)
           {!! $vm->visi !!}
           <br>
           {!! $vm->misi !!}
       @endforeach        
        
    </div>
</div>


@endsection
