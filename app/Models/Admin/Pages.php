<?php

namespace social_coordination_center\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pages extends Model
{
    use SoftDeletes;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pages';
}
