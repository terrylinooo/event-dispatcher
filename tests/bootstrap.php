<?php
/*
 * This file is part of the Shieldon package.
 *
 * (c) Terry L. <contact@terryl.in>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

date_default_timezone_set('UTC');

define('BOOTSTRAP_DIR', __DIR__);

require __DIR__ . '/../autoload.php';
require __DIR__ . '/../vendor/autoload.php';

function test_event_disptcher()
{
    echo 'This is a function call.';
}