<?php
include './includes/functions.php';
include './theme/header.php';
if (isset($_POST['btnInsert'])) :
    if($_SESSION['role']==0){
    update(
        $_POST['username'],
        $_POST['email'],
        $_POST['password'],
        $_POST['id']
    );}

    if($_SESSION['role']==1){
    update_with_role(
        $_POST['username'],
        $_POST['email'],
        $_POST['password'],
        $_POST['id'],
        $_POST['role']
    );}

   
endif;
$user = isset($_GET['id']) ? selectSingle($_GET['id']) : false;
?>


<html>

<head>
    <title>Update User account</title>

    <style>
        body {

            margin: 60px;
            padding: 60px;
            margin-top: -4%;
            background: linear-gradient(0deg, rgba(218, 197, 209, 0.3), rgba(90, 90, 90, 0.1)), url(/Assets/images/back.jpg);
            background-size: cover;
            font-family: sans-serif;
        }

        .loginbox {
            margin-top: 100px;
            width: 420px;
            text-align: left;
            height: 700px;
            background: #fff;
            color: #000;
            /* top: 0%; */
            left: 50%;
            /* position: absolute; */
            /* transform: translate(-50%,-50%); */
            box-sizing: border-box;
            padding: 70px 30px;
            /* border-radius: 5px; */
        }

        .login {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            /* position: absolute; */
            /* top: -0px; */
            /* left: calc(50% - 50px); */
        }

        h1 {
            margin: 0;
            padding: 0 0 20px;
            text-align: center;
            font-size: 22px;
        }

        .loginbox p {
            margin: 0;
            padding: 0;
            font-weight: bold;
        }

        .loginbox input {
            widows: 100%;
            width: 100%;
            margin-bottom: 20px;

        }

        .loginbox input[type="text"],
        input[type="password"],
        input[type="email"] {
            border: none;
            border-bottom: 1px solid #000;
            background: transparent;
            outline: none;
            height: 40px;
            color: #000;
            font-size: 16px;
        }

        .loginbox input[type="submit"],
        .loginbox input[type="reset"] {
            width: 150px;
            border: none;
            outline: none;
            height: 40px;
            background: #f4623a;
            color: #fff;
            font-size: 18px;
            border-radius: 20px;
        }

        .loginbox input[type="submit"]:hover {
            cursor: pointer;
            background: #ffc107;
            color: #000;
        }

        .loginbox input[type="reset"]:hover {
            cursor: pointer;
            background: #ffc107;
            color: #000;
        }

        .loginbox a {
            text-decoration: none;
            font-size: 15px;
            line-height: 20px;
            color: darkgray;
        }

        .loginbox a:hover {
            color: #ffC107;
        }


        .selection {
            margin-top: 15px;
            width: 100%;
        }

        .role{
            width: 100%;
            padding: 15px;
            border-radius: 15px;
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div></div>
    <div></div>
    <center>
        <?php if ($user != false) : ?>
            <div class="loginbox">
                <center>
                    <img src="../Assets/images/avatar.png" class="login">
                </center>
                <h1>update</h1>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                    <p>Username</p>
                    <input type="text" name="username" placeholder="Enter username" value="<?php echo $user['username']; ?>">
                    <p>Email</p>
                    <input type="email" name="email" placeholder="Enter email" value="<?php echo $user['email']; ?>">
                    <p>Password</p>
                    <input type="password" name="password" placeholder="Enter password" value="<?php echo $user['passwords']; ?>"><br>
                    <p>Confirm Password</p>
                    <input type="password" name="password_c" placeholder="Confirm your password" value="<?php echo $user['passwords']; ?>"><br>

                    <?php

                    if ($_SESSION['role'] != 0) { ?>
                        <p>USER ACCOUNT ROLE CHANGE</p>


                        <?php
                        $id = $user['id']; ?>

                        <select name="role" id="role" class="role">

                            <option value="0">Normal User</option>

                            <option value="1">Admin User</option>

                            

                        </select>

                    <?php


                        
                    } ?>

                    <input type="submit" name="btnInsert" value="Update">
                    <input type="reset" onclick="history.back();" name="btnCancel" value="Cancel"><br><br>
                </form>

            <?php else : ?>
                <h1>User is not set. Try again.</h1>
            <?php endif; ?>

            </div>
    </center>
</body>
</head>

</html>