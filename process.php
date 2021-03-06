<?php
session_start();

if (filter_has_var(INPUT_POST, 'register')) {
    if ($_REQUEST['name'] == '' || $_REQUEST['email'] == '' || $_REQUEST['password'] == '') {
        echo "You are required to fill all the input fields";
        echo "<br>";
        echo "<a href='index.php'>Go Back</a>";
        return;
    }
    if (array_key_exists($_REQUEST['email'], $_SESSION)) {
        echo "Email already exist";
        echo "<br>";
        echo "<a href='index.php' >Go Back</a>";
        return;
    }
    $_SESSION[$_REQUEST['email']] = $_REQUEST;
    echo "Account created successfully";
    echo "<br>";
    echo "<a href='login.php'>Login now</a>";
}

if (filter_has_var(INPUT_POST, 'login')) {
    if (array_key_exists($_REQUEST['email'], $_SESSION)) {
        if ($_REQUEST['email'] === $_SESSION[$_REQUEST['email']]['email'] && $_REQUEST['password'] === $_SESSION[$_REQUEST['email']]['password']) {
            echo "<span>Welcome ".$_REQUEST['email']."</span>";
            echo "<br>";
            echo "<a href='login.php>Logout</a>";
        } else {
            echo "You either entered an invalid email address or password, please try again";
            echo "<br>";
            echo "<a href='login.php'>Go Back</a>";
        }
    } else {
        echo "You either entered an invalid email address or password, please try again";
        echo "<br>";
        echo "<a href='login.php'>Go Back</a>";
    }
};