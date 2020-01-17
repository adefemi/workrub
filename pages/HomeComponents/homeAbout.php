<div class="light-bg about-container">
    <div class="container">
       <center> <?php
           if(count($decoded_home_content_data) < 1){
               echo "<div class='not-available'>No content found </div>";
           }
           ?></center>
        <div class="about-wrapper">

                <?php 
                for($j=0; $j<count($decoded_home_content_data); $j++){
            ?>

                <div class="about-item">
                    <div class="img-con" style="background-image: url('<?php echo $decoded_home_content_data[$j]["cover"]["url"] ?>')"></div>
                    <div class="about-heading">
                        <?php echo $decoded_home_content_data[$j]["title"] ?>
                    </div>
                    <p>
                        <?php echo substr(strip_tags($decoded_home_content_data[$j]["description"]),0,400);
                        if(strlen(strip_tags($decoded_home_content_data[$j]["description"])) > 400) echo "..."  ?>
                    </p>
                </div>

            <?php } ?>
        </div>
    </div>
</div>