<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IT Solution Hub</title>
  <link rel="shortcut icon" href="img/favicon_.png" />
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/index.css">
</head>
<body>
  <?php
    session_start();
    include('nav.php'); 
  ?>
  
<div class="bg">
  <div class="home__container">
    <div class="section__main">
      <div class="main__left">
        <div class="title__container">
          <h1>Hire The Best People.
          </h1>
        </div>
        <div class="button__container">
          <button>
            <a class="first" href="./talent.php">Find Experts</a>
          </button>
          <button>
            <a class="second" href="./work.php"> Find Works</a>
          </button>
        </div>
      </div>
      <div class="section__ellipse">
        <div class="image__container">
          <img src="" alt="" />
          <img src="" alt="" />
          <img src="" alt="" />
          <img src="" alt="" />
          <img src="" alt="" />
          <img src="" alt="" />
          <img src="" alt="" />
        </div>
        <div class="paragraph__container">
          <p>
            Post your problem and connect with the Experts. Services
            start
          </p>
          <div class="paragraph__container--lastLine">
            <p>from</p>
            <h1>99.00 BDT</h1>
            <p>only</p>
          </div>
        </div>
        <div class="social__container">

          <img src="" alt="" />
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>