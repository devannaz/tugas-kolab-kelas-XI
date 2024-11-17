<?php
include 'koneksi.php';
// ID Developer yang ingin diambil datanya
$id_developer = 1;

// Tutup koneksi
//$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Nazriel Devanaya</title>

    <!-- css -->
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="node_modules/animate.css/animate.css">
     <script src="node_modules/wowjs/dist/wow.min.js"></script>
     <script>
        new WOW().init();
     </script>

    <!-- Tailwind -->
     <script src="https://cdn.tailwindcss.com"></script>

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
  <?php 
  if (isset($_GET["status"]) && $_GET["status"] == "success") {
    echo "<script>alert('Terima kasih, pesan Anda telah terkirim!');</script>";
  }
  ?>

    <!-- Nav start -->
     <section class="pdd">
    <nav class="nav">
    <div class="flex flex-wrap items-center justify-between mx-auto p-4">
        <a class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="img/logo.png" class="h-8" alt="" />
        </a>
        <div class="nav-ul hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
            <li>
            <a href="#home" class="block py-2 px-3 text-xl">Home</a>
            </li>
            <li>
            <a href="#about" class="block py-2 px-3 text-xl">About</a>
            </li>
            <li>
            <a href="#skill" class="block py-2 px-3 text-xl">Skill</a>
            </li>
            <li>
            <a href="#experience" class="block py-2 px-3 text-xl">Experience</a>
            </li>
            <li>
            <a href="#portfolio" class="block py-2 px-3 text-xl">Portfolio</a>
            </li>
            <li class="nav-cont">
            <a href="#contact" class=" block py-2 px-3 text-xl">Contacts</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
  </section>
    <!-- Nav end -->

    <!-- Hero start -->
     <?php
      $query = "select * from developer";
      $query_sql = mysqli_query($conn,$query);
      $tampil = mysqli_fetch_assoc($query_sql);

     ?>
    <section id="home">
      <div class="home flex items-center h-[100vh] flex-wrap flex-col justify-center">
            <!-- Profil -->
            <div class="text text-start">
              <div class="line">
                <h1 class="font-bold relative wow animate__animated animate__slideInDown">
                  Hi there
                </h1>
              </div>
                <h2 class="wow animate__animated animate__fadeInUp">I’m <span><?=$tampil["Name"]?></span>,<br>
                <?=$tampil['job']?></h2>
                <p class="wow animate__animated animate__fadeInUp"><?=$tampil['bio']?></p>
                <div class="hero-btn wow animate__animated animate__zoomIn">
                <a href="#about" class="custom-button">
                  About Me
                </a>
                <span class="arrow">→</span>
              </div>
            </div>
            <div class="img wow animate__animated animate__flipInX">
              <div class="w-[350px] h-[255px] md:w-[450px] md:h-[455px]  border-none  flex items-center justify-center bg-[url(img/<?=$tampil['gambar']?>)] bg-cover"></div>
            </div>
        </div>
     </section>
    <!-- Hero end -->

    <!-- About start -->
    <?php
      $query = "select * from about where id_developer = 1";
      $query_sql = mysqli_query($conn,$query);
      $tampil = mysqli_fetch_assoc($query_sql);

     ?>

     <section class="about" id="about">
        <div class="image-about">
          <img src="img/<?=$tampil["Picture"]?>" alt="">
        </div>

        <div class="text-about">
          <h2>About Me</h2>
          <p><?=$tampil["Bio"]?>
            <br>
            <br>
            <?=$tampil["Bio 2"]?></p>

            <div class="abt-btn">
              <a href="#about" class="custom-button-abt">
                About Me
              </a>
              <span class="arrow-abt">→</span>
            </div>
        </div>
     </section>
    <!-- About end -->

    <!-- skill start -->
    <?php
      $query = "select * from skill where id_developer = 1";
      $query_sql = mysqli_query($conn,$query);
      $skills = mysqli_fetch_all($query_sql, MYSQLI_ASSOC);
     ?>


    <section class="skill" id="skill">
      <h2>My Skill</h2>
      <div class="skill-container">

      <?php
        foreach ($skills as $skill) { ?>
          <div class="skill-item">
              <img src="img/<?= $skill["Picture"] ?>" alt="skill Item 1">
              <h1 class="pt-6 text-3xl"><?= $skill["Subtitle"] ?></h1>  

              <div class="pt-4">
                <div class="biru w-48 h-2 rounded-full">
                  <div class="kuning h-full w-[65%] rounded-full"></div>
                </div>
              </div>

              <p>65%</p>
          </div>
        <?php } ?>
      </div>
  </section>
    <!-- skill end -->

   <!-- portfolio start -->
   <?php
      $query = "select * from portfolio where id_developer = 1";
      $query_sql = mysqli_query($conn,$query);
      $portfolios = mysqli_fetch_all($query_sql, MYSQLI_ASSOC);
     ?>

      


   <section class="portfolio" id ="portfolio">
    <h2><span>My</span> Portfolio</h2>
    <div class="port-wrap">
    <?php
        foreach ($portfolios as $portfolio) { ?>
        <div class="port-card">
            <p><?= $portfolio["Subtitle"];?></p>
            <img src="img/<?= $portfolio["Picture"];?>" alt="portofolio Item 1">
        </div>
        <?php } ?>
    </div>
   </section>
  <!-- portfolio end -->

    <!-- Experience start -->
    <?php
      $query = "select * from experience where id_developer = 1 ORDER BY id_Experience desc";
      $query_sql = mysqli_query($conn,$query);
      $experiences = mysqli_fetch_all($query_sql, MYSQLI_ASSOC);
     ?>


    <section class="experience" id="experience">
      <h2><span>My</span> Experience</h2>
      <div class="experience-container">

        <?php
        foreach ($experiences as $experience) { ?>
        <div class="experience-item">
          <div class="experience-card">
            <h1><?= $experience["Title"];?></h1>
            <h3><?= $experience["Subtitle"];?></h3>
            <p><?= $experience["Description"];?></p>
          </div>
          <?php } ?>
        </div>
      </div>
  </section>
    <!-- Experience end -->

    <!-- Contact start -->
    <div class="contact-container" id="contact">
      <div class="contact-form">
        <h1>Contact Us <br>
        <form action="contact.php" method="post">
            <span>Get in touch</span>
        </h1>
          <input type="text" id="name" name="name" placeholder="Your Name" required>
          
          <input type="email" id="email" name="email" placeholder="Your Email Address" required>

          <textarea id="message" name="message" placeholder="Your Message" required></textarea>
          <div class="abt-btn">
              <button type="submit" name="submit" class="custom-button-abt">Send</button>
              <span class="arrow-abt">→</span>
            </div>
        </form>
      </div>

      <div class="contact-img">
        <img src="img/image-contact.png" alt="">
      </div>
    </div>
    <!-- Contact end -->

</body>
</html>