<?php

    Route::set('404', function(){
        ERR404::CreateView('404View');
    });
    
    Route::set('index.php', function(){
        LandingPage::CreateView('LandingPageView');
    });

    Route::set('landing-page', function(){
        LandingPage::CreateView('LandingPageView');
    });

    Route::set('create-account', function(){
        NewAccountPage::CreateView('NewAccountView');
    });

    Route::set('login', function(){
        Login::CreateView('LoginView');
    });

    Route::set('home', function(){
        Home::CreateView('HomeView');
    });

    Route::set('logout', function(){
        Logout::CreateView('LogoutView');
    });

    Route::set('tos', function(){
        TosPage::CreateView('TosView');
    });

    Route::set('profile', function(){
        ProfilePage::CreateView('ProfileView');
    });

    Route::set('settings', function(){
        Settings::CreateView('SettingsView');
    });

    Route::finalize();
?>