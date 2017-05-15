<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>FPF RPG</title>

        <!-- favicon -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <!-- Material Design -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.deep_purple-red.min.css">


        <!-- Internal Style -->
        <link href="css/main.css" type="text/css" rel="Stylesheet"/>
        <link href="css/progress.css" type="text/css" rel="Stylesheet"/>
    </head>
    <!--
      ===========================================================================
                                      BODY
      ===========================================================================
    -->
    <body>
        <?php echo "<script>var gameVersion = '".GAME_VERSION."';</script>";?>


        <!-- Uses a header that scrolls with the text, rather than staying
          locked at the top -->
        <div class="mdl-layout mdl-js-layout">
            <header class="mdl-layout__header mdl-layout__header--scroll">
                <div class="mdl-layout__header-row">
                    <!-- Title -->
                    <span class="mdl-layout-title"><i class="material-icons">accessibility</i><sup> Titulní Strana</sup></span>
                </div>
            </header>
            <main class="mdl-layout__content">
                <div class="page-content">
                  <!--
                    ¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨
                                          PAGE CONTENT
                    ¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨
                  -->
                   <!--
                                  TASK LIST
                    -->
                    <ul class="task-list mdl-list">
                        <!-- TASK 5 -->
                        <li class="mdl-list__item mdl-list__item--three-line">
                            <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-avatar">code</i>
                          <span>[S] for Security</span>
                            <span class="mdl-list__item-text-body">
                            Captcha při registraci - Login tokeny - odhlášní ze všech zařízení
                          </span>
                            </span>
                            <span class="mdl-list__item-secondary-content">
                          
                          <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-list__item-secondary-action" for="checkbox-1">
                            <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input" disabled>
                          </label>
                        </span>
                        </li>
                        <!-- TASK END -->
                        <!-- TASK 4 -->
                        <li class="mdl-list__item mdl-list__item--three-line">
                            <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-avatar">code</i>
                          <span>Meat! Meat! MEAT! MORE PIG! <b>MORE PIG!</b></span>
                            <span class="mdl-list__item-text-body">
                            Registrace + Přihlašování
                          </span>
                            </span>
                            <span class="mdl-list__item-secondary-content">
                          
                          <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-list__item-secondary-action" for="checkbox-1">
                            <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input" disabled>
                          </label>
                        </span>
                        </li>
                        <!-- TASK END -->
                        <!-- TASK 3 -->
                        <li class="mdl-list__item mdl-list__item--three-line">
                            <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-avatar">code</i>
                          <span>One page to rule them all</span>
                            <span class="mdl-list__item-text-body">
                            Připravit MVC (model, view, controller) architekturu pro jednotlivé stránky.
                          </span>
                            </span>
                            <span class="mdl-list__item-secondary-content">
                          
                          <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-list__item-secondary-action" for="checkbox-1">
                            <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input" checked disabled>
                          </label>
                        </span>
                        </li>
                        <!-- TASK END -->
                        <!-- TASK 2 -->
                        <li class="mdl-list__item mdl-list__item--three-line">
                            <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-avatar">code</i>
                          <span>Welcome to the game</span>
                            <span class="mdl-list__item-text-body">
                            Nastavit připojení k databázi, vytvořit abstrakci pro databázové příkazy.
                          </span>
                            </span>
                            <span class="mdl-list__item-secondary-content">
                          
                          <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-list__item-secondary-action" for="checkbox-1">
                            <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input" checked disabled>
                          </label>
                        </span>
                        </li>
                        <!-- TASK END -->
                        <!-- TASK 1 -->
                        <li class="mdl-list__item mdl-list__item--three-line">
                            <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-avatar">code</i>
                          <span>První krok</span>
                            <span class="mdl-list__item-text-body">
                            Propojení s FTP, Git repozitář, nahrání index stránky.
                          </span>
                            </span>
                            <span class="mdl-list__item-secondary-content">
                          
                          <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect mdl-list__item-secondary-action" for="checkbox-1">
                            <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input" checked disabled>
                          </label>
                        </span>
                        </li>
                        <!-- TASK END -->
                    </ul>
                    <!--
                                  NAVIGATION BUTTONS
                    -->
                    <div class="task-list">
                      <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" disabled>
                      Příhlásit se
                      </button>
                      <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" disabled>
                      Registrovat se
                      </button>
                      <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" disabled onclick="goTo('alpha.php')">
                      Spustit <?php echo GAME_VERSION;?> (vývojářská verze)
                      </button>
                    </div>
                </div>
            </main>
        </div>

        <script src="js/jQuery/jQuery.js" type="text/javascript"></script>
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <script>
        function goTo(link)
        {
          window.location = link;
        }
        </script>
  </body>
</html>