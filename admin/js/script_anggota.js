// mengambil elemen yang dibutuhkan
var keywordAnggota = document.getElementById('keyword-anggota');
var tableAnggota = document.getElementById('table-anggota');

//menambahkan event ketika keyword di ketik
keywordAnggota.addEventListener('keyup', function () {
	//buat object ajax
	var xhr = new XMLHttpRequest();

	//cek kesiapan ajax
	xhr.onreadystatechange = function () {
		if (xhr.readyState == 4 && xhr.status == 200) {
			tableAnggota.innerHTML = xhr.responseText;
		}
	}

	xhr.open('GET','ajax/data_anggota.php?keyword='+keywordAnggota.value, true);
	xhr.send();
});