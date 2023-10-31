<?php

require('connection.php');
session_start();

#for login
if(isset($_POST['login']))
{
    $query="SELECT * FROM `registered_username` WHERE `email`='$_POST[email_username]' OR `username`='$_POST[email_username]'";
    $result=mysqli_query($con,$query);

    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            $result_fetch=mysqli_fetch_assoc($result);
            if(password_verify($_POST['password'],$result_fetch['password']))
            {
                $_SESSION['logged_in']=true;
                $_SESSION['username']=$result_fetch['username'];
                header("location: login_signup_page.php");
            }
            else
            {
                #if inncorrect password 
                echo"
                <script>
                    alert('Inncorect Password');
                    window.location.href='login_signup_page.php';
                </script>
            ";
            }
        }
        else
        {
            echo"
            <script>
                alert('Email or Username Not Registered');
                window.location.href='login_signup_page.php';
            </script>
        ";   
        }
    }
    else
    {
        echo"
            <script>
                alert('Cannot Run Query');
                window.location.href='login_signup_page.php';
            </script>
        ";
    }
}



#for registration
if(isset($_POST['register']))
{
    $user_exist_query="SELECT * FROM `registered_username` WHERE `username`='$_POST[username]' OR `email`='$_POST[email]'"; 
    $result=mysqli_query($con,$user_exist_query);

    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            $result_fetch=mysqli_fetch_assoc($result);
            if($result_fetch['username']==$_POST['username'])
            {
                echo"
                    <script>
                        alert('$result_fetch[username] - Username already taken');
                        window.location.href='login_signup_page.php';
                    </script>
               ";
            }
            else
            {
                echo"
                    <script>
                        alert('$result_fetch[username] - E-mail already registered');
                        window.location.href='login_signup_page.php';
                    </script>
                ";
            } 
        }
        else
        {
            $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
            $query="INSERT INTO `registered_username`(`name`, `username`, `email`, `password`) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$password')";
            if(mysqli_query($con,$query))
            {
                echo"
                    <script>
                        alert('Registration Successful 🎉');
                        window.location.href='login_signup_page.php';
                    </script>
                ";
            }
            else
            {
                echo"
                    <script>
                        alert('Cannot Run Query');
                        window.location.href='login_signup_page.php';
                    </script>
                ";  
            }
        }
    }
    else
    {
        echo"
            <script>
                alert('Cannot Run Query');
                window.location.href='login_signup_page.php';
            </script>
        ";
    }
    
}



?>