<?php
/**
 * ------------------------------------------------------------------------
 * Uber Template
 * ------------------------------------------------------------------------
 * Copyright (C) 2004-2011 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
 * @license - Copyrighted Commercial Software
 * Author: J.O.O.M Solutions Co., Ltd
 * Websites:  http://www.joomlart.com -  http://www.joomlancers.com
 * This file may not be redistributed in whole or significant part.
 * ------------------------------------------------------------------------
 */

defined('_JEXEC') or die;
?>

<?php if ($this->countModules('content')) : ?>
<!-- CONTENT POSITION -->
<div class="wrap sections-wrap">
	<jdoc:include type="modules" name="<?php $this->_p('content') ?>" style="T3section" />
</div>
<!-- //CONTENT POSITION -->
<?php endif ?>