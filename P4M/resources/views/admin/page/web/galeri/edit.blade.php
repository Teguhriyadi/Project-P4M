<input type="hidden" name="id" value="{{ $edit->id }}">
<input type="hidden" name="oldImage" value="{{ $edit->gambar }}">
<div class="form-group">
    <label for="judul"> Judul </label>
    <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul" value="{{ $edit->judul }}">
</div>
<div class="form-group">
    <label for="gambar"> Gambar </label>
    <div class="box-profile">
        @if ($edit->gambar)
        <img src="{{ url('/storage/'.$edit->gambar) }}" class="gambar-preview penduduk profile-user-img img-responsive" style="border-radius: 50%; width: 200px; height: 200px; margin-bottom: 15px" src="{{ url('/gambar/upload.png') }}" alt="Foto Penduduk">
        @else
        <img class="penduduk profile-user-img img-responsive gambar-preview" style="border-radius: 50%; width: 200px; height: 200px; margin-bottom: 15px" src="{{ url('/gambar/upload.png') }}" alt="Foto Penduduk">
        @endif
        <div class="input-group input-group-sm">
            <input  type="text" class="form-control" id="file_path4" placeholder="Masukkan Gambar">
            <input type="file" class="hidden" id="gambar" name="gambar" onchange="previewImage()">
            <span class="input-group-btn">
                <button  type="button" class="btn btn-info btn-flat" id="file_browser4">
                    <i class="fa fa-upload"></i> Upload
                </button>
            </span>
        </div>
    </div>
</div>

<script type="text/javascript">
	function previewImage()
	{
		const gambar = document.querySelector('#gambar');
		const gambarPreview = document.querySelector('.gambar-preview');

		gambarPreview.style.display = 'block';

		const oFReader = new FileReader();
		oFReader.readAsDataURL(gambar.files[0]);

		oFReader.onload = function(oFREvent) {
			gambarPreview.src = oFREvent.target.result;
		}
	}

    $('#file_browser4').click(function(e)
    {
        e.preventDefault();
        $('#gambar').click();
    });
    $('#gambar').change(function()
    {
        $('#file_path4').val($(this).val());
    });
    $('#file_path4').click(function()
    {
        $('#file_browser4').click();
    });
</script>
