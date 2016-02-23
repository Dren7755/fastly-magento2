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
namespace Fastly\CDN\Model;

class PurgeCache
{
    /**
     * @var \Fastly\CDN\Model\Api
     */
    protected $api;

    /**
     * Constructor
     *
     * @param Api $api
     */
    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    /**
     * Send API purge request to invalidate cache by pattern
     *
     * @param string $pattern
     * @return bool Return true if successful; otherwise return false
     */
    public function sendPurgeRequest($pattern = '')
    {
        if (empty($pattern)) {
            $result = $this->api->cleanAll();
        } elseif (strpos($pattern, 'http') === 0) {
            $result = $this->api->cleanUrl($pattern);
        } else {
            $result = $this->api->cleanBySurrogateKey($pattern);
        }
        return $result;
    }
}
