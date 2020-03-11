<?php include_once("components/header.php") ?>
<br><br><br>
<!-- <div class="res-cover" style="background-image: url('<?php echo $decoded_data["cover"]["url"] ?>')">
    <div class="overlay"></div>
    <div class="container res-con">
        <?php echo $decoded_data["headline"] ?>
    </div>
</div> -->

<div class="light-bg">
    <div class="container res-mid">
        <?php
            for($i =0; $i<count($decoded_data['faq']); $i++){
                ?>
                <div class="faq-con" onclick="faqToggle(this)">
                    <div class="faq-quest">
                        <div class="flex align-center justify-between">
                            <div>
                                <?php echo $decoded_data['faq'][$i]["question"]?>
                            </div>
                            <div class="drop-faq">
                                <i  data-feather="chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="faq-ans hidden"><?php echo $decoded_data['faq'][$i]["ans"]?></div>
                </div>
                <?php
            }
        ?>
    </div>
</div>


<?php include_once("pages/HomeComponents/homeContact.php") ?>
<?php include_once("components/footer.php") ?>