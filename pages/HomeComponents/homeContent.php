<div class="max-width-1400">
    <div class="container-section">
        <div class="section-1 home-heading" style="margin-bottom: 20px">
            <h1 class="title"><?php echo($decoded_setting['header_main']); ?></h1>
            <h3 class="title2"><?php echo($decoded_setting['bullet']); ?></h3>
        </div>
        <div class="section-2 home-heading-image home-main-image">
            <div class="img-con-cover">
                <div class="img-con" style="background-image: url(<?php echo($decoded_setting['picture']); ?>)"></div>
            </div>
        </div>
    </div>
    <div class="container-section flex-inverse">
        <div class="section-1 home-heading section-border about-section">
            <p class="context">
             <?php echo($decoded_setting['about']); ?>
            </p>
            <?php 
                $res = $decoded_setting["resume"];
                if($res) {
                    echo('<a href="'.$res.'" target="_blank">Resume</a>');
                }
            ?>
                
        </div>
        <div class="section-2 home-heading">
            <h1 class="title text-center">About me</h1>
        </div>
    </div>
    <div class="container-section">
        <div class="section-1 home-heading">
            <h1 class="title text-center">What i can do</h1>
        </div>
        <div class="section-2 home-skill-con section-border">
            <div class="skill-con">
            <?php 

                for($i=0; $i<count($decoded_skills); $i++){
                    echo('<div class="skill-card">'.$decoded_skills[$i]["title"].'</div>');
                }

            ?>
            </div>
        </div>
    </div>

    <?php if(count($decoded_projects) > 0){ ?>
    
            <div class="margin-top-50 home-segment">
                <div class="title3 text-center">Some of my projects</div>
            </div>

            <?php 
                for($j=0; $j<count($decoded_projects); $j++){
                    $sum = $j+1;
                    $is_odd = $sum%2>0 ? true : false;
            ?>

            <?php if($is_odd){  ?>

                <div class="container-section flex-inverse">
                    <div class="section-1 home-heading margin-right-10 remove-spaces-mobile">
                        <div>
                        <h1 class="project-title"><?php echo($decoded_projects[$j]["title"]) ?></h1>
                        <p class="context">
                        <?php echo($decoded_projects[$j]["description"]) ?>
                        </p>
                        <a href="<?php echo($decoded_projects[$j]["link"]) ?>" target="_blank">
                            <button class="button-main">
                                Explore
                            </button>
                        </a>
                        </div>
                    </div>
                    <div class="section-2 home-heading-image">
                        <div class="img-con-cover">
                            <div class="img-con" style="background-image: url(<?php echo($decoded_projects[$j]["cover_image"]); ?>)"></div>
                        </div>
                    </div>

                </div>
            <?php } else { ?>
                <div class="container-section">
                    <div class="section-2 home-heading-image">
                        <div class="img-con-cover">
                            <div class="img-con" style="background-image: url(<?php echo($decoded_projects[$j]["cover_image"]); ?>)"></div>
                        </div>
                    </div>
                    <div class="section-1 home-heading margin-left-20 remove-spaces-mobile">
                    <div>
                        <h1 class="project-title"><?php echo($decoded_projects[$j]["title"]) ?></h1>
                        <p class="context">
                            <?php echo($decoded_projects[$j]["description"]) ?>
                        </p>
                        <a href="<?php echo($decoded_projects[$j]["link"]) ?>" target="_blank">
                            <button class="button-main">
                                Explore
                            </button>
                        </a>
                        </div>
                    </div>
                </div>

            <?php } ?>

            <?php } ?>

    <?php } ?>

    <?php if(count($decoded_projects) <= 1){ ?>
        <div class="container-section flex-inverse">
        <div class="section-1 home-skill-con section-border">
            <?php include_once("components/contact_form.php") ?>
        </div>
        <div class="section-2 home-heading">
            <h1 class="title text-center margin-top-30">Contact me</h1>
        </div>
        
        
    </div>
        <?php } else { ?>
            <div class="container-section">
        <div class="section-2 home-heading">
            <h1 class="title text-center margin-top-30">Contact me</h1>
        </div>
        <div class="section-1 home-skill-con section-border">
            <?php include_once("components/contact_form.php") ?>
        </div>
        
    </div>
        <?php } ?>

    
    <?php include_once("components/footer.php") ?>
</div>