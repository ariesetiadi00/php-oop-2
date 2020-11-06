$(function () {
	// Jika member diklik, masuk ke form update
	$("tr.member-list").click(function () {
		let id = $(this).data("id");
		let type = $(this).data("type");

	
		if (type == 'sekolah') {
			$.ajax({
				url: "/lat-sertifikasi3/page/get.php",
				data: {
					id: id,
					type: type
				},
				dataType: "JSON",
				method: "POST",
				success: function (sekolah) {
					console.log(sekolah);
					sekolah = sekolah.sekolah;

					// Ubah Judul Form Sekolah
					$('.form-title').html("Ubah Sekolah");
					$("#form-main").attr("action", "page/update.php");

					// Ubah Value pada form
					$('#id').val(sekolah.id);
					$('#nama_sekolah').val(sekolah.nama_sekolah);
					$('#nama_kepala_sekolah').val(sekolah.nama_kepala_sekolah);
					$('#alamat_sekolah').val(sekolah.alamat_sekolah);
					$('#jumlah_murid').val(sekolah.jumlah_murid);
					$('#jumlah_guru').val(sekolah.jumlah_guru);
					$('#tanggal_berdiri').val(sekolah.tanggal_berdiri);

					// Ubah Button
					$("#form-tambah").removeClass("d-none");
					$("#submit").html("Ubah");

				}
			});
		} else {
			// Request data menggunakan ajax
			$.ajax({
				url: "/lat-sertifikasi3/page/get.php",
				data: {
					id: id,
					type: type
				},
				dataType: "JSON",
				method: "POST",
				success: function (member) {
					member = member.member;
					console.log(member);
	
					// Ubah judul dan action form
					$(".form-title").html("Ubah Member");
					$("#form-main").attr("action", "page/update.php");
	
					// Masukan data member ke form
					$("#id").val(member.id);
					$("#nama").val(member.nama);
					$("#alamat").val(member.alamat);
					$("#telepon").val(member.telepon);
					if (member.jenis_kelamin == "l") {
						$("input#p").attr("checked", false);
						$("input#l").attr("checked", true);
					} else {
						$("input#l").attr("checked", false);
						$("input#p").attr("checked", true);
					}
	
					// Ubah Button
					$("#form-tambah").removeClass("d-none");
					$("#submit").html("Ubah");
				},
			});
		}

	});
});
