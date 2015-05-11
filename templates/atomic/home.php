<?php
$doc = JFactory::getDocument();
$this -> language = $doc -> language;
$this -> direction = $doc -> direction;

$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/colorbox.css");
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/fluid_dg.css");
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/jquery.mCustomScrollbar.css");
$doc -> addStyleSheet($this -> baseurl . "/templates/" . $this -> template . "/css/style.css");
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
/*
        $(document).ready(function(){
            jQuery("#bighome").smoothWheel();
        });
*/
    </script>
    <jdoc:include type="head" />
    <?php echo $this->params->get('tracking_code')?>
</head>
    <body id="bighome" class="home">
        <div id="bigmain" class="mainhome">
                <div class="top"> 
                <div class="header widthmain clearfix">
                        <div class="logo">
                            <a href="index.php?option=com_content&view=featured&Itemid=101">       
                                <jdoc:include type="modules" name="asia-logo" style="xhtml" />
<!--                                <img src="images/logo.png" alt="logo">-->
                            </a>
                        </div>
                        <div class="menutop ">

                                <ul id="trans-nav" class="clearfix">
                     <jdoc:include type="modules" name="menu-top" style="xhtml" />

<!--                                     <li class="menu1"><a href="#menu1"> <img src="images/menu1.png" alt=""/></a></li>
                                        <li class="menu2"><a href="#menu2"> <img src="images/menu2.png" alt=""/></a></li>
                                        <li class="menu3"><a href="#menu3"> <img src="images/menu3.png" alt=""/></a></li>
                                        <li class="menu4"><a href="#menu4"> <img src="images/menu4.png" alt=""/></a></li>
                                        <li class="menu5"><a href="#menu5"> <img src="images/menu5.png" alt=""/></a></li>
                                        <li class="menu6"><a href="#menu6"> <img src="images/menu6.png" alt=""/></a></li>-->
                                </ul>
                        </div>
                </div>
                </div><!-- top-->

	<div class="slideshow">
        <div class="background">
        <jdoc:include type="modules" name="slider-show" style="xhtml" />
		<!--<jdoc:include type="modules" name="slideshow-text" style="xhtml" />-->
        </div><!-- background -->
		
    </div><!-- slide show -->

                <div class="bottommaintop">
                                 <jdoc:include type="modules" name="home-news" style="xhtml" />

                                <div class="group2">
                                 <jdoc:include type="modules" name="home-contact" style="xhtml" />

                                  
                                </div>
                </div>

        </div>
            <jdoc:include type="modules" name="home-content" style="xhtml" />
            
            
            

<!--        <div id="menu1" class="">
            
                <div class="widthmain infohome clearfix img-right">
                                <div class="titlehome float-left">
                                                        Take <br/>
                                        learning out <br/>
                                        of the classroom 
                                </div>
                                <img  src="images/img-menu1.jpg" alt=""/>
                        </div>
                <div class="infobanner">
                <img src="images/banner1.jpg" alt=""/>
                                <div class="widthmain linkbanner">
                                        <div class="text-right ">
                                        <a href="#" class="link-check">Check it out</a>
                                        <br/>
                                        <h3>School <span>Trips</span></h3>
                                        </div>
                                </div>
                </div>
        </div>-->
<!--        
        <div id="menu2" class="">
                        <div class="widthmain infohome clearfix img-left">
                <div class="titlehome float-right">
                                                Tired of your kids?  <br/>
                                Send them on an outdoor <br/>
                                adventure!
                </div>
                <img  src="images/img-menu2.jpg" alt=""/>
                        </div>
                <div class="infobanner">
                <img src="images/banner2.jpg" alt=""/>
                        <div class="widthmain linkbanner">
                                <div class="text-right ">
                                <a href="#" class="link-check">Check it out</a>
                                <br/>
                                <h3>Holiday<span> Camps</span></h3>
                        </div>
                        </div>
                </div>
                </div>
        <div id="menu3" class="">
                        <div class="widthmain infohome clearfix img-right">
                                <div class="titlehome float-left">
                                                        It"s the end  <br/>
                                        of the quarter,  <br/>
                                energize your team!
                                </div>
                                <img  src="images/img-menu3.jpg" alt=""/>
                        </div>
                <div class="infobanner">
                <img src="images/banner3.jpg" alt=""/>
                                <div class="widthmain linkbanner">
                                        <div class="text-left">
                                        <a href="#" class="link-check">Check it out</a>
                                        <br/>
                                        <h3>Team <span>Building</span></h3>
                                        </div>
                                </div>
                </div>
        </div>
        <div id="menu4" class="">
                        <div class="widthmain infohome clearfix img-right">
                <div class="titlehome float-left">
                        Drop the pizza <br/>
        and do something <br/>
        awesome.
                </div>
                <img  src="images/img-menu4.jpg" alt=""/>
                        </div>
                <div class="infobanner">
                <img src="images/banner4.jpg" alt=""/>
                        <div class="widthmain linkbanner">
                                <div class="text-right ">
                                <a href="#" class="link-check">Check it out</a>
                                <br/>
                                <h3>Our<span> Tours</span></h3>
                        </div>
                        </div>
                </div>
                </div>	
        <div id="menu5" class="">
                        <div class="widthmain infohome clearfix img-right">
                <div class="titlehome float-left">
                        Meet our team,  <br/>
                        we are experienced,  <br/>
                        passionate and flexible.

                </div>
                <img  src="images/img-menu5.jpg" alt=""/>
                        </div>
                <div class="infobanner">
                <img src="images/banner5.jpg" alt=""/>
                        <div class="widthmain linkbanner">
                                <div class="text-right ">
                                <a href="#" class="link-check">Check it out</a>
                                <br/>
                                <h3>About <span> Us</span></h3>
                        </div>
                        </div>
                </div>
                </div>
        -->
        <div id="menufooter">
                                      

                   <ul class="menufooter">
                        <jdoc:include type="modules" name="menu-bottom" style="xhtml" />
<!--                                <li class="menu1"><a href="#menu1"> <img src="images/menu1.png" alt=""/><span>School Trips</span></a></li>
                                <li class="menu2"><a href="#menu2"> <img src="images/menu2.png" alt=""/><span>Holiday Camps</span></a></li>
                                <li class="menu3"><a href="#menu3"> <img src="images/menu3.png" alt=""/><span>Team Building</span></a></li>
                                <li class="menu4"><a href="#menu4"> <img src="images/menu4.png" alt=""/><span>Our Tours</span></a></li>
                                <li class="menu5"><a href="#menu5"> <img src="images/menu5.png" alt=""/><span>About Us</span></a></li>
                                <li class="menu6"><a href="#menu6"> <img src="images/menu6.png" alt=""/><span>Our Blog</span></a></li>-->
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
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this -> template; ?>/js/ScrollToPlugin.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this -> template; ?>/js/smoothPageScroll.js"></script>
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this -> template; ?>/js/TweenMax.min.js"></script>
    <script>jQuery(document).ready(function(){
		jQuery(function(){			
			jQuery("#fluid_dg_wrap_4").fluid_dg({height: "auto", loader: "bar",fx:"simpleFade", pagination: false, thumbnails: false, hover: false, opacityOnGrid: false, imagePath: ""});
		}); })
	</script>
</body>
</html>
