<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<div class="latest-grid<?php echo $moduleclass_sfx; ?> row">
<?php foreach ($list as $item) : ?>
	<div class="col-sm-3" itemscope itemtype="https://schema.org/Article">
		<?php $introImage = json_decode($item->images);?>

		<?php if($introImage->image_intro) :?>
			<img src="<?php echo $introImage->image_intro ;?>" alt="" />
		<?php endif ;?>

		<span class="created-date"><?php echo JHtml::_('date', $item->created, JText::_('DATE_FORMAT_LC3')); ?></span>

		<a class="item-title" href="<?php echo $item->link; ?>" itemprop="url">
			<span itemprop="name">
				<?php echo $item->title; ?>
			</span>
		</a>
	</div>
<?php endforeach; ?>
</div>
