<?php
class ReportsController
{
    public function index()
    {
        // Load views
        require_once '../src/views/layouts/header.php';
        require_once '../src/views/layouts/sidebar.php';
        require_once '../src/views/reports.php';
        require_once '../src/views/layouts/footer.php';
    }
}
