<?php include_once("components/header.php") ?>


<div class="container career-con">
    <br><br>
    <div class="function-header">
        Careers
    </div>

    <div class="single-career-con">
        <div class="title"><?php echo $decoded_opening_data["title"] ?></div>
        <div class="info"><?php echo $decoded_opening_data["company_info"].". ".$decoded_opening_data["location"] ?></div>

        <p>
            <?php echo $decoded_opening_data["description"]?>
        </p>
    </div>
    
    <div class="single-career-form">
        <form action="/" id="application-form" enctype="multipart/form-data">
            <input required placeholder="Full Name" name="fullname" type="text" class="input-control"/>
            <input required placeholder="Email" name="email" type="email" class="input-control"/>
            <input required placeholder="Phone" name="phone" type="text" class="input-control"/>
            <input required placeholder="Address" name="address" type="text" class="input-control"/>
            <br>
            <h5>Resume</h4>
            <input required placeholder="Resume" id="resume_file" name="resume" type="file" class="input-control"/>
            <input type="hidden" name="opening" value="<?php echo $decoded_opening_data["id"] ?>">
            <br>
            <button type="submit" class="primary flex align-center" id="application-submit"><div class="btn-text">Submit Application</div> <i class="loading"  data-feather="loader"></i></button>
        </form>
    </div>

</div>

<?php include_once("components/footer.php") ?>
