<?php 

    // get setting data
    $ch = curl_init($GLOBALS["home"]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    $decoded_home_data = json_decode($data, true)[0];

    
    // get setting data
    $ch = curl_init($GLOBALS["home_content"]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    $decoded_home_content_data = json_decode($data, true);
    
?>

<!DOCTYPE html>
<html
    lang="en"
>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome to Workrub</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link id="link_control" rel="stylesheet" href="<?php echo $GLOBALS['base_url']."assets/styles/mainStyle.css"?>">
</head>
<body>
    <?php include_once("components/content.php") ?>
</body>
</html>