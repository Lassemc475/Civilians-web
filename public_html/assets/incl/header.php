<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-128969625-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-128969625-2');
</script>
    <meta charset="utf-8">
    <?php
        $title = (isset($title)) ? $title : "CiviliansNetwork"
    ?>
    <title><?=$title?></title>
    <link rel="icon" href="./assets/img/logo.png" type="image/icon">
    <meta name="description" content="<?=$title?>">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js?hl=da'></script>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>

<header>
      <nav class="mobile-menu">
          <label for="show-menu" class="show-menu"><span></span><div class="lines"></div></label>
          <input type="checkbox" id="show-menu">
          <p class="mobile-text">CiviliansNetwork</p>
          <ul id="menu">
              <li class="branding"><a href="index.php">CiviliansNetwork</a>		</li>
              <li><a href="refund.php">Refund</a>		</li>
              <li><a href="ansøgninger.php">Ansøgninger</a>		</li>
              <li><a href="index.php">Hjem</a></li>
          </ul>
      </nav>
  </header>