<div class="res-cover second" style="background-image:url('https://cdn.pixabay.com/photo/2019/12/27/18/02/seagull-4723013_960_720.jpg')">
    <div class="overlay"></div>
    <div class="white-heading pos-rel">
        <?php include_once("components/header.php") ?>
    </div>
    <br><br><br>
    <div class="container res-con">
        <h4><?php echo $decoded_career_content_data["headline"] ?></h4>
        <p><?php echo $decoded_career_content_data["sub_headline"] ?></p>
    </div>
</div>

<div class="container">
    <br><br><br>
    <div class="resource-container single">
        <div class="resource-main">
            <h4 class="h-light">Current Openings</h4>
            <br><br>
            <?php 
                if(count($decoded_opening_data) < 1){
                ?>

                    <div class="not-available">No Opening Available</div>

                <?php } ?>

            <div class="grid-2">


                <?php 
                for($j=0; $j<count($decoded_opening_data); $j++){
                ?>

                    <div class="career-card">
                        <h3><?php echo $decoded_opening_data[$j]["title"] ?></h3>
                        <p><?php echo $decoded_opening_data[$j]["company_info"] ?></p>
                        <h4><?php echo $decoded_opening_data[$j]["location"] ?></h4>
                        <a href="<?php echo "/career/".$decoded_opening_data[$j]["slug"] ?>">
                            <button class="primary">Apply Now</button>
                        </a>
                    </div>

                <?php } ?>
            </div>
        </div>
        <div class="resource-sub">
            <!-- <input type="text" placeholder="Search" class="res-search">
            <br><br> -->
            <div class="resource-links single">
                <h4>Categories</h4>
                <a href="<?php echo $GLOBALS['base_url'].'career'?>"><li class="<?php
                    if(!isset($slug)) echo "active";
                ?>">All Openings</li></a>
                <?php 
                for($j=0; $j<count($decoded_opening_category_data); $j++){
                ?>

                    <a href="<?php echo $GLOBALS['base_url']."career?category=".$decoded_opening_category_data[$j]["slug"] ?>">
                        <li class="<?php 
                    if($slug == $decoded_opening_category_data[$j]["slug"]) echo "active";
                ?>"><?php echo $decoded_opening_category_data[$j]["title"] ?></li>
                    </a>

                <?php } ?>
            </div>
        </div>
    </div>
    <br><br>
</div>
<div class="light-bg">
    <div class="container">
        <?php include_once("components/paginator.php") ?>
    </div>
</div>

<?php include_once("pages/HomeComponents/homeContact.php") ?>
<?php include_once("components/footer.php") ?>