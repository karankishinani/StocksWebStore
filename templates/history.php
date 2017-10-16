<table class="table table-striped text-left">
    <thead>
        <th>Transaction</th>
        <th>Date/Time</th>
        <th>Symbol</th>
        <th>Shares</th>
        <th>Price</th>
    </thead>
    <?php

        foreach ($historylist as $history)
        {
            print("<tr>");
            print("<td>{$history["transaction"]}</td>");
            print("<td>{$history["datetime"]}</td>");
            print("<td>{$history["symbol"]}</td>");
            print("<td>{$history["shares"]}</td>");
            $price = number_format($history["price"], 2);
            print("<td>$ {$price}</td>");
            print("</tr>");
        }

    ?>
</table>
