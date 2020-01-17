<?php 
	$GLOBALS["base_api"] = "https://strapi-ac.herokuapp.com";
	$GLOBALS["contact_info"] = $GLOBALS["base_api"] . "/contact-infos";
	$GLOBALS["home"] = $GLOBALS["base_api"] . "/homes";
	$GLOBALS["home_content"] = $GLOBALS["base_api"] . "/home-contents";
	$GLOBALS["about"] = $GLOBALS["base_api"] . "/abouts";
	$GLOBALS["portfolio"] = $GLOBALS["base_api"] . "/portfolios";
	$GLOBALS["client"] = $GLOBALS["base_api"] . "/client-quotes";
	$GLOBALS["team"] = $GLOBALS["base_api"] . "/teams";
	$GLOBALS["opening"] = $GLOBALS["base_api"] . "/openings";
	$GLOBALS["opening_category"] = $GLOBALS["base_api"] . "/opening-categories";
	$GLOBALS["career_content"] = $GLOBALS["base_api"] . "/career-contents";
	$GLOBALS["blog_category"] = $GLOBALS["base_api"] . "/blog-categories";
	$GLOBALS["blog"] = $GLOBALS["base_api"] . "/blogs";
	$GLOBALS["function_content"] = $GLOBALS["base_api"] . "/function-contents";
	$GLOBALS["footer_setting"] = $GLOBALS["base_api"] . "/footer-settings";
	$GLOBALS["function_setting"] = $GLOBALS["base_api"] . "/function-settings";
	$GLOBALS["blog_drop"] = $GLOBALS["base_api"] . "/blog-dropdowns";
	$GLOBALS["function_drop"] = $GLOBALS["base_api"] . "/function-dropdowns";
	$GLOBALS["function_drop"] = $GLOBALS["base_api"] . "/function-dropdowns";
	$GLOBALS["blog_comment"] = $GLOBALS["base_api"] . "/blog-comments";
	$GLOBALS["impact"] = $GLOBALS["base_api"] . "/impacts";
	$GLOBALS["impact_content"] = $GLOBALS["base_api"] . "/impact-contents";


	$GLOBALS['base_url'] = "/demo/";

	include_once("router.php")
?>