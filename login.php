<?php 


session_start();

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));


$conn = mysqli_connect("localhost", "root", "", "perpus") or die('Database tidak Terhubung!');

if($_SESSION['admin'] || $_SESSION['user']) {

    header("location:index.php");
}else{

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/logo2.png">

    <title>Login Perpustakaan</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            outline: 0;
            font-family: 'Open Sans', sans-serif;
        }

        .box {
            height: 100vh;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        p {
            color: white;
            font-family: 'Open Sans', sans-serif;
            padding-top: 10px;
        }

        h1 {
            text-align: center;
            padding-left: 110px;
            padding-bottom: 20px;
        }

        .container {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 20px 25px;
            width: 400px;
            border-radius: 20px;
            background-color: rgba(0, 0, 0, .7);
            box-shadow: 0 0 10px rgba(255, 255, 255, .3);
        }

        .container h1 {
            text-align: left;
            color: #fafafa;
            margin-left: 50px;
            margin-bottom: 30px;
            text-transform: uppercase;
            border-bottom: 4px solid #3ec006;
        }

        .container label {
            text-align: left;
            color: #90caf9;
        }

        .container form input {
            width: calc(100% - 20px);
            padding: 8px 10px;
            margin-bottom: 15px;
            border: none;
            background-color: transparent;
            border-bottom: 2px solid #3ec006;
            color: #fff;
            font-size: 20px;
        }

        .container form button {
            width: 100%;
            height: 40px;
            padding: 5px 0;
            border: none;
            background-color: #3ec006;
            font-size: 18px;
            color: #fafafa;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <div class="box">
        <div class="container">
            <h1>Login</h1>
            <form method="post">
                <label>Username</label>
                <input type="text" class="form-control" id='username' name='username' required />
                <label>Password</label>
                <input type="password" id='password' name='password' required />
                <button type="submit" name="login">Login</button>
            </form>
        </div>
    </div>
</body>

</html>

<?php 

        if (isset($_POST['login'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];


            $sql = $conn->query("SELECT * FROM tb_user WHERE username='$username' AND password='$password'");

            $data = $sql->fetch_assoc();

            $ketemu = $sql->num_rows;


            if ($ketemu >=1) {

                session_start();

                if($data['level'] == "admin") {

                    $_SESSION['admin'] = $data['id_user'];
                    header("location:index.php");
                }elseif($data['level'] == "user") {

                    $_SESSION['user'] = $data['id_user'];
                    header("location:user/index.php");
                }
            } else {
                ?>

                <script type="text/javascript">
                    alert("Username atau Password Salah!!");
                </script>

                <?php
            }


        }



    }

?>