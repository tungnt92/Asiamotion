<?php

/**
* @copyright	Copyright (C) 2012 JoomSpirit. All rights reserved.
* Slideshow based on the JQuery script Flexslider
* @license		GNU General Public License version 2 or later
*/

defined('_JEXEC') or die;


require_once(dirname(__FILE__).'/helper.php');
$article_Id =  $params->get( 'article_id' );
$ourTeamContent = mod_our_team_what_we_doHelper::getOurTeamContentId( $article_Id );


require(JModuleHelper::getLayoutPath('mod_our_team_what_we_do'));