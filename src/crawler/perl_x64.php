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
 * Perl (Strawberry Perl 64bit)
 */
class perl_x64 extends VersionCrawler
{
    public $name = 'perl-x64';

    public $url = 'http://strawberryperl.com/releases.html';

    public function crawlVersion()
    {
        return $this->filter('a')->each(function ($node) {
            // perl-5.4.1.1-64bit.zip
            if (preg_match("#(\d+\.\d+(\.\d+)*)-64bit?#", $node->attr('href'), $matches)) {
                $version = $matches[1]; // 5.4.1.1
                if (version_compare($version, $this->registry['perl-x64']['latest']['version'], '>=') === true) {
                    return array(
                        'version' => $version,
                        'url'     => 'http://strawberryperl.com/download/' . $version . '/strawberry-perl-' . $version . '-64bit.zip',
                    );
                }
            }
        });
    }
}
