<<<<<<< HEAD
<?php

/**
 * This file is part of the CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CodeIgniter\Commands\Cache;
=======
<?php namespace CodeIgniter\Commands\Cache;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

use CodeIgniter\Cache\CacheFactory;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

<<<<<<< HEAD
/**
 * Clears current cache.
 */
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
class ClearCache extends BaseCommand
{
	/**
	 * Command grouping.
	 *
	 * @var string
	 */
	protected $group = 'Cache';

	/**
	 * The Command's name
	 *
	 * @var string
	 */
	protected $name = 'cache:clear';

	/**
	 * the Command's short description
	 *
	 * @var string
	 */
	protected $description = 'Clears the current system caches.';

	/**
	 * the Command's usage
	 *
	 * @var string
	 */
	protected $usage = 'cache:clear [driver]';

	/**
	 * the Command's Arguments
	 *
	 * @var array
	 */
	protected $arguments = [
		'driver' => 'The cache driver to use',
	];

	/**
<<<<<<< HEAD
	 * Clears the cache
	 *
	 * @param array $params
	 */
	public function run(array $params)
	{
		$config  = config('Cache');
		$handler = $params[0] ?? $config->handler;

		if (! array_key_exists($handler, $config->validHandlers))
		{
			CLI::error($handler . ' is not a valid cache handler.');

=======
	 * Creates a new migration file with the current timestamp.
	 *
	 * @param array $params
	 */
	public function run(array $params = [])
	{
		$config = config('Cache');

		$handler = $params[0] ?? $config->handler;
		if (! array_key_exists($handler, $config->validHandlers))
		{
			CLI::error($handler . ' is not a valid cache handler.');
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			return;
		}

		$config->handler = $handler;
		$cache           = CacheFactory::getHandler($config);

		if (! $cache->clean())
		{
<<<<<<< HEAD
			// @codeCoverageIgnoreStart
			CLI::error('Error while clearing the cache.');

			return;
			// @codeCoverageIgnoreEnd
		}

		CLI::write(CLI::color('Cache cleared.', 'green'));
=======
			CLI::error('Error while clearing the cache.');
			return;
		}

		CLI::write(CLI::color('Done', 'green'));
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}
}
