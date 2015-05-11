<?php
$doc = JFactory::getDocument();
$this -> language = $doc -> language;
$this -> direction = $doc -> direction;

$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/colorbox.css");
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/fluid_dg.css");
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/jquery.mCustomScrollbar.css");
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/style.css");
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/source/jquery.fancybox.css");
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/source/jquery.fancybox-buttons.css");
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/source/jquery.fancybox-thumbs.css");
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
    <title>AsiaMotions</title>
	<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this -> template; ?>/js/jquery-1.9.0.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this -> template; ?>/js/jquery.smoothwheel.js"></script> 
    <script>

        $(document).ready(function(){
            jQuery("#bighome").smoothWheel();;
        });

    </script>
    <jdoc:include type="head" />
    <?php echo $this->params->get('tracking_code')?>
</head>
    <body id="bighome" class="home">
        <div id="bigmain" >
               	<div class='headerevent'>
			<div class='widthmain clearfix'>
				<div class="event-left float-left">
            	<div class="topent">
                	<a href="index.php?option=com_content&view=featured&Itemid=101">
                	                     <jdoc:include type="modules" name="event-logo-left" style="xhtml" />
                        </a>
                </div>
                <div>
                    
                	                     <jdoc:include type="modules" name="event-time-trip-list" style="xhtml" />

                </div>
                <div class="menuoth">
                	<h3>Our Program</h3>
                    <ul>               	
                        <jdoc:include type="modules" name="event-our-program-list" style="xhtml" />
                    </ul>
                </div>
               <div class='vs-link'>
				<a href="index.php?option=com_content&view=featured&Itemid=101">Visit our website</a>
               </div>
			   
            </div>
				<div class='event-right float-left'>
					<div class="topent">
					<h3>ISHCMC Grade 4 FIELD TRIP in MADAGUI - February 2014</h3>
					</div>
				        <jdoc:include type="modules" name="event-content" style="xhtml" />

				</div>
				<div class='banner-right float-right'>
					<div>
                    <jdoc:include type="modules" name="event-logo-right" style="xhtml" />

    	            </div>
                    <div class="src">
                     <jdoc:include type="modules" name="event-subscribe" style="xhtml" />
                    </div>
				</div>
			
			</div>
		</div>
    
	
	</div>
           
   <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this -> template; ?>/js/jquery.colorbox.js"></script>
	<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this -> template; ?>/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this -> template; ?>/js/jquery.mCustomScrollbar.js"></script>
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this -> template; ?>/js/jquery.mobile.customized.min.js"></script> 
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this -> template; ?>/js/highlight.pack.js"></script> 
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this -> template; ?>/js/tabifier.js"></script> 
     <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this -> template; ?>/js/js.js"></script> 
     <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this -> template; ?>/js/jPages.js"></script> 
     <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this -> template; ?>/js/jquery.mousewheel-3.0.6.pack.js"></script> 
     <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this -> template; ?>/source/jquery.fancybox.js"></script> 
     <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this -> template; ?>/source/jquery.fancybox-buttons.js"></script> 
     <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this -> template; ?>/source/jquery.fancybox-media.js"></script>  
<!--    <script>jQuery(document).ready(function(){
		jQuery(function(){			
			jQuery("#fluid_dg_wrap_4").fluid_dg({height: "auto", loader: "bar",fx:"simpleFade", pagination: false, thumbnails: false, hover: false, opacityOnGrid: false, imagePath: ""});
		}); })
	</script>-->
</body>
</html>
