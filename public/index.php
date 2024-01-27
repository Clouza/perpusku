<?php
require_once '../app/handlers/Book.php';
$book = new \App\Handler\Book;

$books = $book->getBooks();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./dist/css/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <title>HOME | Perpusku</title>
</head>

<body id="home">
  <header>
    <!-- navigation -->
    <section class="navigation">
      <div class="container">
        <div class="box-navigation animate__animated animate__fadeInDown">
          <div class="box">
            <h1>Perpusku</h1>
          </div>
          <div class="box menu-navigation">
            <ul>
              <li>
                <i class="ri-home-3-line"></i>
                <a href="#home">Beranda</a>
              </li>
              <li>
                <i class="ri-information-line"></i>
                <a href="#about">About</a>
              </li>
              <li>
                <i class="ri-dashboard-line"></i>
                <a href="#famous">Genre</a>
              </li>
              <li>
                <i class="ri--line"></i>
                <a href="#rating">Rating</a>
              </li>
              <li>
                <i class="ri-phone-line"></i>
                <a href="#contact">Contact</a>
              </li>
            </ul>
          </div>
          <div class="box menu-bar">
            <i class="ri-menu-3-fill" style="color: white"></i>
          </div>
        </div>
      </div>
    </section>
    <!-- navigation -->

    <!-- hero -->
    <section class="hero">
      <h1 class="animate__animated animate__pulse">Amazing Book All in Perpusku</h1>
    </section>
    <!-- hero -->
  </header>

  <!-- about -->
  <section class="about" id="about">
    <div class="container">
      <div class="box-about">
        <div class="box" data-aos="fade-right" data-aos-duration="1000">
          <h1>B O O K</h1>
          <p>
            Buku adalah suatu bentuk media yang terdiri dari kumpulan halaman yang dijilid bersama-sama, biasanya
            terbuat dari kertas, dan di dalamnya berisi teks atau gambar. Buku dapat berupa karya tulis fiksi atau
            non-fiksi yang mencakup berbagai topik, seperti sastra, sains, sejarah, dan banyak lagi.
          </p>
        </div>
        <div class="box" data-aos="zoom-in" data-aos-duration="1000">
          <img src="./image/satu.jpg" alt="" />
        </div>
      </div>
    </div>
  </section>
  <!-- about -->

  <!-- famous -->
  <section class="famous" id="famous">
    <div class="container">
      <div class="box-famous">
        <div class="box" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="100">
          <img src="./image/genre-1.jpg" alt="" />
          <h1>Novel</h1>
          <p>Buku novel salah satu adalah bentuk karya sastra yang melibatkan cerita panjang dan imajinatif, seringkali
            fiktif. </p>
        </div>
        <div class="box" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300">
          <img src="./image/genre-2.jpg" alt="" />
          <h1>Romance</h1>
          <p>Buku roman adalah salah satu subgenre dalam fiksi yang menekankan pada elemen cinta dan perkembangan
            emosional.</p>
        </div>
        <div class="box" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="500">
          <img src="./image/genre-3.jpg" alt="" />
          <h1>Horor</h1>
          <p>Buku horor adalah karya sastra yang dirancang untuk menciptakan perasaan ketakutan dan ketegangan pembaca.
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- famous -->

  <!-- gallery -->
  <sectio class="rating" id="rating">
    <div class="tabel">
      <h3>Rating Buku Favorit</h3>
      <br>
      <table>
        <thead>
          <tr>
            <th>NAMA BUKU</th>
            <th>JUMLAH PEMINJAM</th>
            <th>GENRE BUKU</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($books as $book) : ?>
            <tr>
              <td><?= $book['name'] ?></td>
              <td><?= $book['borrowers'] ?></td>
              <td><?= $book['genre'] ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    </section>
    <!-- gallery -->

    <!-- contact -->
    <div class="contact" id="contact">
      <div class="container">
        <div class="contact-box">
          <div class="box">
            <i class="fa-solid fa-star"></i>
            <h1>Contact Kami</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit rerum delectus enim facilis illo
              inventore perspiciatis laudantium repellat officia nulla!</p>
          </div>
          <div class="form-contact">
            <form action="" method="post">
              <table>
                <tr>
                  <td>
                    <input type="text" name="First Name" placeholder="First Name" required autocomplete="off" />
                  </td>
                  <td>
                    <input type="text" name="Last Name" placeholder="Last Name" autocomplete="off" />
                  </td>
                </tr>
                <tr>
                  <td colspan="2"><input type="email" name="Email" placeholder="Your Email" required autocomplete="off" style="width: 100%" /></td>
                </tr>
                <tr>
                  <td colspan="2">
                    <textarea name="Pesan" cols="30" rows="10" placeholder="Pesan..." required style="width: 100%"></textarea>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <button type="submit" onclick="return confirm('Apakah Anda ingin Mengirim Pesan?')">Kirim</button>
                  </td>
                </tr>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- contact -->

    <!-- footer -->
    <script src="./dist/js/script.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>

</html>