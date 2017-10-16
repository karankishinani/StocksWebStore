<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render the HTML form
        render("buy.php", [ "title" => "Buy" ]);
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // check if number of shares is negative, zero, or float
        if (preg_match("/[.,-]/", $_POST["shares"]) || $_POST["shares"] == 0)
        {
            apologize("Invalid number of stocks.");
        }
        
        // if symbol is empty
        if (empty($_POST["symbol"]))
        {
            apologize("You must provide a symbol.");
        }
        
        // make symbol uppercase
        $uppersymbol = strtoupper($_POST["symbol"]);
        
        // if symbol not valid
        $symbol = lookup($uppersymbol);
        
        if ($symbol === false)
        {
            apologize("Symbol not found.");
        }
        
        // get stock price
        $price = $symbol["price"] * $_POST["shares"];
        
        // check if user can afford the purchase
        $rows = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        $cash = $rows[0]["cash"];
        if ($cash < $price)
        {
            apologize("You cannot afford this purchase");
        }
        
        // add to database symbol and shares
        query("INSERT INTO portfolio (id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", $_SESSION["id"], $uppersymbol, $_POST["shares"]);
        
        // reduce cash from database
        query("UPDATE users SET cash = cash - ? WHERE id = ?", $price, $_SESSION["id"]);
        
        // add history record
        query("INSERT INTO history (id, transaction, datetime, symbol, shares, price) VALUES(?, ?, NOW(), ?, ?, ?)", $_SESSION["id"], "BUY", $uppersymbol, $_POST["shares"], $price);
        
        // email the user
        require("../includes/mail.php");
        $row = query("SELECT email FROM users WHERE id = ?", $_SESSION["id"]);
        $email = $row[0]["email"];
        $message = '
        <html>
            <h1>You have bought a new Stock!</h1>
            <table>
                <thead>
                    <th>Symbol</th>
                    <th>Name</th>
                    <th>Shares</th>
                    <th>Price</th>
                </thead>
                <td>'.$uppersymbol.'</td>
                <td>'.$symbol["name"].'</td>
                <td>'.$_POST["shares"].'</td>
                <td>$'.number_format($price, 2).'</td>
            </table>
        </html>
        ';
        smtpmailer($email, GUSER, 'C$50 Finance', 'You have bought a new Stock!', $message);
        
        // redirect to index.php
        redirect("/");
    }
    
?>
