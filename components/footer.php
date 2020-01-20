<?php

    // get setting data
    $ch = curl_init($GLOBALS["footer_setting"]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    $decoded_data = json_decode($data, true)[count(json_decode($data, true)) -1];
?>

<div class="footer">
   <div class="container flex justify-between">
        <div>
            <div class="logo">
            <img src="<?php echo $GLOBALS['base_url']."assets/images/png2.png"?>" alt="">
            </div>
            <br>
            <div class="social-icons">
                <a target="_blank" href="<?php echo $decoded_data["facebook_link"]?>"><li><i  data-feather="facebook"></i></li></a>
                <a target="_blank" href="<?php echo $decoded_data["twitter_link"]?>"><li><i  data-feather="twitter"></i></li></a>
                <a target="_blank" href="<?php echo $decoded_data["instagram_link"]?>"><li><i  data-feather="instagram"></i></li></a>

                <div class="copyright">
                    &copy; <?php echo $decoded_data["copyright_year"]?>
                </div>
            </div>
        </div>

        <div class="footer-grid">
            <div class="footer-container">
                <a href="<?php echo $GLOBALS['base_url'].'faq'?>">
                    <div class="footer-heading">
                        FAQ
                    </div>
                </a>
            </div>
            <div class="footer-container">
                <a href="<?php echo $GLOBALS['base_url'].'privacy'?>">
                    <div class="footer-heading">
                        Privacy Policy
                    </div>
                </a>
            </div>
            <div class="footer-container">
                <a href="<?php echo $GLOBALS['base_url'].'terms'?>">
                    <div class="footer-heading">
                        Terms & Conditions
                    </div>
                </a>
            </div>
        </div>
   </div>
</div>