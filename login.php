<?php
session_start();
error_reporting(E_ALL);
include('includes/dbconnection.php');

// Include the Google API Client Library
require_once 'google-api-php-client/autoload.php';

// Google Client Configuration
$client = new Google_Client();
$client->setClientId('YOUR_CLIENT_ID');
$client->setClientSecret('YOUR_CLIENT_SECRET');
$client->setRedirectUri('http://localhost/petzone/callback.php');
$client->addScope('email');
$client->addScope('profile');

$login_url = $client->createAuthUrl();

if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    $query = mysqli_query($con, "SELECT ID, UserType, Email FROM tbluser WHERE Email='$email' && Password='$password'");
    $ret = mysqli_fetch_array($query);
    
    if ($ret > 0) {
        $_SESSION['ut'] = $ret['UserType'];
        $_SESSION['remsuid'] = $ret['ID'];
        $_SESSION['uemail'] = $ret['Email'];

        if (isset($_POST['remember'])) {
            setcookie("email", $email, time() + (86400 * 30), "/");
            setcookie("password", $password, time() + (86400 * 30), "/");
        }

        header('location:index.php');
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}

$email = isset($_COOKIE['email']) ? $_COOKIE['email'] : '';
$password = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';
?>

<!-- Your HTML form for normal login -->
<form method="POST">
    <!-- Form fields for email and password -->
</form>

<!-- Google Sign-In Button -->
<a href="<?php echo $login_url; ?>">Sign in with Google</a>
<html>
<head>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
</head>
<body>
    <div id="g_id_onload"
         data-client_id="YOUR_GOOGLE_CLIENT_ID"
         data-login_uri="http://localhost/petzone/callback.php"
         data-auto_prompt="false">
    </div>
    <div class="g_id_signin"
         data-type="standard"
         data-shape="rectangular"
         data-theme="outline"
         data-text="sign_in_with"
         data-size="large"
         data-logo_alignment="left">
    </div>
</body>
</html>
