<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name"> Name </label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ $edit->name }}">
            <input type="hidden" class="form-control" name="id" id="id" placeholder="Name" value="{{ $edit->id }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="username"> Username </label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{ $edit->username }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="email"> Email </label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" value="{{ $edit->email }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="password"> Password </label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="hak_akses_id">Hak Akses</label>
            <select name="hak_akses_id" id="hak_akses_id" class="form-control select2">
                @foreach ($data_hak_akses as $hak_akses)
                <option value="{{ $hak_akses->id }}" {{ $hak_akses->id == $edit->hak_akses_id ? 'selected' : '' }}>{{ $hak_akses->nama_hak_akses }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="gambar"> Gambar </label>
            @if ($edit->gambar)
            <br>
            <img src="{{ url('storage/'.$edit->gambar) }}" class="gambar-preview mb-5">
            @else
            <img class="gambar-preview" style="width: 300px;">
            @endif
            <input onchange="previewImage()" type="file" class="form-control" name="gambar" id="gambar">
        </div>
    </div>
</div>

@section('page_scripts')

<script type="text/javascript">
    
    function previewImage()
    {
        const gambar = document.querySelector("#gambar");
        const gambarPreview = document.querySelector(".gambar-preview");
        
        gambarPreview.style.display = "block";
        
        const oFReader = new FileReader();
        oFReader.readAsDataURL(gambar.files[0]);
        
        oFReader.onload = function(oFREvent) {
            gambarPreview.src = oFREvent.target.result;
        }
    }
    
</script>

@endsection
