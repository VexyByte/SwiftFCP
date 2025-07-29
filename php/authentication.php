<?php      
   
    if(array_key_exists('login', $_POST)) { 
        login(); 
    } 
    else if(array_key_exists('register', $_POST)) { 
        register(); 
    } 

    function login() { 
        include('connection.php');
        $email = $_POST['email'];  
        $password = $_POST['password'];  
        
        //to prevent from mysqli injection  
        $email = stripcslashes($email);  
        $password = stripcslashes($password);  
        $email = mysqli_real_escape_string($con, $email);  
        $password = mysqli_real_escape_string($con, $password); 

        // $password = password_hash("$password", PASSWORD_DEFAULT);
        
        $sql = "select * from tbl_user where usr_Email = '$email' and usr_Password = '$password'"; 
        echo $email;
        echo"<br>";
        echo $password; 
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        if($count == 1){  
            header('Location:../home.php');  
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
            echo"<br>";
            echo "Plain Password: ". $password. "<br>";
            echo "Plain Password: ". $password. "<br>";
            echo $row;
        }

    } 
        function register() { 
            echo "This is Button2 that is selected"; 
        } 
?>  