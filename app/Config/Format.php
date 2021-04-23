<<<<<<< HEAD
<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Format\FormatterInterface;

class Format extends BaseConfig
{
	/**
	 * --------------------------------------------------------------------------
	 * Available Response Formats
	 * --------------------------------------------------------------------------
	 *
	 * When you perform content negotiation with the request, these are the
	 * available formats that your application supports. This is currently
	 * only used with the API\ResponseTrait. A valid Formatter must exist
	 * for the specified format.
	 *
	 * These formats are only checked when the data passed to the respond()
	 * method is an array.
	 *
	 * @var string[]
	 */
=======
<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Format extends BaseConfig
{
	/*
	|--------------------------------------------------------------------------
	| Available Response Formats
	|--------------------------------------------------------------------------
	|
	| When you perform content negotiation with the request, these are the
	| available formats that your application supports. This is currently
	| only used with the API\ResponseTrait. A valid Formatter must exist
	| for the specified format.
	|
	| These formats are only checked when the data passed to the respond()
	| method is an array.
	|
	*/
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	public $supportedResponseFormats = [
		'application/json',
		'application/xml', // machine-readable XML
		'text/xml', // human-readable XML
	];

<<<<<<< HEAD
	/**
	 * --------------------------------------------------------------------------
	 * Formatters
	 * --------------------------------------------------------------------------
	 *
	 * Lists the class to use to format responses with of a particular type.
	 * For each mime type, list the class that should be used. Formatters
	 * can be retrieved through the getFormatter() method.
	 *
	 * @var array<string, string>
	 */
	public $formatters = [
		'application/json' => 'CodeIgniter\Format\JSONFormatter',
		'application/xml'  => 'CodeIgniter\Format\XMLFormatter',
		'text/xml'         => 'CodeIgniter\Format\XMLFormatter',
	];

	/**
	 * --------------------------------------------------------------------------
	 * Formatters Options
	 * --------------------------------------------------------------------------
	 *
	 * Additional Options to adjust default formatters behaviour.
	 * For each mime type, list the additional options that should be used.
	 *
	 * @var array<string, int>
	 */
	public $formatterOptions = [
		'application/json' => JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES,
		'application/xml'  => 0,
		'text/xml'         => 0,
	];

=======
	/*
	|--------------------------------------------------------------------------
	| Formatters
	|--------------------------------------------------------------------------
	|
	| Lists the class to use to format responses with of a particular type.
	| For each mime type, list the class that should be used. Formatters
	| can be retrieved through the getFormatter() method.
	|
	*/
	public $formatters = [
		'application/json' => \CodeIgniter\Format\JSONFormatter::class,
		'application/xml'  => \CodeIgniter\Format\XMLFormatter::class,
		'text/xml'         => \CodeIgniter\Format\XMLFormatter::class,
	];
	
	/*
	|--------------------------------------------------------------------------
	| Formatters Options
	|--------------------------------------------------------------------------
	|
	| Additional Options to adjust default formatters behaviour.
	| For each mime type, list the additional options that should be used. 
	|
	*/
	public $formatterOptions  = [
		'application/json' => JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES,
		'application/xml'  => 0,
		'text/xml'         => 0,
	];	
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	//--------------------------------------------------------------------

	/**
	 * A Factory method to return the appropriate formatter for the given mime type.
	 *
	 * @param string $mime
	 *
<<<<<<< HEAD
	 * @return FormatterInterface
	 *
	 * @deprecated This is an alias of `\CodeIgniter\Format\Format::getFormatter`. Use that instead.
	 */
	public function getFormatter(string $mime)
	{
		return Services::format()->getFormatter($mime);
	}
=======
	 * @return \CodeIgniter\Format\FormatterInterface
	 */
	public function getFormatter(string $mime)
	{
		if (! array_key_exists($mime, $this->formatters))
		{
			throw new \InvalidArgumentException('No Formatter defined for mime type: ' . $mime);
		}

		$class = $this->formatters[$mime];

		if (! class_exists($class))
		{
			throw new \BadMethodCallException($class . ' is not a valid Formatter.');
		}

		return new $class();
	}

	//--------------------------------------------------------------------

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
