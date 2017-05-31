<?php

    if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
            || $_SERVER['SERVER_PORT'] == 443 || ISDEBUG)
    {
        echo "<script>console.log('THIS SITE IS SECURE');</script>";
    }
    else
    {
        header('Location: https://' . $_SERVER["SERVER_NAME"] . $_SERVER['REQUEST_URI']);
        die();
    }

?>
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
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
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
        .passDiff{
        color: red;
        visibility: hidden;
        }
        .form-card.mdl-card {
        width: 100%;
        background: #FFF;
        }
        .form-card > .mdl-card__actions {
        border-color: rgba(0, 0, 0, 0.2);
        }
        .form-card > .mdl-card__actions {
        display: flex;
        box-sizing:border-box;
        align-items: center;
        }
        .form-card > .mdl-card__actions > .material-icons {
        padding-right: 10px;
        }
        .form-card > .mdl-card__supporting-text > div {
        display: block;
        margin: auto;
        }
        .hint{
        font-size: 12px;
        color: #AAA;
        }
        .g-recaptcha{
        width: 304px;   
        }
        .feedback-card{
        width: 100%;
        margin-top: 10px;
        }
        .centered-text{
            width: 100%;
            text-align: center;
        }
        #feedback-card{
            visibility: hidden;
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
            <!-- Navigation -->
                <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="landing-page">Domů</a>
                </nav>

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
                        <!-- REGISTRATION CARD -->
                        <div class="form-card mdl-card mdl-shadow--2dp">
                           <div class="mdl-card__supporting-text mdl-card--expand">
                              <!-- CARD CONTENT -->
                              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                 <input name="username" class="mdl-textfield__input" type="text" id="username">
                                 <label class="mdl-textfield__label" for="username">Uživatelské jméno</label>
                              </div>
                              <br>
                              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                 <input name="userpassword" class="mdl-textfield__input" type="password" id="password">
                                 <label class="mdl-textfield__label" for="password">Heslo <span class="passDiff" id="passDiff1">(Hesla se neshodují)</span></label>
                              </div>
                              <br>
                              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                 <input name="userpassword2" class="mdl-textfield__input" type="password" id="password2">
                                 <label class="mdl-textfield__label" for="password">Heslo znovu <span class="passDiff" id="passDiff2">(Hesla se neshodují)</span></label>
                              </div>
                              <br>
                              <div class="g-recaptcha" data-sitekey="6LcLoiEUAAAAAMKVs2-t-TK6appVV9JC_GjjLKdY"></div>
                              <br>
                              <p class="centered-text">Registrací vyjadřujete souhlas s ukládáním a čtením HTTP Cookies. <a href="https://en.wikipedia.org/wiki/HTTP_cookie" target="_blank">Více informací</a>.</p>
                              <p class="centered-text">Zároveň svou registrací vyjadřujete souhlas s <br><a href="tos" target="_blank">Licenčními podmínkami &amp; podmínkami pro ochranu osobních údajů</a>.<br>(odkazy se otevírají v nové záložce)</p>
                              <!-- CARD CONTENT END -->
                           </div>
                           <div class="mdl-card__actions mdl-card--border">
                              <a class="hint" href="login">Již máte účet?</a>
                              <div class="mdl-layout-spacer"></div>
                              <input name="registerForm" type="submit" value="Registrovat" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                           </div>
                        </div>
                     </form>
                     <!-- FORM END -->

                     <!-- FEEDBACK PANEL -->
                        <div class="feedback-card mdl-card mdl-shadow--2dp" id="feedback-card">
                           <div class="mdl-card__supporting-text mdl-card--expand">
                              <ul class="demo-list-icon mdl-list" id="feedback-list">
                                <li class="mdl-list__item">
                                    <span class="mdl-list__item-primary-content">
                                    <i class="material-icons mdl-list__item-icon">error_outline</i>
                                    
                                </span>
                                </li>
                                <li class="mdl-list__item">
                                    <span class="mdl-list__item-primary-content">
                                    <i class="material-icons mdl-list__item-icon">error_outline</i>
                                    
                                </span>
                                </li>
                                <li class="mdl-list__item">
                                    <span class="mdl-list__item-primary-content">
                                    <i class="material-icons mdl-list__item-icon">error_outline</i>
                                    
                                </span>
                                </li>
                                </ul>
                              <!-- CARD CONTENT END -->
                           </div>
                        </div>

                     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                     <script>
                    function ClearFeedback() {
                        $('#feedback-card').empty();
                    }

                    function AddFeedbackMessage(message) {
                        $('#feedback-card').append('<li class="mdl-list__item"><span class="mdl-list__item-primary-content"><i class="material-icons mdl-list__item-icon">error_outline</i>' + message + '</span></li>');
                    }

                    function DisplayFeedback() {
                        $('#feedback-card').css('visibility', 'visible');
                    }

                    function RegistrationSuccess() {
                        window.location.replace("landing-page?act=reg");
                    }
                        
                    // Real time client-sided password validation
                    $('#password').on('input',ValidatePasswords);
                    $('#password2').on('input',ValidatePasswords);
                        
                    function ValidatePasswords() {
                        pass1 = $('#password').val();
                        pass2 = $('#password2').val();
                        if(pass1 != "" && pass2 != "")
                        {
                            if(pass1 !== pass2)
                            {
                                $('#passDiff1').css('visibility', 'visible');
                                $('#passDiff2').css('visibility', 'visible');
                            }
                            else
                            {
                                $('#passDiff1').css('visibility', 'hidden');
                                $('#passDiff2').css('visibility', 'hidden');
                            }
                        }
                        else
                        {
                            $('#passDiff1').css('visibility', 'hidden');
                            $('#passDiff2').css('visibility', 'hidden');
                        }
                    }

                    function goTo(link) {
                        window.location = link;
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
      <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
   </body>
</html>