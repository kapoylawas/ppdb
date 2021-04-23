<<<<<<< HEAD
<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;
=======
<?php namespace Config;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
<<<<<<< HEAD
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
=======
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
<<<<<<< HEAD
	 * @var array<string, string>
=======
	 * @var array
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
