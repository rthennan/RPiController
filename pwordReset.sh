#!/usr/bin/php
<?php
#Username and password hash files
$credsFile = 'tmpdir/creds.txt';
$user = readline('Enter the username: ');

#Hashing Username and storing it
$userHash = password_hash($user, PASSWORD_DEFAULT);
file_put_contents($credsFile, $userHash);
file_put_contents($credsFile,PHP_EOL,FILE_APPEND);
$pass = readline('Enter the password: ');

#Checking password length:
while(strlen($pass) <5) {
  $pass = readline('Please Enter 5 or more characters for the Password: ');
}


#Hashing the password and storing it
$passHash = password_hash($pass, PASSWORD_DEFAULT);
file_put_contents($credsFile, $passHash,FILE_APPEND);

echo('Credentials Hashed and stored at '.$credsFile.PHP_EOL);
echo('Username: '.$user.PHP_EOL);
echo('Password: '.$pass.PHP_EOL);
?>
