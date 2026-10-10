<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

// Include the Google API Client Library
require_once 'google-api-php-client/autoload.php';

$client = new Google_Client();
$client->setClientId('YOUR_CLIENT_ID');
$client->setClientSecret('YOUR_CLIENT_SECRET');
$client->setRedirectUri('http://localhost/petzone/callback.php');
$client->addScope('email');
$client->addScope('profile');

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // Get user profile info
    $oauth2 = new Google_Service_Oauth2($client);
    $userInfo = $oauth2->userinfo->get();

    $email = $userInfo->email;

    // Check if the user exists in the database
    $query = mysqli_query($con, "SELECT ID, UserType FROM tbluser WHERE Email='$email'");
    $user = mysqli_fetch_array($query);

    if ($user) {
        $_SESSION['ut'] = $user['UserType'];
        $_SESSION['remsuid'] = $user['ID'];
        $_SESSION['uemail'] = $email;

        header('location:index.php');
    } else {
        // Register new user
        $query = mysqli_query($con, "INSERT INTO tbluser (Email, UserType) VALUES ('$email', 'User')");
        if ($query) {
            $_SESSION['ut'] = 'User';
            $_SESSION['remsuid'] = mysqli_insert_id($con);
            $_SESSION['uemail'] = $email;

            header('location:index.php');
        }
    }
} else {
    header('location:login.php');
}
