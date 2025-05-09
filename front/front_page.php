<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World of Small Mammals</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #B22222;
            color: white;
        }
        header {
            background-color: black;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
        }
        .content {
            text-align: center;
            margin: 50px 0;
        }
        .title {
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .mammals {
            display: flex;
            justify-content: center;
            gap: 50px;
            flex-wrap: wrap;
        }
        .mammal-link {
            text-decoration: none;
            color: black;
        }
        .mammal {
            text-align: center;
            transition: transform 0.3s;
        }
        .mammal:hover {
            transform: scale(1.05);
        }
        .mammal img {
            width: 200px;
            height: auto;
        }
        .mammal-name {
            background-color: black;
            color: black;
            padding: 10px;
            width: 100px;
            margin: 10px auto 0;
            border-radius: 5px;
            background-color: #007bff;
            font-weight: bold;
        }
        .mammal-name:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<header>
    <div>PME'X</div>
    <div>
        <a href="About us.html">ABOUT US</a>
        <a href="../regis/logout.html">LOG OUT</a>
    </div>
</header>

<div class="content">
    <div class="title">WORLD OF SMALL MAMMALS</div>
    <div class="mammals">
        <a href="rabbit.html" class="mammal-link">
            <div class="mammal">
                <img src="../pics/rabbit.jpg" alt="Rabbit">
                <div class="mammal-name">RABBIT</div>
            </div>
        </a>
        <a href="hamster.html" class="mammal-link">
            <div class="mammal">
                <img src="../pics/hamster.jpg" alt="Hamster">
                <div class="mammal-name">HAMSTER</div>
            </div>
        </a>
    </div>
</div>

</body>
</html>
