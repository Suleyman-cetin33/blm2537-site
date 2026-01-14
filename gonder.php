<?php
// Türkçe karakter sorunu olmaması için ayar
header("Content-Type: text/html; charset=utf-8");

// Sadece POST yöntemiyle gelinmişse çalışsın
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Formdan gelen verileri alalım ve temizleyelim (Güvenlik için)
    $isim = htmlspecialchars(trim($_POST['isim']));
    $email = htmlspecialchars(trim($_POST['email']));
    $mesaj = htmlspecialchars(trim($_POST['mesaj']));

    // 2. Senin Mail Adresin (Mesaj buraya gelecek)
    $alici_email = "cetinsuleyman2005@gmail.com"; // BURAYA KENDİ MAİLİNİ YAZ

    // 3. Mailin Konusu
    $konu = "Blog Sitesinden Yeni Mesaj: " . $isim;

    // 4. Mailin İçeriği
    $icerik = "Ad Soyad: " . $isim . "\n";
    $icerik .= "E-posta: " . $email . "\n\n";
    $icerik .= "Mesaj:\n" . $mesaj;

    // 5. Mail Başlıkları (Kimden geldiği vs.)
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // 6. Maili Gönder
    // Not: Bu fonksiyon sadece gerçek sunucuda (Hosting) çalışır.
    if (mail($alici_email, $konu, $icerik, $headers)) {
        // Başarılıysa kullanıcıyı bilgilendir
        echo "<script>
                alert('Mesajınız başarıyla gönderildi! Teşekkürler.');
                window.location.href = 'iletisim.html';
              </script>";
    } else {
        // Hata varsa
        echo "<script>
                alert('Mesaj gönderilirken bir hata oluştu.');
                window.history.back();
              </script>";
    }

} else {
    // Eğer direkt bu sayfaya girmeye çalışırlarsa ana sayfaya at
    header("Location: index.html");
}
?>