<?php

    // configuration
    require("../includes/config.php");
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("quote_form.php", ["title" => "Quote"]);
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // if no quote symbol provided
        if (empty($_POST["symbol"]))
        {
            apologize("You must provide a symbol!");
        }
        
        // look up stock price
        $stock = lookup($_POST["symbol"]);
        
        // if Invalid Symbol is Provided
        if ($stock === false)
        {
            apologize("Invalid symbol provided.");
        }
        
        // render quote
        render("quote.php", $stock);
    }   
    
?>
