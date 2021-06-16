// mengambil elemen yang dibutuhkan
var keywordBuku = document.getElementById('keyword');
var tableBuku = document.getElementById('peminjaman');

//menambahkan event ketika keyword di ketik
keywordBuku.addEventListener('keyup', function () {
	//buat object ajax
	var xhr = new XMLHttpRequest();

	//cek kesiapan ajax
	xhr.onreadystatechange = function () {
		if (xhr.readyState == 4 && xhr.status == 200) {
			tableBuku.innerHTML = xhr.responseText;
		}
	}

	xhr.open('GET','ajax/table_peminjaman.php?keyword='+keywordBuku.value, true);
	xhr.send();
});