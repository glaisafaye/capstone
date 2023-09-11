<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        body {
            background-image: url('login.PNG');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }
        .login-container {
            display: flex;
            width: 80%;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        .login-form {
            flex: 1;
            padding: 20px;
        }
        .login-image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f2f2f2;
        }
        img {
            max-width: 100%;
            max-height: 100%;
        }
        .paragraph {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <h2>Login</h2>
            <form method="POST" action="authenticate.php">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required><br><br>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required><br><br>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
    <div class="paragraph">
        <p>This is a 100-word paragraph that describes the purpose and benefits of the login page. It could include information about the importance of security, user authentication, and the significance of providing a seamless login experience for users.</p>
    </div>
    <div class="paragraph">
        <p>This is another 100-word paragraph that might provide instructions or additional context for users. It could explain what type of credentials are needed, how to reset a password, or any other relevant details. Keeping users informed and engaged is essential for a successful login process.</p>
    </div>
</body>
</html>

