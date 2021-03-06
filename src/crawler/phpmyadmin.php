<?php

/**
 * WPИ-XM Server Stack - Updater
 * Copyright © 2010 - 2015 Jens-André Koch <jakoch@web.de>
 * http://wpn-xm.org/
 *
 * This source file is subject to the terms of the MIT license.
 * For full copyright and license information, view the bundled LICENSE file.
 */

namespace WPNXM\Updater\Crawler;

use WPNXM\Updater\VersionCrawler;

/**
 * phpMyAdmin - Version Crawler
 */
class phpmyadmin extends VersionCrawler
{
    public $url = 'https://www.phpmyadmin.net/home_page/phpmyadmin.xml';

    public function crawlVersion()
    {
        $version = $this->filterXPath('//Program_Info/Program_Version')->text();

        if(version_compare($version, $this->registry['phpmyadmin']['latest']['version'], '>=') === true) {
            return [
                'version' => $version,
                'url'     => 'https://files.phpmyadmin.net/phpMyAdmin/' . $version . '/phpMyAdmin-' . $version . '-english.zip',
            ];
        }
    }
}
