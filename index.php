<!DOCTYPE html>
<html lang="en">
    <head>
        <title>FCP SwiftOffice</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/index.css" rel="stylesheet">
    </head>

    <body class="login-page">
        <header>
            <nav>
                <div class="logo">
                    <h2><img src="images/icons/icons8_swift.ico" alt="">FCP SwiftOffice</h2>
                </div>

                <div class="menu-toggle" id="menu-toggle">&#9776;</div>
           
                <div class="navigation nav-links" id="nav-links">
                    <a href="#">Home</a>
                    <a href="#">About</a>
                    <a href="#">Services</a>
                    <a href="#">Contact</a>
                    <button class="btnLogin-popup">Login</button>
                </div>
            </nav>
           
        </header>
        
        <div class="content">
            <div class="wrapper">
                <span class="icon-close">
                    <ion-icon name="close"></ion-icon>
                </span>

                <div class="form-box login form-container">
                    <h2>FCP Login</h2>
                    <form action="php/authentication.php" method="post">
                        <div class="input-box">
                            <span class="icon"><ion-icon name="mail"></ion-icon></span>
                            <input type="email" name="email" required>
                            <label>Email</label>
                        </div>

                        <div class="input-box">
                            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                            <input type="password" name="password" required>
                            <label>Password</label>
                        </div>

                        <div class="remember-forgot">
                            <label><input type="checkbox">
                            Remember me</label>
                            <a href="#">Forgot Password</a>
                        </div>

                        <button type="submit" class="btn" name="login">Login</button>
                        
                        <div class="login-register">
                            <p>Don't have an account? <a href="#" class="register-link"> Register</a></p>
                        </div>
                    </form>
                </div>

                <div class="form-box register form-container">
                    <h2>FCP Registration</h2>

                    <form action="php/authentication.php" method="post">
                        <div class="input-box">
                            <span class="icon"></ion-icon><ion-icon name="home"></ion-icon></span>
                            <input type="text" required>
                            <label>FCP ID (e.g KE0430)</label>
                        </div>

                        <div class="input-box">
                            <span class="icon"></ion-icon><ion-icon name="home-outline"></ion-icon></span>
                            <input type="text" required>
                            <label>FCP Name</label>
                        </div>

                        <div class="input-box">
                            <span class="icon"><ion-icon name="mail"></ion-icon></span>
                            <input type="email" required>
                            <label>Email Address</label>
                        </div>

                        <div class="remember-forgot">
                            <label><input type="checkbox">
                            I agree to terms & conditions</label>
                        </div>

                        <button type="submit" class="btn" name="register">Register</button>
                        
                        <div class="login-link">
                            <p>Already have an account? <a href="#" class="l-link"> Login</a></p>
                        </div>
                    </form>

                </div>
        
            </div>
        </div>

        <footer style=" position: absolute;
            bottom: 0;
            width: 100%;
            color: white;
            text-align: center;
            padding: 15px 0;">
            &copy; 2023 - <span id="year"></span> VexyByte Technologies. All rights reserved.
        </footer>

        <script>
            // Dynamically insert the current year
            document.getElementById("year").textContent = new Date().getFullYear();
        </script>

        <script src="js/script.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html> 
