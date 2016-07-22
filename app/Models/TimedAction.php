<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Models;

use AltThree\Validator\ValidatingTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * This is the timed action model.
 *
 * @author James Brooks <james@alt-three.com>
 */
class TimedAction extends Model
{
    use ValidatingTrait;

    /**
     * The attributes that should be casted to native types.
     *
     * @var string[]
     */
    protected $casts = [
        'name'                  => 'string',
        'timed_action_group_id' => 'int',
        'description'           => 'string',
        'active'                => 'bool',
        'timezone'              => 'string',
        'schedule_frequency'    => 'int',
        'completion_latency'    => 'int',
    ];

    /**
     * The fillable properties.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'timed_action_group_id',
        'description',
        'active',
        'timezone',
        'schedule_frequency',
        'completion_latency',
        'created_at',
        'updated_at',
    ];

    /**
     * The validation rules.
     *
     * @var string[]
     */
    public $rules = [
        'timed_action_group_id' => 'int',
        'name'                  => 'string|required',
        'description'           => 'string',
        'active'                => 'bool',
        'timezone'              => 'string',
        'schedule_frequency'    => 'int',
        'completion_latency'    => 'int',
    ];

    /**
     * Get the responses relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function responses()
    {
        return $this->hasMany(TimedActionResponse::class);
    }

    /**
     * Get the group relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(TimedActionGroup::class);
    }
}
