<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// get params
$sitename  = $this->params->get('sitename');
$slogan    = $this->params->get('slogan', '');
$logotype  = $this->params->get('logotype', 'text');
$logoimage = $logotype == 'image' ? $this->params->get('logoimage', T3Path::getUrl('images/logo.png', '', true)) : '';
$logoimgsm = ($logotype == 'image' && $this->params->get('enable_logoimage_sm', 0)) ? $this->params->get('logoimage_sm', T3Path::getUrl('images/logo-sm.png', '', true)) : false;

if (!$sitename) {
	$sitename = JFactory::getConfig()->get('sitename');
}

?>

<?php if ($this->countModules('banner-top')): ?>
	<!-- TOP BANNER -->
	<div class="ja-banner banner-top text-center <?php $this->_c('banner-top') ?>">
		<div class="container">
			<jdoc:include type="modules" name="<?php $this->_p('banner-top') ?>" style="raw" />
		</div>
	</div>
	<!-- TOP BANNER -->
<?php endif ?>

<?php if (($this->getParam('navigation_collapse_enable', 1) && $this->getParam('responsive', 1)) || $this->getParam('addon_offcanvas_enable') || $this->countModules('head-social') || $this->countModules('head-search') || $this->countModules('head-social') || $this->countModules('head-search')) : ?>
<div class="ja-topbar clearfix">
	<div class="container">
		<div class="row">
		<!-- TOPBAR -->
			
			<?php if (($this->getParam('navigation_collapse_enable', 1) && $this->getParam('responsive', 1)) || $this->getParam('addon_offcanvas_enable') || $this->countModules('head-social') || $this->countModules('head-search')) : ?>
			<div class="col-xs-5 col-sm-6 topbar-left pull-left <?php $this->_c('topbar-left') ?>">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-toggle-wrap clearfix pull-left">
					<?php if ($this->getParam('navigation_collapse_enable', 1) && $this->getParam('responsive', 1)) : ?>
						<?php $this->addScript(T3_URL.'/js/nav-collapse.js'); ?>
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".t3-navbar-collapse">
							<i class="fa fa-bars"></i>
						</button>
					<?php endif ?>

					<?php if ($this->getParam('addon_offcanvas_enable')) : ?>
						<?php $this->loadBlock ('off-canvas') ?>
					<?php endif ?>
				</div>

				<?php if ($this->countModules('topbar-left')) : ?>
				<div class="hidden-xs hidden-sm clearfix">
					<jdoc:include type="modules" name="<?php $this->_p('topbar-left') ?>" style="raw" />
				</div>
				<?php endif ?>
			</div>
			<?php endif ?>

			<?php if ($this->countModules('head-social') || $this->countModules('head-search') || $this->countModules('languageswitcherload')) : ?>
			<div class="col-xs-7 col-sm-6 topbar-right pull-right">
				<?php if ($this->countModules('languageswitcherload')) : ?>
				<div class="languageswitcherload <?php $this->_c('languageswitcherload') ?>">
					<jdoc:include type="modules" name="<?php $this->_p('languageswitcherload') ?>" style="raw" />
				</div>
				<?php endif ?>

				<?php if ($this->countModules('head-search')) : ?>
				<div class="head-search <?php $this->_c('head-search') ?>">
					<button class="btn btn-search"><i class="fa fa-search"></i></button>
					<jdoc:include type="modules" name="<?php $this->_p('head-search') ?>" style="raw" />
				</div>
				<?php endif ?>

				<?php if ($this->countModules('head-social')) : ?>
				<div class="head-social <?php $this->_c('head-social') ?>">
					<button class="btn btn-social"><i class="fa fa-share-alt"></i></button>
					<jdoc:include type="modules" name="<?php $this->_p('head-social') ?>" style="raw" />
				</div>
				<?php endif ?>
			</div>
			<?php endif ?>
		</div>
	</div>
</div>
<?php endif ?>
<!-- TOPBAR -->

<!-- HEADER -->
<header id="t3-header" class="container t3-header">
	<div class="row">

		<!-- LOGO -->
		<div class="col-xs-12 col-sm-6 col-lg-4 logo">
			<div class="logo-<?php echo $logotype, ($logoimgsm ? ' logo-control' : '') ?>">
				<a href="<?php echo JUri::base() ?>" title="<?php echo strip_tags($sitename) ?>">
					<?php if($logotype == 'image'): ?>
						<img class="logo-img" src="<?php echo JUri::base(true) . '/' . $logoimage ?>" alt="<?php echo strip_tags($sitename) ?>" />
					<?php endif ?>
					<?php if($logoimgsm) : ?>
						<img class="logo-img-sm" src="<?php echo JUri::base(true) . '/' . $logoimgsm ?>" alt="<?php echo strip_tags($sitename) ?>" />
					<?php endif ?>
					<span><?php echo $sitename ?></span>
				</a>
				<?php if ($slogan): ?><small class="site-slogan"><?php echo $slogan ?></small><?php endif ?>
			</div>
		</div>
		<!-- //LOGO -->

		<div class="col-xs-12 col-sm-6 col-lg-8">
			<?php if ($this->checkSpotlight('spotlight-1', 'position-1, position-2')) : ?>
				<!-- SPOTLIGHT 1 -->
				<div class="t3-sl t3-sl-1">
					<?php $this->spotlight('spotlight-1', 'position-1, position-2') ?>
				</div>
				<!-- //SPOTLIGHT 1 -->
			<?php endif ?>
		</div>

	</div>
</header>
<!-- //HEADER -->
