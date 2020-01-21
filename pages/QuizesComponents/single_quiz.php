<?php include_once("components/header.php") ?>

<br><br>
<div class="light-bg ">
    <div class="container res-mid">

        <h3><?php echo $decoded_data["title"]?></h3>
        <br>
        <div>
            <?php echo $decoded_data["content"]?>
        </div>
    </div>


</div>



<?php include_once("pages/HomeComponents/homeContact.php") ?>
<?php include_once("components/footer.php") ?>
