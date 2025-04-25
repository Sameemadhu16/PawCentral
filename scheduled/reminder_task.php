<?php
// Dynamically get root path regardless of how PHP is run
$root = realpath(__DIR__ . '/../');
// Load config first
require_once $root . '/app/core/config.php';
// Include required files using absolute paths
require_once $root . '/app/core/Database.php';
require_once $root . '/app/models/LogData.php';

// Create an instance of the model
$log = new LogData();
$log->insertLog("System Check Trigger.");

$log->checkEvents();
$log->checkExpiredDonationReq();
$log->closeOldLostAndFound();

echo "Reminder task ran successfully.";
?>
