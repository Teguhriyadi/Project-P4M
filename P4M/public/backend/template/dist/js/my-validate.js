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
		}
	}

	$(D).ready(function($) {
		JQUERY4U.UTIL.setupFormValidation();
	});

})(jQuery, window, document);