<?php
$request = $_SERVER['REQUEST_URI'];
?>

<div class="layout-main">
    <div class="layout-inner">
        <?php
            switch ($request) {
                case '':
                case $GLOBALS['base_url'] :
                    require_once "pages/HomeComponents/homeContent.php";
                    break;
                case $GLOBALS['base_url'].'projects' :
                    require_once "pages/ProjectComponents/projectContent.php";
                    break;
                case $GLOBALS['base_url'].'about-us' :
                    require_once "pages/AboutComponents/aboutContent.php";
                    break;
                case $GLOBALS['base_url'].'career' :
                    require_once "pages/CareerComponents/careerContent.php";
                    break;
                case $GLOBALS['base_url'].'social-impact' :
                    require_once "pages/ResponsibilitiesComponents/responsibilitiesContent.php";
                    break;
                case $GLOBALS['base_url'].'resource' :
                    require_once "pages/ResourceComponents/resourceContent.php";
                    break;
                case $GLOBALS['base_url'].'functions' :
                    require_once "pages/FunctionComponents/functionContent.php";
                    break;
                case $GLOBALS['base_url'].'faq' :
                    require_once "pages/FaqComponents/faqContent.php";
                    break;
                case $GLOBALS['base_url'].'terms' :
                    require_once "pages/TermsComponents/termsContent.php";
                    break;
                case $GLOBALS['base_url'].'privacy' :
                    require_once "pages/PrivacyComponents/privacyContent.php";
                    break;
                case $GLOBALS['base_url'].'quiz' :
                    require_once "pages/QuizesComponents/quizesContent.php";
                    break;
                case $GLOBALS['base_url'].'template' :
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
                    else if(preg_match_all('/quiz\/[a-z0-9-_+]*/', $request)){
                        require_once 'pages/QuizesComponents/single_quiz.php';
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