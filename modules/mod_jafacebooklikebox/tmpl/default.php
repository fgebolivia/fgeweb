<?php
/**
 * ------------------------------------------------------------------------
 * JA Facebook Like Box Module for Joonla 25 & 34
 * ------------------------------------------------------------------------
 * Copyright (C) 2004-2018 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
 * @license - GNU/GPL, http://www.gnu.org/licenses/gpl.html
 * Author: J.O.O.M Solutions Co., Ltd
 * Websites: http://www.joomlart.com - http://www.joomlancers.com
 * ------------------------------------------------------------------------
 */

// no direct access
defined('_JEXEC') or die('Restricted accessd');
?>
<div id="ja-fblikebox-<?php echo $module->id ?>" class="<?php echo $moduleclass_sfx ?>">
<iframe src="//www.facebook.com/plugins/page.php?href=facebook.com/<?php echo $aParams['id']?>&amp;<?php echo $sFacebookQuery ?>" scrolling="no" frameborder="0" style="overflow:hidden;width:<?php echo $aParams['width'].'px' ?>;height:<?php echo $aParams['height'].'px' ?>; allowTransparency: true;"></iframe>
</div>