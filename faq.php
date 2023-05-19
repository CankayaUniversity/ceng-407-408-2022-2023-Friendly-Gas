<?php
include $_SERVER['DOCUMENT_ROOT'] . '/includes/autoloader.inc.php';
$db = new Database();
$res = $db->Get("faq", null, false, "id", "1", null, null);

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faq | Friendly Gas</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/faq/style.css">
  <link rel="stylesheet" href="assets/css/faq/phone.css">
</head>
<body>

<!-- Nav Start -->
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.html"><img src="" class="navbar-brand-img" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav m-auto">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="index.html"><img src="media/images/logo.png" alt=""></a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="index.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="nearest-gas-stations.html">Nearest Gas Stations</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="faq.html">F.A.Q</a>
        </li>

      </ul>
    </div>
  </div>
</nav>
<!-- Nav End -->

<!-- Section-1 Start -->
<div class="section-1 container-fluid" style="background-color: #ffe400">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">F.A.Q</li>
    </ol>
  </nav>
</div>
<!-- Section-1 End -->

<!-- Section-2 Start -->
<div class="section-2 container">
  <div class="row">
    <div class="col-lg-6">
      <div class="box">
        <img src="media/images/logo.png" alt="faq" title="faq" class="d-none d-lg-block">
      </div>
    </div>
    <div class="col-lg-6">
      <div class="box">
        <h1>Frequently Asked Questions</h1>

        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <?php echo $res["question_1"] ?>
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong><?php echo $res["answer_1"] ?></strong>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <?php echo $res["question_2"] ?>
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong><?php echo $res["answer_2"] ?></strong>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <?php echo $res["question_3"] ?>
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong> <?php echo $res["answer_3"] ?> </strong>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <?php echo $res["question_4"] ?>
              </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong><?php echo $res["answer_4"] ?></strong>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  <?php echo $res["question_5"] ?>
              </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong><?php echo $res["answer_5"] ?></strong>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                  <?php echo $res["question_6"] ?>
              </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong><?php echo $res["answer_6"] ?></strong>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
</div>
<!-- Section-2 End -->




<!-- Footer Start -->
<footer class="container">
    <div class="row">
        <div class="col-lg 3">
            <div class="box"> 
            </div>
        </div>
        <div class="col-lg 3">
            <div class="box">
                <h6>Team Information</h6>
                <ul>
                    <li>
                        <a class="nav-link" href="index.html">About us</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg 3">
            <div class="box">
                <h6>Features</h6>
                <ul>
                    <li>
                        <a class="nav-link" href="nearest-gas-stations.html">Nearest Gas Station</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->
<div class="footer-layout" style="margin-top: 45px;">
    <img src="media/images/footer.png" alt="">
    <p>
        2023 Friendly Gas All rights reserved.
    </p>
</div>

<!--
    <div class="container">
        <h1 class="status"></h1>
        <button class="btn btn-success find-state" onclick="getLocation()">Get Location</button>

        <div id="map" class="google_map"></div>
    </div>
    -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>