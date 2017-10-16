<div>
    <a href="/quote.php" class="btn btn-primary">Quote</a>
    <a href="/buy.php" class="btn btn-success">Buy</a>
    <a href="/sell.php" class="btn btn-info">Sell</a>
    <a href="/history.php" class="btn btn-warning">History</a>
    <a href="/logout.php" class="btn btn-danger">Log Out</a>
</div>

<table class="table table-striped text-left">
    <thead>
        <th>Symbol</th>
        <th>Name</th>
        <th>Shares</th>
        <th>Price</th>
        <th>TOTAL</th>
    </thead>
    <?php

        foreach ($positions as $position)
        {
            print("<tr>");
            print("<td>{$position["symbol"]}</td>");
            print("<td>{$position["name"]}</td>");
            print("<td>{$position["shares"]}</td>");
            $price = number_format($position["price"], 2);
            print("<td>$ {$price}</td>");
            $total = number_format($position["shares"] * $position["price"], 2);
            print("<td>$ {$total}</td>");
            print("</tr>");
        }

    ?>
    <tfoot>
        <td>CASH</td>
        <td></td>
        <td></td>
        <td></td>
        <td>$ <?= number_format($cash, 2) ?></td>
    </tfoot>
</table>
