<?php

class UserRegistration
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function registerUser($first_name, $last_name, $email, $password)
    {
        // Validate input data
        if (!$this->validateEmail($email) || empty($first_name) || empty($last_name) || empty($email)) {
            return "Invalid input data";
        }

        // Use prepared statement to prevent SQL injection
        $checkQuery = "SELECT user_id FROM users WHERE email = :email";
        $checkStmt = $this->db->prepare($checkQuery);
        $checkStmt->bindParam(':email', $email);
        $checkStmt->execute();

        if (!$checkStmt) {
            die('Query failed: ' . $this->db->errorInfo()[2]);
        }

        if ($checkStmt->rowCount() > 0) {
            return "Email already registered";
        }

        // Escape input data to prevent SQL injection
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user into the database using prepared statement
        $insertQuery = "INSERT INTO users (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :hashedPassword)";
        $insertStmt = $this->db->prepare($insertQuery);
        $insertStmt->bindParam(':first_name', $first_name);
        $insertStmt->bindParam(':last_name', $last_name);
        $insertStmt->bindParam(':email', $email);
        $insertStmt->bindParam(':hashedPassword', $hashedPassword);
        $insertStmt->execute();

        if (!$insertStmt) {
            die('Query failed: ' . $this->db->errorInfo()[2]);
        }

        // Return success message or user ID, depending on your application needs
        return "Registration successful";
    }

    private function validateEmail($email)
    {
        // Add your own validation rules for the email address
        return (bool) filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    // You can keep the existing password validation function if needed
    private function validatePassword($password)
    {
        // Add your own validation rules for the password
        return (bool) preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password);
    }
}
?>

