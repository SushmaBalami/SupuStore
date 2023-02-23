<?php
    session_start();
    error_reporting(0);
    include "includes/conn.php";
?>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>SuPu Store | Add Products</title>
    <link href="img/logo.png" rel="icon">
    <style>
        .buttons {
            padding: 15px 25px;
            font-size: 28px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: tomato;
            border: none;
            border-radius: 15px;
            box-shadow: 0 12px #999;
            width: 280px;
            height: 80px;
            margin: 20px;
            transition: all 0.3s;
        }

        .buttons:active {
            background-color: rgba(270, 85, 80, 1);
            box-shadow: 0 4px #666;
            transform: translateY(12px);
        }

        .form-container{
            display: flex;
        }
    </style>
</head>

<body>
    <?php
    include 'includes/header.php';
    ?>
    <div class="container">
        <div class="title">Add Category</div><br>
        <hr><br>
        <div class="form-container">
            <a href="mensware.php"><button class="buttons">Mensware</button></a>
            <a href="womensware.php"><button class="buttons">Womensware</button></a>
            <a href="kidsware.php"><button class="buttons">Kidsware</button></a>
        </div>
    </div>
    </div>
</body>