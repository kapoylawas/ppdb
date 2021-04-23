<<<<<<< HEAD
<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
		'FilterUser' => \App\Filters\FilterUser::class,
	];

	/**
	 * List of filter aliases that are always
	 * applied before and after every request.
	 *
	 * @var array
	 */
	public $globals = [
		'before' => [
			'FilterUser' => [
				'except' => [
					'auth', 'auth/*',
					'home','home/*',
					'/'
				]]
			// 'honeypot',
			// 'csrf',
		],
		'after'  => [
			'FilterUser' => [
				'except' => [
					'home','home/*',
					'/',
					'admin', 'admin/*',
					'pekerjaan', 'pekerjaan/*',
					'pendidikan', 'pendidikan/*',
					'agama', 'agama/*',
					'user', 'user/*',
				]],
			'toolbar',
			// 'honeypot',
		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
	 *
	 * @var array
	 */
	public $methods = [];

	/**
	 * List of filter aliases that should run on any
	 * before or after URI patterns.
	 *
	 * Example:
	 * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
	 *
	 * @var array
	 */
	public $filters = [];
}
=======
<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
	// Makes reading things below nicer,
	// and simpler to change out script that's used.
	public $aliases = [
		'csrf'     => \CodeIgniter\Filters\CSRF::class,
		'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
		'honeypot' => \CodeIgniter\Filters\Honeypot::class,
		'Filter_admin' => \App\Filters\Filter_admin::class,
		'Filter_mhs' => \App\Filters\Filter_mhs::class,
		'Filter_dsn' => \App\Filters\Filter_dsn::class,
	];

	// Always applied before every request
	public $globals = [
		'before' => [
			'Filter_admin' => ['except' => [
				'auth', 'auth/*',
				'home', 'home/*',
				'/',
				'csrf'
			]],
			'Filter_mhs' => ['except' => [
				'auth', 'auth/*',
				'home', 'home/*',
				'/',
				'csrf'
			]],
			'Filter_dsn' => ['except' => [
				'auth', 'auth/*',
				'home', 'home/*',
				'/',
				'csrf'
			]],
			//'honeypot'
			// 'csrf',
		],
		'after'  => [
			'Filter_admin' => ['except' => [
				'admin', 'admin/*',
				'home', 'home/*',
				'/',
				'fakultas', 'fakultas/*',
				'gedung', 'gedung/*',
				'ruangan', 'ruangan/*',
				'prodi', 'prodi/*',
				'ta', 'ta/*',
				'matkul', 'matkul/*',
				'user', 'user/*',
				'dosen', 'dosen/*',
				'mahasiswa', 'mahasiswa/*',
				'kelas', 'kelas/*',
				'jadwalkuliah', 'jadwalkuliah/*',
			]],
			'Filter_mhs' => ['except' => [
				'mhs', 'mhs/*',
				'home', 'home/*',
				'krs', 'krs/*',
				'/',
			]],
			'Filter_dsn' => ['except' => [
				'dsn', 'dsn/*',
				'home', 'home/*',
				'/',
			]],
			'toolbar',
			//'honeypot'
		],
	];

	// Works on all of a particular HTTP method
	// (GET, POST, etc) as BEFORE filters only
	//     like: 'post' => ['CSRF', 'throttle'],
	public $methods = [];

	// List filter aliases and any before/after uri patterns
	// that they should run on, like:
	//    'isLoggedIn' => ['before' => ['account/*', 'profiles/*']],
	public $filters = [];
}

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
