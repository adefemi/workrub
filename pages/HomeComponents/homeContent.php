<?php include_once("pages/HomeComponents/homeTop.php") ?>
<?php include_once("pages/HomeComponents/homeAbout.php") ?>
<?php include_once("pages/HomeComponents/homeBlog.php") ?>
<div class="vertical-line desktop2"></div>

<div class="drop-cv">
    <div class="container">
        <div class="cv-inner">
            <h2>Drop your CVs</h2>
            <br>
            <a href="<?php echo $GLOBALS['base_url'].'career'?>">
                <button class="primary outline inverse">
                    Apply Now
                </button>
            </a>
        </div>
    </div>
</div>
<?php include_once("pages/HomeComponents/homeContact.php") ?>
<?php include_once("components/footer.php") ?>