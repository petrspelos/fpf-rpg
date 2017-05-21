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
      <a href="#fixed-tab-1" class="mdl-layout__tab is-active">Tab 1</a>
      <a href="#fixed-tab-2" class="mdl-layout__tab">Tab 2</a>
      <a href="#fixed-tab-3" class="mdl-layout__tab">Tab 3</a>
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
        
      </div>
    </section>
    <section class="mdl-layout__tab-panel" id="fixed-tab-2">
      <div class="page-content">
                        <!--
                    ¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨
                                          PAGE CONTENT
                    ¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨
                  -->                  
                  <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--1-col"></div>
                    <div class="mdl-cell mdl-cell--10-col">
                      <!--
                                    NAVIGATION BUTTONS
                      -->
                      <div class="task-list">
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="goTo('logout');">
                        Odhlásit se
                        </button>
                      </div>

                      <!--
                                  SNACKBAR SETUP
                        -->
                        <div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
                          <div class="mdl-snackbar__text"></div>
                          <button class="mdl-snackbar__action" type="button"></button>
                        </div>
                        <script>
                        function ShowSnackbar(message)
                        {
                          var snackbarContainer = document.querySelector('#demo-toast-example');
                          var data = {message: message};
                          snackbarContainer.MaterialSnackbar.showSnackbar(data);
                        }
                        </script>
                        <!-- SNACKBAR END -->
                    </div>
                    <div class="mdl-cell mdl-cell--1-col"></div>
                  </div>
      </div>
    </section>
    <section class="mdl-layout__tab-panel" id="fixed-tab-3">
      <div class="page-content"><!-- Your content goes here --></div>
    </section>
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