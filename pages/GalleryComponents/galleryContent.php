<div class="max-width-1400">
    <?php require_once "components/image_viewer.php" ?>

    <div class="margin-top-50 home-segment">
        <div class="title3 text-center">My Gallery</div>
    </div>

    <?php if(count($decoded_galleries) < 1){ ?> 
        <div class="main-404">
            <div class="heading-404">
                OPS!
            </div>
            <div class="desc-404">There is currently no gallery image. You should check back later.</div>
        </div>
        
    <?php } ?>

    <?php if($page_error != NULL){ ?> 
        <div class="main-404">
            <div class="heading-404">
                ERROR
            </div>
            <div class="desc-404">The page you are looking for do not exist!</div>
            <a href="/projects" class="button-main">Go Back</a>
        </div>
        
    <?php } ?>

    <?php if(count($decoded_galleries) > 0){ ?>
        <div class="container-section gallery">

    <?php 
        for($j=0; $j<count($decoded_galleries); $j++){
    ?>
        <div class="section-2 home-heading-image">
            <div class="img-con-cover" onclick='openImageViewer(<?php echo json_encode($decoded_galleries[$j]["cover_image"]) ?>, <?php echo json_encode($decoded_galleries[$j]["gallery_images"]) ?>)'>
                <div class="img-con" style="background-image: url(<?php echo($decoded_galleries[$j]["cover_image"]); ?>)"></div>
                <div class="overlay" >
                    <?php echo($decoded_galleries[$j]["title"]); ?>
                </div>
            </div>
        </div>
    <?php } ?>
        </div>
    <?php } ?>

    <?php if($page_error == NULL){ ?> 

        <div class="paginator">
            <a class="page-items <?php 
                if($decoded_gallery_data['previous'] == NULL){
                    echo("disabled");
                }else{
                    echo("");
                }
            ?>" href="<?php 
                $temp_data = explode('?', $decoded_gallery_data['next']);
                if(end($temp_data) != NULL){
                    $path_data = 'http://'.$_SERVER['HTTP_HOST'].'/gallerys?'.end($temp_data);
                }
                else{
                    $path_data = 'http://'.$_SERVER['HTTP_HOST'].'/gallerys';
                }
                
                echo ($path_data);
            ?>">
                Prev
            </a>
            <a class="page-items <?php 
                if($decoded_gallery_data['next'] == NULL){
                    echo("disabled");
                }else{
                    echo("");
                }
            ?>" href="<?php 
                $temp_data = explode('?', $decoded_gallery_data['next']);
                if(end($temp_data) != NULL){
                    $path_data = 'http://'.$_SERVER['HTTP_HOST'].'/gallerys?'.end($temp_data);
                }
                else{
                    $path_data = 'http://'.$_SERVER['HTTP_HOST'].'/gallerys';
                }
                echo ($path_data);
            ?>">
                Next
            </a>
        </div>

    <?php } ?>


    <?php include_once("components/footer.php") ?>
</div>