<?php 
    include 'partials/_dbconnect.php';
    if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
        $id = $_COOKIE['email'];
        $pass = $_COOKIE['password'];
    }
    else{
        $id = "";
        $pass = "";
    }
?>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'partials/_dbconnect.php';
        $email = $_POST['email'];
        $password = $_POST['password'];
        $exists = false;
        $sql = "SELECT * FROM `users123` WHERE email = '$email';";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num == 1){
            while($row = mysqli_fetch_assoc($result)){
                if(password_verify($password,$row['password'])){
                    $login = true;
                    $name = $row['name'];
                    $name = strtok($name, " ");
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $email;
                    $_SESSION['name'] = $name;
                    if(isset($_POST['remember_me'])){
                        setcookie('email',$email,time()+(60*60*24));
                        setcookie('password',$password,time()+(60*60*24));
                    }
                    else{
                        setcookie('email','',time() - (60*60*24));
                        setcookie('password','',time() - (60*60*24));
                    }
                    header("location: monthly.php" );
                }
                else{
                    echo '<script type="text/JavaScript"> 
                        alert("Invalid Credentials!!");
                        </script>';
                }
            }
        }
        else{
            echo '<script type="text/JavaScript"> 
                alert("Invalid Credentials!!");
                </script>';
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/login.css">
    <title>Rich_Panel_Project</title>
</head>
<body>
    <div id = 'loginForm'>
        <h3>Login to your account</h3>
        <form action="/RichPanel_project_submission/login.php" method = "post" class = 'logIn'>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="input-box" value = "<?php echo $id ?>">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class = "input-box" value = "<?php echo $pass ?>">
            <p id='remember'>
                <span>
                    <input type="checkbox" name="remember_me" id="remember_me">
                </span>
                <label for="remember_me " id = "rem">Remember Me</label>
            </p>
            <button type="submit" id = "login-btn" class="loginBtn">Login</button>
        </form>
        <p id = "newaccount">New to MyApp? <a href="./index.php">Sign Up</a></p>
    </div>
</body>
</html>