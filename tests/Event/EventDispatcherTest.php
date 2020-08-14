<?php
/**
 * This file is part of the Shieldon package.
 *
 * (c) Terry L. <contact@terryl.in>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * php version 7.1.0
 * 
 * @category  Web-security
 * @package   Shieldon
 * @author    Terry Lin <contact@terryl.in>
 * @copyright 2019 terrylinooo
 * @license   https://github.com/terrylinooo/shieldon/blob/2.x/LICENSE MIT
 * @link      https://github.com/terrylinooo/shieldon
 * @see       https://shieldon.io
 */

declare(strict_types=1);

namespace Shieldon\EventTest;

use Shieldon\Event\Event;

class EventDispatcherTest extends \PHPUnit\Framework\TestCase
{
    public function callListenerByClosure()
    {
        Event::addListener('test_1', function() {
            echo 'This is a closure function call.';
        });
    }

    public function callListenerByFunction()
    {
        // test_event_disptcher is in bootstrap.php
        Event::addListener('test_2', 'test_event_disptcher');
    }

    public function callListenerByClass()
    {
        $example = new EventDispatcherExample();

        Event::addListener('test_3', [$example, 'example1']);
       
    }

    public function testDispatcherByClosure()
    {
        $this->callListenerByClosure();

        $this->expectOutputString('This is a closure function call.');

        Event::doDispatch('test_1');
    }

    public function testDispatcherByFunction()
    {
        $this->callListenerByFunction();

        $this->expectOutputString('This is a function call.');

        Event::doDispatch('test_2');
    }

    public function testDispatcherByClass()
    {
        $this->callListenerByClass();

        $this->expectOutputString('This is a class call.');

        Event::doDispatch('test_3');
    }
}

