<?php
//Version 4.0
$steamauth['apikey'] = "FB39ADB00F6FC6D6F6C91B9DA95DFE83"; // Your Steam WebAPI-Key found at https://steamcommunity.com/dev/apikey
$steamauth['domainname'] = "http://localhost/lookup"; // The main URL of your website displayed in the login page
$steamauth['logoutpage'] = "http://localhost/lookup"; // Page to redirect to after a successfull logout (from the directory the SteamAuth-folder is located in) - NO slash at the beginning!
$steamauth['loginpage'] = "http://localhost/lookup"; // Page to redirect to after a successfull login (from the directory the SteamAuth-folder is located in) - NO slash at the beginning!

// System stuff
if (empty($steamauth['apikey'])) {die("<div style='display: block; width: 100%; background-color: red; text-align: center;'>SteamAuth:<br>Du skal tilføje en API key!<br>Gør det inde i steamauth/SteamConfig.php. </div>");}
if (empty($steamauth['domainname'])) {$steamauth['domainname'] = $_SERVER['SERVER_NAME'];}
if (empty($steamauth['logoutpage'])) {$steamauth['logoutpage'] = $_SERVER['PHP_SELF'];}
if (empty($steamauth['loginpage'])) {$steamauth['loginpage'] = $_SERVER['PHP_SELF'];}
?>
