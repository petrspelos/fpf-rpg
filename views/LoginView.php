<?php 
    if(isset($_POST['loginForm']))
    {
        Login::LoginUser($_POST['username'], $_POST['userpassword']);
    }

    if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
            || $_SERVER['SERVER_PORT'] == 443 || ISDEBUG)
    {
        echo "<script>console.log('Form loaded.');</script>";
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
            'color_primary' => 'rgba(255,111,0 ,0.5)', 
            'color_secondary' => 'rgba(255,143,0 ,0.5)', 
            'color_accent' => '#FF9800'
        ],
        (object) [
            'background' => 'img/meil-wallpaper.jpg', 
            'avatar' => 'https://avatarfiles.alphacoders.com/724/72488.jpg', 
            'color_primary' => 'rgba(178,235,242, 0.9)', 
            'color_secondary' => 'rgba(225,245,254, 0.8)', 
            'color_accent' => '#2196F3'
        ],
        (object) [
            'background' => 'https://wallpapersite.com/images/wallpapers/dva-5120x2880-overwatch-4k-7379.jpg', 
            'avatar' => 'http://images.8tracks.com/cover/i/010/168/757/dva-7454.jpg?rect=138,0,459,459&q=98&fm=jpg&fit=max&w=320&h=320', 
            'color_primary' => 'rgba(173,20,87, 0.5)', 
            'color_secondary' => 'rgba(136,14,79, 0.7)', 
            'color_accent' => '#E91E63'
        ]
    ];

    $style = $overwatchDesigns[array_rand($overwatchDesigns)];
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>FPF RPG</title>
      <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
      <link rel="icon" href="favicon.ico" type="image/x-icon">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <style>
        .login-bg{
            background: linear-gradient( <?php echo $style->color_primary; ?>, <?php echo $style->color_secondary; ?>), url('<?php echo $style->background; ?>');
            background-size: cover;
            background-position: center center;
        }
      </style>
      <script src='https://www.google.com/recaptcha/api.js'></script>
   </head>
<body class="login-bg">
<div class="container">
  <div class="row justify-content-md-center align-items-center" style="height: 100%;">
    <div class="col col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Login</h5>
          <form action="" method="POST">
            <div class="form-group">
              <label for="username">Username</label>
              <input id="username" name="username" type="text" class="form-control" placeholder="Enter your username">
              <div class="invalid-feedback">
                This user doesn't seem to be registered. Is the spelling correct?
              </div>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input id="password" name="userpassword" type="password" class="form-control" placeholder="Password">
              <div class="invalid-feedback">
                The password doesn't seem right. Are you sure this is your account?
              </div>
            </div>
            <input name="loginForm" type="submit" value="Login" class="btn btn-success">
          </form>
          <a href="create-account" class="card-link">I don't have an account.</a>
        </div>
      </div>
    </div>
  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    if(typeof(formState) != "undefined")
    {
        $("#username").val(formState.username);
        if(formState.reason == "Invalid username")
        {
            $("#username").addClass("is-invalid");
        }
        else if(formState.reason == "Invalid password")
        {
            $("#password").addClass("is-invalid");
        }
    }
</script>
</body>
</html>