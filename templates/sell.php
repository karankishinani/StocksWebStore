<form action="sell.php" method="post">
    <fieldset>
        <div class="form-group">
            <select name="symbol" class="form-control">
                <option value=""></option>
                <?php
                
                    foreach ($stocks as $stock)
                    {
                        print("<option value=\"{$stock["symbol"]}\">{$stock["symbol"]}</option>");
                    }    
                    
                ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Sell</button>
        </div>
    </fieldset>
</form>
