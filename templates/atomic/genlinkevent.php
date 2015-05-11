<?php
$doc = JFactory::getDocument();
$this -> language = $doc -> language;
$this -> direction = $doc -> direction;

$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/colorbox.css");
/*$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/fluid_dg.css");*/
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/jquery.mCustomScrollbar.css");
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/style.css");
/*$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/style_page.css");*/
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/jPages.css");
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/animate.css");
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/github.css");
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/pagination.css");
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/jquery.fancybox.css");
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/jquery.fancybox-buttons.css");
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/jquery.fancybox-thumbs.css");
?>
<!DOCTYPE html>
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <!--<html class="no-js">--> <!--<![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this -> language; ?>" lang="<?php echo $this -> language; ?>" dir="<?php echo $this -> direction; ?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=1024"/>
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE"/>
    <link rel="SHORTCUT ICON" href="favicon.ico" type="image/x-icon" />
    <title>AsiaMotion</title>
	<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this -> template; ?>/js/jquery-1.9.0.min.js"></script>
    <jdoc:include type="head" />
    <?php echo $this->params->get('tracking_code')?>
</head>
<body class="home">
<div id="bigmain" class="mainhome">
	<jdoc:include type="modules" name="event-gen-link" style="xhtml" />
</div>
</body>
</html>
