<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // get all rows from the history database
        $rows = query("SELECT * FROM history WHERE id = ?", $_SESSION["id"]);
        
        $history = [];
        
        // iterate through each row and make an associative array
        foreach ($rows as $row)
        {
            $history[] = [
                "transaction" => $row["transaction"],
                "datetime" => $row["datetime"],
                "symbol" => $row["symbol"],
                "shares" => $row["shares"],
                "price" => $row["price"]
            ];
        }
    
        render("history.php", [ "historylist" => $history, "title" => "History" ] );
    }
    
?>
