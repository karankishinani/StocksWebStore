<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Check for empty username or password
        if (empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["email"]))
        {
            apologize("You must provide username, email, and password!");
        }
        // Check for password/confirmation mismatch
        if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("Your passwords do not match!");
        }
        
        // validate email
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
        {
            apologize("Invalid email.");
        }
        
        // check if email is in database
        $rows = query("SELECT email FROM users");
        
        foreach ($rows as $row)
        {
            if ($_POST["email"] == $row["email"])
            {
                apologize("This email is already registered in our database.");
            }
        }
        
        // INSERT user into the database
        $result = query("INSERT INTO users (username, email, hash, cash) VALUES(?, ?, ?, 10000.00)", $_POST["username"], $_POST["email"], crypt($_POST["password"]));
        
        // if INSERT fails
        if ($result === false)
        {
            apologize("Invalid username!");
        }
        
        // get ID of new user
        $rows = query("SELECT LAST_INSERT_ID() AS id");
        $id = $rows[0]["id"];
        
        // log in user by remembering session
        $_SESSION["id"] = $id;
        
        // redirect to index.php
        redirect("/");
    }   
    
?>
