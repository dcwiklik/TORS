<?php

use Booking\App;

error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'vendor/autoload.php';

$app = new App();
$demo = \Booking\Demo::run($app);

?>

<head><title><?php echo $app->getService('config')->get('title'); ?></title></head>

<table width="100%">
<tr>
    <td>
        <h2>Hotel</h2>
        <?php var_dump($demo['hotel']); ?>
    </td>

    <td>
        <h2>Restaurant</h2>
        <?php var_dump($demo['restaurant']); ?>
    </td>
</tr>

</table>