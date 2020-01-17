<?php
$request = $_SERVER['REQUEST_URI'];
?>

<div class="layout-main">
    <div class="layout-inner">
        <?php
            switch ($request) {
                case '/' :
                    require_once "pages/HomeComponents/homeContent.php";
                    break;
                case '' :
                    require_once "pages/HomeComponents/homeContent.php";
                    break;
                case '/projects' :
                    require_once "pages/ProjectComponents/projectContent.php";
                    break;
                case '/about-us' :
                    require_once "pages/AboutComponents/aboutContent.php";
                    break;
                case '/career' :
                    require_once "pages/CareerComponents/careerContent.php";
                    break;
                case '/social-impact' :
                    require_once "pages/ResponsibilitiesComponents/responsibilitiesContent.php";
                    break;
                case '/resource' :
                    require_once "pages/ResourceComponents/resourceContent.php";
                    break;
                case '/functions' :
                    require_once "pages/FunctionComponents/functionContent.php";
                    break;
                case '/template' :
                    require_once "pages/TemplateComponents/templateContent.php";
                    break;
                default:
                    if(preg_match_all('/resource\/[a-z0-9-_+]*/', $request)){
                        require_once "pages/ResourceComponents/singleResourceContent.php";
                        break;
                    }
                    else if(preg_match_all('/resource[a-z0-9-_+?=&]*/', $request)){
                        require_once 'pages/ResourceComponents/resourceContent.php';
                        break;
                    }
                    else if(preg_match_all('/career\/[a-z0-9-_+]*/', $request)){
                        require_once 'pages/CareerComponents/singleCareerContent.php';
                        break;
                    }
                    else if(preg_match_all('/career[a-z0-9-_+?=&]*/', $request)){
                        require_once 'pages/CareerComponents/careerContent.php';
                        break;
                    }
                    else if(preg_match_all('/schedule\/[a-z0-9-_+]*/', $request)){
                        require_once 'pages/BookComponents/bookContent.php';
                        break;
                    }
                    else{
                        require_once "pages/404Components/404Content.php";
                        break;
                    }
            }
        ?>      
    </div>
</div>