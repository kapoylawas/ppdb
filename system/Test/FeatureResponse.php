<?php
<<<<<<< HEAD

/**
 * This file is part of the CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
=======
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014-2019 British Columbia Institute of Technology
 * Copyright (c) 2019-2020 CodeIgniter Foundation
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package    CodeIgniter
 * @author     CodeIgniter Dev Team
 * @copyright  2019-2020 CodeIgniter Foundation
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link       https://codeigniter.com
 * @since      Version 4.0.0
 * @filesource
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
 */

namespace CodeIgniter\Test;

use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
<<<<<<< HEAD
use Config\Services;
use Exception;
=======
use Config\Format;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
use PHPUnit\Framework\TestCase;

/**
 * Assertions for a response
 */
class FeatureResponse extends TestCase
{
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	/**
	 * The response.
	 *
	 * @var \CodeIgniter\HTTP\ResponseInterface
	 */
	public $response;

	/**
	 * DOM for the body.
	 *
<<<<<<< HEAD
	 * @var DOMParser
=======
	 * @var \CodeIgniter\Test\DOMParser
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	protected $domParser;

	/**
	 * Constructor.
	 *
	 * @param ResponseInterface $response
	 */
	public function __construct(ResponseInterface $response = null)
	{
		$this->response = $response;

		$body = $response->getBody();
		if (! empty($body) && is_string($body))
		{
			$this->domParser = (new DOMParser())->withString($body);
		}
	}

	//--------------------------------------------------------------------
	// Simple Response Checks
	//--------------------------------------------------------------------

	/**
	 * Boils down the possible responses into a bolean valid/not-valid
	 * response type.
	 *
	 * @return boolean
	 */
	public function isOK(): bool
	{
		$status = $this->response->getStatusCode();

		// Only 200 and 300 range status codes
		// are considered valid.
		if ($status >= 400 || $status < 200)
		{
			return false;
		}

		// Empty bodies are not considered valid, unless in redirects
		if ($status < 300 && empty($this->response->getBody()))
		{
			return false;
		}

		return true;
	}

