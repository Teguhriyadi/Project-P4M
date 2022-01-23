setupFormValidation: function()
		{
			// Bagian Kategori


			// Bagian Berita




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
			// $("#formTambahProfil").validate({
			// 	ignore: "",
			// 	rules: {
			// 		deskripsi: {
			// 			required: true
			// 		},
			// 		gambar: {
			// 			required: true,
			// 			accept: "image/*"
			// 		}
			// 	},

			// 	messages: {
			// 		deskripsi: {
			// 			required: "Deskripsi harap di isi!"
			// 		},
			// 		gambar: {
			// 			required: "Gambar harap di isi!",
			// 			accept: "Tipe file harus gambar (jpg, png, jpeg)"
			// 		},
			// 	},

			// 	submitHandler: function(form) {
			// 		form.submit();
			// 	}
			// });

			// $("#formEditProfil").validate({
			// 	ignore: "",
			// 	rules: {
			// 		deskripsi: {
			// 			required: true
			// 		},
			// 		gambar: {
			// 			accept: "image/*"
			// 		}
			// 	},

			// 	messages: {
			// 		deskripsi: {
			// 			required: "Deskripsi harap di isi!"
			// 		},
			// 		gambar: {
			// 			accept: "Tipe file harus gambar (jpg, png, jpeg)"
			// 		},
			// 	},

			// 	submitHandler: function(form) {
			// 		form.submit();
			// 	}
			// });

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

			// Bagian Geografis
			$("#formGeografis").validate({
				ignore: "",
				rules: {
					deskripsi_geografis: {
						required: true
					},
				},

				messages: {
					deskripsi_geografis: {
						required: "Deskripsi harap di isi!"
					},
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			// Bagian Wilayah
			$("#tambahWilayah").validate({
				ignore: "",
				rules: {
					batas: {
						required: true
					},
					desa: {
						required: true
					},
					kecamatan: {
						required: true
					},
				},

				messages: {
					batas: {
						required: "Batas harap di isi!"
					},
					desa: {
						required: "Desa harap di isi!"
					},
					kecamatan: {
						required: "Kecamatan harap di isi!"
					},
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			$("#editWilayah").validate({
				ignore: "",
				rules: {
					batas: {
						required: true
					},
					desa: {
						required: true
					},
					kecamatan: {
						required: true
					},
				},

				messages: {
					batas: {
						required: "Batas harap di isi!"
					},
					desa: {
						required: "Desa harap di isi!"
					},
					kecamatan: {
						required: "Kecamatan harap di isi!"
					},
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			// Bagian Alamat
			$("#formAlamat").validate({
				ignore: "",
				rules: {
					website: {
						required: true
					},
					no_telepon: {
						required: true
					},
					alamat: {
						required: true
					},
				},

				messages: {
					website: {
						required: "Website harap di isi!"
					},
					no_telepon: {
						required: "Telepon harap di isi!"
					},
					alamat: {
						required: "Alamat harap di isi!"
					},
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			// Bagian Akun
			$("#tambahAkun").validate({
				ignore: "",
				rules: {
					name: {
						required: true
					},
					username: {
						required: true
					},
					email: {
						required: true,
						email: true
					},
					password: {
						required: true
					},
					hak_akses_id: {
						required: true
					},
					gambar: {
						required: true,
						accept: "image/*"
					}
				},

				messages: {
					name: {
						required: "Nama harap di isi!"
					},
					username: {
						required: "Username harap di isi!"
					},
					email: {
						required: "Email harap di isi!",
						email: "Masukan email valid!"
					},
					password: {
						required: "Password harap di isi!"
					},
					hak_akses_id: {
						required: "Hak akses harap di isi!"
					},
					gambar: {
						required: "Gambar harap di isi!",
						accept: "Tipe file harus gambar (jpg, png, jpeg)"
					}
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			$("#editAkun").validate({
				ignore: "",
				rules: {
					name: {
						required: true
					},
					username: {
						required: true
					},
					email: {
						required: true,
						email: true
					},
					password: {
						required: true
					},
					hak_akses_id: {
						required: true
					},
					gambar: {
						accept: "image/*"
					}
				},

				messages: {
					name: {
						required: "Nama harap di isi!"
					},
					username: {
						required: "Username harap di isi!"
					},
					email: {
						required: "Email harap di isi!",
						email: "Masukan email valid!"
					},
					password: {
						required: "Password harap di isi!"
					},
					hak_akses_id: {
						required: "Hak akses harap di isi!"
					},
					gambar: {
						accept: "Tipe file harus gambar (jpg, png, jpeg)"
					}
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			// Bagian Hak Ases
			$("#editHakAkses").validate({
				ignore: "",
				rules: {
					nama_hak_akses: {
						required: true
					},
				},

				messages: {
					nama_hak_akses: {
						required: "Hak akses harap di isi!"
					},
				},

				submitHandler: function(form) {
					form.submit();
				}
			});
		}
