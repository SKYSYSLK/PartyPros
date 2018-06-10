<!DOCTYPE html>
<html>

<head>
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="./css/styles.css ">
    <link rel="stylesheet" type="text/css" href="./css/contact.css ">      
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
            CONTACT US
        </div>
    </div>

    <div class="contact">
        <form action="#" autocomplete="on"><!--autocomplete completes the input values based on values that the user has entered before -->
            
            <input type="text" name="event-date" placeholder="Enter first name" required><br>
            
            <input type="email" name="email" placeholder="Enter email" required><br>
            <textarea name="message" placeholder="Type your message" required></textarea><br>
            <input type="submit" name="submit" value="Send"><br>
        </form>
    </div>
            
    
    <div class=footer>
        <footer class="venue-footer">Copyright &copy; SKY</footer>
    </div>
</div> 

</body>
</html>