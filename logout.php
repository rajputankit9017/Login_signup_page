<?php

    session_start();
    session_unset();
    session_destroy();
    header("location:login_signup_page.php");
?>