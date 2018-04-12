<?php 
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
          <h5 class="card-title">Create an Account</h5>
          <form action="" method="POST">
            <div class="form-group">
              <label for="username">Username</label>
              <input id="username" name="username" type="text" class="form-control" placeholder="Enter your username">
              <div class="uf invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input id="password" name="userpassword" type="password" class="form-control" placeholder="Password">
              <div class="pf invalid-feedback"></div>
              <div class="valid-feedback">Pretty secure, if you ask me.</div>
            </div>
            <div class="form-group">
              <label for="password">Password (again)</label>
              <input id="password2" name="userpassword2" type="password" class="form-control" placeholder="Password">
              <div class="p2f invalid-feedback"></div>
              <div class="valid-feedback">Yep, it matches.</div>
            </div>
            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LdULFAUAAAAADkqP_c5JZZ-y25E_lR8rwUb589V"></div>
            </div>
            <input name="registerForm" type="submit" value="Create account" class="btn btn-success">
          </form>
          <a href="login" class="card-link">I already have an account.</a>
        </div>
      </div>
      <div id="errors">
      <div class="alert alert-danger" style="visibility: hidden;" role="alert">
    </div>
    </div>
  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
function ClearFeedback() {
    $('#errors').empty();
}

function AddFeedbackMessage(message) {
    $('#errors').append('<div class="alert alert-danger" role="alert">' + message + '</div>');
}

function DisplayFeedback() {
    $('#errors').css('visibility', 'visible');
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
            let message = "Your passwords don't match.";
            $('.pf').html(message);
            $('.p2f').html(message);
            $('#password').removeClass('is-valid');
            $('#password2').removeClass('is-valid');
            $('#password').addClass('is-invalid');
            $('#password2').addClass('is-invalid');
        }
        else
        {
            $('#password').removeClass('is-invalid');
            $('#password2').removeClass('is-invalid');
            $('#password').addClass('is-valid');
            $('#password2').addClass('is-valid');
        }
    }
    else
    {
        $('#password').removeClass('is-invalid');
        $('#password2').removeClass('is-invalid');
        $('#password').removeClass('is-valid');
        $('#password2').removeClass('is-valid');
    }
}

function goTo(link) {
    window.location = link;
}
</script>
</body>
</html>
















                     <!-- <script>
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
                     </script> -->



<!-- <form action="" method="POST">
                        <div class="form-card mdl-card mdl-shadow--2dp">
                           <div class="mdl-card__supporting-text mdl-card--expand">
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
                              <div class="g-recaptcha" data-sitekey="6LdULFAUAAAAADkqP_c5JZZ-y25E_lR8rwUb589V"></div>
                              <br>
                              <p class="centered-text">Registrací vyjadřujete souhlas s ukládáním a čtením HTTP Cookies. <a href="https://en.wikipedia.org/wiki/HTTP_cookie" target="_blank">Více informací</a>.</p>
                              <p class="centered-text">Zároveň svou registrací vyjadřujete souhlas s <br><a href="tos" target="_blank">Licenčními podmínkami &amp; podmínkami pro ochranu osobních údajů</a>.<br>(odkazy se otevírají v nové záložce)</p>
                           </div>
                           <div class="mdl-card__actions mdl-card--border">
                              <a class="hint" href="login">Již máte účet?</a>
                              <div class="mdl-layout-spacer"></div>
                              <input name="registerForm" type="submit" value="Registrovat" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                           </div>
                        </div>
                     </form> -->
