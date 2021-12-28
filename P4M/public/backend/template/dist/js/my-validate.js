(function($,W,D) {
	var JQUERY4U = {};
	JQUERY4U.UTIL =
	{
		setupFormValidation: function()
		{
			$("#tambahKategori").validate({
				ignore: "",
				rules: {
					nama: {
						required: true
					},
					slug: {
						required: true
					}
				},

				messages: {
					nama: {
						required: "Nama harap di isi!"
					},
					slug: {
						required: "Slug harap di isi!"
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
					},
					slug: {
						required: true
					}
				},

				messages: {
					nama: {
						required: "Nama harap di isi!"
					},
					slug: {
						required: "Slug harap di isi!"
					}
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