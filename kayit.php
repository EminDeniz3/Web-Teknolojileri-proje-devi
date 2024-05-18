<?php
session_start(); // Oturumu başlat

include ("baglanti.php");

if (isset($_POST["kaydet"])) {
    $name = $_POST["kullanici_adi"];
    $email = $_POST["email"];
    $password = password_hash($_POST["sifre"], PASSWORD_DEFAULT);

    $ekle = "INSERT INTO kullanicilar (kullanici_adi, email, parola) VALUES ('$name','$email','$password')";
    $calistirekle = mysqli_query($baglanti, $ekle);
    if ($calistirekle) {
      // Başarılı kayıt olduğunda kullanıcı adını bir GET parametresi olarak welcome.php sayfasına yönlendir
      header("Location: welcome.php?username=" . urlencode($name));
      exit();
  } else {
      echo ' <div class="alert alert-danger" role="alert">
          Kayıt eklenirken bir hata oluştu!
          </div>';
  }

    mysqli_close($baglanti);
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hoş Geldiniz</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
        crossorigin="anonymous">
</head>

<body>
    <div class="container p-5">
        <div class="card p-5">
            <?php
            // Eğer kullanıcı adı oturumda varsa, hoş geldin mesajını göster
            if (isset($_SESSION['kullanici_adi'])) {
                echo "<h1>" . $_SESSION['kullanici_adi'] . ", Hoş Geldiniz!</h1>";
            } else {
                // Eğer kullanıcı giriş yapmadıysa, giriş formunu göster
            ?>
            <form action="homepage.html" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Kullanıcı Adı</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="kullanici_adi">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Şifre</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="sifre">
                </div>
                <button type="submit" name="kaydet" class="btn btn-primary">Giriş </button>
            </form>
            <?php
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery.cookie.js"></script>
    <script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.11.custom.min.js"></script>
    <script>
        function kaydet() {
            // Kullanıcı adını al
            var kullaniciAdi = document.getElementById("kullaniciAdi").value;
            // Kullanıcı adını localStorage'a kaydet
            localStorage.setItem("kullaniciAdi", kullaniciAdi);
            // Kayıt işlemi bittikten sonra welcome.php sayfasına yönlendir
            window.location.href = "welcome.php";
        }
    </script>
</body>

</html>
