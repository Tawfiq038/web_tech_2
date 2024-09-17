<?php
// /controllers/AuthController.php
require_once '../models/User.php';

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (User::login($email, $password)) {
                session_start();
                $_SESSION['email'] = $email;
                header('Location: /public/index.php?page=home');
            } else {
                echo "Invalid email or password.";
            }
        }
        include '../views/login.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];
            $gender = $_POST['gender'];
            $phone = $_POST['phone'];

            if ($password === $confirmPassword && User::register($fullname, $email, $password, $gender, $phone)) {
                header('Location: /public/index.php?page=login');
            } else {
                echo "Registration failed. Passwords must match or user already exists.";
            }
        }
        include '../views/register.php';
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /public/index.php?page=login');
    }

    public function changePassword() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_SESSION['email'];
            $currentPassword = $_POST['current_password'];
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['confirm_password'];

            if ($newPassword === $confirmPassword && User::changePassword($email, $currentPassword, $newPassword)) {
                echo "Password changed successfully.";
            } else {
                echo "Failed to change password. Make sure passwords match and current password is correct.";
            }
        }
        include '../views/change_password.php';
    }
}
?>
