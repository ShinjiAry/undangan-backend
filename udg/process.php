<?php
// Cek jika form dikirim melalui metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $name = htmlspecialchars($_POST['name']); // Nama
    $attendance = isset($_POST['hadir']) ? $_POST['hadir'] : "Tidak Diketahui"; // Pilihan Hadir atau Tidak Hadir
    $message_content = htmlspecialchars($_POST['message']); // Pesan dari pengunjung
    $local_time = htmlspecialchars($_POST['local_time']); // Waktu lokal yang dikirim oleh frontend

    // Simpan data ke file 'messages.txt'
    $file = fopen("messages.txt", "a");
    fwrite($file, "$name|$attendance|$message_content|$local_time\n");
    fclose($file);

    // Beri respon sukses
    echo "Data berhasil disimpan!";
} else {
    echo "Metode tidak valid!";
}
