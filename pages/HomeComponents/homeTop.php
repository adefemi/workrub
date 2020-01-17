<?php include_once("components/header.php") ?>
<div class="container">
    <div class="home-bg desktop2">
        <img src="/assets/images/png1.png" alt="">
    </div>
<div class="home-control">

    <div class="margin-top-60"></div>


    <div class="heading-main">
       <?php echo $decoded_home_data["headline"] ?>
    </div>
    <p class="top-content">
        <?php echo $decoded_home_data["sub_heading"] ?>
    </p>
    <br>
    <div class="flex">
        <a href="/functions"><button class="primary button2" style="">Send a brief</button></a>
        <a href="/about-us"><button class="primary button2 outline margin-left-20">Learn more</button></a>
    </div>
</div>
    <br><br>
    <br><br>
    
</div>