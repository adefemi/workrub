<?php
    $url = $_SERVER['REQUEST_URI'];
    $urlArray = explode("/", $url);
    $slug = $urlArray[count($urlArray) - 1];


    if(isset($slug)){
        $adjusted_url = $GLOBALS["function_content"]."?slug=".$slug;
    }

    $ch = curl_init($adjusted_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    $decoded_function_data = json_decode($data, true)[0];

    // get setting data
    $ch = curl_init($GLOBALS["function_setting"]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    $decoded_data = json_decode($data, true)[count(json_decode($data, true)) -1];

?>

<!DOCTYPE html>
<html
        lang="en"
>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule | Workrub</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link id="link_control" rel="stylesheet" href="../assets/styles/mainStyle.css">
    <link rel="stylesheet" href="/assets/styles/home.css">
</head>
<body>
<div class="container-fluid">
    <?php include_once("components/content.php")?>
</div>
</body>
</html>