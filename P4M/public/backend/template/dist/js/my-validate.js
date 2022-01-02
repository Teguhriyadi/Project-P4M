(function($,W,D) {
	var JQUERY4U = {};
	JQUERY4U.UTIL =
	{
		setupFormValidation: function()
		{
			// Bagian Kategori
            $("#editKategori").validate({
				ignore: "",
				rules: {
					nama: {
						required: true
					}
				},

				messages: {
					nama: {
						required: "Nama harap di isi!"
					}
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			// Bagian Berita
			$("#tambahBerita").validate({
				ignore: "",
				rules: {
					judul: {
						required: true
					},
					kategori_id: {
						required: true
					},
					image: {
						required: true,
						accept: "image/*"
					},
					body: {
						required: true
					},
				},

				messages: {
					judul: {
						required: "Judul harap di isi!"
					},
					kategori_id: {
						required: "Kategori harap di isi!"
					},
					image: {
						required: "Gambar harap di isi!",
						accept: "Tipe file harus gambar (jpg, png, jpeg)"
					},
					body: {
						required: "Konten harap di isi!"
					},
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			$("#editBerita").validate({
				ignore: "",
				rules: {
					judul: {
						required: true
					},
					kategori_id: {
						required: true
					},
					image: {
						accept: "image/*"
					},
					body: {
						required: true
					},
				},

				messages: {
					judul: {
						required: "Judul harap di isi!"
					},
					kategori_id: {
						required: "Kategori harap di isi!"
					},
					image: {
						accept: "Tipe file harus gambar (jpg, png, jpeg)"
					},
					body: {
						required: "Konten harap di isi!"
					},
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			// Bagian Visi Misi
            $("#formVisiMisi").validate({
				ignore: "",
				rules: {
					visi: {
						required: true
					},
					misi: {
						required: true
					}
				},

				messages: {
					visi: {
						required: "Visi harap di isi!"
					},
					misi: {
						required: "Misi harap di isi!"
					},
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			// Bagian Galeri
			$("#formTambahGaleri").validate({
				ignore: "",
				rules: {
					judul: {
						required: true
					},
					gambar: {
						required: true,
						accept: "image/*"
					}
				},

				messages: {
					judul: {
						required: "Judul harap di isi!"
					},
					gambar: {
						required: "Misi harap di isi!",
						accept: "Tipe file harus gambar (jpg, png, jpeg)"
					},
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			$("#formEditGaleri").validate({
				ignore: "",
				rules: {
					judul: {
						required: true
					},
					gambar: {
						accept: "image/*"
					}
				},

				messages: {
					judul: {
						required: "Judul harap di isi!"
					},
					gambar: {
						accept: "Tipe file harus gambar (jpg, png, jpeg)"
					},
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			// Bagian Profil
			$("#formTambahProfil").validate({
				ignore: "",
				rules: {
					deskripsi: {
						required: true
					},
					gambar: {
						required: true,
						accept: "image/*"
					}
				},

				messages: {
					deskripsi: {
						required: "Deskripsi harap di isi!"
					},
					gambar: {
						required: "Gambar harap di isi!",
						accept: "Tipe file harus gambar (jpg, png, jpeg)"
					},
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			$("#formEditProfil").validate({
				ignore: "",
				rules: {
					deskripsi: {
						required: true
					},
					gambar: {
						accept: "image/*"
					}
				},

				messages: {
					deskripsi: {
						required: "Deskripsi harap di isi!"
					},
					gambar: {
						accept: "Tipe file harus gambar (jpg, png, jpeg)"
					},
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			// Bagian Dusun
			$("#tambahDusun").validate({
				ignore: "",
				rules: {
					dusun: {
						required: true
					},
					tahun: {
						required: true
					},
					laki_laki: {
						required: true
					},
					perempuan: {
						required: true
					},
				},

				messages: {
					dusun: {
						required: "Dusun harap di isi!"
					},
					tahun: {
						required: "Tahun harap di isi!"
					},
					laki_laki: {
						required: "Laki-laki harap di isi!"
					},
					perempuan: {
						required: "Perempuan harap di isi!"
					},
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			$("#editDusun").validate({
				ignore: "",
				rules: {
					dusun: {
						required: true
					},
					tahun: {
						required: true
					},
					laki_laki: {
						required: true
					},
					perempuan: {
						required: true
					},
				},

				messages: {
					dusun: {
						required: "Dusun harap di isi!"
					},
					tahun: {
						required: "Tahun harap di isi!"
					},
					laki_laki: {
						required: "Laki-laki harap di isi!"
					},
					perempuan: {
						required: "Perempuan harap di isi!"
					},
				},

				submitHandler: function(form) {
					form.submit();
				}
			});
			
			// Bagian Jabatan
			$("#tambahJabatan").validate({
				ignore: "",
				rules: {
					nama_jabatan: {
						required: true
					}
				},

				messages: {
					nama_jabatan: {
						required: "Nama jabatan harap di isi!"
					}
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			$("#editJabatan").validate({
				ignore: "",
				rules: {
					nama_jabatan: {
						required: true
					}
				},

				messages: {
					nama_jabatan: {
						required: "Nama jabatan harap di isi!"
					}
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			// Bagian Pegawai
			$("#tambahPegawai").validate({
				ignore: "",
				rules: {
					nik: {
						required: true
					},
					nama: {
						required: true
					},
					email: {
						required: true,
						email: true
					},
					jenis_kelamin: {
						required: true
					},
					no_hp: {
						required: true
					},
					alamat: {
						required: true
					},
				},

				messages: {
					nik: {
						required: "NIK harap di isi!"
					},
					nama: {
						required: "Nama harap di isi!"
					},
					email: {
						required: "Email harap di isi!",
						email: "Masukan email valid",
					},
					jenis_kelamin: {
						required: "Jenis kelamin harap di isi!"
					},
					no_hp: {
						required: "No. HP harap di isi!"
					},
					alamat: {
						required: "Alamat harap di isi!"
					},
				},

				submitHandler: function(form) {
					form.submit();
				}
			});
			
			$("#editPegawai").validate({
				ignore: "",
				rules: {
					nik: {
						required: true
					},
					nama: {
						required: true
					},
					email: {
						required: true,
						email: true
					},
					jenis_kelamin: {
						required: true
					},
					no_hp: {
						required: true
					},
					alamat: {
						required: true
					},
				},

				messages: {
					nik: {
						required: "NIK harap di isi!"
					},
					nama: {
						required: "Nama harap di isi!"
					},
					email: {
						required: "Email harap di isi!",
						email: "Masukan email valid",
					},
					jenis_kelamin: {
						required: "Jenis kelamin harap di isi!"
					},
					no_hp: {
						required: "No. HP harap di isi!"
					},
					alamat: {
						required: "Alamat harap di isi!"
					},
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			// Bagian Struktur Pemerintahan
			$("#tambahStruktur").validate({
				ignore: "",
				rules: {
					jabatan_id: {
						required: true
					},
					pegawai_id: {
						required: true
					},
				},

				messages: {
					jabatan_id: {
						required: "Jabatan harap di isi!"
					},
					pegawai_id: {
						required: "Pegawai harap di isi!"
					},
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			$("#editStruktur").validate({
				ignore: "",
				rules: {
					jabatan_id: {
						required: true
					},
					pegawai_id: {
						required: true
					},
				},

				messages: {
					jabatan_id: {
						required: "Jabatan harap di isi!"
					},
					pegawai_id: {
						required: "Pegawai harap di isi!"
					},
				},

				submitHandler: function(form) {
					form.submit();
				}
			});
		}
	}

	$(D).ready(function($) {
		JQUERY4U.UTIL.setupFormValidation();
	});

})(jQuery, window, document);