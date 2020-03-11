<?php 
    $active_link = $_SERVER["REQUEST_URI"];
    $active_logo = $GLOBALS['base_url']."assets/images/png2.png";
    if($active_link == "/about-us"){
        $active_logo = $GLOBALS['base_url']."assets/images/workrub_white.png";
    }

?>

<div class="container">
    <div class="padding-top-60"></div>
    <div class="header-main">
        <a href="<?php echo $GLOBALS['base_url']?>"><div>
            <div class="logo">
                <img src="<?php echo $active_logo; ?>" alt="">
            </div>
        </div></a>
        <div class="nav-right desktop">
            <?php require "components/navlinks.php" ?>
        </div>
        <div class="nav-right mobile">
            <div id="nav-icon2">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</div>

<div class="side-bar-links mobile" id="drawer">
    <div class="overlay" id="overlay-toggle"></div>
    <div class="drawer">
        <?php require "components/navlinks.php" ?>
    </div>
</div>