<?php
/**
* @version 1.0.0
* @package RSMediaGallery! 1.0.0
* @copyright (C) 2012 www.rsjoomla.com
* @license GPL, http://www.gnu.org/licenses/gpl-3.0.html
*/

defined('_JEXEC') or die('Restricted access');
?>
<?php if (!$this->isComponent) { ?>
	<?php if ($this->isJ16) { ?>
		<?php if ($this->params->get('show_page_heading', 1)) { ?>
			<h1><?php echo $this->escape($this->item->title); ?></h1>
		<?php } ?>
	<?php } else { ?>
		<?php if ($this->params->get('show_page_title', 1)) { ?>
			<div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>"><?php echo $this->escape($this->item->title); ?></div>
		<?php } ?>
	<?php } ?>
<?php } ?>
	<?php if ($this->isComponent) { ?>
	<div id="rsmg_component_main">
	<?php } ?>
	<div id="rsmg_main">
		<?php if ($this->isComponent) { ?>
			<div id="rsmg_arrow_left"><a href="javascript: void(0);"></a></div>
			<div id="rsmg_arrow_right"><a href="javascript: void(0);"></a></div>
		<?php } ?>
		<?php if (!$this->isComponent) { ?>
		<p>
		<?php if ($this->adjacent->prev) { ?><a href="<?php echo JRoute::_('index.php?option=com_rsmediagallery&view=rsmediagallery&layout=image&id='.$this->adjacent->prev->filepart.'&ext='.$this->adjacent->prev->fileext); ?>" class="rsmg_float_left"><?php echo JText::_('RSMG_PREVIOUS'); ?></a><?php } ?>
		<?php if ($this->adjacent->next) { ?><a href="<?php echo JRoute::_('index.php?option=com_rsmediagallery&view=rsmediagallery&layout=image&id='.$this->adjacent->next->filepart.'&ext='.$this->adjacent->next->fileext); ?>" class="rsmg_float_right"><?php echo JText::_('RSMG_NEXT'); ?></a><?php } ?>
		</p>
		<?php } ?>
		<span class="rsmg_clear"></span>
    	<div id="rsmg_image_container">
			<div id="rsmg_thumb_container">
			<img src="<?php echo $this->item->src; ?>" alt="<?php echo $this->escape($this->item->title); ?>" title="<?php echo $this->escape($this->item->title); ?>" />
			<?php if (!$this->isComponent) { ?><div class="rsmg_back"><a href="<?php echo JRoute::_('index.php?option=com_rsmediagallery&view=rsmediagallery'); ?>"><?php echo JText::_('RSMG_BACK_TO_GALLERY'); ?></a></div><!-- rsmg_back --><?php } ?>
			<?php if ($this->params->get('show_title_detail', 1)) { ?>
            <h2 class="rsmsg_title"><?php echo $this->escape($this->item->title); ?></h2>
			<?php } else { ?>
			<span class="rsmg_spacer"></span>
			<?php } ?>
				<?php if ($this->params->get('show_description_detail', 1)) { ?>
				<?php echo $this->item->description; ?>
				<?php } ?>
				<span class="rsmg_clear"></span>
				<?php if ($this->params->get('download_original', 1)) { ?>
				<div class="rsmg_download rsmg_toolbox"><a href="<?php echo JRoute::_('index.php?option=com_rsmediagallery&task=downloaditem&id='.$this->item->filepart.'&ext='.$this->item->fileext); ?>"><?php echo JText::_('RSMG_DOWNLOAD'); ?></a></div>
				<?php } ?>
				<?php if ($this->params->get('show_hits', 1)) { ?>
				<div class="rsmg_views rsmg_toolbox"><?php echo JText::sprintf($this->item->hits == 1 ? 'RSMG_HIT' : 'RSMG_HITS', $this->item->hits); ?></div><!-- rsmg_views -->
				<?php } ?>
				<?php if ($this->params->get('show_created', 1)) { ?>
				<div class="rsmg_calendar rsmg_toolbox"><?php echo JText::sprintf('RSMG_CREATED', $this->escape($this->item->created)); ?></div>
				<?php } ?>
				<?php if ($this->params->get('show_modified', 1)) { ?>
				<div class="rsmg_calendar rsmg_toolbox"><?php echo JText::sprintf('RSMG_MODIFIED', $this->escape($this->item->modified)); ?></div>
				<?php } ?>
				<span class="rsmg_clear"></span>
			</div>
			<?php if ($this->params->get('show_tags', 1)) { ?>
			<p id="rsmg_tags"><?php echo JText::_('RSMG_TAGS'); ?>: <strong><?php echo $this->escape($this->item->tags); ?></strong></p>
			<?php } ?>
         </div><!-- rsmg_image_container -->
	</div><!-- rsmg_main -->
	<?php if ($this->isComponent) { ?>
	</div>
	<?php } ?>
	<span class="rsmg_clear"></span>

	<?php if ($this->isComponent) { ?>
	<style type="text/css">
	div#rsmg_main {
		padding: 0px !important;
		margin-left: 50px;
		<?php if (!$this->params->get('use_original', 0)) { ?>
		width: <?php echo $this->params->get('full_width')+22; ?>px;
		<?php } ?>
	}
	body {
		background: none !important;
		padding: 0px !important;
		margin: 0px !important;
	}
	div#rsmg_image_container {
		box-shadow: none;
	}
	<?php if ($this->isJ16) { ?>
	#main { padding: 0px }
	#all  { background: none; max-width: 9999px; }
	<?php } ?>
	</style>
	<?php } ?>