 <?php

    $SERVERNAME = "localhost";
    $USERNAME = "root";
    $PASSWORD = "";
    $DBNAME = "seller";

    $con = mysqli_connect($SERVERNAME, $USERNAME, $PASSWORD, $DBNAME);
    if($con){
        echo 'success connection';
    }else{
        die('failed to connect'.mysqli_connect_error());
    }

    if(isset($_POST['submit'])){
        $E = $_POST['email'];
        $PW = $_POST['password'];

        $emailquery = "SELECT * FROM sellerreg WHERE email='$E' ";
        $query = mysqli_query($con,$emailquery);

        $emailcount = mysqli_num_rows($query);
        if ($emailcount!=0) {
            $E_pass = mysqli_fetch_assoc($query);
            $passed = $E_pass['password'];
            $_SESSION['name'] = $E_pass['name'];
            $dcdpassword  = password_verify($PW,$passed);
            if($dcdpassword){
                echo "Login Successful";
                header("location:fetch.html");
            }else{
                echo "Incorrect Passcode";
            }
    }else{
            echo "email is not registered";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="user.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fascinate&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Texturina:wght@600&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <title>Seller Login</title>
</head>
<body>
    <div class="header" id="header">
        <h1>SWASTH-O-METER</h1>
        <h4>A&nbsp; True&nbsp; Companion&nbsp; Of&nbsp; "ASHA : The Watch"&nbsp;!</h4>
        <h6>"I am here to tell your health status"</h6></div>
    <div class="user"><h2>SELLER</h2></div><br>
    <div id="sideNav">
        <nav> 
            <ul>
                <li><a href="http://localhost/interface/asha.html">HOME</a></li>
                <li><a href="http://localhost/interface/asha.html">FEATURES</a></li>
                <li><a href="#">BUY</a></li>
                <li><a href="http://localhost/interface/userlogin.php">USER</a></li>
                <li><a href="http://localhost/interface/sellerlogin.php">SELLER</a></li>
                <li><a href="#">CONSULT DOCTOR</a></li>
            </ul>
        </nav>
    </div>
    <div id="menuBtn">
        <img src="menu.png" id="menu"> 
   </div>
    <script>
        var menuBtn = document.getElementById("menuBtn")
        var sideNav = document.getElementById("sideNav")
        var menu = document.getElementById("menu")
        sideNav .style.right = "-250px"
        menuBtn.onclick = function(){
            if(sideNav.style.right == "-250px"){
                sideNav.style.right = "0";
                menu.src = "close.png";
            }
            else{
                sideNav .style.right = "-250px";
                menu.src = "menu.png";
            }
        }
    </script>
    <script type="text/javascript">
        function cap() {
    
            var alpha=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V'
                       ,'W','X','Y','Z','1','2','3','4','5','6','7','8','9','0','a','b','c','d','e','f','g','h','i',
                       'j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
    
            var a=alpha[Math.floor(Math.random()*62)];
            var b=alpha[Math.floor(Math.random()*62)];
            var c=alpha[Math.floor(Math.random()*62)];
            var d=alpha[Math.floor(Math.random()*62)];
            var e=alpha[Math.floor(Math.random()*62)];
            var f=alpha[Math.floor(Math.random()*62)];
    
            var sum=a + b + c + d + e + f;
    
            document.getElementById("capt").value=sum;
        }
    
             function validcap() {
            var string1 = document.getElementById('capt').value;
            var string2 = document.getElementById('textinput').value;
            if (string1 == string2){
                alert("Form is validated Succesfully");
                return true;
            }
            else {
                alert("Please enter a valid captcha");
                return false;
            }
        }
    </script>
    <div class="loginform">
    <form class="login" action="sellerlogin.php" method="POST">
            <h1>SIGN IN</h1><br>
            <img src="username_icon.png" alt="#" width="20px" height="20px" style="filter: invert(60%); display: flex; margin:auto; padding: 2px;"><input class="uname" type="email" placeholder=" &nbsp;&nbsp;Your Registered email" name="email" required><br><br>
      
            <img src="password_icon.webp" alt="#" width="20px" height="20px" style="filter: invert(60%); display: flex; margin: auto; padding: 2px;"><input class="psw" type="password" placeholder="  &nbsp;&nbsp;Your Password" name="password" required><br><br><br><br>
      
            <div class="contain">
                <input type="text" id="capt" style="width: 110px; font-size: 19px; font-weight: bold; background-color: white; color: tomato;" readonly="readonly" >
                <div id="refresh"><i class="fa fa-refresh fa-2x" aria-hidden="true"  style="width: 28px; height: 25px; margin-left: 4px;" onclick="cap()"></i></div>

                <input type="text" id="textinput"  style="width: 104px; margin-left: 45px; background-color: white; color: black;" placeholder="CaptchaHere">
            </div><br><br>

            <button type="submit" name="submit" onclick="validcap()">Login</button><br><br>
            <label>
              <input type="checkbox" checked="checked" name="remember" class="rememberMe"> Remember me</label><br><br>
            <label for="signup"><i>Not a member?<a href="http://localhost/interface/sellerreg.php" class="signuplink">&nbsp;SignUp/Register</a></i></label>
        </form>
    </div><br><br><br>
    <div class="footer" id="footer">
        <div class="footer1" id="footer1">
            <h6>About</h6><br>
            <p>It is a health wearable that explains the behaviour of our health parameters like body temperature, oxygen concentration and heart rate.<br>
                This device is also enabled with SOS facility and GPS tracker.</p><br><br><br>
        </div>
        <div class="footer2" id="footer2">
            <h6> Contacts</h6><br>
            <div class="social-links">
                <a href="https://www.facebook.com/ankit.jaspal.71" target="_blank"><i class="fa  fa-facebook"></i></a>
                <a href="" target="_blank"><i class="fa  fa-twitter"></i></a>
                <a href="" target="_blank"><i class="fa  fa-instagram"></i></a>
                <a href="" target="_blank"><i class="fa  fa-whatsapp"></i></a>
                <a href="https://github.com/ROBO-NINJAS" target="_blank"><i class="fa  fa-github"></i></a>
            </div><br><br>
            <div><p>For enquiry : +91 9076635812 (Between 9am to 5pm)</p></div><br><br>
            <div><p>Get In Touch :&nbsp;At &nbsp;U.I.E.T,&nbsp;Kurukshetra</p>
            </div>
        </div>
        <div class="footer3" id="footer3">
        <p style="font-weight: bold;">Copyrights &#169; Reserved &#64; &#8476;obo &#8511;injaS </p>
        <p style="font-family: 'Dancing Script', cursive;">Designed By : TEAM </p>
        </div>
    </div>
</body>
</html>