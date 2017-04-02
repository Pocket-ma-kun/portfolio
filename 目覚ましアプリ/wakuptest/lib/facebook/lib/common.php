<?php

// url
define(facebookLoginRedirectUri, 'http://ec2-52-11-163-145.us-west-2.compute.amazonaws.com/wakuptest/login/facebook/facebook.php');

// facebook api
define(appId, '160614057628973');
define(appPassword, 'fbe24708c85f7f7954803d759343f339');
// define(accessToken, 'xxxxxxxxxx');
// define(accessTokenSecret, 'xxxxxxxxxx');

// facebookへのリクエスト
$getFacebookUserStatusArray = array(
    'redirect_uri' => facebookLoginRedirectUri, 
    'scope' => 'email'
);

