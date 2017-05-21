<?php

    if(isset($_POST['loginForm']))
    {
        Login::LoginUser($_POST['username'], $_POST['userpassword']);
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
               <!-- Title -->
               <span class="mdl-layout-title"><i class="material-icons">accessibility</i><sup> Přihlášení</sup></span>
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
                              <!-- CARD CONTENT END -->
                           </div>
                           <div class="mdl-card__actions mdl-card--border">
                              <a class="hint" href="create-account">Vytvořit účet</a>
                              <div class="mdl-layout-spacer"></div>
                              <input name="loginForm" type="submit" value="Přihlásit se" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
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
                                    Bryan Cranston
                                </span>
                                </li>
                                <li class="mdl-list__item">
                                    <span class="mdl-list__item-primary-content">
                                    <i class="material-icons mdl-list__item-icon">error_outline</i>
                                    Aaron Paul
                                </span>
                                </li>
                                <li class="mdl-list__item">
                                    <span class="mdl-list__item-primary-content">
                                    <i class="material-icons mdl-list__item-icon">error_outline</i>
                                    Bob Odenkirk
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

                    function LoginSuccess() {
                        window.location.replace("landing-page");
                    }
                    
                    function goTo(link) {
                        window.location = link;
                    }

                    if(typeof error != 'undefined')
                    {
                        ClearFeedback();
                        AddFeedbackMessage('Nesprávné uživatelské jméno, nebo heslo.');
                        DisplayFeedback();
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