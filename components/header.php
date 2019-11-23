<?php 

    // get setting data
    $ch = curl_init($GLOBALS["user_api"]."/setting");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);

    $decoded_setting = json_decode($data, true)[0];
?>

<div class="header-main">
    <div class="brand"><a href="/"><img width="40" src="<?php echo($decoded_setting["logo"]) ?>" alt=""></a></div>
    <div class="safe-space">
        <div class="title"><a href="/"><?php echo($decoded_setting["site_title"]) ?></a></div>
        <!-- <div class="nav-items">search</div>
        <div class="nav-items">subscribe</div> -->
    </div>
    <div class="flex align-center heading-right">
        <div class="nav-drawer" id="nav-drawer">
            <div class="nav-drawer-toggler"></div>
        </div>
        <div style="margin-left:20px" class="nav-items" onclick="toggleLight()"><i data-feather="sun"></i></div>
        <!-- <div class="nav-items"><a href="/login">Log in</a></div> -->
    </div>
</div>