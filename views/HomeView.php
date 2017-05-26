<?php
  if(!self::isLoggedIn())
  {
      header('Location: landing-page');
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
                    <span class="mdl-layout-title">FPF-RPG</span>
                </div>
                <!-- Tabs -->
                <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
                    <a href="#fixed-tab-1" class="mdl-layout__tab is-active" id="usernameTabTitle">Domů</a>
                    <a href="#fixed-tab-2" class="mdl-layout__tab">Škola</a>
                    <a href="#fixed-tab-3" class="mdl-layout__tab">Město</a>
                </div>
            </header>
            <div class="mdl-layout__drawer">
                <span class="mdl-layout-title">Menu</span>
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
                              <img src="" class="profile-image" id="profileIMG">   
                              <button class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored" id="change-photo-btn"><i class="material-icons">photo</i></button>
                              <div class="mdl-tooltip" for="change-photo-btn">Změnit profilový obrázek</div>
                            </div>
                            <div class="mdl-cell mdl-cell--7-col">
                              <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp main-choices">
                                <thead>
                                  <tr>
                                    <th class="mdl-data-table__cell--non-numeric">Položka</th>
                                    <th>Kvantita</th>
                                    <th>Cena za vylepšení</th>
                                    <th>Vylepšení</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td class="mdl-data-table__cell--non-numeric" id="kred-label">Kredity</td>
                                    <div class="mdl-tooltip" for="kred-label">
                                    Kredity získáváte za splněné předměty. Jejich počet nejvíce ovlivní Vaše finální skóre.
                                    </div>
                                    <td id="cval">0</td>
                                    <td>-</td>
                                    <td><button class="mdl-button mdl-js-button mdl-button--raised" disabled>Vylepšit</button></td>
                                  </tr>
                                  <tr>
                                    <td class="mdl-data-table__cell--non-numeric" id="money-label">Peníze</td>
                                    <div class="mdl-tooltip" for="money-label">
                                    Nejsou reálné. Za peníze si můžete koupit celou řadu předmětů, které Vám mohou nejrůzněji pomoci. Peníze získáte prací.
                                    </div>
                                    <td id="mval">0 CZK</td>
                                    <td>-</td>
                                    <td><button class="mdl-button mdl-js-button mdl-button--raised" disabled>Vylepšit</button></td>
                                  </tr>
                                  <tr>
                                    <td class="mdl-data-table__cell--non-numeric" id="health-label">Zdraví / Život</td>
                                    <div class="mdl-tooltip" for="health-label">
                                    ...
                                    </div>
                                    <td id="hval">0%</td>
                                    <td id="hcval">0 CZK / 0%</td>
                                    <td><button class="mdl-button mdl-js-button mdl-button--raised" disabled>Vylepšit</button></td>
                                  </tr>
                                  <tr>
                                    <td class="mdl-data-table__cell--non-numeric" id="sanity-label">Zdravý rozum</td>
                                    <div class="mdl-tooltip" for="sanity-label">
                                    ...
                                    </div>
                                    <td id="sval">0%</td>
                                    <td id="scval">0 CZK / 0%</td>
                                    <td><button class="mdl-button mdl-js-button mdl-button--raised" disabled>Vylepšit</button></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="mdl-cell mdl-cell--1-col"></div>
                        </div>
                    </div>
                </section>
                <section class="mdl-layout__tab-panel" id="fixed-tab-2">
                    <div class="page-content">
                      <!-- TAB 2 -->
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--1-col"></div>
                            <div class="mdl-cell mdl-cell--10-col">
                              <!-- Center -->                                

                            </div>
                            <div class="mdl-cell mdl-cell--1-col"></div>
                        </div>
                    </div>
                </section>
                <section class="mdl-layout__tab-panel" id="fixed-tab-3">
                    <div class="page-content">
                        <!-- Your content goes here -->
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

          function LoadGameValues(c,m,h,s,a,sc,hc){
            $('#profileIMG').attr('src', a);
            $('#cval').html(c);
            $('#mval').html(m + ' CZK');
            $('#hval').html(h + '%');
            $('#sval').html(s + '%');
            $('#hcval').html(hc + ' CZK / 100%');
            $('#scval').html(sc + ' CZK / 100%');
          }

        </script>
</body>

</html>