<<<<<<< HEAD
<?php

namespace Config;
=======
<?php namespace Config;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

use CodeIgniter\Config\BaseConfig;

class Migrations extends BaseConfig
{
<<<<<<< HEAD
	/**
	 * --------------------------------------------------------------------------
	 * Enable/Disable Migrations
	 * --------------------------------------------------------------------------
	 *
	 * Migrations are enabled by default.
	 *
	 * You should enable migrations whenever you intend to do a schema migration
	 * and disable it back when you're done.
	 *
	 * @var boolean
	 */
	public $enabled = true;

	/**
	 * --------------------------------------------------------------------------
	 * Migrations Table
	 * --------------------------------------------------------------------------
	 *
	 * This is the name of the table that will store the current migrations state.
	 * When migrations runs it will store in a database table which migration
	 * level the system is at. It then compares the migration level in this
	 * table to the $config['migration_version'] if they are not the same it
	 * will migrate up. This must be set.
	 *
	 * @var string
	 */
	public $table = 'migrations';

	/**
	 * --------------------------------------------------------------------------
	 * Timestamp Format
	 * --------------------------------------------------------------------------
	 *
	 * This is the format that will be used when creating new migrations
	 * using the CLI command:
	 *   > php spark migrate:create
	 *
	 * Typical formats:
	 * - YmdHis_
	 * - Y-m-d-His_
	 * - Y_m_d_His_
	 *
	 * @var string
	 */
	public $timestampFormat = 'Y-m-d-His_';
=======
	/*
	|--------------------------------------------------------------------------
	| Enable/Disable Migrations
	|--------------------------------------------------------------------------
	|
	| Migrations are enabled by default for security reasons.
	| You should enable migrations whenever you intend to do a schema migration
	| and disable it back when you're done.
	|
	*/
	public $enabled = true;

	/*
	|--------------------------------------------------------------------------
	| Migrations table
	|--------------------------------------------------------------------------
	|
	| This is the name of the table that will store the current migrations state.
	| When migrations runs it will store in a database table which migration
	| level the system is at. It then compares the migration level in this
	| table to the $config['migration_version'] if they are not the same it
	| will migrate up. This must be set.
	|
	*/
	public $table = 'migrations';

	/*
	|--------------------------------------------------------------------------
	| Timestamp Format
	|--------------------------------------------------------------------------
	|
	| This is the format that will be used when creating new migrations
	| using the cli command:
	|   > php spark migrate:create
	|
	| Typical formats:
	|   YmdHis_
	|   Y-m-d-His_
	|   Y_m_d_His_
	|
	*/
	public $timestampFormat = 'Y-m-d-His_';

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
