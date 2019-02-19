<?php
/**
 * @package otherCode.Joomla
 * @subpackage mod_jexupdatestatus
 * @copyright Copyright (C) 2019 OtherCode. All rights reserved.
 * @version 1.0.0
 * @license MIT
 */
defined('_JEXEC') or die('Restricted access');




$moduleclass_sfx = $params->get('moduleclass_sfx');
$layout = $params->get('layout', 'default');

require JModuleHelper::getLayoutPath('mod_jexupdatestatus', $layout);
