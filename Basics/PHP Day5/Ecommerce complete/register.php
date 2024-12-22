<?php
include_once 'Database.php';
include_once 'User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if ($_POST) {
    $username = htmlspecialchars(strip_tags($_POST['username']));
    $password = htmlspecialchars(strip_tags($_POST['password']));
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $phoneno = htmlspecialchars(strip_tags($_POST['phoneno']));

    if (!$user->userName($username)) {
      if(!$user->userEmail($email)){
        if(!$user->userNo($phoneno)){
          if ($user->register($username, $password,$email,$phoneno)) {
            echo "<div class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative' role='alert'>
                    <span class='block sm:inline'>User registered successfully.</span>
                  </div>";            
                include 'loginhome.php';
          }
        }
        else{
          include 'register.html';
          echo "<div class='bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative' role='alert'>
                  <span class='block sm:inline'>Phone already taken.</span>
                </div>";
        }
      }
      else{
        include 'register.html';
        echo "<div class='bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative' role='alert'>
                <span class='block sm:inline'>Email already taken.</span>
              </div>";
      }
    } else {
        include 'register.html';
        echo "<div class='bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative' role='alert'>
                <span class='block sm:inline'>Username already taken.</span>
              </div>";
              }
}
?>
