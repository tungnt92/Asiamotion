<?php
/**
 * @copyright	Copyright (C) 2012 Cedric KEIFLIN alias ced1870
 * http://www.joomlack.fr
 * Module Slideshow CK
 * @license		GNU/GPL
 * */
// no direct access
defined('_JEXEC') or die('Restricted access');

// définit la largeur du slideshow
$width = ($params->get('width') AND $params->get('width') != 'auto') ? ' style="width:'.$params->get('width').'px;"' : '';
?>
<!-- debut Slideshow CK, par cedric keiflin sur http://www.joomlack.fr -->
<div class="slideshowck<?php echo $params->get('moduleclass_sfx'); ?> camera_wrap <?php echo $params->get('skin'); ?>" id="camera_wrap_<?php echo $module->id; ?>"<?php echo $width; ?>>
	<?php foreach ($items as $item) {
        if ($item->imgalignment != 'default')  {
           $dataalignment = ' data-alignment="'.$item->imgalignment.'"';
        } else {
            $dataalignment = '';
        }
        ?>
	<div data-thumb="<?php echo $item->imgthumb; ?>" data-src="<?php echo $item->imgname; ?>" <?php if($item->imglink) echo 'data-link="'.$item->imglink.'" data-target="'.$item->imgtarget.'"'; echo $dataalignment; ?>>
		<?php if ($item->imgvideo) { ?>
                    <iframe src="<?php echo $item->imgvideo; ?>" width="100%" height="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                <?php } else { 
                    if ($item->imgcaption){
                    ?>
<!--                <div class="camera_caption fadeFromBottom">
			<?php /*echo str_replace("|dq|","\"", $item->imgcaption);*/ ?>
            

            
            
		</div>-->
                    <?php
				$s=$item->imgcaption;
				$text=explode(",",$s);			
			?>
            
            <div class="text-index">
                <div class="text-1">
                    <a>
                        <h3><?php echo $text[0] ?></h3>
                        <h2><!--<span>--><?php echo $text[1] ?><!--</span>--> <?php echo $text[2] ?></h2>
                    </a>
                </div>
            </div>
                <?php 
                    }
                } ?>
	</div>
	<?php } ?>
</div>
<div style="clear:both;"></div>
<!-- fin Slideshow CK -->
