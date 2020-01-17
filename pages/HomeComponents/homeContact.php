<?php 

    // get setting data
    $ch = curl_init($GLOBALS["contact_info"]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    $decoded_data = json_decode($data, true)[0];
?>

<div class="contact-container">
    <div class="container">
        <br><br>
        <div class="center-content">
            <div class="contact-heading">
                Contact Us
            </div>
        </div>
        <br>
        <br>
        <div class="contact-wrapper">
            <div>
                <form action="/" id="contact-form">
                    <input required placeholder="Name" name="name" type="text" class="input-control"/>
                    <input required placeholder="Email" name="email" type="email" class="input-control"/>
                    <input required placeholder="Subject" name="subject" type="text" class="input-control"/>
                    <textarea required placeholder="Leave a comment" name="comment" cols="20" class="input-control"></textarea>
                    <br><br>
                    <button type="submit" class="primary flex align-center" id="contact-submit"><div class="btn-text">Send</div> <i class="loading"  data-feather="loader"></i></button>
                </form>
            </div>
            <div class="contain-info">
                <h3>Our Address</h3>
                <p><?php echo $decoded_data["address"] ?></p>
                <a href="mailto:<?php echo $decoded_data["email"] ?>"><p><?php echo $decoded_data["email"] ?></p></a>
                <br><br>
                <h3>Call Us</h3>
                <a href="tel:<?php echo $decoded_data["phone"] ?>"><p>Tel: <?php echo $decoded_data["phone"] ?></p></a>
            </div>
        </div>
        <br><br>
    </div>
</div>