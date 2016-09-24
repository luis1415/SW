<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>albumes</title>
</head>
<body>
<form method="post" action="../controllers/image.php" enctype="multipart/form-data">
    <div class="arrow-up"></div>
    <div class="formholder">
        <div class="randompad">
            <fieldset>
                <label name="title">Photo</label>
                <input type="file" name="photo" id="photo"><br>
                <label name="description">Title</label>
                <input type="text" name=title  /><br>
                <label name="description">Description</label>
                <input type="text" name="description"  /><br>
                <input type="hidden" name="id_album" value="<?= $_SESSION["current_album"] ?>"  /><br>
                <input type="submit" value="Add Photo" name="insert" />
            </fieldset>
        </div>
    </div>
</form>
</body>
</html>