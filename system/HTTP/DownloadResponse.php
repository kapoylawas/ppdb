<?php

/**
<<<<<<< HEAD
 * This file is part of the CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
=======
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

namespace CodeIgniter\HTTP;

use CodeIgniter\Exceptions\DownloadException;
use CodeIgniter\Files\File;
use Config\Mimes;

/**
 * HTTP response when a download is requested.
 */
<<<<<<< HEAD
class DownloadResponse extends Response
=======
class DownloadResponse extends Message implements ResponseInterface
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
{
	/**
	 * Download file name
	 *
	 * @var string
	 */
	private $filename;

	/**
	 * Download for file
	 *
<<<<<<< HEAD
	 * @var File|null
=======
	 * @var File
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	private $file;

	/**
	 * mime set flag
	 *
	 * @var boolean
	 */
	private $setMime;

	/**
	 * Download for binary
	 *
<<<<<<< HEAD
	 * @var string|null
=======
	 * @var string
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	private $binary;

	/**
<<<<<<< HEAD
	 * Download charset
	 *
	 * @var string
	 */
	private $charset = 'UTF-8';

	/**
	 * Download reason
	 *
	 * @var string
	 */
	protected $reason = 'OK';

	/**
	 * The current status code for this response.
	 *
	 * @var integer
	 */
	protected $statusCode = 200;
=======
	 * Download reason
	 *
	 * @var string
	 */
	private $reason = 'OK';

	/**
	 * Download charset
	 *
	 * @var string
	 */
	private $charset = 'UTF-8';

	/**
	 * pretend
	 *
	 * @var boolean
	 */
	private $pretend = false;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

	/**
	 * Constructor.
	 *
	 * @param string  $filename
	 * @param boolean $setMime
	 */
	public function __construct(string $filename, bool $setMime)
	{
<<<<<<< HEAD
		parent::__construct(config('App'));

		$this->filename = $filename;
		$this->setMime  = $setMime;

		// Make sure the content type is either specified or detected
		$this->removeHeader('Content-Type');
=======
		$this->filename = $filename;
		$this->setMime  = $setMime;
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	}

	/**
	 * set download for binary string.
	 *
	 * @param string $binary
	 */
	public function setBinary(string $binary)
	{
		if ($this->file !== null)
		{
			throw DownloadException::forCannotSetBinary();
		}

		$this->binary = $binary;
	}

	/**
	 * set download for file.
	 *
	 * @param string $filepath
	 */
	public function setFilePath(string $filepath)
	{
		if ($this->binary !== null)
		{
			throw DownloadException::forCannotSetFilePath($filepath);
		}

		$this->file = new File($filepath, true);
	}

	/**
	 * set name for the download.
	 *
	 * @param string $filename
	 *
	 * @return $this
	 */
	public function setFileName(string $filename)
	{
		$this->filename = $filename;
		return $this;
	}

	/**
	 * get content length.
	 *
	 * @return integer
	 */
	public function getContentLength() : int
	{
		if (is_string($this->binary))
		{
			return strlen($this->binary);
		}
<<<<<<< HEAD

		if ($this->file instanceof File)
=======
		elseif ($this->file instanceof File)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return $this->file->getSize();
		}

		return 0;
	}

	/**
	 * Set content type by guessing mime type from file extension
	 */
	private function setContentTypeByMimeType()
	{
		$mime    = null;
		$charset = '';

		if ($this->setMime === true)
		{
<<<<<<< HEAD
			if (($lastDotPosition = strrpos($this->filename, '.')) !== false)
			{
				$mime    = Mimes::guessTypeFromExtension(substr($this->filename, $lastDotPosition + 1));
=======
			if (($last_dot_position = strrpos($this->filename, '.')) !== false)
			{
				$mime    = Mimes::guessTypeFromExtension(substr($this->filename, $last_dot_position + 1));
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
				$charset = $this->charset;
			}
		}

		if (! is_string($mime))
		{
			// Set the default MIME type to send
			$mime    = 'application/octet-stream';
			$charset = '';
		}

		$this->setContentType($mime, $charset);
	}

	/**
	 * get download filename.
	 *
	 * @return string
	 */
	private function getDownloadFileName(): string
	{
		$filename  = $this->filename;
		$x         = explode('.', $this->filename);
		$extension = end($x);

		/* It was reported that browsers on Android 2.1 (and possibly older as well)
		 * need to have the filename extension upper-cased in order to be able to
		 * download it.
		 *
		 * Reference: http://digiblog.de/2011/04/19/android-and-the-download-file-headers/
		 */
		// @todo: depend super global
		if (count($x) !== 1 && isset($_SERVER['HTTP_USER_AGENT'])
				&& preg_match('/Android\s(1|2\.[01])/', $_SERVER['HTTP_USER_AGENT']))
		{
			$x[count($x) - 1] = strtoupper($extension);
			$filename         = implode('.', $x);
		}

		return $filename;
	}

	/**
	 * get Content-Disposition Header string.
	 *
	 * @return string
	 */
	private function getContentDisposition() : string
	{
<<<<<<< HEAD
		$downloadFilename = $this->getDownloadFileName();

		$utf8Filename = $downloadFilename;

		if (strtoupper($this->charset) !== 'UTF-8')
		{
			$utf8Filename = mb_convert_encoding($downloadFilename, 'UTF-8', $this->charset);
		}

		$result = sprintf('attachment; filename="%s"', $downloadFilename);

		if ($utf8Filename)
		{
			$result .= '; filename*=UTF-8\'\'' . rawurlencode($utf8Filename);
=======
		$download_filename = $this->getDownloadFileName();

		$utf8_filename = $download_filename;

		if (strtoupper($this->charset) !== 'UTF-8')
		{
			$utf8_filename = mb_convert_encoding($download_filename, 'UTF-8', $this->charset);
		}

		$result = sprintf('attachment; filename="%s"', $download_filename);

		if (isset($utf8_filename))
		{
			$result .= '; filename*=UTF-8\'\'' . rawurlencode($utf8_filename);
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		}

		return $result;
	}

<<<<<<< HEAD
	//--------------------------------------------------------------------

	/**
	 * Disallows status changing.
	 *
	 * @param integer $code
	 * @param string  $reason
=======
	/**
	 * {@inheritDoc}
	 */
	public function getStatusCode(): int
	{
		return 200;
	}

	//--------------------------------------------------------------------

	/**
	 * Return an instance with the specified status code and, optionally, reason phrase.
	 *
	 * If no reason phrase is specified, will default recommended reason phrase for
	 * the response's status code.
	 *
	 * @see http://tools.ietf.org/html/rfc7231#section-6
	 * @see http://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml
	 *
	 * @param integer $code   The 3-digit integer result code to set.
	 * @param string  $reason The reason phrase to use with the
	 *                        provided status code; if none is provided, will
	 *                        default to the IANA name.
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @throws DownloadException
	 */
	public function setStatusCode(int $code, string $reason = '')
	{
		throw DownloadException::forCannotSetStatusCode($code, $reason);
	}

	//--------------------------------------------------------------------

	/**
<<<<<<< HEAD
=======
	 * Gets the response response phrase associated with the status code.
	 *
	 * @see http://tools.ietf.org/html/rfc7231#section-6
	 * @see http://www.iana.org/assignments/http-status-codes/http-status-codes.xhtml
	 *
	 * @return string
	 */
	public function getReason(): string
	{
		return $this->reason;
	}

	//--------------------------------------------------------------------
	//--------------------------------------------------------------------
	// Convenience Methods
	//--------------------------------------------------------------------

	/**
	 * Sets the date header
	 *
	 * @param \DateTime $date
	 *
	 * @return ResponseInterface
	 */
	public function setDate(\DateTime $date)
	{
		$date->setTimezone(new \DateTimeZone('UTC'));

		$this->setHeader('Date', $date->format('D, d M Y H:i:s') . ' GMT');

		return $this;
	}

	//--------------------------------------------------------------------

	/**
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 * Sets the Content Type header for this response with the mime type
	 * and, optionally, the charset.
	 *
	 * @param string $mime
	 * @param string $charset
	 *
	 * @return ResponseInterface
	 */
	public function setContentType(string $mime, string $charset = 'UTF-8')
	{
<<<<<<< HEAD
		parent::setContentType($mime, $charset);

		if ($charset !== '')
=======
		// add charset attribute if not already there and provided as parm
		if ((strpos($mime, 'charset=') < 1) && ! empty($charset))
		{
			$mime .= '; charset=' . $charset;
		}

		$this->removeHeader('Content-Type'); // replace existing content type
		$this->setHeader('Content-Type', $mime);
		if (! empty($charset))
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			$this->charset = $charset;
		}

		return $this;
	}

	/**
	 * Sets the appropriate headers to ensure this response
	 * is not cached by the browsers.
	 */
	public function noCache(): self
	{
		$this->removeHeader('Cache-control');

		$this->setHeader('Cache-control', ['private', 'no-transform', 'no-store', 'must-revalidate']);

		return $this;
	}

	//--------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * Disables cache configuration.
=======
	 * A shortcut method that allows the developer to set all of the
	 * cache-control headers in one method call.
	 *
	 * The options array is used to provide the cache-control directives
	 * for the header. It might look something like:
	 *
	 *      $options = [
	 *          'max-age'  => 300,
	 *          's-maxage' => 900
	 *          'etag'     => 'abcde',
	 *      ];
	 *
	 * Typical options are:
	 *  - etag
	 *  - last-modified
	 *  - max-age
	 *  - s-maxage
	 *  - private
	 *  - public
	 *  - must-revalidate
	 *  - proxy-revalidate
	 *  - no-transform
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 *
	 * @param array $options
	 *
	 * @throws DownloadException
	 */
	public function setCache(array $options = [])
	{
		throw DownloadException::forCannotSetCache();
	}

	//--------------------------------------------------------------------
<<<<<<< HEAD
=======

	/**
	 * {@inheritDoc}
	 */
	public function setLastModified($date)
	{
		if ($date instanceof \DateTime)
		{
			$date->setTimezone(new \DateTimeZone('UTC'));
			$this->setHeader('Last-Modified', $date->format('D, d M Y H:i:s') . ' GMT');
		}
		elseif (is_string($date))
		{
			$this->setHeader('Last-Modified', $date);
		}

		return $this;
	}

	//--------------------------------------------------------------------
	//--------------------------------------------------------------------
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	// Output Methods
	//--------------------------------------------------------------------

	/**
<<<<<<< HEAD
	 * {@inheritDoc}
	 *
	 * @todo Do downloads need CSP or Cookies? Compare with ResponseTrait::send()
=======
	 * For unit testing, don't actually send headers.
	 *
	 * @param  boolean $pretend
	 * @return $this
	 */
	public function pretend(bool $pretend = true)
	{
		$this->pretend = $pretend;

		return $this;
	}

	/**
	 * {@inheritDoc}
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 */
	public function send()
	{
		$this->buildHeaders();
		$this->sendHeaders();
		$this->sendBody();

		return $this;
	}

	/**
	 * set header for file download.
	 */
	public function buildHeaders()
	{
		if (! $this->hasHeader('Content-Type'))
		{
			$this->setContentTypeByMimeType();
		}

		$this->setHeader('Content-Disposition', $this->getContentDisposition());
		$this->setHeader('Expires-Disposition', '0');
		$this->setHeader('Content-Transfer-Encoding', 'binary');
<<<<<<< HEAD
		$this->setHeader('Content-Length', (string) $this->getContentLength());
=======
		$this->setHeader('Content-Length', (string)$this->getContentLength());
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		$this->noCache();
	}

	/**
<<<<<<< HEAD
=======
	 * Sends the headers of this HTTP request to the browser.
	 *
	 * @return DownloadResponse
	 */
	public function sendHeaders()
	{
		// Have the headers already been sent?
		if ($this->pretend || headers_sent())
		{
			return $this;
		}

		// Per spec, MUST be sent with each request, if possible.
		// http://www.w3.org/Protocols/rfc2616/rfc2616-sec13.html
		if (! isset($this->headers['Date']))
		{
			$this->setDate(\DateTime::createFromFormat('U', time()));
		}

		// HTTP Status
		header(sprintf('HTTP/%s %s %s', $this->getProtocolVersion(), $this->getStatusCode(), $this->getReason()), true,
				$this->getStatusCode());

		// Send all of our headers
		foreach ($this->getHeaders() as $name => $values)
		{
			header($name . ': ' . $this->getHeaderLine($name), false, $this->getStatusCode());
		}

		return $this;
	}

	/**
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 * output download file text.
	 *
	 * @throws DownloadException
	 *
	 * @return DownloadResponse
	 */
	public function sendBody()
	{
		if ($this->binary !== null)
		{
			return $this->sendBodyByBinary();
		}
<<<<<<< HEAD

		if ($this->file !== null)
=======
		elseif ($this->file !== null)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			return $this->sendBodyByFilePath();
		}

		throw DownloadException::forNotFoundDownloadSource();
	}

	/**
	 * output download text by file.
	 *
	 * @return DownloadResponse
	 */
	private function sendBodyByFilePath()
	{
<<<<<<< HEAD
		$splFileObject = $this->file->openFile('rb');

		// Flush 1MB chunks of data
		while (! $splFileObject->eof() && ($data = $splFileObject->fread(1048576)) !== false)
=======
		$spl_file_object = $this->file->openFile('rb');

		// Flush 1MB chunks of data
		while (! $spl_file_object->eof() && ($data = $spl_file_object->fread(1048576)) !== false)
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
		{
			echo $data;
		}

		return $this;
	}

	/**
	 * output download text by binary
	 *
	 * @return DownloadResponse
	 */
	private function sendBodyByBinary()
	{
		echo $this->binary;

		return $this;
	}
}
