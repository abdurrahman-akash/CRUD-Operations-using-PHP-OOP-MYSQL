<?php

class Migration {
    private $connect;

    public function __construct($dbHost, $dbName, $dbUser, $dbPass) {
        $this->connect = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
        $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function up() {
        $sql = "CREATE TABLE IF NOT EXISTS students (
            student_id VARCHAR(20) PRIMARY KEY,  -- Allow user-defined Student ID
            name VARCHAR(100) NOT NULL,
            department VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            phone_number VARCHAR(15) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        $this->connect->exec($sql);
        echo "Table 'students' created successfully.\n";
    }

    public function down() {
        $sql = "DROP TABLE IF EXISTS students";
        $this->connect->exec($sql);
        echo "Table 'students' dropped successfully.\n";
    }
}
    // Database connection parameters
$dbHost = 'localhost';
$dbName = 'studentdb';
$dbUser = 'root'; // Your MySQL username
$dbPass = ''; // Your MySQL password

// Create a new Migration instance
$migration = new Migration($dbHost, $dbName, $dbUser, $dbPass);

// Run the migration
$migration->up();
// To drop the table, you could run: $migration->down();
?>