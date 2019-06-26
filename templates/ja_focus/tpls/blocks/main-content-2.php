<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<?php if ($this->countModules('main-content-2') || $this->countModules('sidebar-2') ) : ?>
	<div class="container">
		<div class="t3-main-content-wrap t3-main-content-2 <?php if ($this->countModules('sidebar-2')) : ?>one-sidebar-right<?php endif ?> <?php $this->_c('main-content-2') ?>">
			<div class="row equal-height">

				<?php if ($this->countModules('main-content-masttop-2')) : ?>
				<div class="t3-main-content t3-main-content-masttop col-xs-12">
					<jdoc:include type="modules" name="<?php $this->_p('main-content-masttop-2') ?>" style="T3Xhtml" />
					<div class="separator"></div>
				</div>
				<?php endif ?>

				<?php if ($this->countModules('main-content-2')) : ?>
				<div class="t3-main-content col col-xs-12 <?php if ($this->countModules('sidebar-2')) : ?>col-sm-8<?php endif ?>">
					<jdoc:include type="modules" name="<?php $this->_p('main-content-2') ?>" style="T3Xhtml" />
				</div>
				<?php endif ?>

				<?php if ($this->countModules('sidebar-2')) : ?>
				<div class="t3-sidebar t3-sidebar-right col col-xs-12 col-sm-4 <?php $this->_c('sidebar-2') ?>">
					<jdoc:include type="modules" name="<?php $this->_p('sidebar-2') ?>" style="T3Xhtml" />
				</div>
				<?php endif ?>

				<?php if ($this->countModules('main-content-mastbot-2')) : ?>
				<div class="t3-main-content t3-main-content-mastbot col-xs-12">
					<div class="separator"></div>
					<jdoc:include type="modules" name="<?php $this->_p('main-content-mastbot-2') ?>" style="T3Xhtml" />
				</div>
				<?php endif ?>
			</div>
		</div>
	</div>
<?php endif ?>
