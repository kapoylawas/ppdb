<?php $error_id = uniqid('error', true); ?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex">

<<<<<<< HEAD
	<title><?= esc($title) ?></title>
=======
	<title><?= htmlspecialchars($title, ENT_SUBSTITUTE, 'UTF-8') ?></title>
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
	<style type="text/css">
		<?= preg_replace('#[\r\n\t ]+#', ' ', file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'debug.css')) ?>
	</style>

	<script type="text/javascript">
		<?= file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'debug.js') ?>
	</script>
</head>
<body onload="init()">

	<!-- Header -->
	<div class="header">
		<div class="container">
<<<<<<< HEAD
			<h1><?= esc($title), esc($exception->getCode() ? ' #' . $exception->getCode() : '') ?></h1>
			<p>
				<?= esc($exception->getMessage()) ?>
=======
			<h1><?= htmlspecialchars($title, ENT_SUBSTITUTE, 'UTF-8'), ($exception->getCode() ? ' #' . $exception->getCode() : '') ?></h1>
			<p>
				<?= $exception->getMessage() ?>
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
				<a href="https://www.google.com/search?q=<?= urlencode($title . ' ' . preg_replace('#\'.*\'|".*"#Us', '', $exception->getMessage())) ?>"
				   rel="noreferrer" target="_blank">search &rarr;</a>
			</p>
		</div>
	</div>

	<!-- Source -->
	<div class="container">
<<<<<<< HEAD
		<p><b><?= esc(static::cleanPath($file, $line)) ?></b> at line <b><?= esc($line) ?></b></p>
=======
		<p><b><?= static::cleanPath($file, $line) ?></b> at line <b><?= $line ?></b></p>
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

		<?php if (is_file($file)) : ?>
			<div class="source">
				<?= static::highlightFile($file, $line, 15); ?>
			</div>
		<?php endif; ?>
	</div>

	<div class="container">

		<ul class="tabs" id="tabs">
			<li><a href="#backtrace">Backtrace</a></li>
				<li><a href="#server">Server</a></li>
				<li><a href="#request">Request</a></li>
				<li><a href="#response">Response</a></li>
				<li><a href="#files">Files</a></li>
				<li><a href="#memory">Memory</a></li>
			</li>
		</ul>

		<div class="tab-content">

			<!-- Backtrace -->
			<div class="content" id="backtrace">

				<ol class="trace">
				<?php foreach ($trace as $index => $row) : ?>

					<li>
						<p>
							<!-- Trace info -->
							<?php if (isset($row['file']) && is_file($row['file'])) :?>
								<?php
