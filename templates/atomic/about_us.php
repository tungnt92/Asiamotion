<?php
$doc = JFactory::getDocument();
$this -> language = $doc -> language;
$this -> direction = $doc -> direction;

$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/colorbox.css");
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/fluid_dg.css");
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/jquery.mCustomScrollbar.css");
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/style.css");
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/jPages.css");
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/animate.css");
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/github.css");
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/pagination.css");
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
            jQuery("#bighome").smoothWheel();
        });

    </script>
    <jdoc:include type="head" />
    <?php echo $this->params->get('tracking_code')?>
</head>
    <body id="bighome" class="home"><div id='bigmain'>
	<div class='top'> 
	<div class='header widthmain clearfix'>
		<div class="logo">
                    <a href="index.php?option=com_content&view=featured&Itemid=101">
                                <jdoc:include type="modules" name="asia-logo" style="xhtml" />
                    </a>
                </div>
		<div class='menutop '>
			<ul id="trans-nav" class='clearfix'>
                     <jdoc:include type="modules" name="menu-top" style="xhtml" />
                                        </ul>
		</div>
	</div>
	</div><!-- top-->
        
        <?php
            $idmenu = JFactory::getApplication();
            $menu = $idmenu->getMenu()->getActive()->note;
            $title= $idmenu->getMenu()->getActive()->title;
            $image= $idmenu->getMenu()->getActive()->params;
            $images = json_decode($image);

        ?>
        
        
        
    <div id="<?php echo $menu; ?>">
	<div class="infobanner">
             <img id ="baner"src="<?php echo "$images->menu_image"; ?>" alt=""/>
        </div>
        <div class='bg-tilte'>
             <h3 class='widthgrid'><?php echo $title; ?></h3>
        </div>
         <div class='bg-gray'>
                            
                             <jdoc:include type="modules" name="school-trip-content" style="xhtml" />
                             <jdoc:include type="modules" name="camp-content-1" style="xhtml" />                     
                             <jdoc:include type="modules" name="team-building-content-1" style="xhtml" />
                             <jdoc:include type="modules" name="our-tour-content" style="xhtml" />
                             <jdoc:include type="modules" name="our-team-content" style="xhtml" />
                             <jdoc:include type="modules" name="sub-holiday-camp-content" style="xhtml" />
                             <jdoc:include type="modules" name="sub-team-building-content" style="xhtml" />
                             <jdoc:include type="modules" name="sub-our-tour-content" style="xhtml" />
         </div>

	<div class='bg-white'>
            
                    <jdoc:include type="modules" name="team-building-content-2" style="xhtml" />
                    <jdoc:include type="modules" name="about-us-content" style="xhtml" />

          
                            <div class='gallery clearfix'>
                                <jdoc:include type="modules" name="grid-image" style="xhtml" />
                            </div> 
	</div>
       
	<div class='frm-ct'>
		<div class='widthgrid'>        
                                    <jdoc:include type="modules" name="about-us" style="xhtml" />
                                    <jdoc:include type="modules" name="about-us-contact-us" style="xhtml" />
		</div>
	</div>
<!--	<div class='bg-white'>
           

                    <div class="widthgrid">
                                    <jdoc:include type="modules" name="gallery" style="xhtml" />

                    </div>
	</div>-->
	</div>
</div>

<div id='menufooter'>
		<ul class="menufooter clearfix">
                        <jdoc:include type="modules" name="menu-bottom" style="xhtml" />
		</ul>
</div>	
<div class='footer'>

                        <jdoc:include type="modules" name="footer" style="xhtml" />

</div>
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this -> template; ?>/js/fluid_dg.min.js"></script>
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
