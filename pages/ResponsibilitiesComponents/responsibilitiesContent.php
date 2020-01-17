<?php include_once("components/header.php") ?>
<br><br><br>
<div class="res-cover" style="background-image:url('<?php echo $GLOBALS["base_api"].$decoded_impact_data["bg"]["url"] ?>')">
    <div class="overlay"></div>
    <div class="container res-con">
        <?php echo $decoded_impact_data["headline"] ?>
    </div>
</div>

<div class="light-bg">
    <div class="container res-mid">
        <div class="heading"><?php echo $decoded_impact_data["focus_headline"] ?></div>
            <br><br>

        <?php
        for($j=0; $j<count($decoded_impact_content_data); $j++){
            ?>
            <div class="res-bullet">
                <div class="icon">
                    <img src="<?php echo $GLOBALS["base_api"].$decoded_impact_content_data[$j]["icon"]["url"] ?>" alt="">
                </div>
                <div class="context">
                    <?php echo $decoded_impact_content_data[$j]["description"] ?>
                </div>
            </div>

        <?php } ?>
    </div>
</div>


<?php include_once("pages/HomeComponents/homeContact.php") ?>
<?php include_once("components/footer.php") ?>