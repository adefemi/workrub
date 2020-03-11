<?php include_once("components/header.php") ?>
<br><br><br>
<!-- <div class="res-cover" style="background-image: url('<?php echo $decoded_data["cover"]["url"] ?>')">
    <div class="overlay"></div>
    <div class="container res-con">
        <?php echo $decoded_data["headline"] ?>
    </div>
</div> -->

<div class="light-bg">
    <div class="container res-mid res-max">
        <div id="privacy-content"> <?php echo ($decoded_data["privacy_context"]) ?></div>
    </div>
</div>


<?php include_once("pages/HomeComponents/homeContact.php") ?>
<?php include_once("components/footer.php") ?>