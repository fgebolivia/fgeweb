<?php
/**
 * @package     seohowto
 * @subpackage  mod_advanced_twitter_display
 * @author - SEO HOW TO
 * @copyright - Copyright (C) 2012 - 2018 SEO HOW TO, Inc. All rights reserved.
 * @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * Websites: www.seohowto.net
 * Technical Support:  www.seohowto.net
*/
// no direct access
defined( '_JEXEC' ) or die('Restricted Access');
//fetch parameters result from xml file
$username = $params->get('username');
//$widgetId = trim($params->get('widgetId'));
$width = trim($params->get('width'));
$height = trim($params->get('height'));
$theme = $params->get('theme');
$linkColor = $params->get('linkColor');
$footer = $params->get('footer');
if($footer == 'true'){$footer = '';}
$header = $params->get('header');
if($header == 'true'){$header = '';}
$border = $params->get('border');
if($border == 'true'){$border = '';}
$scrollbar = $params->get('scrollbar');
if($scrollbar == 'true'){$scrollbar = '';}
$transparent = $params->get('transparent');
if($transparent == 'false'){$transparent = '';}
$bColor = trim($params->get('bColor'));
if($bColor=="1"){
$backgroundColor = $params->get('backgroundColor');}
else{$backgroundColor = "";}
$borderColor = $params->get('borderColor');
$padding = $params->get('padding');
$border_radius = $params->get('border_radius');
$language = $params->get('language');
$tweetLimit = trim($params->get('tweetLimit'));
?>
<div class="atom_twitter_feeds <?php echo $params->get('moduleclass_sfx');?>" style="background:<?php echo $backgroundColor; ?>; width: <?php echo $width;?>px; padding: <?php echo $padding; ?>px; border-radius: <?php echo $border_radius; ?>px;">
<a class="twitter-timeline" data-lang="<?php echo $language; ?>" data-width="<?php echo $width; ?>" data-height="<?php echo $height; ?>" 
<?php if($scrollbar == ' ') { ?> data-tweet-limit="<?php echo $tweetLimit; ?>" <?php } ?> data-border-color="<?php echo $borderColor;?>"  data-theme="<?php echo $theme; ?>" data-chrome="<?php echo $footer." ".$header." ".$scrollbar." ".$transparent;?>" data-link-color="<?php echo $linkColor; ?>" href="https://twitter.com/<?php echo $username; ?>">Tweets by <?php echo $username; ?></a>
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<div class='copyright' style='position: relative; font-size: 9px;text-align: right; top: -15px; height: 0px;'><small><a href='#' title='click here' target='_blank'><span style='color:#ccc; font-size: 9px; float: right;'>..</span></a></small></div>

</div>