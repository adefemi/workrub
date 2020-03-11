<?php 

    // get setting data
    $ch = curl_init($GLOBALS["about"]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    $decoded_about_data = json_decode($data, true)[0];

    
    // get setting data
    $ch = curl_init($GLOBALS["portfolio"]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    $decoded_portfolio_data = json_decode($data, true);


    // get setting data
    $ch = curl_init($GLOBALS["client"]."?_limit=3");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    $decoded_client_data = json_decode($data, true);


    // get setting data
    $ch = curl_init($GLOBALS["team"]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    $decoded_team_data = json_decode($data, true);
    
?>

<div class="about-main">
    <div class="white-heading">
        <?php include_once("components/header.php") ?>
    </div>
    <br><br><br><br><br><br>
    <div class="container">
        <div class="about-content">
            <h1><?php echo $decoded_about_data["headline"] ?></h1>

            <p id="about-content"><?php echo $decoded_about_data["sub_headline"] ?></p>
        </div>
    </div>
    <br><br><br><br>
</div>

<div class="about-main darken">
<br><br><br><br>
    <div class="container max-width-700">
        <div class="about-content extend">
            <p><?php echo $decoded_about_data["motivation"] ?></p>
        </div>
    </div>
    <br><br><br><br>
</div>

<?php
if(count($decoded_portfolio_data) > 0){
    ?>
    <div class="portfolio-container">
        <br><br>
        <div class="center-content">
            <div class="contact-heading">
            Our esteemed clients
            </div>
            <p class="sub-heading">We're proud to have collaborated with these firms</p>
        </div>
        <br>
        <br>

        <div class="firm-wrapper">
            <?php
            for($j=0; $j<count($decoded_portfolio_data); $j++){
                ?>
                <div class="firm-item">
                    <div class="img-con" style="background-image: url('<?php echo $decoded_portfolio_data[$j]["icon"]["url"] ?>')"></div>
                </div>

            <?php } ?>
        </div>
        <br><br><br><br>
    </div>
    <?php
}
?>



<?php
if(count($decoded_client_data) > 0){
    ?>
    <div class="light-bg">
        <div class="container">
            <div class="why-us">
                <br><br><br>
                <h2>Why our Clients love us</h2>
                <br><br><br>
                <p>||</p>

                <div id="team-quotes">

                </div>

                <br>
                <div class="navlist" id="navlist">
                    <li class="active"></li>
                    <li></li>
                    <li></li>
                </div>
                <br><br><br>
            </div>
        </div>
    </div>
    <?php
}
?>


<?php
if(count($decoded_team_data) > 0){
    ?>
    <div class="container">
        <div class="our-team">
            <br><br><br>
            <div class="center-content">
                <h2>Our Team</h2>
            </div>
            <br><br>
            <div class="team-wrapper">

                <?php
                for($j=0; $j<count($decoded_team_data); $j++){
                    ?>

                    <div class="team-card">
                        <div class="avatar" style="background-image: url('<?php echo $GLOBALS["base_api"].$decoded_team_data[$j]["avatar"]["url"] ?>')">
                        </div>
                        <br>
                        <div class="team-user">
                            <?php echo $decoded_team_data[$j]["name"] ?>
                        </div>
                        <div class="team-user">
                            <?php echo $decoded_team_data[$j]["titles"] ?>
                        </div>
                        <p class="team-user"><?php echo $decoded_team_data[$j]["designation"] ?></p>
                        <p>
                            <?php echo $decoded_team_data[$j]["description"] ?>
                        </p>
                    </div>

                <?php } ?>


            </div>

        </div>
        <br><br><br><br>
    </div>
    <?php
}
?>




<div class="light-bg">
    <?php include_once("pages/HomeComponents/homeContact.php") ?>
</div>
<div class="footer-white">
    <?php include_once("components/footer.php") ?>
</div>


<script>
    let teamQuoteList = null;
    (
        () => {
            teamQuoteList = JSON.parse(atob('<?php echo base64_encode(json_encode($decoded_client_data))?>'));
            setup(0)
        }
    )()

    function getQuote(index) {
        const teamQuoteCon = $("#team-quotes");
        const activeQuote = teamQuoteList[index];
        teamQuoteCon.html(
            `
                   <div class="team-quote active">
                    <p>${activeQuote.quote}</p>
                    <br>
                    <div class="why-us-user">
                        ${activeQuote.client_name}
                    </div>
                    <div class="why-us-user">
                        ${activeQuote.titles}
                    </div>
                    <p>${activeQuote.designation}</p>
                </div>
                `
        )
    }

    function getNavlist(index) {
        const navList = $("#navlist");
        navList.html("");
        for (let i = 0; i<teamQuoteList.length; i++){
            navList.append(
                `
                <li class="${i === index && 'active'}" onclick="setup(${i !== index ? i : null})"></li>
                `
            )
        }
    }

    function setup(index) {
        if(index === null){
            return
        }
        getQuote(index)
        getNavlist(index)
    }
</script>