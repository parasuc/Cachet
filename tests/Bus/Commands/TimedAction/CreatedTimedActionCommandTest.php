<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Tests\Cachet\Bus\Commands\Subscriber;

use AltThree\TestBench\CommandTrait;
use CachetHQ\Cachet\Bus\Commands\TimedAction\CreateTimedActionCommand;
use CachetHQ\Cachet\Bus\Handlers\Commands\TimedAction\CreateTimedActionCommandHandler;
use CachetHQ\Cachet\Models\TimedActionGroup;
use CachetHQ\Tests\Cachet\AbstractTestCase;

/**
 * This is the create timed action command test class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class CreatedTimedActionCommandTest extends AbstractTestCase
{
    use CommandTrait;

    protected function getObjectAndParams()
    {
        $params = [
            'name'               => 'support@cachethq.io',
            'group'              => new TimedActionGroup(),
            'description'        => 'Foo bar',
            'active'             => true,
            'timezone'           => 'Europe/London',
            'schedule_frequency' => 3600,
            'completion_latency' => 360,
        ];

        $object = new CreateTimedActionCommand($params['name'], $params['description'], $params['active'], $params['timezone'], $params['schedule_frequency'], $params['completion_latency'], $params['group']);

        return compact('params', 'object');
    }

    protected function objectHasRules()
    {
        return false;
    }

    protected function getHandlerClass()
    {
        return CreateTimedActionCommandHandler::class;
    }
}
