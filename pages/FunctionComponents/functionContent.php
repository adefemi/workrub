<?php include_once("components/header.php") ?>


<div class="container">
    <br><br><br><br>
    <div class="function-header">
        Functions
    </div>
    <br><br>
    <div class="function-wrapper">
            <?php 
                for($j=0; $j<count($decoded_function_data); $j++){
                ?>
                    <div class="function-item">
                        <div>
                            <div class="img-con" style="background-image: url('<?php echo $decoded_function_data[$j]["cover"]["url"] ?>')"></div>
                            <div class="function-heading">
                                <?php echo $decoded_function_data[$j]["title"] ?>
                            </div>
                            <p>
                                <?php echo substr(strip_tags($decoded_function_data[$j]["description"]),0,300);
                                if(strlen(strip_tags($decoded_function_data[$j]["description"])) > 300) echo "..."  ?>
                            </p>
                            <br><br>
                        </div>
                        <div class="flex align-center content-bottom">
                            <a href="<?php echo "/schedule/".$decoded_function_data[$j]["slug"] ?>">
                                <button class="primary">Book Now</button>
                            </a>
                            <div class="margin-left-20">
                                <?php echo $decoded_function_data[$j]["schedule_count"] ?> Hour
                            </div>
                        </div>
                    </div>

            <?php } ?>
       
        <div class="function-item">
            <h4>Don't see what you're looking for?</h4>
            <br>
            <p>
                <a href="<?php echo $decoded_data["cannot_find_contact"] ?>">Contact us</a> <?php echo $decoded_data["can_find_description"] ?>
            </p>
        </div>
    </div>
    <br><br><br>
</div>


<?php include_once("pages/HomeComponents/homeContact.php") ?>
<?php include_once("components/footer.php") ?>