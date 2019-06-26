<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Template helper
JLoader::register('JATemplateHelper', T3_TEMPLATE_PATH . '/helper.php');

$count = 1;
?>

<?php if ($grouped) : ?>
	<div class="alert alert-warning"><?php echo JText::_('TPL_LAYOUT_NOT_SUPPORT_GROUP') ;?></div>
<?php else : ?>
<div class="brick-layout <?php echo $moduleclass_sfx; ?>">
	<?php foreach ($list as $item) : ?>
		<div class="<?php if($count==1): echo 'brick-article brick-big col-md-8'; elseif($count==2 || $count==3): echo 'brick-article brick-medium col-sm-6 col-md-4'; elseif($count==4): echo 'clear brick-article brick-small col-sm-6 col-md-3'; else: echo 'brick-article brick-small col-sm-6 col-md-3'; endif; ?>"><div class="inner">
			<?php
				$images = json_decode($item->images);

				if (isset($images->image_intro) && !empty($images->image_intro)) { ?>
					<a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>" class="item-image" style="background-image: url(<?php echo $images->image_intro; ?>)"></a>
				<?php } 
			?>
			
			<?php $customs 		= JATemplateHelper::getCustomFields($item->catid, 'category'); ?>

			<?php if ($item->displayCategoryTitle) : ?>
				<span class="mod-articles-category-category bg-<?php echo $customs['colors']; ?>">
					<?php echo $item->displayCategoryTitle; ?>
				</span>
			<?php endif; ?>

			<div class="article-content">
				<?php if ($params->get('link_titles') == 1) : ?>
					<h4 class="mod-articles-category-title <?php echo $item->active; ?>"><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></h4>
				<?php else : ?>
					<h4 class="mod-articles-category-title <?php echo $item->active; ?>"><?php echo $item->title; ?></h4>
				<?php endif; ?>

				<?php if($count==1) :?>
					<aside class="article-aside clearfix">
						<dl class="article-info muted">
							<?php if ($params->get('show_author')) : ?>
								<dd class="mod-articles-category-writtenby">
									<?php echo $item->displayAuthorName; ?>
								</dd>
							<?php endif; ?>

							<?php if ($item->displayDate) : ?>
								<dd class="mod-articles-category-date">
									<?php echo $item->displayDate; ?>
								</dd>
							<?php endif; ?>

							<?php if ($item->displayHits) : ?>
								<dd class="mod-articles-category-hits">
									<?php echo Jtext::_('hits') ;?>: <?php echo $item->displayHits; ?>
								</dd>
							<?php endif; ?>
						</dl>
					</aside>

					<?php if ($params->get('show_introtext')) : ?>
						<p class="mod-articles-category-introtext">
							<?php echo $item->displayIntrotext; ?>
						</p>
					<?php endif; ?>

					<?php if ($params->get('show_readmore')) : ?>
						<p class="mod-articles-category-readmore">
							<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
								<?php if ($item->params->get('access-view') == false) : ?>
									<?php echo JText::_('MOD_ARTICLES_CATEGORY_REGISTER_TO_READ_MORE'); ?>
								<?php elseif ($readmore = $item->alternative_readmore) : ?>
									<?php echo $readmore; ?>
									<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
								<?php elseif ($params->get('show_readmore_title', 0) == 0) : ?>
									<?php echo JText::sprintf('MOD_ARTICLES_CATEGORY_READ_MORE_TITLE'); ?>
								<?php else : ?>
									<?php echo JText::_('MOD_ARTICLES_CATEGORY_READ_MORE'); ?>
									<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
								<?php endif; ?>
							</a>
						</p>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div></div>
	<?php $count++; endforeach; ?>
</div>
<?php endif; ?>
