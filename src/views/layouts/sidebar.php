<aside class="w-72 bg-white shadow-lg min-h-screen flex flex-col">
    <div class="p-6 border-b border-gray-200">
        <h1 class="text-xl font-extrabold text-gray-900 text-center tracking-tight">
            Mondus | <span class="text-gray-500 font-medium">Finance Management</span>
        </h1>
    </div>
    <nav class="mt-6 flex-1 overflow-y-auto">
        <ul class="space-y-1 px-3">
            <?php
            $current_page = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), ".php");
            ?>
            <li>
                <a href="dashboard.php" class="flex items-center p-3 text-gray-700 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition-colors duration-150 
                    <?php echo $current_page === 'dashboard' ? 'bg-gray-100 text-gray-900 font-medium' : ''; ?>">
                    <i class="fas fa-chart-pie w-6 text-gray-500"></i>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <!-- <li>
                <a href="payroll.php" class="flex items-center p-3 text-gray-700 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition-colors duration-150 
                    <?php echo $current_page === 'payroll' ? 'bg-gray-100 text-gray-900 font-medium' : ''; ?>">
                    <i class="fas fa-money-bill-wave w-6 text-gray-500"></i>
                    <span class="ml-3">Payroll & Compensation</span>
                </a>
            </li>
            <li>
                <a href="commissions.php" class="flex items-center p-3 text-gray-700 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition-colors duration-150 
                    <?php echo $current_page === 'commissions' ? 'bg-gray-100 text-gray-900 font-medium' : ''; ?>">
                    <i class="fas fa-gift w-6 text-gray-500"></i>
                    <span class="ml-3">Salary & Incentives</span>
                </a>
            </li> -->
            <li>
                <a href="transactions.php" class="flex items-center p-3 text-gray-700 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition-colors duration-150 
                    <?php echo $current_page === 'transactions' ? 'bg-gray-100 text-gray-900 font-medium' : ''; ?>">
                    <i class="fas fa-exchange-alt w-6 text-gray-500"></i>
                    <span class="ml-3">Transactions & Expenses</span>
                </a>
            </li>
            <li>
                <a href="invoices.php" class="flex items-center p-3 text-gray-700 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition-colors duration-150 
                    <?php echo $current_page === 'invoices' ? 'bg-gray-100 text-gray-900 font-medium' : ''; ?>">
                    <i class="fas fa-file-invoice-dollar w-6 text-gray-500"></i>
                    <span class="ml-3">Invoices & Payments</span>
                </a>
            </li>
            <li>
                <a href="reports.php" class="flex items-center p-3 text-gray-700 hover:bg-gray-50 hover:text-gray-900 rounded-lg transition-colors duration-150 
                    <?php echo $current_page === 'reports' ? 'bg-gray-100 text-gray-900 font-medium' : ''; ?>">
                    <i class="fas fa-chart-line w-6 text-gray-500"></i>
                    <span class="ml-3">Reports & Analytics</span>
                </a>
            </li>
        </ul>
    </nav>
    <div class="p-4 border-t border-gray-200 text-center">
        <p class="text-xs text-gray-500">© <?php echo date('Y'); ?> Mondus. All rights reserved.</p>
        <p class="text-xs text-gray-500">
            Powered by
            <a href="https://vortexweb.cloud/" class="text-gray-800 hover:underline" target="_blank">VortexWeb</a>
        </p>
    </div>
</aside>