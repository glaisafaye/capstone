<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <form method="POST" action="authenticate.php" class="form">
    <h1>LOGIN</h1>
    <input type="text" name="username" id="username" class="box" placeholder="Enter Username" required><br><br>
    <input type="password" name="password" id="password" class="box" placeholder="Enter Password" required><br><br>
    <input type="submit" value="LOGIN" id="submit">
  </form>

</body>
</html>