<<<<<<< HEAD
								if (isset($row['function']) && in_array($row['function'], ['include', 'include_once', 'require', 'require_once'], true))
								{
									echo esc($row['function'] . ' ' . static::cleanPath($row['file']));
								}
								else
								{
									echo esc(static::cleanPath($row['file']) . ' : ' . $row['line']);
=======
								if (isset($row['function']) && in_array($row['function'], ['include', 'include_once', 'require', 'require_once']))
									{
									echo $row['function'] . ' ' . static::cleanPath($row['file']);
								}
								else
									{
									echo static::cleanPath($row['file']) . ' : ' . $row['line'];
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
								}
								?>
							<?php else : ?>
								{PHP internal code}
							<?php endif; ?>

							<!-- Class/Method -->
							<?php if (isset($row['class'])) : ?>
<<<<<<< HEAD
								&nbsp;&nbsp;&mdash;&nbsp;&nbsp;<?= esc($row['class'] . $row['type'] . $row['function']) ?>
								<?php if (! empty($row['args'])) : ?>
									<?php $args_id = $error_id . 'args' . $index ?>
									( <a href="#" onclick="return toggle('<?= esc($args_id, 'attr') ?>');">arguments</a> )
									<div class="args" id="<?= esc($args_id, 'attr') ?>">
=======
								&nbsp;&nbsp;&mdash;&nbsp;&nbsp;<?= $row['class'] . $row['type'] . $row['function'] ?>
								<?php if (! empty($row['args'])) : ?>
									<?php $args_id = $error_id . 'args' . $index ?>
									( <a href="#" onclick="return toggle('<?= $args_id ?>');">arguments</a> )
									<div class="args" id="<?= $args_id ?>">
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
										<table cellspacing="0">

										<?php
										$params = null;
										// Reflection by name is not available for closure function
<<<<<<< HEAD
										if (substr($row['function'], -1) !== '}')
										{
											$mirror = isset($row['class']) ? new \ReflectionMethod($row['class'], $row['function']) : new \ReflectionFunction($row['function']);
=======
										if (substr( $row['function'], -1 ) !== '}')
										{
											$mirror = isset( $row['class'] ) ? new \ReflectionMethod( $row['class'], $row['function'] ) : new \ReflectionFunction( $row['function'] );
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
											$params = $mirror->getParameters();
										}
										foreach ($row['args'] as $key => $value) : ?>
											<tr>
<<<<<<< HEAD
												<td><code><?= esc(isset($params[$key]) ? '$' . $params[$key]->name : "#$key") ?></code></td>
												<td><pre><?= esc(print_r($value, true)) ?></pre></td>
=======
												<td><code><?= htmlspecialchars(isset($params[$key]) ? '$' . $params[$key]->name : "#$key", ENT_SUBSTITUTE, 'UTF-8') ?></code></td>
												<td><pre><?= print_r($value, true) ?></pre></td>
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
											</tr>
										<?php endforeach ?>

										</table>
									</div>
								<?php else : ?>
									()
								<?php endif; ?>
							<?php endif; ?>

							<?php if (! isset($row['class']) && isset($row['function'])) : ?>
<<<<<<< HEAD
								&nbsp;&nbsp;&mdash;&nbsp;&nbsp;	<?= esc($row['function']) ?>()
=======
								&nbsp;&nbsp;&mdash;&nbsp;&nbsp;	<?= $row['function'] ?>()
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
							<?php endif; ?>
						</p>

						<!-- Source? -->
<<<<<<< HEAD
						<?php if (isset($row['file']) && is_file($row['file']) && isset($row['class'])) : ?>
=======
						<?php if (isset($row['file']) && is_file($row['file']) &&  isset($row['class'])) : ?>
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
							<div class="source">
								<?= static::highlightFile($row['file'], $row['line']) ?>
							</div>
						<?php endif; ?>
					</li>

				<?php endforeach; ?>
				</ol>

			</div>

			<!-- Server -->
			<div class="content" id="server">
				<?php foreach (['_SERVER', '_SESSION'] as $var) : ?>
					<?php if (empty($GLOBALS[$var]) || ! is_array($GLOBALS[$var]))
					{
						continue;
					} ?>

<<<<<<< HEAD
					<h3>$<?= esc($var) ?></h3>
=======
					<h3>$<?= $var ?></h3>
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

					<table>
						<thead>
							<tr>
								<th>Key</th>
								<th>Value</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($GLOBALS[$var] as $key => $value) : ?>
							<tr>
<<<<<<< HEAD
								<td><?= esc($key) ?></td>
								<td>
									<?php if (is_string($value)) : ?>
										<?= esc($value) ?>
									<?php else: ?>
										<pre><?= esc(print_r($value, true)) ?></pre>
=======
								<td><?= htmlspecialchars($key, ENT_IGNORE, 'UTF-8') ?></td>
								<td>
									<?php if (is_string($value)) : ?>
										<?= htmlspecialchars($value, ENT_SUBSTITUTE, 'UTF-8') ?>
									<?php else: ?>
										<?= '<pre>' . print_r($value, true) ?>
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>

				<?php endforeach ?>

				<!-- Constants -->
				<?php $constants = get_defined_constants(true); ?>
				<?php if (! empty($constants['user'])) : ?>
					<h3>Constants</h3>

					<table>
						<thead>
							<tr>
								<th>Key</th>
								<th>Value</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($constants['user'] as $key => $value) : ?>
							<tr>
<<<<<<< HEAD
								<td><?= esc($key) ?></td>
								<td>
									<?php if (is_string($value)) : ?>
										<?= esc($value) ?>
									<?php else: ?>
										<pre><?= esc(print_r($value, true)) ?></pre>
=======
								<td><?= htmlspecialchars($key, ENT_IGNORE, 'UTF-8') ?></td>
								<td>
									<?php if (! is_array($value) && ! is_object($value)) : ?>
										<?= htmlspecialchars($value, ENT_SUBSTITUTE, 'UTF-8') ?>
									<?php else: ?>
										<?= '<pre>' . print_r($value, true) ?>
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				<?php endif; ?>
			</div>

			<!-- Request -->
			<div class="content" id="request">
				<?php $request = \Config\Services::request(); ?>

				<table>
					<tbody>
						<tr>
							<td style="width: 10em">Path</td>
<<<<<<< HEAD
							<td><?= esc($request->uri) ?></td>
						</tr>
						<tr>
							<td>HTTP Method</td>
							<td><?= esc($request->getMethod(true)) ?></td>
						</tr>
						<tr>
							<td>IP Address</td>
							<td><?= esc($request->getIPAddress()) ?></td>
=======
							<td><?= $request->uri ?></td>
						</tr>
						<tr>
							<td>HTTP Method</td>
							<td><?= $request->getMethod(true) ?></td>
						</tr>
						<tr>
							<td>IP Address</td>
							<td><?= $request->getIPAddress() ?></td>
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
						</tr>
						<tr>
							<td style="width: 10em">Is AJAX Request?</td>
							<td><?= $request->isAJAX() ? 'yes' : 'no' ?></td>
						</tr>
						<tr>
							<td>Is CLI Request?</td>
							<td><?= $request->isCLI() ? 'yes' : 'no' ?></td>
						</tr>
						<tr>
							<td>Is Secure Request?</td>
							<td><?= $request->isSecure() ? 'yes' : 'no' ?></td>
						</tr>
						<tr>
							<td>User Agent</td>
<<<<<<< HEAD
							<td><?= esc($request->getUserAgent()->getAgentString()) ?></td>
=======
							<td><?= $request->getUserAgent()->getAgentString() ?></td>
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
						</tr>

					</tbody>
				</table>


				<?php $empty = true; ?>
				<?php foreach (['_GET', '_POST', '_COOKIE'] as $var) : ?>
					<?php if (empty($GLOBALS[$var]) || ! is_array($GLOBALS[$var]))
					{
						continue;
					} ?>

					<?php $empty = false; ?>

<<<<<<< HEAD
					<h3>$<?= esc($var) ?></h3>
=======
					<h3>$<?= $var ?></h3>
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b

					<table style="width: 100%">
						<thead>
							<tr>
								<th>Key</th>
								<th>Value</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($GLOBALS[$var] as $key => $value) : ?>
							<tr>
<<<<<<< HEAD
								<td><?= esc($key) ?></td>
								<td>
									<?php if (is_string($value)) : ?>
										<?= esc($value) ?>
									<?php else: ?>
										<pre><?= esc(print_r($value, true)) ?></pre>
=======
								<td><?= htmlspecialchars($key, ENT_IGNORE, 'UTF-8') ?></td>
								<td>
									<?php if (! is_array($value) && ! is_object($value)) : ?>
										<?= htmlspecialchars($value, ENT_SUBSTITUTE, 'UTF-8') ?>
									<?php else: ?>
										<?= '<pre>' . print_r($value, true) ?>
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>

				<?php endforeach ?>

				<?php if ($empty) : ?>

					<div class="alert">
						No $_GET, $_POST, or $_COOKIE Information to show.
					</div>

				<?php endif; ?>

				<?php $headers = $request->getHeaders(); ?>
				<?php if (! empty($headers)) : ?>

					<h3>Headers</h3>

					<table>
						<thead>
							<tr>
								<th>Header</th>
								<th>Value</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($headers as $value) : ?>
							<?php if (empty($value))
							{
								continue;
							} ?>
							<?php if (! is_array($value))
							{
								$value = [$value];
							} ?>
							<?php foreach ($value as $h) : ?>
								<tr>
									<td><?= esc($h->getName(), 'html') ?></td>
									<td><?= esc($h->getValueLine(), 'html') ?></td>
								</tr>
							<?php endforeach; ?>
						<?php endforeach; ?>
						</tbody>
					</table>

				<?php endif; ?>
			</div>

			<!-- Response -->
			<?php
				$response = \Config\Services::response();
				$response->setStatusCode(http_response_code());
			?>
			<div class="content" id="response">
				<table>
					<tr>
						<td style="width: 15em">Response Status</td>
<<<<<<< HEAD
						<td><?= esc($response->getStatusCode() . ' - ' . $response->getReason()) ?></td>
=======
						<td><?= $response->getStatusCode() . ' - ' . $response->getReason() ?></td>
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
					</tr>
				</table>

				<?php $headers = $response->getHeaders(); ?>
				<?php if (! empty($headers)) : ?>
					<?php natsort($headers) ?>

					<h3>Headers</h3>

					<table>
						<thead>
							<tr>
								<th>Header</th>
								<th>Value</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($headers as $name => $value) : ?>
							<tr>
								<td><?= esc($name, 'html') ?></td>
								<td><?= esc($response->getHeaderLine($name), 'html') ?></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>

				<?php endif; ?>
			</div>

			<!-- Files -->
			<div class="content" id="files">
				<?php $files = get_included_files(); ?>

				<ol>
				<?php foreach ($files as $file) :?>
<<<<<<< HEAD
					<li><?= esc(static::cleanPath($file)) ?></li>
=======
					<li><?= htmlspecialchars( static::cleanPath($file), ENT_SUBSTITUTE, 'UTF-8') ?></li>
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
				<?php endforeach ?>
				</ol>
			</div>

			<!-- Memory -->
			<div class="content" id="memory">

				<table>
					<tbody>
						<tr>
							<td>Memory Usage</td>
<<<<<<< HEAD
							<td><?= esc(static::describeMemory(memory_get_usage(true))) ?></td>
						</tr>
						<tr>
							<td style="width: 12em">Peak Memory Usage:</td>
							<td><?= esc(static::describeMemory(memory_get_peak_usage(true))) ?></td>
						</tr>
						<tr>
							<td>Memory Limit:</td>
							<td><?= esc(ini_get('memory_limit')) ?></td>
=======
							<td><?= static::describeMemory(memory_get_usage(true)) ?></td>
						</tr>
						<tr>
							<td style="width: 12em">Peak Memory Usage:</td>
							<td><?= static::describeMemory(memory_get_peak_usage(true)) ?></td>
						</tr>
						<tr>
							<td>Memory Limit:</td>
							<td><?= ini_get('memory_limit') ?></td>
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
						</tr>
					</tbody>
				</table>

			</div>

		</div>  <!-- /tab-content -->

	</div> <!-- /container -->

	<div class="footer">
		<div class="container">

			<p>
<<<<<<< HEAD
				Displayed at <?= esc(date('H:i:sa')) ?> &mdash;
				PHP: <?= esc(phpversion()) ?>  &mdash;
				CodeIgniter: <?= esc(\CodeIgniter\CodeIgniter::CI_VERSION) ?>
=======
				Displayed at <?= date('H:i:sa') ?> &mdash;
				PHP: <?= phpversion() ?>  &mdash;
				CodeIgniter: <?= \CodeIgniter\CodeIgniter::CI_VERSION ?>
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			</p>

		</div>
	</div>

</body>
</html>
