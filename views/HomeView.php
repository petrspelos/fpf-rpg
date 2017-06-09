<?php
  if(!self::isLoggedIn())
  {
      header('Location: landing-page');
      die();
  }

    if(isset($_POST['startWork']))
    {
        $hours = 0;
        if(isset($_POST['hours'])) $hours = $_POST['hours'];
        Home::StartWork($hours);
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

        .work-card-square.mdl-card {
            width: 320px;
            height: 520px;
        }
        .work-card-square > .mdl-card__title {
            color: #fff;
            background:
            url('http://1mcash.com/images/parttimejob.jpg') bottom right 15% no-repeat #46B6AC;
        }

        .float-card{
            float: left;
            margin: 0px 0px 20px 20px;
        }

        #currentlyWorkingBlock > img{
            border: 1px solid #4CAF50;
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
                <hr>
                <button class="mdl-button mdl-js-button " onclick="goTo('settings');">
                    Nastavení
                </button>
                <hr>
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
                              <button class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored" id="change-photo-btn" onclick="goTo('settings');"><i class="material-icons">photo</i></button>
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
                      <!-- TAB 2: ŠKOLA -->
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--1-col"></div>
                            <div class="mdl-cell mdl-cell--10-col">
                              <!-- Center -->                                
                              <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp main-choices">
                                <thead>
                                    <tr>
                                    <th class="mdl-data-table__cell--non-numeric">PŘEDMĚT</th>
                                    <th>Absence</th>
                                    <th>Akce</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td class="mdl-data-table__cell--non-numeric">
                                        <span class="mdl-chip mdl-chip--contact">
                                            <span class="mdl-chip__contact mdl-color--green mdl-color-text--white">A</span>
                                            <span class="mdl-chip__text">Poezie</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="mdl-chip mdl-color--green"><span class="mdl-chip__text"></span></span>
                                        <span class="mdl-chip mdl-color--red"><span class="mdl-chip__text"></span></span>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>

                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                    </td>
                                    <td>
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                            Pokračovat
                                        </button>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td class="mdl-data-table__cell--non-numeric">
                                        <span class="mdl-chip mdl-chip--contact">
                                            <span class="mdl-chip__contact mdl-color--grey mdl-color-text--white">?</span>
                                            <span class="mdl-chip__text">???</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>

                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                    </td>
                                    <td>
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" disabled>
                                            Pokračovat
                                        </button>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td class="mdl-data-table__cell--non-numeric">
                                        <span class="mdl-chip mdl-chip--contact">
                                            <span class="mdl-chip__contact mdl-color--grey mdl-color-text--white">?</span>
                                            <span class="mdl-chip__text">???</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>

                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                        <span class="mdl-chip mdl-color--grey"><span class="mdl-chip__text"></span></span>
                                    </td>
                                    <td>
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" disabled>
                                            Pokračovat
                                        </button>
                                    </td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            <div class="mdl-cell mdl-cell--1-col"></div>
                        </div>
                    </div>
                </section>
                <section class="mdl-layout__tab-panel" id="fixed-tab-3">
                    <div class="page-content">
                        <!-- TAB 3: MĚSTO -->
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--1-col"></div>
                            <div class="mdl-cell mdl-cell--7-col">
                              <!-- Center -->                                
                                <div class="work-card-square mdl-card mdl-shadow--2dp float-card">
                                <div class="mdl-card__title mdl-card--expand">
                                    <h2 class="mdl-card__title-text">Brigáda</h2>
                                </div>
                                <div class="mdl-card__supporting-text">
                                    Brigádou získáte peníze. Pracovat můžete až
                                    8 hodin. Práce má negativní dopad na váš
                                    zdravý rozum.<br><br>
                                    Právě pracují:<br>
                                    <div id="currentlyWorkingBlock">
                                    <!--<img src="http://www.focusit.ca/wp-content/uploads/Multimedia-Programmer-768x768.jpg" width="50" height="50" id="usernameWork">
                                    <div class="mdl-tooltip" for="usernameWork">My Name</div>-->
                                    Nikdo zrovna nepracuje...
                                    </div>
                                    <br><br>
                                    Jak dlouho chcete pracovat?<br>
                                    <form action="" method="POST">
                                    <span id="work-slider-label">1</span> h. <br>
                                    <input name="hours" class="mdl-slider mdl-js-slider" type="range"
                                            min="1" max="8" value="0" tabindex="0" id="work-slider">
                                    <br><span id="work-ticker"></span>
                                </div>
                                <div class="mdl-card__actions mdl-card--border">
                                    <input id="work-button" name="startWork" type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" value="Začít Práci">
                                    </form>
                                </div>
                                </div>

                                

                                <div class="float-card mdl-card mdl-shadow--2dp">
                                    <div class="mdl-card__title mdl-card--expand">
                                        <h2 class="mdl-card__title-text">ZZZZZZZ</h2>
                                    </div>
                                    <div class="mdl-card__supporting-text">
                                        XXXXXX
                                    </div>
                                    <div class="mdl-card__actions mdl-card--border">
                                        YYYYYY
                                    </div>
                                </div>

                                <div class="float-card mdl-card mdl-shadow--2dp">
                                    <div class="mdl-card__title mdl-card--expand">
                                        <h2 class="mdl-card__title-text">ZZZZZZZ</h2>
                                    </div>
                                    <div class="mdl-card__supporting-text">
                                        XXXXXX
                                    </div>
                                    <div class="mdl-card__actions mdl-card--border">
                                        YYYYYY
                                        
                                    </div>
                                </div>



                            </div>
                            <div class="mdl-cell mdl-cell--3-col">
                                <div class="float-card mdl-card mdl-shadow--2dp">
                                    <div class="mdl-card__title mdl-card--expand">
                                        <h2 class="mdl-card__title-text">Nejbohatší studenti</h2>
                                    </div>
                                    <div class="mdl-card__actions mdl-card--border">
                                        <ul class="demo-list-two mdl-list" id="richBoard">
                                            <!--<li class="mdl-list__item mdl-list__item--two-line">
                                                <span class="mdl-list__item-primary-content">
                                                <img src="http://i.imgur.com/uM5MJB7.jpg" class="mdl-list__item-avatar">
                                                <span>Spelos</span>
                                                <span class="mdl-list__item-sub-title">30035 CZK</span>
                                                </span>
                                            </li>
                                            <li class="mdl-list__item mdl-list__item--two-line">
                                                <span class="mdl-list__item-primary-content">
                                                <img src="http://static1.fjcdn.com/comments/The+bannered+mare+no+you+think+he+wants+to+_9f620e3f87c1e4f3a77c732e9b251970.jpg" class="mdl-list__item-avatar">
                                                <span>Dan</span>
                                                <span class="mdl-list__item-sub-title">650 CZK</span>
                                                </span>
                                            </li>-->
                                        </ul>
                                    </div>
                                </div>
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

          function LoadGameValues(c,m,h,s,a,sc,hc){
            $('#profileIMG').attr('src', a);
            $('#cval').html(c);
            $('#mval').html(m + ' CZK');
            $('#hval').html(h + '%');
            $('#sval').html(s + '%');
            $('#hcval').html(hc + ' CZK / 100%');
            $('#scval').html(sc + ' CZK / 100%');
          }

          function SetPlayerWorkDetails(t){
              work.working = true;
              work.t = t;
          }

          var goalUTC;
          var timer;

          function SetWorkMode(goalDate){
              $("#work-slider").prop('disabled', true);
              $("#work-button").val("Přestat pracovat");
              $("#work-ticker").text(goalDate);  
              goalUTC = new Date(goalDate);
              timer = setInterval(workTick, 1000);
          }

          function workTick(){
            var now = new Date();
            var nowUTC = new Date(now.getUTCFullYear(), now.getUTCMonth(), now.getUTCDate(),  now.getUTCHours(), now.getUTCMinutes(), now.getUTCSeconds());

            var difference = goalUTC.getTime() - nowUTC.getTime();

            if (difference <= 0) {

                clearInterval(timer);
                $("#work-ticker").text("");
                goTo('home');
            
            } else {
                
                var seconds = Math.floor(difference / 1000);
                var minutes = Math.floor(seconds / 60);
                var hours = Math.floor(minutes / 60);
                var days = Math.floor(hours / 24);

                hours %= 24;
                minutes %= 60;
                seconds %= 60;

                $("#work-ticker").text("Vaše práce skončí za " + hours + "hod. " + minutes + "min. " + seconds + "sec.");
          }
        }

            $('#work-slider').on('input', function () {
                $("#work-slider-label").text($('#work-slider').val())
            });

            var playersAreWorking = false;

            function AddWorkingPlayer(avatar, username){
                if(!playersAreWorking)
                {
                    playersAreWorking = true;
                    $("#currentlyWorkingBlock").empty();
                }
                $("#currentlyWorkingBlock").append('<img src="' + avatar + '" width="50" height="50" id="' + username + 'Work"><div class="mdl-tooltip" for="' + username + 'Work">' + username + '</div>');
            }

            function AddRichPlayer(richUsername, richAvatar, richMoney){
                $('#richBoard').append('<li class="mdl-list__item mdl-list__item--two-line"><span class="mdl-list__item-primary-content"><img src="' + richAvatar + '" class="mdl-list__item-avatar"><span>' + richUsername + '</span><span class="mdl-list__item-sub-title">' + richMoney + ' CZK</span></span></li>');
            }
        </script>
</body>

</html>