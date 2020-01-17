<?php

    // get setting data
    $ch = curl_init($GLOBALS["function_drop"]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    $decoded_function_drop_data = json_decode($data, true);

    // get setting data
    $ch = curl_init($GLOBALS["blog_drop"]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    $decoded_blog_drop_data = json_decode($data, true);

    $active_link = $_SERVER['REQUEST_URI'];
    $active_link = explode("/", $active_link);
    if(in_array("about-us", $active_link)){
        $active_link = "about";
    }
    else if (in_array("functions", $active_link)){
        $active_link = "functions";
    }
    else if (in_array("resource", $active_link)){
        $active_link = "resource";
    }
    else if (in_array("social-impact", $active_link)){
        $active_link = "social";
    }
    else{
        $active_link = null;
    }
?>

<li class="<?php if($active_link == 'about') echo 'active'?>"><a href="<?php echo $GLOBALS['base_url'].'about-us'?>">About Us</a></li>
<li class="<?php if($active_link == 'functions') echo 'active'?>">
    <div class="flex align-center justify-center">
        <a href="<?php echo $GLOBALS['base_url'].'functions'?>">Functions</a> &nbsp;
        <div class="mobile" onclick="toggler(1)"><i  data-feather="chevron-down"></i></div>
    </div>
    <?php if(count($decoded_function_drop_data) > 0){?>
    <ul class="dropdown dropdown1">
        <?php
        for($i = 0; $i < count($decoded_function_drop_data); $i++) {
            ?>
            <a href="<?php echo $decoded_function_drop_data[$i]["link"]?>">
                <li><?php echo $decoded_function_drop_data[$i]["title"]?></li>
            </a>
            <?php
        }
        ?>
    </ul>
    <?php }?>

</li>
<li class="<?php if($active_link == 'resource') echo 'active'?>">
    <div class="flex align-center justify-center">
        <a href="<?php echo $GLOBALS['base_url'].'resource'?>">Resources</a>&nbsp;
        <div class="mobile" onclick="toggler(2)"><i data-feather="chevron-down"></i></div>
    </div>
    <?php if(count($decoded_blog_drop_data) > 0){?>
        <ul class="dropdown dropdown2">
            <?php
            for($i = 0; $i < count($decoded_blog_drop_data); $i++) {
                ?>
                <a href="<?php echo $decoded_blog_drop_data[$i]["link"]?>">
                    <li><?php echo $decoded_blog_drop_data[$i]["title"]?></li>
                </a>
                <?php
            }
            ?>
        </ul>
    <?php }?>

</li>
<li class="<?php if($active_link == 'social') echo 'active'?>"><a href="<?php echo $GLOBALS['base_url'].'social-impact'?>">Social Impact</a></li>