<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Bus\Commands\TimedAction;

use CachetHQ\Cachet\Models\TimedActionGroup;

/**
 * This is the create timed action command class.
 *
 * @author James Brooks <james@alt-three.com>
 */
final class CreateTimedActionCommand
{
    /**
     * The name of the timed action.
     *
     * @var string
     */
    public $name;

    /**
     * A description of what the timed action does.
     *
     * @var string
     */
    public $description;

    /**
     * Whether the timed action is active.
     *
     * @var bool
     */
    public $active;

    /**
     * The timezone of the action.
     *
     * @var string
     */
    public $timezone;

    /**
     * The frequencey in which the timed action should run at.
     *
     * @var int
     */
    public $schedule_frequency;

    /**
     * How often the action should be completed.
     *
     * @var int
     */
    public $completion_latency;

    /**
     * The group in which to place the timed action.
     *
     * @var \CachetHQ\Cachet\Models\TimedActionGroup|null
     */
    public $group;

    /**
     * Create a new created timed action command instance.
     *
     * @param string                                        $name
     * @param string                                        $description
     * @param bool                                          $active
     * @param string                                        $timezone
     * @param int                                           $schedule_frequency
     * @param int                                           $completion_latency
     * @param \CachetHQ\Cachet\Models\TimedActionGroup|null $group
     *
     * @return void
     */
    public function __construct($name, $description, $active, $timezone, $schedule_frequency, $completion_latency, TimedActionGroup $group = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->active = $active;
        $this->timezone = $timezone;
        $this->schedule_frequency = $schedule_frequency;
        $this->completion_latency = $completion_latency;
        $this->group = $group;
    }
}
