@php
use App\Models\Model\StrukturPemerintahan;
@endphp
@extends('admin.layouts.main')

@section('title', $detail_surat->nama)

@section('page_content')


<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-body">
						<div class="box-header with-border tdk-permohonan tdk-periksa">
							<a href="/page/admin/cetak_surat" class="btn btn-social btn-flat btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
								<i class="fa fa-arrow-circle-left "></i>Kembali Ke Daftar Cetak Surat
							</a>
						</div>
						<form id="main" name="main" method="POST" class="form-horizontal">
							<div class="form-group cari_nik">
	<label for="nik"  class="col-sm-3 control-label">NIK / Nama </label>
	<div class="col-sm-6 col-lg-4">
	<select name="id_penduduk" id="id_penduduk" class="form-control input-sm select2" width="100%" onchange="formAction('main')">
				<option value="">-- Cari NIK / Nama Penduduk /</option>
				@foreach ($data_penduduk as $penduduk)
				@if (empty($detail))
				<option value="{{ $penduduk->id }}">
					NIK : {{ $penduduk->nik .' - '. $penduduk->nama }}
				</option>
				@else
				@if ($detail->id == $penduduk->id)
				<option value="{{ $penduduk->id }}" selected>
					NIK : {{ $penduduk->nik .' - '. $penduduk->nama }}
				</option>
				@else
				<option value="{{ $penduduk->id }}">
					NIK : {{ $penduduk->nik .' - '. $penduduk->nama }}
				</option>
				@endif
				@endif
				@endforeach
			</select>
			<label class="error hidden">NIK/Nama harap di isi!</label>
		</div>
	</div>
<script type="text/javascript">
$(document).ready(function()
{
	// Daftar angka di script berikut adalah key number untuk tombol. Karena dropdown ini memakai select2 maka ketika e_KTP discan hasil pencarian akan otomatis dan default memilih record no. 1. Maka proses harus di delay supaya hasil search tampil terlebih dahulu dengan menghilangkan semua karakter di belakang nomor id yg discan.
	$('#nik').on('select2:open', e => {
		$('.select2-search__field').on('keydown.ajaxfix', e => {
			if (![9, 13, 16, 17, 18, 27, 33, 34, 35, 36, 37, 38, 39, 40].includes(e.which)) {
				$('.select2-results__option').removeClass('select2-results__option--highlighted');
			}
		});
	}).on('select2:closing', e => {
		$('.select2-search__field').off('keydown.ajaxfix');
	});
});
</script>
						</form>
						<form id="validasi" action="https://demo.opensid.or.id/surat/doc/surat_ket_penduduk" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="surat_ket_penduduk">
							<input type="hidden" id="url_remote" name="url_remote" value="https://demo.opensid.or.id/surat/nomor_surat_duplikat">
							<div class="row jar_form">
								<label class="col-sm-3"></label>
								<div class="col-sm-8">
									<input class="required" type="hidden" name="nik" value="">
								</div>
							</div>
														<script type="text/javascript">
	$(document).ready(function()
	{
    $('#nomor').change(function()
		{
      var nomor = $('#nomor').val();
      var url = $('#url_surat').val();
      $.ajax(
			{
        type: "POST",
        url: "https://demo.opensid.or.id/surat/format_nomor_surat",
        dataType: 'json',
        data: {
        	nomor: nomor,
        	url: url
        },
      }).then(function(nomor) {
      	$('#format_nomor').text(nomor);
		  });
    });
  });
</script>

<div class="form-group tdk-permohonan">
	<input type="hidden" name="id_surat" value="2">
	<label class="col-sm-3 control-label">Nomor Surat</label>
	<div class="col-sm-4">
		<input id="nomor" class="form-control input-sm digits required" type="text" placeholder="Nomor Surat" name="nomor" value="2">
		<p class="help-block text-red small">Terakhir untuk jenis surat Keterangan Penduduk: <strong>1</strong> (tgl: 27 Januari 2022 08:38:49)</p>
	</div>
			<div class="col-sm-4">
			<p class="help-block"><em>Format nomor surat: </em><span id="format_nomor">S-02/002/3204142006/I/2022</span></p>
		</div>
	</div>
							<div class="form-group">
								<label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
								<div class="col-sm-8">
									<textarea name="keterangan" id="keterangan" class="form-control input-sm required " placeholder="Keterangan"></textarea>
								</div>
							</div>
														<div class="form-group">
								<label for="berlaku_dari"  class="col-sm-3 control-label">Berlaku Dari - Sampai</label>
								<div class="col-sm-3 col-lg-2">
									<div class="input-group input-group-sm date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input title="Pilih Tanggal" id="tgl_mulai" class="form-control input-sm required readonly-permohonan" name="berlaku_dari" type="text"/>
									</div>
								</div>
								<div class="col-sm-3 col-lg-2">
									<div class="input-group input-group-sm date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input title="Pilih Tanggal" id="tgl_akhir" class="form-control input-sm required readonly-permohonan" name="berlaku_sampai" type="text" data-masa-berlaku="1" data-satuan-masa-berlaku="M"/>
									</div>
								</div>
							</div>
							<div class="form-group tdk-permohonan">
	<label class="col-sm-3 control-label">Tertanda Atas Nama</label>
	<div class="col-sm-6 col-lg-4">
		<select class="form-control input-sm select2" name="pilih_atas_nama" onchange="ganti_ttd($(this).val());	">
			<option value="">-- Atas Nama --</option>
							<option value="a.n Kepala Desa Langonsari" >
					a.n Kepala Desa Langonsari				</option>
							<option value="u.b Sekretaris Desa" >
					u.b Sekretaris Desa				</option>
					</select>
	</div>
