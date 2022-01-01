<input type="hidden" name="id" value="{{ $edit->id }}">
<input type="hidden" name="oldImage" value="{{ $edit->gambar }}">
<div class="form-group">
    <label for="judul"> Judul </label>
    <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul" value="{{ $edit->judul }}">
</div>
<div class="form-group">
    <label for="gambar"> Gambar </label>
    @if ($edit->gambar)
    <br>
    <img src="{{ url('/storage/'.$edit->gambar) }}" class="gambar-preview img-fluid mb-3 col-sm-5 d-block" style="margin-bottom: 10px">
    @else
    <img class="gambar-preview img-fluid mb-3" width="300">
    @endif
    <br>
    <input type="file" onchange="previewImage()" class="form-control" name="gambar" id="gambar">
</div>

@section("page_scripts")

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
</script>

@endsection
