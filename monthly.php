<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
        header("location: login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/monthly.css">
    <title>Rich_Panel_Project</title>   
</head>
<body>
    <div class="container2">
        <div class="welcomeName">
            Welcome!! <?php echo ($_SESSION['name']); ?>
        </div>
        <div class="logoutbtn">
            <a href="logout.php">LogOut</a>
        </div>
    </div>
    
    <div class="planswin">
        <div class="chooseplan">
            <h1>
                Choose the right plan for you
            </h1>
        </div>
        <div class="tablewrapper">
            <table>
                <thead>
                    <tr>
                        <th>
                            <div class="switch-wrapper">
                                <div class="Monthly">
                                    <a href="monthly.php">Monthly</a>
                                </div>
                                <div class="Yearly">
                                    <a href="yearly.php">Yearly</a>
                                </div>
                            </div>
                        </th>
                        <th class = "mobile">
                            <div class="container">
                                <div class="radio-tile-group">
                                    <div class="input-container">
                                    <input id="mobile" class="radio-button" type="radio" name="radio">
                                    <div class="radio-tile">
                                        <label for="mobile" class="radio-tile-label">Mobile</label>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </th>
                        <th class = "basic">
                            <div class="container">
                                <div class="radio-tile-group">
                                    <div class="input-container">
                                    <input id="basic" class="radio-button" type="radio" name="radio">
                                    <div class="radio-tile">
                                        <label for="basic" class="radio-tile-label">Basic</label>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </th>
                        <th class = "standard">
                            <div class="container">
                                <div class="radio-tile-group">
                                    <div class="input-container">
                                    <input id="standard" class="radio-button" type="radio" name="radio">
                                    <div class="radio-tile">
                                        <label for="standard" class="radio-tile-label">Standard</label>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </th>
                        <th class = "premium">
                            <div class="container">
                                <div class="radio-tile-group">
                                    <div class="input-container">
                                    <input id="premium" class="radio-button" type="radio" name="radio" checked = "checked">
                                    <div class="radio-tile">
                                        <label for="premium" class="radio-tile-label">Premium</label>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="top">
                            Monthly Price
                        </td>
                        <td class = "mobile">
                            <span>&#8377;</span>100
                        </td>
                        <td class = "basic">
                            <span>&#8377;</span>200
                        </td>
                        <td class = "standard">
                            <span>&#8377;</span>500
                        </td>
                        <td class = "premium">
                            <span>&#8377;</span>700
                        </td>
                    </tr>
                    <tr>
                        <td class="top">
                            Video Quality
                        </td>
                        <td class = "mobile">
                            Good
                        </td>
                        <td class = "basic">
                            Good
                        </td>
                        <td class = "standard">
                            Better
                        </td>
                        <td class = "premium">
                            Best
                        </td>
                    </tr>
                    <tr>
                        <td class="top">
                            Resolution
                        </td>
                        <td class = "mobile">
                            480p
                        </td>
                        <td class = "basic">
                            480p
                        </td>
                        <td class = "standard">
                            1080p
                        </td>
                        <td class = "premium">
                            4K+HDR
                        </td>
                    </tr>
                    <tr>
                        <td class="top" id= "device">
                            Devices you can use to watch
                        </td>
                        <td class = "devices mobile">
                            Phone
                            <br><br>
                            Tablet
                        </td>
                        <td class = "devices basic">
                            Phone
                            <br><br>
                            Tablet
                            <br><br>
                            Computer
                            <br><br>
                            TV
                        </td>
                        <td class = "devices standard">
                            Phone
                            <br><br>
                            Tablet
                            <br><br>
                            Computer
                            <br><br>
                            TV
                        </td >
                        <td class = "devices premium">
                            Phone
                            <br><br>
                            Tablet
                            <br><br>
                            Computer
                            <br><br>
                            TV
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="paymentbtn">
            <button type="submit" id = "paymentBTN" class="payBTN">NEXT</button>
    </div>
</body>
</html>