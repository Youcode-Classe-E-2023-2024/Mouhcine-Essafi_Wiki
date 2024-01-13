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

        $query = "SELECT * FROM users WHERE email = :email";
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

        $_SESSION["id"] = $userData['user_id'];
        $_SESSION["name"] = $userData['first_name'];
        $_SESSION["role"] = $userData['role'];
        return intval($userData['user_id']);
    }

    public function countUsers()
    {
        $query = "SELECT COUNT(*) FROM users";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        if (!$stmt) {
            die('Query failed: ' . $this->db->errorInfo()[2]);
        }

        return intval($stmt->fetchColumn());
    }

    private function validateEmail($email)
    {
        return (bool) filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    private function validatePassword($password)
    {
        return (bool) preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password);
    }
}
