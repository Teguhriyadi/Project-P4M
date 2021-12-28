(function($,W,D) {
	var JQUERY4U = {};
	JQUERY4U.UTIL =
	{
		setupFormValidation: function()
		{
			// Bagian Kategori
			$("#tambahKategori").validate({
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
		}
	}

	$(D).ready(function($) {
		JQUERY4U.UTIL.setupFormValidation();
	});

})(jQuery, window, document);