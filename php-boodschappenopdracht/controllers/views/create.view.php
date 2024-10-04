<!DOCTYPE html>
<html lang="en">
    <?php require "controllers/views/partials/header.php" ?>
    <body>
        <?php require "controllers/views/partials/nav.php" ?>
            <form method="POST" action="/create">
                <div class="name">
                    <label for="name">Nieuwe producten toevoegen</label><br>
                    <div class="error">
                        <?php if(isset($errors["name"])) : ?>
                        <?= $errors["name"] ?><br>
                        <?php endif; ?>
                    <input type="text" id="name" name="name" placeholder="Nieuw product"><br>
                </div>
                <div class="number">
                    <label for="number">Hoeveel van bovenstaand product wil je toevoegen?</label><br>
                    <div class="error">
                        <?php if(isset($errors["number"])) : ?>
                        <?= $errors["number"] ?><br>
                        <?php endif; ?>
                    </div>
                    <input type="number" id="number" name="number" placeholder="Hoeveelheid"><br>
                </div>
                <div class="price">
                    <label for="price">Wat is de prijs van het product? Per stuk.</label><br>
                    <div class="error">
                        <?php if(isset($errors["price"])) : ?>
                        <?= $errors["price"] ?><br>
                        <?php endif; ?>
                    </div>
                    <input type="text" id="price" name="price" placeholder="Prijs"><br>
                    <input type="submit" name="confirm" value="Producten toevoegen"><br>
                </div>
            </form>
        <?php require "controllers/views/partials/footer.php" ?>
    </body>
</html>