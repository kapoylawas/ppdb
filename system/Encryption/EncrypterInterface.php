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
 * Copyright (c) 2014-2017 British Columbia Institute of Technology
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
 * @copyright  2014-2017 British Columbia Institute of Technology (https://bcit.ca/)
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link       https://codeigniter.com
 * @since      Version 4.0.0
 * @filesource
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
 */

namespace CodeIgniter\Encryption;

<<<<<<< HEAD
use CodeIgniter\Encryption\Exceptions\EncryptionException;

=======
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
/**
 * CodeIgniter Encryption Handler
 *
 * Provides two-way keyed encryption
 */
interface EncrypterInterface
{
<<<<<<< HEAD
	/**
	 * Encrypt - convert plaintext into ciphertext
	 *
	 * @param string            $data   Input data
	 * @param array|string|null $params Overridden parameters, specifically the key
	 *
	 * @throws EncryptionException
	 *
=======

	/**
	 * Encrypt - convert plaintext into ciphertext
	 *
	 * @param  string $data   Input data
	 * @param  array  $params Over-ridden parameters, specifically the key
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 * @return string
	 */
	public function encrypt($data, $params = null);

	/**
	 * Decrypt - convert ciphertext into plaintext
	 *
<<<<<<< HEAD
	 * @param string            $data   Encrypted data
	 * @param array|string|null $params Overridden parameters, specifically the key
	 *
	 * @throws EncryptionException
	 *
=======
	 * @param  string $data   Encrypted data
	 * @param  array  $params Over-ridden parameters, specifically the key
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	 * @return string
	 */
	public function decrypt($data, $params = null);
}
