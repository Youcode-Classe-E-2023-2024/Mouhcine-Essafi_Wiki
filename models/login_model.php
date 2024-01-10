<?php

class UserLogin
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function loginUser($email, $password)
    {
        // Validate input data
        // || (!$this->validatePassword($password))
        if (!$this->validateEmail($email)) {
            return "Invalid Email";
        }

        // Use prepared statement to prevent SQL injection
        $query = "SELECT user_id, password FROM users WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if (!$stmt) {
            die('Query failed: ' . $this->db->errorInfo()[2]);
        }

        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the email exists
        if (!$userData) {
            return "Email not registered";
        }

        // Verify the password
        if (!password_verify($password, $userData['password'])) {
            return "Invalid password";
        }

        // Set user session or token for authentication
        // For simplicity, we'll just return the user ID in this example
        return intval($userData['user_id']);
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
