<?php

session_start();
require_once('inc/config.php');

if(!(isset($_SESSION['usertype'])&&($_SESSION['usertype']=2))){
    header("location: login.php");
}
//connection with items table------
if(isset($_POST['submit'])){
    $area=$_POST['event-area'];
    $sql = "SELECT itemID,itemName, itemPrice FROM items WHERE itemType = 'venue' AND location ='$area'";
    //echo $sql;
    $itemcon=mysqli_query($connection,$sql);
}else{
    $sql = "SELECT itemID,itemName, itemPrice FROM items WHERE itemType = 'venue'";
    $itemcon=mysqli_query($connection,$sql);
}

$connection->close();
?> 


<!DOCTYPE html>
<html>

<head>
    <title>Venue Selection</title>
    <link rel="stylesheet" type="text/css" href="./css/styles.css ">
    <link rel="stylesheet" type="text/css" href="./css/venueSelection.css "> 
    <script type="text/javascript" src="./javascript/jquery.min.js"></script>     
</head>

<body>
<div class="page">

    <!-- Title bar -->
    <div class="header">
        <div class="left">
            <div class="dropdown">
              <button class="dropbtn">Menu</button>
              <div class="dropdown-content">
                <a href="./index.php">Home</a>
                <a href="./aboutus.php">About us</a>
                <a href="./contactus.php">Contact us</a>
                </div>
            </div>
        </div>
        <div class="siteTitle">
            EXTRAVAGANCE
            <div class="siteTitle" style="font-size:30px;margin-top:20px ">
                VENUE SELECTION
            </div>
        </div>
        <div class="right">
            <div class="loginSignUp">
              <a href="./mycart.php"><button class="loginSignUpbtn"> My Cart</button></a>
            </div>
        </div>
    </div>

    <div class="venue-select">
        <form action="venueselection.php" method="POST" autocomplete="on"><!--autocomplete completes the input values based on values that the user has entered before -->
            <lable>Select Date</lable>
            <input type="date" name="event-date" placeholder="Date of the event"><br>
            <lable>Select Time</lable>
            <input type="time" name="event-time" placeholder="Time of the event"><br>
            <lable>Area Desired</lable>
            <input type="text" name="event-area" placeholder="Area desired"><br>
            <lable>Event Duration</lable>
            <input type="text" name="event-duration" placeholder="Duration"><br>
            <input type="submit" name="submit" value="Submit"><br>
        </form>
    </div>
            
    <div class="frame">
        <div class="frame-header">Suggestions</div>
        <div class="frame-content">
            <div class="block">Venue 1<br><br>
            <!--getting details from the database -->
                <div id="venue">
                    <?php
                    if ($itemcon->num_rows > 0) {
                        // output data of each row
                        $row = $itemcon->fetch_assoc();
                        echo "<br> ". $row["itemName"]. "<br><br>"."Price : " . $row["itemPrice"] . "<br>";
                        echo "<br><br><button onclick='addToCart($row[itemID])'> ADD TO CART </button>";
                    } else {
                        echo "Sorry there is not a venue which matched with your location";
                    }

                    ?>
                </div>
            </div>
            
            <div class="block">Venue 2 <br><br>
                <div id="venue">
                    <?php
                    if ($itemcon->num_rows > 0) {
                        // output data of each row
                        $row = $itemcon->fetch_assoc();
                        echo "<br> ". $row["itemName"]. "<br><br>"."Price : " . $row["itemPrice"] . "<br>";
                        echo "<br><br><button onclick='addToCart($row[itemID])'> ADD TO CART </button>";
                    } else {
                        echo "Sorry there is not a venue which matched with your location";
                    }
                    ?>
                </div>
            </div>
            <div  class="block">Venue 3<br><br>
                <div id="venue">
                    <?php
                    if ($itemcon->num_rows > 0) {
                        // output data of each row
                        $row = $itemcon->fetch_assoc();
                        echo "<br> ". $row["itemName"]. "<br><br>"."Price : " . $row["itemPrice"] . "<br>";
                        echo "<br><br><button onclick='addToCart($row[itemID])'> ADD TO CART </button>";
                    } else {
                        echo "Sorry there is not a venue which matched with your location";
                    }


                    ?>
                </div>
            </div>
        </div>
    </div>    
</div> 
<script type="text/javascript" src="./javaScript/mycart.js"></script>
</body>
</html>