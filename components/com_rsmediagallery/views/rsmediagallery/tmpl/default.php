<?php
/**
* @version 1.0.0
* @package RSMediaGallery! 1.0.0
* @copyright (C) 2012 www.rsjoomla.com
* @license GPL, http://www.gnu.org/licenses/gpl-3.0.html
*/

defined('_JEXEC') or die('Restricted access');
?>
<?php if ($this->isJ16) { ?>
	<?php if ($this->params->get('show_page_heading', 1)) { ?>
		<h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
	<?php } ?>
<?php } else { ?>
	<?php if ($this->params->get('show_page_title', 1)) { ?>
		<div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>"><?php echo $this->escape($this->params->get('page_title')); ?></div>
	<?php } ?>
<?php } ?>
	
	<style type="text/css">
	ul#rsmg_gallery li div {
		width:  <?php echo $this->params->get('thumb_width', 280); ?>px;
		/* height: <?php echo $this->params->get('thumb_height', 210)+($this->params->get('show_description_list', 1) ? 100 : 40); ?>px; */
	}
	</style>
	
	<div id="rsmg_main" class="rsmg_fullwidth">
		<?php if ($this->prev) { ?>
		<a href="<?php echo JRoute::_('index.php?option=com_rsmediagallery&view=rsmediagallery'.($this->limitstart - $this->limit > 0 ? '&limitstart='.($this->limitstart - $this->limit) : '')); ?>" id="rsmg_prev_page" class="rsmg_big_button"><?php echo JText::_('RSMG_PREV_PAGE'); ?></a>
		<?php } ?>
		
		<?php if ($this->items) { ?>
		<ul id="rsmg_gallery">
			<?php foreach ($this->items as $item) { ?>
			<?php $item->params = unserialize($item->params); ?>
			<li>
				<div class="rsmg_item_container">
					<a href="<?php echo $item->href; ?>"><img src="<?php echo $item->thumb; ?>" alt="<?php echo $this->escape($item->title); ?>" /></a>
					<?php if ($this->params->get('show_title_list', 1)) { ?>
					<a href="<?php echo $item->href; ?>" class="rsmsg_title"><?php echo $this->escape($item->title); ?></a>
					<?php } ?>
					<?php if ($this->params->get('show_description_list', 1)) { ?>
						<span class="rsmg_item_description"><?php echo $item->description; ?></span>
					<?php } ?>
				</div>
			</li>
			<?php } ?>
		</ul><!-- rsmg_gallery -->
		<?php } ?>
		
		<?php if ($this->more) { ?>
		<a href="<?php echo JRoute::_('index.php?option=com_rsmediagallery&view=rsmediagallery&limitstart='.($this->limitstart + $this->limit)); ?>" rel="<?php echo $this->total; ?>" id="rsmg_load_more" class="rsmg_big_button"><?php echo JText::_('RSMG_NEXT_PAGE'); ?></a>
		<?php } ?>
		
		<input type="hidden" name="Itemid" id="rsmg_itemid" value="<?php echo $this->itemid; ?>" />
	</div><!-- rsmg_main -->
	<span class="rsmg_clear"></span>
	<?php if ($this->params->get('show_credits', 1)) { ?>
	<div id="rsmg_footer">
		<?php echo JText::sprintf('RSMG_FOOTER_CREDITS', 'http://www.rsjoomla.com/joomla-extensions/joomla-gallery.html', 'http://www.rsjoomla.com'); ?>
	</div>
	<?php } ?>