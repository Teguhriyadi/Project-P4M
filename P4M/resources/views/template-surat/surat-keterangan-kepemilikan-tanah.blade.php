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
					<div class="box-header with-border">
						<a href="https://demo.opensid.or.id/surat" class="btn btn-social btn-flat btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i>Kembali Ke Daftar Cetak Surat
						</a>
					</div>
					<div class="box-body">
						<form id="main" name="main" method="POST" class="form-horizontal">
							<div class="form-group cari_nik">
	<label for="nik"  class="col-sm-3 control-label">NIK / Nama </label>
	<div class="col-sm-6 col-lg-4">
  	<select class="form-control required input-sm select2-nik-ajax readonly-permohonan readonly-periksa" id="nik" name="nik" style ="width:100%;" data-filter-sex="" data-url="https://demo.opensid.or.id/surat/list_penduduk_ajax" onchange="formAction('main')">
					</select>
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
						<form id="validasi" action="{{ url('/page/admin/cetak_surat/form/'.$detail_surat->url_surat) }}"  method="POST" class="form-horizontal" target="_blank">
							<input type="hidden" id="url_surat" name="url_surat" value="surat_ket_kepemilikan_tanah">
							<input type="hidden" id="url_remote" name="url_remote" value="https://demo.opensid.or.id/surat/nomor_surat_duplikat">
														<div class="row jar_form">
								<label for="nomor" class="col-sm-3"></label>
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
	<input type="hidden" name="id_surat" value="173">
	<label class="col-sm-3 control-label">Nomor Surat</label>
	<div class="col-sm-4">
		<input id="nomor" class="form-control input-sm digits required" type="text" placeholder="Nomor Surat" name="nomor" value="1">
		<p class="help-block text-red small">Terakhir untuk jenis surat Keterangan Kepemilikan Tanah: <strong></strong> (tgl: -)</p>
	</div>
			<div class="col-sm-4">
			<p class="help-block"><em>Format nomor surat: </em><span id="format_nomor">S-49/001/3204142006/I/2022</span></p>
		</div>
	</div>

							<div class="form-group subtitle_head" id="detail_kendaraan">
								<label class="col-sm-3 control-label">DETAIL INFORMASI TANAH / LAHAN<br></label>
							</div>

							<div class="form-group">
								<div class="col-sm-3">
									<label for="jenis_tanah">Jenis Tanah</label>
									<select class="form-control input-sm required" name="jenis_tanah" onchange="$('input[name=jenis_tanah_nama]').val($(this).find(':selected').data('jenis_tanahnama'));">
										<option value=""> ->> Pilih Jenis Tanah/Lahan <<- </option>
																					<option value="TANAH SAWAH" data-jenis_tanahnama="Tanah Sawah" >Tanah Sawah</option>
																					<option value="TANAH DARAT" data-jenis_tanahnama="Tanah Darat" >Tanah Darat</option>
																					<option value="TANAH BANGUNAN" data-jenis_tanahnama="Tanah Bangunan" >Tanah Bangunan</option>
																			</select>
								</div>
								<div class="col-sm-3">
									<label for="luas_tanah">Luas Tanah</label>
									<input name="luas_tanah" class="form-control input-sm required" placeholder="Luas Tanah (dalam M2)">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3">
									<label for="bukti_kepemilikan">Bukti Kepemilikan</label>
									<select class="form-control input-sm required" name="bukti_kepemilikan" onchange="$('input[name=bukti_kepemilikan_nama]').val($(this).find(':selected').data('bukti_kepemilikannama'));">
										<option value=""> ->> Pilih Bukti Kepemilikan Tanah <<- </option>
																					<option value="PETOK LAMA" data-bukti_kepemilikannama="Petok lama" >Petok lama</option>
																					<option value="PETOK BARU" data-bukti_kepemilikannama="Petok baru" >Petok baru</option>
																					<option value="SIT SEGEL" data-bukti_kepemilikannama="Sit segel" >Sit segel</option>
																					<option value="AKTA" data-bukti_kepemilikannama="Akta" >Akta</option>
																					<option value="COPY" data-bukti_kepemilikannama="Copy" >Copy</option>
																					<option value="BUKU KRAWANGAN DESA" data-bukti_kepemilikannama="Buku Krawangan Desa" >Buku Krawangan Desa</option>
																					<option value="LAINNYA" data-bukti_kepemilikannama="Lainnya" >Lainnya</option>
																			</select>
								</div>
								<div class="col-sm-3">
									<label for="nomor_kepemilikan">Nomor Bukti Kepemilikan</label>
									<input name="nomor_kepemilikan" class="form-control input-sm required" placeholder="Nomor Bukti Kepemilikan">
								</div>
								<div class="col-sm-3">
									<label for="atas_nama">Atas Nama</label>
									<input name="atas_nama" class="form-control input-sm required" placeholder="Atas Nama">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3">
									<label for="asal_tanah">Asal Kepemilikan Tanah</label>
									<select class="form-control input-sm required" name="asal_tanah" onchange="$('input[name=asal_tanah_nama]').val($(this).find(':selected').data('asal_tanahnama'));">
										<option value=""> ->> Pilih Asal Kepemilikan Tanah <<- </option>
																					<option value="YAYASAN" data-asal_tanahnama="Yayasan" >Yayasan</option>
																					<option value="WARISAN" data-asal_tanahnama="Warisan" >Warisan</option>
																					<option value="HIBAH" data-asal_tanahnama="Hibah" >Hibah</option>
																					<option value="JUAL BELI" data-asal_tanahnama="Jual Beli" >Jual Beli</option>
																					<option value="LAINNYA" data-asal_tanahnama="Lainnya" >Lainnya</option>
																			</select>
								</div>
								<div class="col-sm-3">
									<label for="bukti_pendukungg">Bukti Pendukung Kepemilikan</label>
									<input name="bukti_pendukung" class="form-control input-sm required" placeholder="Bukti Pendukung Kepemilikan">
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-3">
									<label for="utara">Batas Sebelah Utara</label>
									<input name="utara" class="form-control input-sm required" placeholder="Batas Sebelah Utara">
								</div>
								<div class="col-sm-3">
									<label for="timur">Batas Sebelah Timur</label>
									<input name="timur" class="form-control input-sm required" placeholder="Batas Sebelah Timur">
								</div>
								<div class="col-sm-3">
									<label for="selatan">Batas Sebelah Selatan</label>
									<input name="selatan" class="form-control input-sm required" placeholder="Batas Sebelah Selatan">
								</div>
								<div class="col-sm-3">
									<label for="barat">Batas Sebelah Barat</label>
									<input name="barat" class="form-control input-sm required" placeholder="Batas Sebelah Barat">
								</div>
							</div>

							<div class="form-group subtitle_head" id="detail_kendaraan">
								<label class="col-sm-3 control-label">PENANDATANGAN<br></label>
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
						</form>
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
				</div>
			</div>
		</div>
	</section>
@endsection