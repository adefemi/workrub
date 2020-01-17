<?php include_once("components/header.php") ?>


<div class="container">
    <br><br>
    <div class="function-header">
        News
    </div>
    <br><br><br>
    <div class="resource-container single">
        <div class="resource-main">
            <div class="resource-card single">
                <div class="cover" style="background-image: url('<?php echo $GLOBALS["base_api"].$decoded_blog_data["cover"]["url"] ?>')"></div>
                <div class="card-content">
                    <div class="res-title">
                        <?php echo $decoded_blog_data["title"] ?>
                    </div>
                    <div class="authon-con single">
                        By <a href=""><?php echo $decoded_blog_data["author"] ?></a> Posted <a href="">
                        <?php 
                                $date = strtotime($decoded_main_blog_data["created_at"]);
                                echo date('F d, Y', $date);
                            ?>
                        </a> In <a href="<?php echo "/resource?category=".$decoded_blog_data["blog_category"]["slug"] ?>"><?php echo $decoded_blog_data["blog_category"]["title"] ?></a>
                    </div>
                    <p>
                    <?php echo $decoded_blog_data["description"] ?>
                    </p>
                   
                </div>
            </div>

            <br><br><br>
            <h4>Recent Post</h4>
            <div class="recent-post-con">
            <?php 
                for($j=0; $j<count($decoded_recent_blog_data); $j++){
                ?>

                    <div class="resource-card small">
                        <div class="cover" style="background-image: url('<?php echo $GLOBALS["base_api"].$decoded_recent_blog_data[$j]["cover"]["url"] ?>')"></div>
                        <div class="card-content">
                            <div class="res-title">
                                <?php echo $decoded_recent_blog_data[$j]["title"] ?>
                            </div>
                            <p>
                             <?php echo substr(strip_tags($decoded_recent_blog_data[$j]["description"]),0,150); 
                                if(strlen(strip_tags($decoded_recent_blog_data[$j]["description"])) > 150) echo "..."  ?>
                            </p>
                            <div class="authon-con">
                                <div class="author">
                                <h2><?php echo $$decoded_recent_blog_data[$j]["author"] ?></h2>
                                <p><?php 
                                    $date = strtotime($decoded_recent_blog_data[$j]["created_at"]);
                                    echo date('M. d, Y  -  H:i', $date);
                                ?></p>
                                </div>
                                <a href="<?php echo "/resource/".$decoded_recent_blog_data[$j]["slug"]?>">
                                    <div class="link-next">
                                        <i  data-feather="external-link"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

            <?php } ?>
            </div>
            <br><br><br>
            <h4 class="leave-com">
                Leave a comment
            </h4>
            <form id="comment-form">
                <textarea name="comment" required placeholder="Leave your comment" name="message" cols="20" class="input-control"></textarea>
                <div class="grid-2">
                    <input name="name" required placeholder="Name (Required)" type="text" class="input-control"/>
                    <input name="email" required placeholder="Email (Required)" type="email" class="input-control"/>
                </div>
                <input type="hidden" value="<?php echo $decoded_blog_data["id"] ?>" name="blog">
                <br>
                <button type="submit" class="primary flex align-center" id="comment-submit"><div class="btn-text">Post Comment</div> <i class="loading"  data-feather="loader"></i></button>
            </form>
            <br><br><br>
            <div class="comments-con">
                <?php
                    if(count($decoded_blog_comments_data) < 1){
                        echo "<div class='not-available'>No comment available for this post.</div>";
                    }
                    else{
                        echo "<h5>Comments</h5><br>";
                    }
                ?>
                <?php for($i = 0; $i<count($decoded_blog_comments_data); $i++){ ?>
                    <div class="comment-item">
                        <p><?php echo $decoded_blog_comments_data[$i]["comment"]?></p>
                        <div class="flex align-center justify-between">
                            <div><small><?php echo $decoded_blog_comments_data[$i]["name"]?></small></div>
                            <div><small><?php echo date_format(new DateTime($decoded_blog_comments_data[$i]["created_at"]), "d M, Y - H:i ")?></small></div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="resource-sub">
            <!-- <input type="text" placeholder="Search" class="res-search">
            <br><br> -->
            <div class="resource-links single">
                <h4>Categories</h4>
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
        </div>
    </div>
    <br><br><br><br>
</div>


<?php include_once("pages/HomeComponents/homeContact.php") ?>
<?php include_once("components/footer.php") ?>