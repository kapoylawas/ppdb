<<<<<<< HEAD
<?php

namespace Config;
=======
<?php namespace Config;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

use CodeIgniter\Config\BaseConfig;

class Honeypot extends BaseConfig
{
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * Makes Honeypot visible or not to human
	 *
	 * @var boolean
	 */
	public $hidden = true;

	/**
	 * Honeypot Label Content
	 *
	 * @var string
	 */
	public $label = 'Fill This Field';

	/**
	 * Honeypot Field Name
	 *
	 * @var string
	 */
	public $name = 'honeypot';

	/**
	 * Honeypot HTML Template
	 *
	 * @var string
	 */
	public $template = '<label>{label}</label><input type="text" name="{name}" value=""/>';

	/**
	 * Honeypot container
	 *
	 * @var string
	 */
	public $container = '<div style="display:none">{template}</div>';
}
