<<<<<<< HEAD
<?php

namespace Config;

/**
 * Paths
 *
 * Holds the paths that are used by the system to
 * locate the main directories, app, system, etc.
 *
 * Modifying these allows you to restructure your application,
=======
<?php namespace Config;

/**
 * Holds the paths that are used by the system to
 * locate the main directories, app, system, etc.
 * Modifying these allows you to re-structure your application,
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
 * share a system folder between multiple applications, and more.
 *
 * All paths are relative to the project's root folder.
 */

class Paths
{
<<<<<<< HEAD
	/**
	 * ---------------------------------------------------------------
	 * SYSTEM FOLDER NAME
	 * ---------------------------------------------------------------
	 *
	 * This must contain the name of your "system" folder. Include
	 * the path if the folder is not in the same directory as this file.
	 *
	 * @var string
	 */
	public $systemDirectory = __DIR__ . '/../../system';

	/**
	 * ---------------------------------------------------------------
	 * APPLICATION FOLDER NAME
	 * ---------------------------------------------------------------
=======
	/*
	 *---------------------------------------------------------------
	 * SYSTEM FOLDER NAME
	 *---------------------------------------------------------------
	 *
	 * This variable must contain the name of your "system" folder.
	 * Include the path if the folder is not in the same directory
	 * as this file.
	 */
	public $systemDirectory = __DIR__ . '/../../system';

	/*
	 *---------------------------------------------------------------
	 * APPLICATION FOLDER NAME
	 *---------------------------------------------------------------
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * If you want this front controller to use a different "app"
	 * folder than the default one you can set its name here. The folder
	 * can also be renamed or relocated anywhere on your getServer. If
<<<<<<< HEAD
	 * you do, use a full getServer path.
	 *
	 * @see http://codeigniter.com/user_guide/general/managing_apps.html
	 *
	 * @var string
	 */
	public $appDirectory = __DIR__ . '/..';

	/**
=======
	 * you do, use a full getServer path. For more info please see the user guide:
	 * http://codeigniter.com/user_guide/general/managing_apps.html
	 *
	 * NO TRAILING SLASH!
	 */
	public $appDirectory = __DIR__ . '/..';

	/*
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 * ---------------------------------------------------------------
	 * WRITABLE DIRECTORY NAME
	 * ---------------------------------------------------------------
	 *
	 * This variable must contain the name of your "writable" directory.
	 * The writable directory allows you to group all directories that
	 * need write permission to a single place that can be tucked away
	 * for maximum security, keeping it out of the app and/or
	 * system directories.
<<<<<<< HEAD
	 *
	 * @var string
	 */
	public $writableDirectory = __DIR__ . '/../../writable';

	/**
=======
	 */
	public $writableDirectory = __DIR__ . '/../../writable';

	/*
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 * ---------------------------------------------------------------
	 * TESTS DIRECTORY NAME
	 * ---------------------------------------------------------------
	 *
	 * This variable must contain the name of your "tests" directory.
<<<<<<< HEAD
	 *
	 * @var string
	 */
	public $testsDirectory = __DIR__ . '/../../tests';

	/**
=======
	 */
	public $testsDirectory = __DIR__ . '/../../tests';

	/*
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 * ---------------------------------------------------------------
	 * VIEW DIRECTORY NAME
	 * ---------------------------------------------------------------
	 *
	 * This variable must contain the name of the directory that
	 * contains the view files used by your application. By
	 * default this is in `app/Views`. This value
	 * is used when no value is provided to `Services::renderer()`.
<<<<<<< HEAD
	 *
	 * @var string
=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public $viewDirectory = __DIR__ . '/../Views';
}
