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

        <style>
          body {
              background-color: #eee;
              padding: 0px;
          }

        .dev{
            position: fixed;
            bottom: 0;
            left: 0;
            z-index: 9999;
          }
        </style>

        <script src='https://www.google.com/recaptcha/api.js'></script>
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
                    <span class="mdl-layout-title"><i class="material-icons">accessibility</i><sup> Tvorba nového účtu</sup></span>
                </div>
            </header>
            <main class="mdl-layout__content">
                <div class="page-content">
                  <!--
                    ¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨
                                          PAGE CONTENT
                    ¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨
                  -->
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--4-col"></div>
                        <div class="mdl-cell mdl-cell--4-col">
                            <!-- Register Form -->
                            <form action="" method="POST">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input name="username" class="mdl-textfield__input" type="text" id="username">
                                    <label class="mdl-textfield__label" for="username">Uživatelské jméno</label>
                                </div>
                                <br>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input name="userpassword" class="mdl-textfield__input" type="password" id="password">
                                    <label class="mdl-textfield__label" for="password">Heslo</label>
                                </div>
                                <br>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input name="userpassword2" class="mdl-textfield__input" type="password" id="password">
                                    <label class="mdl-textfield__label" for="password">Heslo znovu</label>
                                </div>
                                <br>
                                <div class="g-recaptcha" data-sitekey="6LcLoiEUAAAAAMKVs2-t-TK6appVV9JC_GjjLKdY"></div>
                                <br>
                                <input name="registerForm" type="submit" value="Registrovat" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                            </form>
                            <!-- FORM END -->

                            <!-- DEV TEST SHIT -->
                            <dialog class="mdl-dialog">
                                <h4 class="mdl-dialog__title">Whops!</h4>
                                <div class="mdl-dialog__content">
                                <p>
                                    <ul class="mdl-list">
                                    <li class="mdl-list__item" id="usernameError">
                                        <span class="mdl-list__item-primary-content">
                                        Neplatné uživatelské jméno
                                        </span>
                                    </li>
                                    <li class="mdl-list__item" id="passwordError">
                                        <span class="mdl-list__item-primary-content">
                                        Vaše hesla se neshodují
                                        </span>
                                    </li>
                                    <li class="mdl-list__item" id="captchaError">
                                        <span class="mdl-list__item-primary-content">
                                        CAPTCHA nebyl správně vyplněn
                                        </span>
                                    </li>
                                    </ul>
                                </p>
                                </div>
                                <div class="mdl-dialog__actions">
                                <button type="button" class="mdl-button close mdl-js-button mdl-js-ripple-effect mdl-button--accent">Rozumím</button>
                                </div>
                            </dialog>
                            <script>
                                var dialog = document.querySelector('dialog');
                                var showDialogButton = document.querySelector('#show-dialog');
                                if (! dialog.showModal) {
                                    dialogPolyfill.registerDialog(dialog);
                                }
                                
                                dialog.querySelector('.close').addEventListener('click', function() {
                                dialog.close();
                            });

                            function RegistrationFeedback(nameIsValid, passwordIsValid, captchaIsValid)
                            {
                                nameIsValid = (!nameIsValid) ? "visible" : "hidden";
                                passwordIsValid = (!passwordIsValid) ? "visible" : "hidden";
                                captchaIsValid = (!captchaIsValid) ? "visible" : "hidden";

                                $("#usernameError").css("visibility", nameIsValid);
                                $("#passwordError").css("visibility", passwordIsValid);
                                $("#captchaError").css("visibility", captchaIsValid);

                                dialog.showModal();
                            }

                            function RegistrationSuccess()
                            {
                                window.location.replace("landing-page?act=reg");
                            }
                            </script>

                            <!-- DEV END -->
                        </div>
                        <div class="mdl-cell mdl-cell--4-col"></div>
                    </div>
                  <!-- PAGE CONTENT END -->
                </div>
            </main>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <script>
        function goTo(link)
        {
          window.location = link;
        }
        </script>
  </body>
</html>