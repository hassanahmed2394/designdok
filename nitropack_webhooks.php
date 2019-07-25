<?php
define('NITROPACK_WEBHOOK_HANDLER', 1);
require_once('nitropack_include.php');

$nitro = new \NitroPack\NitroPack(NITROPACK_SITE_ID, NITROPACK_SITE_SECRET);

switch ($_GET['nitroWebhookType']) {
	case 'config':
		$nitro->fetchConfig();
		break;
	case 'cacheClear':
		if (isset($_GET['url'])) {
			$nitro->purgeCache($_GET['url'], null, \NitroPack\PurgeType::PAGECACHE_ONLY, 'Manual cache purge');
		} else {
			$nitro->clearPageCache('Manual cache purge');
		}
		break;
}

echo 'OK';
exit;