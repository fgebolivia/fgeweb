<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<?php if ($this->countModules('mast-top')) : ?>
	<div class="wrap t3-mast-top <?php $this->_c('mast-top') ?>">
		<div class="container">
			<jdoc:include type="modules" name="<?php $this->_p('mast-top') ?>" style="T3Xhtml" />
		</div>
	</div>
<?php endif ?>
