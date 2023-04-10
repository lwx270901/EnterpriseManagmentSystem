<!-- (configuration file for connecting to the database) -->
<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'enterprise_db');
define('DB_USER', 'root');
define('DB_PASS', '');

// Set up PDO database connection
try {
  $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Error connecting to database: " . $e->getMessage();
  exit();
}

// User class autoloading
spl_autoload_register(function ($class_name) {
  include 'classes/' . $class_name . '.php';
});

// Start session
session_start();

// Create User object
// We can create all object to perform operation heare and include in file that need to use
$user = new User($db);
$task = new Task($db);
$review = new Review($db)

?>