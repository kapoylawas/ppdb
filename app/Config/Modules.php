<?php

namespace Config;

<<<<<<< HEAD
use CodeIgniter\Modules\Modules as BaseModules;

class Modules extends BaseModules
{
	/**
	 * --------------------------------------------------------------------------
	 * Enable Auto-Discovery?
	 * --------------------------------------------------------------------------
	 *
	 * If true, then auto-discovery will happen across all elements listed in
	 * $activeExplorers below. If false, no auto-discovery will happen at all,
	 * giving a slight performance boost.
	 *
	 * @var boolean
	 */
	public $enabled = true;

	/**
	 * --------------------------------------------------------------------------
	 * Enable Auto-Discovery Within Composer Packages?
	 * --------------------------------------------------------------------------
	 *
	 * If true, then auto-discovery will happen across all namespaces loaded
	 * by Composer, as well as the namespaces configured locally.
	 *
	 * @var boolean
	 */
	public $discoverInComposer = true;

	/**
	 * --------------------------------------------------------------------------
	 * Auto-Discovery Rules
	 * --------------------------------------------------------------------------
	 *
	 * Aliases list of all discovery classes that will be active and used during
	 * the current application request.
	 *
	 * If it is not listed, only the base application elements will be used.
	 *
	 * @var string[]
	 */
	public $aliases = [
		'events',
		'filters',
=======
use CodeIgniter\Modules\Modules as CoreModules;

class Modules extends CoreModules
{
	/*
	 |--------------------------------------------------------------------------
	 | Auto-Discovery Enabled?
	 |--------------------------------------------------------------------------
	 |
	 | If true, then auto-discovery will happen across all elements listed in
	 | $activeExplorers below. If false, no auto-discovery will happen at all,
	 | giving a slight performance boost.
	 */
	public $enabled = true;

	/*
	 |--------------------------------------------------------------------------
	 | Auto-Discovery Within Composer Packages Enabled?
	 |--------------------------------------------------------------------------
	 |
	 | If true, then auto-discovery will happen across all namespaces loaded
	 | by Composer, as well as the namespaces configured locally.
	 */
	public $discoverInComposer = true;

	/*
	|--------------------------------------------------------------------------
	| Auto-discover Rules
	|--------------------------------------------------------------------------
	|
	| Aliases list of all discovery classes that will be active and used during
	| the current application request.
	| If it is not listed, only the base application elements will be used.
	*/
	public $aliases = [
		'events',
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		'registrars',
		'routes',
		'services',
	];
}
