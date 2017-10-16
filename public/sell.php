<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // get positions an associative array of stocks owned
        $rows = query("SELECT * FROM portfolio WHERE id = ?", $_SESSION["id"]);
        
        $stocksowned = [];
        foreach ($rows as $row)
        {
            $stocksowned[] = [
                "symbol" => $row["symbol"]
            ];
        }
        
        // render form
        render("sell.php", ["stocks" => $stocksowned, "title" => "Sell"]);
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // if no stock selected
        if (empty($_POST["symbol"]))
        {
            apologize("You must select a stock to sell!");
        }
        
        // retrieve current stock price
        $symbol = lookup($_POST["symbol"]);
        $price = $symbol["price"];
        
        // retrieve stock shares owned
        $rows = query("SELECT * FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
        $shares = $rows[0]["shares"];
        
        // remove stock from database
        query("DELETE FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
        
        // update cash balance in database
        $balance = $shares * $price;
        query("UPDATE users SET cash = cash + ? WHERE id = ?", $balance, $_SESSION["id"]);
    
        // add history record
        query("INSERT INTO history (id, transaction, datetime, symbol, shares, price) VALUES(?, ?, NOW(), ?, ?, ?)", $_SESSION["id"], "SELL", $_POST["symbol"], $shares, $balance);
        
        // email the user
        require("../includes/mail.php");
        $row = query("SELECT email FROM users WHERE id = ?", $_SESSION["id"]);
        $email = $row[0]["email"];
        $message = '
        <html>
            <h1>You have sold a Stock!</h1>
            <table>
                <thead>
                    <th>Symbol</th>
                    <th>Name</th>
                    <th>Shares</th>
                    <th>Price</th>
                </thead>
                <td>'.$_POST["symbol"].'</td>
                <td>'.$symbol["name"].'</td>
                <td>'.$shares.'</td>
                <td>$'.number_format($balance, 2).'</td>
            </table>
        </html>
        ';
        smtpmailer($email, GUSER, 'C$50 Finance', 'You have sold a Stock!', $message);
        
        // redirect to index.php
        redirect("/");
    }
?>
