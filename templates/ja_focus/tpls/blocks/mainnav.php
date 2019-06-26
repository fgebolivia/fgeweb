<?php
/**
 * @package   T3 Blank
 * @copyright Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
// Template helper
JLoader::register('JATemplateHelper', T3_TEMPLATE_PATH . '/helper.php');

$lang = JFactory::getLanguage();
$menutype = $this->getParam('mm_type', 'mainmenu');

$menu = JFactory::getApplication()->getMenu();

if ($lang->getDefault() != $lang->getTag()) {
	$menutype_gost = $menutype.'-'.strtolower($lang->getTag()); 
	$mnitems = $menu->getItems (array('menutype'), array($menutype_gost));

	if (count($mnitems)) {
		$menutype = $menutype_gost;
	} 
}

$mnitems = $menu->getItems (array('menutype'), array($menutype));

?>

<!-- MAIN NAVIGATION -->
<div class="container">
	<nav id="t3-mainnav" class="navbar navbar-default t3-mainnav">

		<?php if ($this->getParam('navigation_collapse_enable')) : ?>
			<div class="t3-navbar-collapse navbar-collapse collapse"></div>
		<?php endif ?>

		<div class="t3-navbar navbar-collapse collapse">
			<jdoc:include type="<?php echo $this->getParam('navigation_type', 'megamenu') ?>" name="<?php echo $this->getParam('mm_type', 'mainmenu') ?>" />
		</div>
	</nav>
	<!-- //MAIN NAVIGATION -->
</div>

<?php
/* Teak mainnav to add category class to mainmenu item */
	$mnclasses = array();
	foreach ($mnitems as $mnitem) {
		$query = new JRegistry ($mnitem->query);
		if ($query->get ('option') == 'com_content' && $query->get ('view') == 'category') {
			$catid = $query->get ('id');

			$customs 		= '';
			if(JATemplateHelper::getCustomFields($catid, 'category')) {
				$customs 		= JATemplateHelper::getCustomFields($catid, 'category');
				$class = $customs['colors'];
			}
			if ($class) {
				$mnclass = new stdClass();
				$mnclass->id = $mnitem->id;
				$mnclass->class = $class;
				$mnclasses[] = $mnclass;
			}
		}
	}
?>

<script>
	(function ($){
		var maps = <?php echo json_encode($mnclasses) ?>;
		$(maps).each (function (){
			$('li[data-id="' + this['id'] + '"]').addClass (this['class']);
		});
	})(jQuery);
</script>