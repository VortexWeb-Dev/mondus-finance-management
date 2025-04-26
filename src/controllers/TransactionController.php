<?php
class TransactionController
{
    public function index()
    {
        // Load views
        require_once '../src/views/layouts/header.php';
        require_once '../src/views/layouts/sidebar.php';
        require_once '../src/views/transactions.php';
        require_once '../src/views/layouts/footer.php';
    }
}
