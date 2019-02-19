<?php
/**
 * @package otherCode.Joomla
 * @subpackage mod_jexupdatestatus
 * @copyright Copyright (C) 2019 OtherCode. All rights reserved.
 * @version 1.0.0
 * @license MIT
 */
defined('_JEXEC') or die('Restricted access');
?>

<div class="jexupdatestatus <?php echo $moduleclass_sfx ?>">

    <?php if ($show_errors == 1 && !empty($data->get('error.message'))): ?>
        <div class="form-control">
            <div class="alert alert-danger" role="alert">
                <strong><?php echo JText::_('MOD_JEXUPDATESTATUS_ERROR_LABEL'); ?></strong>
                <?php echo JText::_($data->get('error.message')); ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="form-control">
        <div class="jexupdate-info-status"><?php echo JText::_('MOD_JEXUPDATESTATUS_STATUS_LABEL'); ?>
            <span class="label label-<?php echo $data->get('css.string'); ?>">
                <?php echo JText::_($data->get('status')); ?></span>
        </div>
    </div>

    <?php if ($show_type == 1 && !empty($data->get('type'))): ?>
        <div class="form-control">
            <div class="jexupdate-info-type"> <?php echo JText::_('MOD_JEXUPDATESTATUS_TYPE_LABEL'); ?>
                <span><?php echo JText::_($data->get('type')); ?></span>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($count_extensions == 1 && !empty($data->get('total.extensions'))): ?>
        <div class="form-control">
            <div class="jexupdate-info-count"><?php echo JText::_('MOD_JEXUPDATESTATUS_EXTENSIONS'); ?>
                <span><?php echo $data->get('total.extensions'); ?></span>
            </div>
        </div>
    <?php endif; ?>

</div>
