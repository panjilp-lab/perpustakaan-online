// mengambil elemen yang dibutuhkan
var btnPilih = document.getElementById('btn-pilih');
var noPeminjaman = document.getElementById('no_peminjaman');
var tanggalPeminjaman = document.getElementById('tanggal_peminjaman');
var tanggalPengembalian = document.getElementById('tanggal_pengembalian');
var denda = document.getElementById('denda');

//menambahkan event ketika keyword di ketik
btnPilih.addEventListener('click', function () {
	//buat object ajax
	var xhr = new XMLHttpRequest();

	//cek kesiapan ajax
	xhr.onreadystatechange = function () {
		if (xhr.readyState == 4 && xhr.status == 200) {
			tableBuku.innerHTML = xhr.responseText;
		}
	}
	xhr.open('GET','ajax/peminjaman.php?keyword='+keywordBuku.value, true);
	xhr.send();
});