</div>
<div class="form-group tdk-permohonan">
	<label class="col-sm-3 control-label">Staf Pemerintah Desa</label>
	<div class="col-sm-6 col-lg-4">
		<select class="form-control required input-sm" id="pamong" name="pamong" onchange="ambil_pamong($(this).find(':selected'))">
			<option value='' selected="selected">-- Pilih Staf Pemerintah Desa--</option>
											<option value="Muhammad Ilham " data-jabatan="Kepala Desa" selected  data-nip="" data-pamong-id="14" data-ttd="1" data-ub="0">
					Muhammad Ilham  (Kepala Desa) 				</option>
											<option value="Mustahiq S.Adm" data-jabatan="Sekretaris Desa"  data-nip="197905062010011007" data-pamong-id="20" data-ttd="" data-ub="1">
					Mustahiq S.Adm (Sekretaris Desa) NIP: 197905062010011007				</option>
											<option value="Syafruddin " data-jabatan="Kaur Pemerintahan"  data-nip="-" data-pamong-id="21" data-ttd="" data-ub="0">
					Syafruddin  (Kaur Pemerintahan ) 				</option>
											<option value="Supardi Rustam " data-jabatan="Kaur Umum"  data-nip="-" data-pamong-id="22" data-ttd="" data-ub="0">
					Supardi Rustam  (Kaur Umum ) 				</option>
											<option value="Mardiana " data-jabatan="Kaur Keuangan"  data-nip="-" data-pamong-id="23" data-ttd="" data-ub="0">
					Mardiana  (Kaur Keuangan) 				</option>
											<option value="Syafi-i. SE " data-jabatan="Kaur Pembangunan"  data-nip="-" data-pamong-id="24" data-ttd="" data-ub="0">
					Syafi-i. SE  (Kaur Pembangunan ) 				</option>
											<option value="Mahrup " data-jabatan="Kaur Keamanan dan Ketertiban"  data-nip="" data-pamong-id="25" data-ttd="" data-ub="0">
					Mahrup  (Kaur Keamanan dan Ketertiban) 				</option>
					</select>
		<input name="pamong_nip" id="pamong_nip" type="hidden" value=""/>
		<input name="pamong_id" id="pamong_id" type="hidden" value=""/>
	</div>
</div>
<div class="form-group tdk-permohonan">
	<label for="jabatan"  class="col-sm-3 control-label">Menjabat Sebagai</label>
	<div class="col-sm-6 col-lg-4">
		<select class="form-control input-sm required" id="jabatan" name="jabatan">
			<option value='' selected="selected" >-- Pilih Jabatan--</option>
							<option selected>Kepala Desa</option>
							<option >Sekretaris Desa</option>
							<option >Kaur Pemerintahan </option>
							<option >Kaur Umum </option>
							<option >Kaur Keuangan</option>
							<option >Kaur Pembangunan </option>
							<option >Kaur Keamanan dan Ketertiban</option>
					</select>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function()
	{
		$('#pamong').change();
	});

	function ganti_ttd(atas_nama)
	{
		if (atas_nama.includes('a.n'))
		{
			ub = $("#pamong option[data-ub='1']").val();
			if (ub)
			{
				$('#pamong').val(ub);
				$('#pamong').change();
			}
			else
			{
				$('#pamong').val('');
				$('#jabatan').val('');
			}
		}
		else if (atas_nama.includes('u.b'))
		{
			$('#pamong').val('');
			$('#jabatan').val('');
		}
		else
		{
			$('#pamong').val($("#pamong option[data-ttd='1']").val());
			$('#pamong').change();
		}
	}

	function ambil_pamong(elem)
	{
		var nip = elem.data('nip');
		$('#pamong_nip').val(nip);
		elem.closest('.box-body').find('select[name=jabatan]').val(elem.data('jabatan'));
		$('#pamong_id').val(elem.data('pamong-id'));
	}
</script>
							<div class="form-group">
  <label class="col-sm-3 control-label" for="tampil_foto">Tampilkan Foto Penduduk di Surat</label>
  <div class="btn-group col-xs-12 col-sm-8" data-toggle="buttons">
    <label id="m1" class="tipe btn btn-info btn-flat btn-sm col-xs-12 col-sm-6 col-lg-2 form-check-label ">
      <input id="foto1" type="radio" name="tampil_foto" class="form-check-input" type="radio" value="1"  autocomplete="off">Ya
    </label>
    <label id="m2" class="tipe btn btn-info btn-flat btn-sm col-xs-12 col-sm-6 col-lg-2 form-check-label active">
      <input id="foto2" type="radio" name="tampil_foto" class="form-check-input" type="radio" value="0" checked autocomplete="off">Tidak
    </label>
  </div>
</div>

						</div>
						<div class="box-footer">
			<button type="reset" onclick="$('#validasi').trigger('reset');" class="btn btn-social btn-flat btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
									<button type="button" onclick="tambah_elemen_cetak('cetak_rtf'); $('#validasi').submit()" class="btn btn-social btn-flat bg-purple btn-sm pull-right" style="margin-right: 5px;"><i class="fa fa-file-word-o"></i> Unduh RTF</button>
			</div>
<script type="text/javascript">
	function tambah_elemen_cetak($nilai) {
		$('<input>').attr({
				type: 'hidden',
				name: 'submit_cetak',
				value: $nilai
		}).appendTo($('#validasi'));
	}
</script>
					</form>
				</div>
			</div>
		</div>
	</section>

@endsection