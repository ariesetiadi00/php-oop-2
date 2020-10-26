$(function () {
	// Jika member diklik, masuk ke form update
	$("tr.member-list").click(function () {
		let id = $(this).data("id");
		
		// Request data menggunakan ajax
		$.ajax({
			url: "/lat-sertifikasi2/page/get.php",
			data: { id: id },
			dataType: "JSON",
			method: "POST",
			success: function (member) {
				member = member.member;

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
	});
});
