<?php
/**
 * @package otherCode.Joomla
 * @subpackage mod_jexupdatestatus
 * @copyright Copyright (C) 2019 OtherCode. All rights reserved.
 * @version 1.2.0
 * @license MIT
 */
defined('_JEXEC') or die('Restricted access');
?>

<div class="jexupdatestatus <?php echo $moduleclass_sfx ?>">

    <?php if ($params->get('showerrors', 0) == 1 && !empty($data->get('error.message'))): ?>
        <div class="form-control">
            <div class="alert alert-danger" role="alert">
                <strong><?php echo JText::_('MOD_JEXUPDATESTATUS_ERROR_LABEL'); ?></strong>
                <?php echo JText::_($data->get('error.message')); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($params->get('showinformation', 0) == 1): ?>
        <div class="form-control">
            <div><strong><?php echo $data->get('info.name'); ?></strong></div>
            <div><?php echo $data->get('info.description'); ?></div>
        </div>
    <?php endif; ?>

    <div class="form-control">
        <div class="jexupdate-info-status"><?php echo JText::_('MOD_JEXUPDATESTATUS_STATUS_LABEL'); ?>
            <span class="label label-<?php echo $data->get('css.string'); ?>">
                <?php echo JText::_($data->get('status')); ?>
            </span>
        </div>
    </div>

    <?php if ($params->get('showtype', 0) == 1 && !empty($data->get('type'))): ?>
        <div class="form-control">
            <div class="jexupdate-info-type"> <?php echo JText::_('MOD_JEXUPDATESTATUS_TYPE_LABEL'); ?>
                <span><?php echo JText::_($data->get('type')); ?></span>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($params->get('showextensionlist', 0) == 1 && count($data->get('extensions', [])) > 0): ?>
        <div class="form-control">
            <table class="table table-responsive table-condensed">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"><?php echo JText::_('MOD_JEXUPDATESTATUS_TABLE_HEADER_EXTENSION'); ?></th>
                    <th scope="col"><?php echo JText::_('MOD_JEXUPDATESTATUS_TABLE_HEADER_VERSION'); ?></th>
                </tr>
                </thead>
                <?php foreach ($data->get('extensions', []) as $index => $extension): ?>
                    <tr>
                        <th scope="row"><?php echo $index + 1; ?></th>
                        <td>
                            <a href="<?php echo "{$extension['detailsurl']}"; ?>" target="_blank" rel="nofollow">
                                <?php echo "{$extension['name']}"; ?>
                            </a>
                        </td>
                        <td style="text-align:right;">
                            <?php echo "v{$extension['version']}"; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php endif; ?>

    <?php if ($params->get('countextensions', 0) == 1 && !empty($data->get('total.extensions'))): ?>
        <div class="form-control">
            <div class="jexupdate-info-count"><?php echo JText::_('MOD_JEXUPDATESTATUS_EXTENSIONS'); ?>
                <span><?php echo $data->get('total.extensions'); ?></span>
            </div>
        </div>
    <?php endif; ?>

</div>
