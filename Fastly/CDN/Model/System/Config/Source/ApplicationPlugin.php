<?php
/**
 * Fastly CDN for Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Fastly CDN for Magento End User License Agreement
 * that is bundled with this package in the file LICENSE_FASTLY_CDN.txt.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Fastly CDN to newer
 * versions in the future. If you wish to customize this module for your
 * needs please refer to http://www.magento.com for more information.
 *
 * @category    Fastly
 * @package     Fastly_CDN
 * @copyright   Copyright (c) 2016 Fastly, Inc. (http://www.fastly.com)
 * @license     BSD, see LICENSE_FASTLY_CDN.txt
 */
namespace Fastly\CDN\Model\System\Config\Source;
use \Magento\PageCache\Model\System\Config\Source\Application;
use \Fastly\CDN\Model\Config;

class ApplicationPlugin
{
    /**
     * Options getter
     *
     * @return array
     */
    public function afterToOptionArray(Application $application, Array $optionArray)
    {
        return array_merge($optionArray, [['value' => Config::FASTLY, 'label' => __('Fastly CDN')]]);
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function afterToArray(Application $application, Array $optionArray)
    {
        $optionArray[Config::FASTLY] = __('Fastly CDN');
        return $optionArray;
    }
}