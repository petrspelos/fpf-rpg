<?php
    // KDYŽ UŽIVATEL NENÍ PŘIHLÁŠENÝ, POŠLE HO TO ZPĚT
    // NA LANDING-PAGE, TÍM PÁDEM MŮŽEŠ PŘEDPOKLÁDAT
    // ŽE UŽIVATEL 100% JE PŘIHLÁŠEN
  if(!self::isLoggedIn())
  {
      header('Location: landing-page');
      die();
  }
  	$userName = self::query("SELECT username FROM users WHERE ID=:ID", array(':ID'=>self::isLoggedIn()))[0]['username'];
    if(!isset($_GET['user']))
    {
		header('Location: profile?user='.$userName);
		die();
	}
	if(!self::query("SELECT * FROM users WHERE username=:un", array(':un'=>$_GET['user'])))
	{
	   header('Location: home');
       die();
	}
	$playerId = self::query("SELECT ID FROM users WHERE username=:un", array(':un'=>$_GET['user']))[0]['ID'];
	if(!self::query("SELECT * FROM students WHERE user_id=:ui", array(':ui'=>$playerId)))
	{
	   header('Location: home');
       die();
	}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FPF RPG</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Material Design -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.deep_purple-red.min.css">

    <style>
        body {
            background-color: #eee;
            padding: 0px;
        }

        .profile-image{
          width: 100%;
          box-shadow: 0px 0px 3px 0px rgba(0,0,0,0.5);
        }

        .main-choices{
          width: 100%;
        }
    </style>
</head>
<!--
      ===========================================================================
                                      BODY
      ===========================================================================
    -->

<body>
    <?php echo "<script>var gameVersion = '".GAME_VERSION."';</script>";?>
        <!-- Simple header with fixed tabs. -->
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header
            mdl-layout--fixed-tabs">
            <header class="mdl-layout__header">
                <div class="mdl-layout__header-row">
                    <!-- Title -->
                    <span class="mdl-layout-title">Profil hráče</span>
                </div>
            </header>
            <div class="mdl-layout__drawer">
                <span class="mdl-layout-title">Menu</span>
                <hr>
                <button class="mdl-button mdl-js-button " onClick="goTo('home');">
                    Domů
                </button>
                <hr>
                <button class="mdl-button mdl-js-button " onClick="goTo('logout');">
                    Odhlásit se
                </button>
            </div>
            <main class="mdl-layout__content">
                <!-- Wide card with share menu button -->
<div class="mdl-grid">
  <div class="mdl-cell mdl-cell--12-col">
  <style>
.demo-card-wide.mdl-card {
  width: 100%;
}
.demo-card-wide > .mdl-card__title {
  color: #fff;
  text-shadow: 1px 1px black;
  height: 176px;
  background: url('http://pre05.deviantart.net/690e/th/pre/f/2015/018/5/4/overwatch___mercy_2_by_sonellion-d8eczkm.jpg') center / cover;
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
</style>

<div class="demo-card-wide mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title" id="backgroundTag">
    <h2 class="mdl-card__title-text" id="nameTag">Welcome</h2>
  </div>
  <div class="mdl-card__supporting-text">
<!-- Two Line List with secondary info and action -->
<style>
.demo-list-two {
  width: 300px;
}
</style>

<ul class="demo-list-two mdl-list">
  <li class="mdl-list__item mdl-list__item--two-line">
    <span class="mdl-list__item-primary-content">
      <i class="material-icons mdl-list__item-avatar">attach_money</i>
      <span>Peníze</span>
      <span class="mdl-list__item-sub-title" id="moneyTag">0</span>
    </span>
    </li>
  <li class="mdl-list__item mdl-list__item--two-line">
    <span class="mdl-list__item-primary-content">
      <i class="material-icons mdl-list__item-avatar">school</i>
      <span>Kredity</span>
      <span class="mdl-list__item-sub-title" id="creditsTag">0</span>
    </span>
    </li>
  <li class="mdl-list__item mdl-list__item--two-line">
    <span class="mdl-list__item-primary-content">
      <i class="material-icons mdl-list__item-avatar">loyalty</i>
      <span>Zdraví</span>
      <span class="mdl-list__item-sub-title" id="healthTag">0</span>
    </span>
     </li>
	 <li class="mdl-list__item mdl-list__item--two-line">
    <span class="mdl-list__item-primary-content">
      <i class="material-icons mdl-list__item-avatar">lightbulb_outline</i>
      <span>Zdravý rozum</span>
      <span class="mdl-list__item-sub-title" id="sanityTag">0</span>
    </span>
    </li>
</ul>
  </div>
  <div class="mdl-card__actions mdl-card--border">
  </div>
  <div class="mdl-card__menu">
  </div>
</div>
  </div>
</div>
            </main>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <script>
          var username = "";

          function goTo(link) {
              window.location = link;
          }

          function UpdateUI(){
            $("#usernameTabTitle").html(username);
          }

          function LoadGameValues(c,m,h,s,a,u){
            $('#backgroundTag').css('background-image', 'url(' + a + ')');
            $('#creditsTag').html(c);
            $('#moneyTag').html(m + ' CZK');
            $('#healthTag').html(h + '%');
            $('#sanityTag').html(s + '%');
			 $("#nameTag").html(u);
          }

          function AddToPage(html){
            $("#printContent").append(html);
          }

        </script>
</body>

</html>