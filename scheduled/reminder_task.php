<?php
// Dynamically get root path regardless of how PHP is run
$root = realpath(__DIR__ . '/../');
// Load config first
require_once $root . '/app/core/config.php';
// Include required files using absolute paths
require_once $root . '/app/core/Database.php';
require_once $root . '/app/models/LogData.php';
require_once $root . '/vendor/autoload.php';
// require_once __DIR__ . '/send_email.php';

// sendTestEmail('lehanselaka@gmail.com');

// Create an instance of the model
$log = new LogData();
$log->insertLog("System Check EMail Trigger.");

// $log->checkEvents();
// $log->checkExpiredDonationReq();
// $log->closeOldLostAndFound();
$log->closeOldApp();
$log->checkUpcommingApp();

echo "Reminder task ran successfully.";
?>
