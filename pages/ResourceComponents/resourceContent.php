<?php include_once("components/header.php") ?>


<div class="container">
    <br><br>
    <div class="function-header">
        News
    </div>
    <br><br>
    <div class="resource-links">
        <a href="/resource"><li class="<?php 
            if(!isset($slug)) echo "active";
        ?>">All Posts</li></a>
        <?php 
            for($j=0; $j<count($decoded_blog_category_data); $j++){
        ?>

            <a href="<?php echo "/resource?category=".$decoded_blog_category_data[$j]["slug"] ?>">
                <li class="<?php 
            if($slug == $decoded_blog_category_data[$j]["slug"]) echo "active";
        ?>"><?php echo $decoded_blog_category_data[$j]["title"] ?></li>
            </a>

        <?php } ?>
    </div>

    <br><br><br>
    <?php 
                if(!isset($decoded_main_blog_data) && count($decoded_blog_data < 1)){
                ?>

                    <div class="not-available">No Resource Available</div>

                <?php } ?>
    <div class="resource-container">
        <div class="resource-main">

            <?php 
                if(isset($decoded_main_blog_data)){
            ?>
            <div class="resource-card">
                <div class="cover" style="background-image: url('<?php echo $GLOBALS["base_api"].$decoded_main_blog_data["cover"]["url"] ?>')"></div>
                <div class="card-content">
                    <div class="res-title">
                        <?php echo $decoded_main_blog_data["title"] ?>
                    </div>
                    <p>
                        <?php echo substr(strip_tags($decoded_main_blog_data["description"]),0,400); 
                                if(strlen(strip_tags($decoded_main_blog_data["description"])) > 400) echo "..."  ?>
                    </p>
                    <div class="authon-con">
                        <div class="author">
                            <h2><?php echo $decoded_main_blog_data["author"] ?></h2>
                            <p><?php 
                                $date = strtotime($decoded_main_blog_data["created_at"]);
                                echo date('M. d, Y  -  H:i', $date);
                            ?></p>
                        </div>
                        <a href="<?php echo "/resource/".$decoded_main_blog_data["slug"]?>">
                            <div class="link-next">
                                <i  data-feather="external-link"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

                <?php } ?>
        </div>
        <div class="resource-sub">

            <?php 
                for($j=0; $j<count($decoded_blog_data); $j++){
                ?>

                    <div class="resource-card sub">
                        <div class="cover" style="background-image: url('<?php echo $GLOBALS["base_api"].$decoded_blog_data[$j]["cover"]["url"] ?>')"></div>
                        <div class="card-content">
                            <div class="res-title">
                                <?php echo $decoded_blog_data[$j]["title"] ?>
                            </div>
                            <p>
                             <?php echo substr(strip_tags($decoded_blog_data[$j]["description"]),0,100); 
                                if(strlen(strip_tags($decoded_blog_data[$j]["description"])) > 100) echo "..."  ?>
                            </p>
                            <div class="authon-con">
                                <div class="author">
                                <h2><?php echo $$decoded_blog_data[$j]["author"] ?></h2>
                                <p><?php 
                                    $date = strtotime($decoded_blog_data[$j]["created_at"]);
                                    echo date('M. d, Y  -  H:i', $date);
                                ?></p>
                                </div>
                                <a href="<?php echo "/resource/".$decoded_blog_data[$j]["slug"]?>">
                                    <div class="link-next">
                                        <i  data-feather="external-link"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

            <?php } ?>
        </div>
    </div>
    <br><br><br><br>
</div>

<div class="light-bg">
    <div class="container">
        <?php include_once("components/paginator.php") ?>
    </div>
</div>


<?php include_once("pages/HomeComponents/homeContact.php") ?>
<?php include_once("components/footer.php") ?>