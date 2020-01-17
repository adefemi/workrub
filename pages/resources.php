<?php 
    $url = $_SERVER['REQUEST_URI'];
    $parts = parse_url($url);
    parse_str($parts['query'], $query);
    $slug = NULL;
    if(isset($query['category'])){
        $slug = $query['category'];
    }
    

    $start = 1;
    $limit = 5;

    if(isset($query["page"])){
        $start = (int)$query['page'];
    }

    // get setting data
    $ch = curl_init($GLOBALS["blog"]."?main_focus=true&_sort=created_at:DESC&blog_category.slug=".$slug);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    $decoded_main_blog_data = json_decode($data, true)[0];

    // get setting data
    $adjusted_url = $GLOBALS["blog"]."?_limit=".$limit."&_sort=created_at:DESC&_start=".($start-1);

    if(isset($slug)){
        $adjusted_url = $adjusted_url . "&blog_category.slug=".$slug;
    }

    $ch = curl_init($adjusted_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    $decoded_blog_data = json_decode($data, true);

    if(!isset($decoded_main_blog_data) && !empty($decoded_blog_data)){
        $decoded_main_blog_data = $decoded_blog_data[0];
    }

    // get openings count

    $adjusted_url = $GLOBALS["blog"]."/count?_limit=".$limit."&_sort=created_at:DESC&_start=".($start-1);

    if(isset($slug)){
        $adjusted_url = $adjusted_url . "&blog_category.slug=".$slug;
    }

    $ch = curl_init($adjusted_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    $decoded_count = json_decode($data, true);
    $decoded_count = ceil((int)$decoded_count / $limit);

    $end = 5;
    if($start >= ($end - 1)){
        $end+=5;
    }
    if($end > $decoded_count){
        $end = $decoded_count;
    }

    $startloop = $end - 4;
    if($startloop<1){
        $startloop = 1;
    }
    
    // get setting data
    $ch = curl_init($GLOBALS["blog_category"]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    $decoded_blog_category_data = json_decode($data, true);
    
?>

<!DOCTYPE html>
<html
    lang="en"
>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Resources | Workrub</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link id="link_control" rel="stylesheet" href="../assets/styles/mainStyle.css">
</head>
<body>
	<div class="container-fluid">
        <?php include_once("components/content.php")?>
	</div>
</body>
</html>