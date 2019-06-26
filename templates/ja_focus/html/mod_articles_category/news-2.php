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

?>
<div class="row ja-news ja-news-2 <?php echo $moduleclass_sfx; ?>">
	<?php echo JATemplateHelper::categoryGroup($idbase); ?>

	<?php if ($grouped) : ?>
		<?php foreach ($list as $group_name => $group) : ?>
		<div class="ja-news-group">
			<div class="col-xs-12">
				<div class="mod-articles-category-group"><?php echo $group_name; ?></div>
			</div>
				<?php $count = 1; ?>
				<?php foreach ($group as $item) : ?>

					<?php 
						$color = '';
						$customs 		= JATemplateHelper::getCustomFields($item->catid, 'category');

						if(empty($customs)) :
							$color = "default";
						else: 
							$color = $customs['colors'];
						endif;
					?>

					<div class="news-medium col-md-4 clearfix <?php echo (($count-1)%3==0) ? 'clear' : ''; ?> link-<?php echo $color; ?>">
						<?php echo JLayoutHelper::render('joomla.content.intro_image', $item); ?>
						<div class="article-content">
							<aside class="article-aside aside-before-title">
								<dl class="article-info muted">
									<?php if ($params->get('show_author')) : ?>
										<dd class="mod-articles-category-writtenby">
											<?php echo $item->displayAuthorName; ?>
										</dd>
									<?php endif; ?>

									<?php if ($item->displayCategoryTitle) : ?>
										<dd class="mod-articles-category-category">
											<?php echo $item->displayCategoryTitle; ?>
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
							<?php if ($params->get('link_titles') == 1) : ?>
								<h4 class="mod-articles-category-title <?php echo $item->active; ?>"><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></h4>
							<?php else : ?>
								<h4 class="mod-articles-category-title <?php echo $item->active; ?>"><?php echo $item->title; ?></h4>
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
					</div>
				<?php $count++; endforeach; ?>
		</div>
		<?php endforeach; ?>
	<?php else : ?>
		<?php $count = 1; ?>
		<?php foreach ($list as $item) : ?>

			<?php 
				$color = '';
				$customs 		= JATemplateHelper::getCustomFields($item->catid, 'category');

				if(empty($customs)) :
					$color = "default";
				else: 
					$color = $customs['colors'];
				endif;
			?>

			<div class="news-medium col-md-4 clearfix <?php echo (($count-1)%3==0) ? 'clear' : ''; ?> link-<?php echo $color; ?>">
				<?php echo JLayoutHelper::render('joomla.content.intro_image', $item); ?>
				<div class="article-content">
					<aside class="article-aside aside-before-title">
						<dl class="article-info muted">
							<?php if ($params->get('show_author')) : ?>
								<dd class="mod-articles-category-writtenby">
									<?php echo $item->displayAuthorName; ?>
								</dd>
							<?php endif; ?>

							<?php if ($item->displayCategoryTitle) : ?>
								<dd class="mod-articles-category-category">
									<?php echo $item->displayCategoryTitle; ?>
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
					<?php if ($params->get('link_titles') == 1) : ?>
						<h4 class="mod-articles-category-title <?php echo $item->active; ?>"><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></h4>
					<?php else : ?>
						<h4 class="mod-articles-category-title <?php echo $item->active; ?>"><?php echo $item->title; ?></h4>
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
			</div>
		<?php $count++; endforeach; ?>
	<?php endif; ?>
</div>
