<?php

/**
 * @package otherCode.Joomla
 * @subpackage mod_jexupdatestatus
 * @copyright Copyright (C) 2019 OtherCode. All rights reserved.
 * @version 1.0.0
 * @license MIT
 */
defined('_JEXEC') or die('Restricted access');

$data = new JObject();
$server_url = trim($params->get('serverurl', null));
$count_extensions = $params->get('countextensions', 0);
$show_type = $params->get('showtype', 0);

try {

    if (empty($server_url)) {
        throw new \Exception('MOD_JEXUPDATESTATUS_EX_UNDEFINED_SERVER_URL', 404);
    }

    jimport('joomla.http.http');
    jimport('joomla.http.transport.stream');

    $options = new \Joomla\Registry\Registry();
    $http = new JHttp($options, new JHttpTransportStream($options));

    $response = $http->get($server_url);

    switch ($response->code) {
        case 200:

            $xml = new SimpleXMLElement($response->body);
            switch ($xml->getName()) {
                case 'extensionset';
                    $data->set('type', 'MOD_JEXUPDATESTATUS_TYPE_COLLECTION');
                    break;
                case 'updates';
                    $data->set('type', 'MOD_JEXUPDATESTATUS_TYPE_EXTENSION');
                    break;
                default:
                    throw new \Exception('MOD_JEXUPDATESTATUS_EX_UNDEFINED_SERVER_TYPE', 400);
            }

            $data->set('status', 'MOD_JEXUPDATESTATUS_STATUS_ONLINE');
            $data->set('css.string', 'success');

            if ($data->get('type') == 'MOD_JEXUPDATESTATUS_TYPE_COLLECTION' && $count_extensions == 1) {
                $data->set('total.extensions', $xml->count());
            }

            break;
        default:
            $data->set('status', 'MOD_JEXUPDATESTATUS_STATUS_OFFLINE');
            $data->set('css.string', 'danger');
    }

} catch (\Exception $e) {

    switch ($e->getCode()) {
        case 400:
        case 404:
            $data->set('status', 'MOD_JEXUPDATESTATUS_STATUS_UNDEFINED');
            $data->set('css.string', 'default');
            $data->set('error.message', $e->getMessage());
        default:
            $data->set('status', 'MOD_JEXUPDATESTATUS_STATUS_UNDEFINED');
            $data->set('css.string', 'default');
    }
}

$moduleclass_sfx = $params->get('moduleclass_sfx');
$layout = $params->get('layout', 'default');

require JModuleHelper::getLayoutPath('mod_jexupdatestatus', $layout);
