<?php
  if(!self::isLoggedIn())
  {
      header('Location: landing-page');
      die();
  }

    if(isset($_POST['avatarChange']))
    {
        Settings::ChangeAvatar($_POST['avatarURL']);
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
          width: 150px;
          box-shadow: 0px 0px 3px 0px rgba(0,0,0,0.5);
        }

        .main-choices{
          width: 100%;
        }

        .work-card-square.mdl-card {
            width: 320px;
            height: 320px;
        }
        .work-card-square > .mdl-card__title {
            color: #fff;
            background:
            url('http://1mcash.com/images/parttimejob.jpg') bottom right 15% no-repeat #46B6AC;
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
                    <span class="mdl-layout-title">FPF-RPG</span>
                </div>
                <!-- Tabs -->
                <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
                    <a href="#fixed-tab-1" class="mdl-layout__tab is-active" id="usernameTabTitle">Nastavení</a>
                </div>
            </header>
            <div class="mdl-layout__drawer">
                <span class="mdl-layout-title">Menu</span>
                <button class="mdl-button mdl-js-button " onclick="goTo('home');">
                    Domů
                </button>
                <button class="mdl-button mdl-js-button " onclick="goTo('logout');">
                    Odhlásit se
                </button>
            </div>
            <main class="mdl-layout__content">
                <section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
                    <div class="page-content">
                      <!-- TAB 1 : O UŽIVATELOVI -->
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--1-col"></div>
                            <div class="mdl-cell mdl-cell--3-col">
                              <img src="" class="profile-image" id="profileIMG" width="150" height="150">   
                                <form action="" method="POST">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input name="avatarURL" class="mdl-textfield__input" type="text" id="sample3">
                                        <label class="mdl-textfield__label" for="sample3">URL vašeho obrázku</label>
                                    </div>
                                    <input name="avatarChange" type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" value="Uložit">
                                </form>
                            </div>
                            <div class="mdl-cell mdl-cell--7-col">
                              
                            </div>
                            <div class="mdl-cell mdl-cell--1-col"></div>
                        </div>
                    </div>
                </section>
                <!-- SNACKBAR -->
                <div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
                    <div class="mdl-snackbar__text"></div>
                    <button class="mdl-snackbar__action" type="button"></button>
                </div>
                <!-- SNACKBAR END -->
            </main>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <script>
          var username = "";
          var work = {working: false}

          function ShowSnackbar(message) {
              var snackbarContainer = document.querySelector('#demo-toast-example');
              var data = {
                  message: message
              };
              snackbarContainer.MaterialSnackbar.showSnackbar(data);
          }

          function goTo(link) {
              window.location = link;
          }

          function UpdateUI(){
            $("#usernameTabTitle").html(username);
          }

          function LoadGameValues(a){
            $('#profileIMG').attr('src', a);
          }

          function SetPlayerWorkDetails(t){
              work.working = true;
              work.t = t;
          }

            $('#work-slider').on('input', function () {
                $("#work-slider-label").text($('#work-slider').val())
            });
        </script>
</body>

</html>