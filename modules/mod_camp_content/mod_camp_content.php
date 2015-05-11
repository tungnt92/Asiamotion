<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;


require_once(dirname(__FILE__).'/helper.php');

$article_Id1 =  $params->get( 'article_id1' );
$article_Id2 =  $params->get( 'article_id2' );

$campContent1 = mod_camp_contentHelper::getCampContentId( $article_Id1 );
$campContent2 = mod_camp_contentHelper::getCampContentId( $article_Id2 );


require(JModuleHelper::getLayoutPath('mod_camp_content'));