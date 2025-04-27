<?php

// Load your MVC framework bootstrap file if needed
require_once __DIR__ . '/../init.php'; // Adjust path based on your structure

use Models\CronLogModel;

// Optional: Log current timestamp
$logMessage = "Cron job ran at " . date('Y-m-d H:i:s');

$model = new CronLogModel();
$model->insertLog($logMessage);
