<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>albumes</title>
</head>
<body>
<form method="post" action="../controllers/album.php">
    <div class="arrow-up"></div>
    <div class="formholder">
        <div class="randompad">
            <fieldset>
                <label name="name">Name</label>
                <input type="text" name="name" value="<?php echo $row["name"]; ?>" /><br>
                <label name="description">Description</label>
                <input type="text" name="description" value="<?= $row["description"]; ?>" /><br>
                <input type="hidden" name="id_album" value="<?= $row["id"]; ?>" /><br>
                <input type="submit" value="Save" name="update" />
            </fieldset>
        </div>
    </div>
</form>
</body>
</html>