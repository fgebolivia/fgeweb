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
<div id="ja-new-<?php echo $module->id ;?>" class="ja-news-8 brick-layout <?php echo $moduleclass_sfx; ?>">	
	<div class="swiper-container">
		<div class="swiper-wrapper">
		<?php foreach ($list as $item) : ?>
			<div class="brick-article brick-medium swiper-slide"><div class="inner">
				<?php
					$images = json_decode($item->images);

					if (isset($images->image_intro) && !empty($images->image_intro)) { ?>
						<a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>" class="item-image" style="background-image: url(<?php echo $images->image_intro; ?>)"></a>
					<?php } 
				?>
				<?php 

					$color = '';
					$customs 		= JATemplateHelper::getCustomFields($item->catid, 'category');

					if(empty($customs)) :
						$color = "default";
					else: 
						$color = $customs['colors'];
					endif;
				?>

				<?php if ($item->displayCategoryTitle) : ?>
					<span class="mod-articles-category-category bg-<?php echo $color; ?>">
						<?php echo $item->displayCategoryTitle; ?>
					</span>
				<?php endif; ?>

				<div class="article-content">
					<?php if ($params->get('link_titles') == 1) : ?>
						<h4 class="mod-articles-category-title <?php echo $item->active; ?>"><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></h4>
					<?php else : ?>
						<h4 class="mod-articles-category-title <?php echo $item->active; ?>"><?php echo $item->title; ?></h4>
					<?php endif; ?>

					<?php if ($item->displayHits) : ?>
						<span class="mod-articles-category-hits">
							<?php echo Jtext::_('hits') ;?>: <?php echo $item->displayHits; ?>
						</span>
					<?php endif; ?>

					<?php if ($params->get('show_author')) : ?>
						<span class="mod-articles-category-writtenby">
							<?php echo $item->displayAuthorName; ?>
						</span>
					<?php endif; ?>

					<?php if ($item->displayDate) : ?>
						<span class="mod-articles-category-date">
							<?php echo $item->displayDate; ?>
						</span>
					<?php endif; ?>

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
				</div>
			</div></div>
		<?php $count++; endforeach; ?>
		</div>
		<!-- Add Pagination -->
		<div class="swiper-pagination"></div>

		<!-- Add Arrows -->
		<div class="swiper-button">
		  <div class="swiper-button-next swiper-button-dark"><i class="fa fa-angle-right"></i></div>
		  <div class="swiper-button-prev swiper-button-dark"><i class="fa fa-angle-left"></i></div>
		</div>
 	</div>
</div>

<script>
var swiper = new Swiper('#ja-new-<?php echo $module->id ;?> .swiper-container', {
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    slidesPerView: 1,
    paginationClickable: true,
    spaceBetween: 0
});
</script>
<?php endif; ?>