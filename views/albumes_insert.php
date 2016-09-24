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
                <label name="nickname">Name</label>
                <input type="text" name="name"  /><br>
                <label name="nickname">Description</label>
                <input type="text" name="description"  /><br>
                <input type="submit" value="Añadir Album" name="insert" />
            </fieldset>
        </div>
    </div>
</form>
</body>
</html>