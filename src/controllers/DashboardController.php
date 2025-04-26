<?php
class DashboardController
{
    public function index()
    {
        // Load views
        require_once '../src/views/layouts/header.php';
        require_once '../src/views/layouts/sidebar.php';
        require_once '../src/views/dashboard.php';
        require_once '../src/views/layouts/footer.php';
    }
}
