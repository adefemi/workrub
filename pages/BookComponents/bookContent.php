<?php include_once("components/header.php") ?>


<div class="container">
    <br><br>
    <a class="function-header second" href="javascript:history.go(-1)">
    <i  data-feather="arrow-left-circle"></i> &nbsp; Back
    </a>
    <form action="" id="book-form">
    <div class="single-career-con one">
        <div class="title">Schedule Online</div>
    </div>

    <div class="resource-container single second">
        <div class="resource-main">

            <div class="single-career-con second two">
                <div id="datePick">
                    <?php include_once("components/date-controller.php") ?>
                </div>
                <div id="book-info" class="hidden">
                    <h5>Add your info</h5>
                    <small>Tell us a bit about yourself</small>

                    <br>
                    <br>
                    <br>

                        <p>Name (Required)</p>
                        <input required placeholder="Name" name="name" type="text" class="input-control"/>
                        <p>Email (Required)</p>
                        <input required placeholder="Email" name="email" type="email" class="input-control"/>
                        <p>Phone Number (Required)</p>
                        <input required placeholder="Phone " name="phone" type="number" class="input-control"/>
                        <p>What would you like to meet about?</p>
                        <textarea placeholder="Leave a comment" name="comment" cols="20" class="input-control"></textarea>

                </div>
            </div>


        </div>
        <div class="resource-sub">


            <div class="single-career-form second">
                <div class="complaint-con">
                    <div>
                        <h1><?php echo $decoded_data["meeting_headline"] ?></h1>
                        <p><?php echo $decoded_function_data["schedule_count"]?> Hour <?php echo $decoded_data["meeting_headline"] ?></>
                        <div class="divider"></div>
                        <div class="flex align-center book-text">
                            <p id="complianceDate"></p>
                            <div id="edit-time" class="hidden" style="margin-left: 20px; margin-bottom: 20px; color: #ff4c27; transition: .3s ease">
                                <i data-feather="edit"></i>
                            </div>
                        </div>
                        <p><?php echo $decoded_data["meeting_point"] ?></p>
                    </div>
                    <div class="flex align-center justify-between">
                        <button class="primary hidden" id="book-next">
                            Next
                        </button>
                        <button type="submit" class="primary flex align-center hidden" id="book-now">
                            Book Now <i class="loading"  data-feather="loader"></i>
                        </button>
                    </div>
                </div>
                <div class="concel flex align-center">
                    Cancellation Policy <div class="ease pointer" id="showPolicy">
                        <i   data-feather="chevron-down"></i>
                    </div>
                </div>
                <div class="cancellation-policy hidden2" id="canpol">
                    <?php echo $decoded_data["cancellation_policy"] ?>
                </div>
            </div>
    </form>

        </div>
    </div>

    
    
    

</div>

<?php include_once("components/footer.php") ?>