<P>Albumes</P>

<?php
foreach ($rows_albumes as $row_album) { ?>
    <p><?php echo $row_album['name'];?></p>
    <p><?php echo $row_album['description'];?></p><br>
<?php }

?>