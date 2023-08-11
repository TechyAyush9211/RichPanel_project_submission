<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'partials/_dbconnect.php';
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        if(empty($email) || empty($name) || empty($password)){
            echo '<script type="text/JavaScript"> 
                    alert("Error\nAll fields are mandatory!!");
                    </script>';
        }
        else{
            $sql = "SELECT * FROM `users123` WHERE email = '$email';";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            $exists = false;
            if($num == 1){
                $exists = true;
            }
            if(!$exists){
                $hash = password_hash($password,PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users123` (`name`, `email`, `password`) VALUES ('$name', '$email', '$hash');";
                $result = mysqli_query($conn, $sql);
                if(!$result){
                    $error = mysqli_error($conn);
                    echo '<script type="text/JavaScript"> 
                        alert("$Error");
                        </script>';
                }
                else{
                    if(isset($_POST['remember_me'])){
                        setcookie('email',$email,time()+(60*60*24));
                        setcookie('password',$password,time()+(60*60*24));
                    }
                    else{
                        setcookie('email','',time() - (60*60*24));
                        setcookie('password','',time() - (60*60*24));
                    }
                    echo '<script type="text/JavaScript"> 
                        alert("Sign Up Successfull!! \nKindly Login...");
                        </script>';
                }
            }
            else{
                echo '<script type="text/JavaScript"> 
                alert("Email Id already exists!!! \nKindly Login.");
                </script>'; 
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/signup.css">
    <title>Rich_Panel_Project</title>
</head>
<body>
    <div id = 'signUpForm'>
        <h3>Create Account</h3>
        <form action="/RichPanel_project_submission/index.php" method="post" class = 'signUp'>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="input-box">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="input-box">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class = "input-box">
            <p id='remember'>
                <span>
                    <input type="checkbox" name="remember_me" id="remember_me">
                </span>
                <label for="remember_me " id = "rem">Remember Me</label>
            </p>
            <button type="submit" id = "signup-btn" class="signupBtn">Sign Up</button>
        </form>
        <p id = "allaccount">Already have an account? <a href="./login.php">Login</a></p>
    </div>
</body>
</html>