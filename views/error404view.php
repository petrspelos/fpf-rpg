<?php
include_once('config.php');

if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
            || $_SERVER['SERVER_PORT'] == 443 || ISDEBUG)
    {
    }
    else
    {
        header('Location: https://' . $_SERVER["SERVER_NAME"] . $_SERVER['REQUEST_URI']);
        die();
    }

    $overwatchDesigns = [
        (object) [
            'background' => 'https://c.wallhere.com/photos/54/6d/video_games_digital_art_artwork_women_Overwatch_Mercy_Overwatch_blonde_Witch_Mercy-1207180.jpg!d', 
            'avatar' => 'https://pbs.twimg.com/media/C8PdUAcUAAAfIs0.jpg', 
            'color_primary' => 'rgba(255, 249, 196, 0.9)', 
            'color_secondary' => 'rgba(255, 253, 231, 0.8)', 
            'color_accent' => '#FF9800'
        ],
        (object) [
            'background' => 'https://scontent-ort2-1.cdninstagram.com/vp/2d5abedd255b4409e8e34c7799a3a4f0/5B724230/t51.2885-15/e35/29094437_173588376777199_2054962227013746688_n.jpg', 
            'avatar' => 'https://avatarfiles.alphacoders.com/724/72488.jpg', 
            'color_primary' => 'rgba(178,235,242, 0.9)', 
            'color_secondary' => 'rgba(225,245,254, 0.8)', 
            'color_accent' => '#2196F3'
        ],
        (object) [
            'background' => 'https://wallpapersite.com/images/wallpapers/dva-5120x2880-overwatch-4k-7379.jpg', 
            'avatar' => 'http://images.8tracks.com/cover/i/010/168/757/dva-7454.jpg?rect=138,0,459,459&q=98&fm=jpg&fit=max&w=320&h=320', 
            'color_primary' => 'rgba(248,187,208, 0.9)', 
            'color_secondary' => 'rgba(252,228,236, 0.8)', 
            'color_accent' => '#E91E63'
        ]
    ];
$style = $overwatchDesigns[array_rand($overwatchDesigns)];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FPF RPG - 404</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            background-color: #eee;
            padding: 0px;
        }
        
        .jumbotron {
            background: linear-gradient( <?php echo $style->color_primary; ?>, <?php echo $style->color_secondary; ?>), url('<?php echo $style->background; ?>');
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

        .author-message img{
            border-radius: 50%;
            margin-left: 10px;
            margin-bottom: 15px;
            margin-right: 10px;
            vertical-align: middle;
        }

        .author-message span{
            background-color: <?php echo $style->color_accent ?>;
            border-radius: 5px;
            padding: 15px;
            color: #fff;
        }
    </style>
  </head>
  <body>
    <?php echo "<script>var gameVersion = '".GAME_VERSION."';</script>";?>
    <div class="jumbotron">
      <h1 class="display-4">Oh, no!</h1>
      <p class="lead"></p>
      <hr class="my-4">
      <div class="author-message">
        <img src="<?php echo $style->avatar ?>" alt="Avatar of an Overwatch character" width="65" height="65">
        <span>I couldn't find the page you're looking for, sorry.</span>
      </div>
      <p class="lead">
        <a class="btn btn-link" href="landing-page" role="button">Back to landing page</a>
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