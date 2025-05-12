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
        .show-password {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: white;
        }
        .show-password input {
            margin-right: 5px;
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
        <form action="user.php" method="POST">
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <label class="show-password">
                <input type="checkbox" onclick="togglePassword()"> Show Password
            </label>
            <button type="submit" class="login-button">Log In</button>
        </form>
        <a href="signup.html" class="signup-link">Don't have an account? Sign Up</a>
    </div>

    <script>
        function togglePassword() {
            var x = document.getElementById("password");
            x.type = x.type === "password" ? "text" : "password";
        }
    </script>
</body>
</html>
