<?php include_once("components/header.php") ?>
<br><br><br>
<!-- <div class="res-cover" style="background-image: url('<?php echo $decoded_data["cover"]["url"] ?>')">
    <div class="overlay"></div>
    <div class="container res-con">
        <?php echo $decoded_data["headline"] ?>
    </div>
</div> -->

<div class="light-bg">
    <div class="container res-mid">
        <?php
        for($i =0; $i<count($decoded_quiz_data); $i++){
            ?>
            <div class="quiz-card">
                <div class="avatar" style="background-image: url('<?php echo $decoded_quiz_data[$i]["avatar"]["url"]?>')"></div>
                <div class="content">
                    <h4><?php echo $decoded_quiz_data[$i]["title"]?></h4>
                    <p><?php echo $decoded_quiz_data[$i]["description"]?></p>
                    <br>
                    <div class="flex align-center justify-between">
                        <div class="timestamp">Added: <?php
                            $date = strtotime($decoded_quiz_data[$i]["created_at"]);
                            echo date('M. d, Y  -  H:i', $date);
                            ?></div>

                        <a href="<?php echo $GLOBALS['base_url'].'quiz/quiz-'.$decoded_quiz_data[$i]['id']?>">Take Quiz</a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>


<?php include_once("pages/HomeComponents/homeContact.php") ?>
<?php include_once("components/footer.php") ?>