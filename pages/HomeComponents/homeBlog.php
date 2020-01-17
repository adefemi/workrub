<?php 
    $limit = 3;

    // get setting data
    $ch = curl_init($GLOBALS["blog"]."?_limit=".$limit."&_sort=created_at:DESC");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    $decoded_home_blog_data = json_decode($data, true)

?>

<div class="blog-container">
    <div class="container">
        <br><br>
        <div class="center-content">
            <div class="blog-heading">
                Blog
            </div>
        </div>
        <br>
        <center>
            <?php
            if(count($decoded_home_blog_data) < 1){
                echo "<div class='not-available'>No content found </div>";
            }
            ?>
        </center>
        <div class="blog-wrapper">

                <?php 
                    for($j=0; $j<count($decoded_home_blog_data); $j++){
                    ?>
                        <div class="blog-item">
                            <img src="<?php echo $GLOBALS["base_api"].$decoded_home_blog_data[$j]["cover"]["url"] ?>" alt="image-1">
                            <div class="blog-heading">
                                <?php echo $decoded_home_blog_data[$j]["title"] ?>
                            </div>
                            <p>
                                <?php echo substr(strip_tags($decoded_home_blog_data[$j]["description"]),0,180); 
                                if(strlen(strip_tags($decoded_home_blog_data[$j]["description"])) > 180) echo "..."  ?>
                                <a href="<?php echo "/resource/".$decoded_home_blog_data[$j]["slug"]?>">Continue Reading</a>
                            </p>
                        </div>
                <?php } ?>
        </div>

        <br>
        <br>
        <div class="center-content">
            <a href="/resource">
                <button class="primary">
                    Visit our blog
                </button>
            </a>
        </div>
        <br>
        <br>
        <br>
    </div>
</div>