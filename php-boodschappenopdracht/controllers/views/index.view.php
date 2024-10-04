<!DOCTYPE html>
<html lang="en">
<?php require "controllers/views/partials/header.php" ?>
<body>
    <?php require "controllers/views/partials/nav.php" ?>
    <table id="groceryList">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Prijs</th>
                    <th>Aantal</th>
                    <th>Subtotaal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($groceries as $product) : ?>
                    <tr>
                        <th><?=htmlspecialchars($product["name"])?></th>
                        <td><?=htmlspecialchars($product["price"])?></td>
                        <td><?=htmlspecialchars($product["number"])?></td>
                        <td><?=htmlspecialchars($product["number"] * $product["price"])?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <th colspan="3">Totaal</th>
                <td><?=$totalPrice?></td>
            </tfoot>
    </table>
    <?php require "controllers/views/partials/footer.php" ?>
</body>
</html>