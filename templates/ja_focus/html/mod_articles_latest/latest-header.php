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
<ul class="latest-news-header <?php echo $moduleclass_sfx; ?>">
<?php foreach ($list as $item) : ?>
	<li class="clearfix" itemscope itemtype="https://schema.org/Article">
		<a class="item-title" href="<?php echo $item->link; ?>" itemprop="url">
			<span itemprop="name">
				<?php echo mb_strimwidth($item->title, 0, 60).'...' ?>
			</span>
		</a>

		<?php echo JLayoutHelper::render('joomla.content.intro_image', $item); ?>
	</li>
<?php endforeach; ?>
</ul>
