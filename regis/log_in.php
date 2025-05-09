<html>
<head>
	<title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            height: 100vh;
        }
        .left {
            background-color: black;
            color: white;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .right {
            background-color: #8B0A0A;
            color: white;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 300px;
        }
        input {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-button {
            display: inline-block;
            text-align: center;
            padding: 10px;
            background-color: #A80000;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 10px;
            border: none;
            cursor: pointer;
        }
        .signup-link {
            margin-top: 10px;
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="left">
        <h1>PME’X</h1>
        <p>WORLD OF SMALL MAMMALS</p>
    </div>
    <div class="right">
        <h2>LOGIN</h2>
        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="login-button">Log In</button>
        </form>
        <a href="../regis/signup.html" class="signup-link">Don't have an account? Sign Up</a>
    </div>
</body>
</html>
