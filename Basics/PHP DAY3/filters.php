<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// print_r(filter_list());
echo "<h1>Validating Data</h1>";
$int = 108;
echo "<h3>FILTER_VALIDATE_INT</h3>";
if (filter_var($int, FILTER_VALIDATE_INT) === false) {
  echo("Integer is not valid"."<br>");
} else {
  echo("Integer is valid"."<br>");
}
echo "<h3>FILTER_VALIDATE_IP</h3>";
$ip = "127.0.120.1";
$fil_IP=filter_var($ip, FILTER_VALIDATE_IP);
echo $fil_IP;
echo "<h3>FILTER_VALIDATE_EMAIL</h3>";
$email = "example@example.com";
if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    echo("Email is not valid");
} else {
    echo("Email is valid"."<br>");
}
echo "<h3>FILTER_VALIDATE_URL</h3>";
$url = "http://";
$cur=filter_var($url,FILTER_VALIDATE_URL);
echo $cur;
if (filter_var($url, FILTER_VALIDATE_URL) === false) {
    echo("URL is not valid"."<br>");
} else {
    echo("URL is valid");
}
echo "<h1>Sanitizing Data</h1>";
echo "<h3>FILTER_SANITIZE_STRING</h3>";
$str = "<h1>Hello World!</h1>";
$newstr = strip_tags($str);
echo $newstr; 

echo "<h3>FILTER_SANITIZE_URL</h3>";
$url = "http://example.com/?name=foo&age=20";
$newurl = filter_var($url, FILTER_SANITIZE_URL);
echo $newurl;
echo "<h3>FILTER_SANITIZE_EMAIL</h3>";
$email = "example@!@example.com";
$sanitizedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
echo $sanitizedEmail;

// $check=filter_var($url)

?>
</body>
</html>