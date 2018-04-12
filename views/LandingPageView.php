<?php
if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
            || $_SERVER['SERVER_PORT'] == 443 || ISDEBUG)
    {
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FPF RPG</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            background-color: #eee;
            padding: 0px;
        }
        
        .jumbotron {
            background: linear-gradient( rgba(255, 249, 196, 0.9), rgba(255, 253, 231, 0.8)), url('https://c.wallhere.com/photos/54/6d/video_games_digital_art_artwork_women_Overwatch_Mercy_Overwatch_blonde_Witch_Mercy-1207180.jpg!d');
            background-size: cover;
            background-position: center center;
        }
        
        .btn-reg {
            background-color: #FF9800;
            border: #FF9800;
        }
        
        .btn-reg:hover {
            background-color: #F57C00;
        }
    </style>
  </head>
  <body>
    <?php echo "<script>var gameVersion = '".GAME_VERSION."';</script>";?>
    <div class="jumbotron">
      <h1 class="display-4">FPF-RPG</h1>
      <p class="lead">A simple attempt at creating an RPG-like browser idle game.</p>
      <hr class="my-4">
      <p>You just click a few buttons once or twice a day and that's about the game, honestly. Some people find that fun.</p>
      <p class="lead">
        <a class="btn btn-primary btn-reg" href="create-account" role="button">Create an account</a>
        <a class="btn btn-link" href="login" role="button">Login</a>
      </p>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        function goTo(link) {
            window.location = link;
        }
    </script>
  </body>
</html>