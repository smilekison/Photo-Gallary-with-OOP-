<?php
// Include FB config file && User class
require_once 'facebook/fbConfig.php';
require_once 'facebook/fbUser.php';

if(isset($accessToken)){
    if(isset($_SESSION['facebook_access_token'])){
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }else{
        // Put short-lived access token in session
        $_SESSION['facebook_access_token'] = (string) $accessToken;
        
          // OAuth 2.0 client handler helps to manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();
        
        // Exchanges a short-lived access token for a long-lived one
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
        
        // Set default access token to be used in script
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }
    
    // Redirect the user back to the same page if url has "code" parameter in query string
    if(isset($_GET['code'])){
        header('Location: ./');
    }
    
    // Getting user facebook profile info
    try {
        $profileRequest = $fb->get('/me?fields=first_name,last_name,email');
        $fbUserProfile = $profileRequest->getGraphNode()->asArray();
    } catch(FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        // Redirect user back to app login page
        header("Location: ./");
        exit;
    } catch(FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
    
    // Initialize User class
    $user = new fbUser();
    
    // Insert or update user data to the database
    $fbUserData = array(
        'oauth_provider'=> 'facebook',
        'oauth_uid'     => $fbUserProfile['id'],
        'first_name'     =>  $fbUserProfile['first_name'],
        'last_name'     =>  $fbUserProfile['last_name'],
        'email'         => $fbUserProfile['email']
    );
    $userData = $user->checkUser($fbUserData);

    // var_dump($userData);

/*    $userData = array(
        $_SESSION['user_id']= $userData['user_id'],
        $_SESSION['fullname']= $userData['fullname'],
        $_SESSION['username']= $userData['username'],
        $_SESSION['email']= $userData['email'],
        $_SESSION['role']= $userData['role']
    );*/
    header('Location:/');
}else{
    // Get login url
    $loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);
    
    // Render facebook login button
    $output = '<a href="'.htmlspecialchars($loginURL).'"><img id="facebook-image" src="assets/images/loginwithfacebook.png" alt="facebook-image"></a>';
}
?>