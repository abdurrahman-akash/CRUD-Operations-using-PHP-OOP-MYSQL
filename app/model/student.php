<?php

include_once "../database/Database.php";

use Database\Database;

class Student {
    private $connect;

    public function __construct() {
        $database = new Database();
        $this->connect = $database->getConnection();
    }

    // Create a new student
    public function create($student_id, $name, $department, $email, $phone_number) {
        $query = "INSERT INTO students (student_id, name, department, email, phone_number) 
                  VALUES (:student_id, :name, :department, :email, :phone_number)";
        $stmt = $this->connect->prepare($query);

    }

    public function read() {
        $query = "SELECT * FROM students";
        $statement = $this->connect->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($student_id, $name, $department, $email, $phone_number) {
        $query = "UPDATE students 
              SET name = :name, department = :department, email = :email, phone_number = :phone_number 
              WHERE student_id = :student_id";

        $statement = $this->connect->prepare($query);

        $statement->bindParam(':student_id', $student_id);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':department', $department);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':phone_number', $phone_number);

        return $statement->execute();
    }

    public function delete($student_id) {
        $query = "DELETE FROM students WHERE student_id = :student_id";
        $statement = $this->connect->prepare($query);
        $statement->bindParam(':student_id', $student_id);
        return $statement->execute();
    }
}
?>