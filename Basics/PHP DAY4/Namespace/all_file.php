<?php
require 'file1.php';
require 'file2.php';

use LibraryA\User as UserA;
use LibraryB\User as UserB;

$userA = new UserA();
$userB = new UserB();
?>
