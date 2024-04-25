<?php
// Set konfigurasi server SMTP
ini_set("SMTP", "smtp.hostinger.com");
ini_set("smtp_port", "465"); // Port SMTP yang digunakan (sesuaikan jika diperlukan)
ini_set("sendmail_from", "notifikasi@intechofficial.com"); // Alamat email pengirim

// Ambil nilai dari form jika metode yang digunakan adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    // Validasi data (misalnya, pastikan tidak ada input yang kosong)
    if (empty($name) || empty($email) || empty($message)) {
        // Jika ada input yang kosong, kirim pesan kesalahan
        echo "Harap lengkapi semua kolom.";
    } else {
        // Tujuan email yang akan menerima pesan
        $to = "intechofficialteam@gmail.com";
        
        // Subjek email
        $subject = "Pesan dari $name";

        // Isi pesan
        $body = "Nama: $name\n";
        $body .= "Email: $email\n\n";
        $body .= "Pesan:\n$message";

        // Header email
        $headers = "From: $name <$email>";

        // Kirim email
        if (mail($to, $subject, $body, $headers)) {
            // Jika email berhasil dikirim, kirim pesan berhasil
            echo "Pesan Anda berhasil dikirim.";
        } else {
            // Jika gagal mengirim email, kirim pesan kesalahan
            echo "Maaf, ada masalah saat mengirim pesan.";
        }
    }
} else {
    // Jika akses langsung ke script PHP ini tanpa melalui formulir, tampilkan pesan kesalahan
    echo "Akses tidak valid.";
}
?>