	/**
<<<<<<< HEAD
	 * Returns whether or not the Response was a redirect or RedirectResponse
=======
	 * Returns whether or not the Response was a redirect response
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @return boolean
	 */
	public function isRedirect(): bool
	{
<<<<<<< HEAD
		return $this->response instanceof RedirectResponse
			|| $this->response->hasHeader('Location')
			|| $this->response->hasHeader('Refresh');
=======
		return $this->response instanceof RedirectResponse;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	/**
	 * Assert that the given response was a redirect.
	 *
<<<<<<< HEAD
	 * @throws Exception
	 */
	public function assertRedirect()
	{
		$this->assertTrue($this->isRedirect(), 'Response is not a redirect or RedirectResponse.');
=======
	 * @throws \Exception
	 */
	public function assertRedirect()
	{
		$this->assertTrue($this->isRedirect(), 'Response is not a RedirectResponse.');
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	/**
	 * Returns the URL set for redirection.
	 *
	 * @return string|null
	 */
	public function getRedirectUrl(): ?string
	{
		if (! $this->isRedirect())
		{
			return null;
		}

		if ($this->response->hasHeader('Location'))
		{
			return $this->response->getHeaderLine('Location');
		}
<<<<<<< HEAD

		if ($this->response->hasHeader('Refresh'))
=======
		elseif ($this->response->hasHeader('Refresh'))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return str_replace('0;url=', '', $this->response->getHeaderLine('Refresh'));
		}

		return null;
	}

	/**
	 * Asserts that the status is a specific value.
	 *
	 * @param integer $code
	 *
<<<<<<< HEAD
	 * @throws Exception
	 */
	public function assertStatus(int $code)
	{
		$this->assertEquals($code, $this->response->getStatusCode());
=======
	 * @throws \Exception
	 */
	public function assertStatus(int $code)
	{
		$this->assertEquals($code, (int) $this->response->getStatusCode());
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	/**
	 * Asserts that the Response is considered OK.
	 *
<<<<<<< HEAD
	 * @throws Exception
=======
	 * @throws \Exception
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function assertOK()
	{
		$this->assertTrue($this->isOK(), "{$this->response->getStatusCode()} is not a successful status code, or the Response has an empty body.");
	}

	//--------------------------------------------------------------------
	// Session Assertions
	//--------------------------------------------------------------------

	/**
	 * Asserts that an SESSION key has been set and, optionally, test it's value.
	 *
<<<<<<< HEAD
	 * @param string      $key
	 * @param string|null $value
	 *
	 * @throws Exception
=======
	 * @param string $key
	 * @param null   $value
	 *
	 * @throws \Exception
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function assertSessionHas(string $key, $value = null)
	{
		$this->assertTrue(array_key_exists($key, $_SESSION), "'{$key}' is not in the current \$_SESSION");

		if ($value !== null)
		{
			$this->assertEquals($value, $_SESSION[$key], "The value of '{$key}' ({$value}) does not match expected value.");
		}
	}

	/**
	 * Asserts the session is missing $key.
	 *
	 * @param string $key
	 *
<<<<<<< HEAD
	 * @throws Exception
=======
	 * @throws \Exception
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function assertSessionMissing(string $key)
	{
		$this->assertFalse(array_key_exists($key, $_SESSION), "'{$key}' should not be present in \$_SESSION.");
	}

	//--------------------------------------------------------------------
	// Header Assertions
	//--------------------------------------------------------------------

	/**
	 * Asserts that the Response contains a specific header.
	 *
<<<<<<< HEAD
	 * @param string      $key
	 * @param string|null $value
	 *
	 * @throws Exception
=======
	 * @param string $key
	 * @param null   $value
	 *
	 * @throws \Exception
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function assertHeader(string $key, $value = null)
	{
		$this->assertTrue($this->response->hasHeader($key), "'{$key}' is not a valid Response header.");

		if ($value !== null)
		{
			$this->assertEquals($value, $this->response->getHeaderLine($key), "The value of '{$key}' header ({$this->response->getHeaderLine($key)}) does not match expected value.");
		}
	}

	/**
	 * Asserts the Response headers does not contain the specified header.
	 *
	 * @param string $key
	 *
<<<<<<< HEAD
	 * @throws Exception
=======
	 * @throws \Exception
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function assertHeaderMissing(string $key)
	{
		$this->assertFalse($this->response->hasHeader($key), "'{$key}' should not be in the Response headers.");
	}

	//--------------------------------------------------------------------
	// Cookie Assertions
	//--------------------------------------------------------------------

	/**
	 * Asserts that the response has the specified cookie.
	 *
	 * @param string      $key
<<<<<<< HEAD
	 * @param string|null $value
	 * @param string      $prefix
	 *
	 * @throws Exception
=======
	 * @param null        $value
	 * @param string|null $prefix
	 *
	 * @throws \Exception
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function assertCookie(string $key, $value = null, string $prefix = '')
	{
		$this->assertTrue($this->response->hasCookie($key, $value, $prefix), "No cookie found named '{$key}'.");
	}

	/**
	 * Assert the Response does not have the specified cookie set.
	 *
	 * @param string $key
	 */
	public function assertCookieMissing(string $key)
	{
		$this->assertFalse($this->response->hasCookie($key), "Cookie named '{$key}' should not be set.");
	}

	/**
	 * Asserts that a cookie exists and has an expired time.
	 *
	 * @param string $key
	 * @param string $prefix
	 *
<<<<<<< HEAD
	 * @throws Exception
=======
	 * @throws \Exception
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function assertCookieExpired(string $key, string $prefix = '')
	{
		$this->assertTrue($this->response->hasCookie($key, null, $prefix));
		$this->assertGreaterThan(time(), $this->response->getCookie($key, $prefix)['expires']);
	}

	//--------------------------------------------------------------------
	// DomParser Assertions
	//--------------------------------------------------------------------

	/**
	 * Assert that the desired text can be found in the result body.
	 *
	 * @param string|null $search
	 * @param string|null $element
	 *
<<<<<<< HEAD
	 * @throws Exception
=======
	 * @throws \Exception
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function assertSee(string $search = null, string $element = null)
	{
		$this->assertTrue($this->domParser->see($search, $element), "Do not see '{$search}' in response.");
	}

	/**
	 * Asserts that we do not see the specified text.
	 *
	 * @param string|null $search
	 * @param string|null $element
	 *
<<<<<<< HEAD
	 * @throws Exception
=======
	 * @throws \Exception
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function assertDontSee(string $search = null, string $element = null)
	{
		$this->assertTrue($this->domParser->dontSee($search, $element), "I should not see '{$search}' in response.");
	}

	/**
	 * Assert that we see an element selected via a CSS selector.
	 *
	 * @param string $search
	 *
<<<<<<< HEAD
	 * @throws Exception
=======
	 * @throws \Exception
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function assertSeeElement(string $search)
	{
		$this->assertTrue($this->domParser->seeElement($search), "Do not see element with selector '{$search} in response.'");
	}

	/**
	 * Assert that we do not see an element selected via a CSS selector.
	 *
	 * @param string $search
	 *
<<<<<<< HEAD
	 * @throws Exception
=======
	 * @throws \Exception
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function assertDontSeeElement(string $search)
	{
		$this->assertTrue($this->domParser->dontSeeElement($search), "I should not see an element with selector '{$search}' in response.'");
	}

	/**
	 * Assert that we see a link with the matching text and/or class.
	 *
	 * @param string      $text
	 * @param string|null $details
	 *
<<<<<<< HEAD
	 * @throws Exception
=======
	 * @throws \Exception
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function assertSeeLink(string $text, string $details = null)
	{
		$this->assertTrue($this->domParser->seeLink($text, $details), "Do no see anchor tag with the text {$text} in response.");
	}

	/**
	 * Assert that we see an input with name/value.
	 *
	 * @param string      $field
	 * @param string|null $value
	 *
<<<<<<< HEAD
	 * @throws Exception
=======
	 * @throws \Exception
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function assertSeeInField(string $field, string $value = null)
	{
		$this->assertTrue($this->domParser->seeInField($field, $value), "Do no see input named {$field} with value {$value} in response.");
	}

	//--------------------------------------------------------------------
	// JSON Methods
	//--------------------------------------------------------------------

	/**
	 * Returns the response's body as JSON
	 *
	 * @return mixed|false
	 */
	public function getJSON()
	{
		$response = $this->response->getJSON();

		if (is_null($response))
		{
			return false;
		}

		return $response;
	}

	/**
	 * Test that the response contains a matching JSON fragment.
	 *
<<<<<<< HEAD
	 * @param array   $fragment
	 * @param boolean $strict
	 *
	 * @throws Exception
	 */
	public function assertJSONFragment(array $fragment, bool $strict = false)
	{
		$json    = json_decode($this->getJSON(), true);
		$patched = array_replace_recursive($json, $fragment);

		if ($strict)
		{
			$this->assertSame($json, $patched, 'Response does not contain a matching JSON fragment.');
		}
		else
		{
			$this->assertEquals($json, $patched, 'Response does not contain a matching JSON fragment.');
		}
=======
	 * @param array $fragment
	 *
	 * @throws \Exception
	 */
	public function assertJSONFragment(array $fragment)
	{
		$json = json_decode($this->getJSON(), true);

		$this->assertArraySubset($fragment, $json, false, 'Response does not contain a matching JSON fragment.');
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	/**
	 * Asserts that the JSON exactly matches the passed in data.
	 * If the value being passed in is a string, it must be a json_encoded string.
	 *
	 * @param string|array $test
	 *
<<<<<<< HEAD
	 * @throws Exception
=======
	 * @throws \Exception
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function assertJSONExact($test)
	{
		$json = $this->getJSON();

		if (is_array($test))
		{
<<<<<<< HEAD
			$test = Services::format()->getFormatter('application/json')->format($test);
=======
			$config    = new Format();
			$formatter = $config->getFormatter('application/json');
			$test      = $formatter->format($test);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		$this->assertJsonStringEqualsJsonString($test, $json, 'Response does not contain matching JSON.');
	}

	//--------------------------------------------------------------------
	// XML Methods
	//--------------------------------------------------------------------

	/**
	 * Returns the response' body as XML
	 *
	 * @return mixed|string
	 */
	public function getXML()
	{
		return $this->response->getXML();
	}
<<<<<<< HEAD
=======

>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
}
