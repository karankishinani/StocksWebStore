<?php

    // configuration
    require("../includes/config.php"); 
    
    // get positions an associative array of stocks owned
    $rows = query("SELECT * FROM portfolio WHERE id = ?", $_SESSION["id"]);
    
    $positions = [];
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        if ($stock !== false)
        {
            $positions[] = [
                "name" => $stock["name"],
                "price" => $stock["price"],
                "shares" => $row["shares"],
                "symbol" => $row["symbol"]
            ];
        }
    }
    
    // get current cash balance
    $rows = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    $row = $rows[0];
    $cash = $row["cash"];
    
    // render portfolio
    render("portfolio.php", ["positions" => $positions, "cash" => $cash, "title" => "Portfolio"]);

?>
