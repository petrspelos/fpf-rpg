<?php

    Route::set('index.php', function(){
        LandingPage::CreateView('LandingPageView');
    });

    Route::set('landing-page', function(){
        LandingPage::CreateView('LandingPageView');
    });

    Route::set('create-account', function(){
        NewAccountPage::CreateView('NewAccountView');
    });

?>