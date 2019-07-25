<?php
define('NITROPACK_ENABLED', 1);
/* In order to disable NitroPack, change the above line to:
define('NITROPACK_ENABLED', 0);
*/
/* In order to enable NitroPack only for one IP, replace it with the following snippet and use your IP instead of 10.20.30.40:
if ($_SERVER['REMOTE_ADDR'] == '10.20.30.40') {
	define('NITROPACK_ENABLED', 1);
} else {
	define('NITROPACK_ENABLED', 0);
}
*/

define('NITROPACK_SITE_ID',     'JdsuMuEoMznTmCsuNOcnadNrpwEniRfS');
define('NITROPACK_SITE_SECRET', 'ZPwWVpzRfLeDFJkMgZsC2uDJOmyDLaDw1OAb7BvkJCZviBEyNcKfUr3Bx0TDYnom');

require_once('NitroPackSDK/autoload.php');

if (defined('NITROPACK_ENABLED') && NITROPACK_ENABLED && !defined('NITROPACK_WEBHOOK_HANDLER')) {
	try {
		// Initialize the NitroPack SDK object
		$nitro = new \NitroPack\NitroPack(NITROPACK_SITE_ID, NITROPACK_SITE_SECRET);
		$layout = 'no-layout-detected';
		if (isset($_SERVER['SCRIPT_NAME'])) { $layout = $_SERVER['SCRIPT_NAME']; }
		elseif (isset($_SERVER['PHP_SELF'])) { $layout = $_SERVER['PHP_SELF']; }
		$layout = md5($layout);

		if ($nitro->isCacheAllowed() && $nitro->hasCache($layout)) {
			$nitro->pageCache->readfile();
			exit;
		}
	} catch (\Exception $e) {
		// swallow exception and let the site render normally
	}
}