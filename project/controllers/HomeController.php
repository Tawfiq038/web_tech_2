<?php
// /controllers/HomeController.php

class HomeController {
    public function home() {
        if (!isset($_SESSION['email'])) {
            header('Location: /public/index.php?page=login');
        }
        include '../views/home.php';
    }
}
?>
