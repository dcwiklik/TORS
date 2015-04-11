<?php

use Booking\App;

error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'vendor/autoload.php';

define('APP_ROOT', __DIR__ . DIRECTORY_SEPARATOR);

$app = new App();
$demo = \Booking\Demo::run($app);

?>

<head><title><?= $app->get('config')->getParameter('title') . ' ' . $app->get('config')->getParameter('version'); ?></title></head>

<table width="100%">
<tr>

    <?php foreach ($demo as $place => $item) { ?>

        <td>
            <h2><?php echo $place; ?></h2>

            <h4>Parametry</h4>
            <ul>
                <li><?php echo $item->getName(); ?></li>
                <li><?php echo $item->getContact()->getPhone(); ?></li>
            </ul>

            <h4>Godziny</h4>
            <ul>
                <?php

                $hoursIterator = $item->getHours()->getIterator();
                $hoursIterator->rewind();

                while($hoursIterator->valid()) {

                    $dayHours = $hoursIterator->current();

                    echo '<li>' . $hoursIterator->key() . ' - ' . (count($dayHours) ? implode(', ', $dayHours) : 'Brak') . '</li>';

                    $hoursIterator->next();
                }

                ?>
            </ul>

            <h4>Rezerwacje</h4>
            <ul>
                <?php

                $reservationsIterator = $item->getReservations()->getIterator();
                $reservationsIterator->rewind();

                while($reservationsIterator->valid()) {

                    $reservation = $reservationsIterator->current();

                    echo '<li>' . $reservation->getDatetimeFrom()->format('Y-m-d H:i:s') . '</li>';

                    $reservationsIterator->next();
                }

                ?>
            </ul>

        </td>

    <?php } ?>

</tr>

</table>
