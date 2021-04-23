<p class="debug-bar-alignRight">
	<a href="https://codeigniter4.github.io/CodeIgniter4/index.html" target="_blank" >Read the CodeIgniter docs...</a>
</p>

<table>
	<tbody>
		<tr>
			<td>CodeIgniter Version:</td>
			<td>{ ciVersion }</td>
		</tr>
		<tr>
			<td>PHP Version:</td>
			<td>{ phpVersion }</td>
		</tr>
		<tr>
			<td>PHP SAPI:</td>
			<td>{ phpSAPI }</td>
		</tr>
		<tr>
			<td>Environment:</td>
			<td>{ environment }</td>
		</tr>
		<tr>
			<td>Base URL:</td>
			<td>
				{ if $baseURL == '' }
					<div class="warning">
						The $baseURL should always be set manually to prevent possible URL personification from external parties.
					</div>
				{ else }
					{ baseURL }
				{ endif }
			</td>
		</tr>
		<tr>
<<<<<<< HEAD
			<td>Timezone:</td>
=======
			<td>TimeZone:</td>
>>>>>>> 9111f84c46bc730ffb4db5942aa61e6545f2194b
			<td>{ timezone }</td>
		</tr>
		<tr>
			<td>Locale:</td>
			<td>{ locale }</td>
		</tr>
		<tr>
			<td>Content Security Policy Enabled:</td>
			<td>{ if $cspEnabled } Yes { else } No { endif }</td>
		</tr>
	</tbody>
</table>
