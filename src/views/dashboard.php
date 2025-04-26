<main class="flex-1 p-6">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-2xl font-semibold text-gray-800">Dashboard</h2>
        <p class="mt-2 text-gray-600 text-sm">Financial Overview & Key Metrics</p>
    </div>

    <!-- Key Metrics Summary -->
    <section class="max-w-7xl mx-auto mt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div id="total-leads" class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
                <div class="text-blue-400 text-sm mb-2">Total Leads</div>
                <div class="text-3xl font-semibold animate-pulse bg-gray-200 h-8 w-24 rounded"></div>
            </div>
            <div id="potential-revenue" class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
                <div class="text-emerald-400 text-sm mb-2">Potential Revenue</div>
                <div class="text-3xl font-semibold animate-pulse bg-gray-200 h-8 w-24 rounded"></div>
            </div>
            <div id="conversion-rate" class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
                <div class="text-violet-400 text-sm mb-2">Conversion Rate</div>
                <div class="text-3xl font-semibold animate-pulse bg-gray-200 h-8 w-24 rounded"></div>
            </div>
            <div id="meetings-booked" class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
                <div class="text-rose-400 text-sm mb-2">Meetings Booked</div>
                <div class="text-3xl font-semibold animate-pulse bg-gray-200 h-8 w-24 rounded"></div>
            </div>
        </div>
    </section>

    <!-- Charts Section -->
    <section class="max-w-7xl mx-auto mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Lead Status Distribution Chart -->
        <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Lead Status Distribution</h3>
            <div id="lead-distribution-chart" class="h-64">
                <canvas></canvas>
            </div>
        </div>

        <!-- Revenue by Status Chart -->
        <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
            <h3 class="text-lg font-medium text-gray-800 mb-4">Potential Revenue by Status</h3>
            <div id="revenue-chart" class="h-64">
                <canvas></canvas>
            </div>
        </div>
    </section>

    <!-- Quick Links Section -->
    <section class="max-w-7xl mx-auto mt-8">
        <h3 class="text-lg font-medium text-gray-800 mb-4">Quick Access</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="reports.php" class="group">
                <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200 flex items-center transition-all duration-300 group-hover:shadow-md group-hover:border-blue-300">
                    <div class="rounded-full bg-blue-100 p-3 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-800">Lead Reports</h4>
                        <p class="text-sm text-gray-500">View detailed lead metrics</p>
                    </div>
                </div>
            </a>

            <a href="transactions.php" class="group">
                <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200 flex items-center transition-all duration-300 group-hover:shadow-md group-hover:border-emerald-300">
                    <div class="rounded-full bg-emerald-100 p-3 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2m-2-4v2" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-800">Transactions & Expenses</h4>
                        <p class="text-sm text-gray-500">Track financial movements</p>
                    </div>
                </div>
            </a>

            <a href="invoices.php" class="group">
                <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200 flex items-center transition-all duration-300 group-hover:shadow-md group-hover:border-violet-300">
                    <div class="rounded-full bg-violet-100 p-3 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-violet-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01m-.01 4h.01" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-800">Invoices and Payments</h4>
                        <p class="text-sm text-gray-500">Manage billing records</p>
                    </div>
                </div>
            </a>

            <a href="https://b24-oy9apg.bitrix24.com/crm/lead/details/0/" target="_blank" class="group">
                <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200 flex items-center transition-all duration-300 group-hover:shadow-md group-hover:border-amber-300">
                    <div class="rounded-full bg-amber-100 p-3 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-800">Create Lead</h4>
                        <p class="text-sm text-gray-500">Add a new lead to the system</p>
                    </div>
                </div>
            </a>
        </div>
    </section>

    <!-- JavaScript for Charts and Data Loading -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const STATUS_LABELS = {
            'NEW': 'New Leads',
            'IN_PROCESS': 'Assigned Leads',
            'PROCESSED': 'No Answer',
            'UC_XQM48B': 'Qualified',
            '2': 'Not Interested',
            '4': 'Meeting Booked',
            '5': 'Meeting Done',
            '3': 'Closed',
            '6': 'Invalid Number',
            '7': 'Never Answered',
            'CALLBACK': 'Call Back',
            'UC_YNWQMM': 'Lead Pool',
            'UC_1Y6ZZ6': 'Agent',
            'UC_DW2DBL': 'System Use',
            'JUNK': 'Junk Leads',
            'CONVERTED': 'Good Leads',
        };

        const STATUS_COLORS = {
            'NEW': '#60a5fa',
            'IN_PROCESS': '#34d399',
            'PROCESSED': '#fbbf24',
            'UC_XQM48B': '#818cf8',
            '2': '#fb7185',
            '4': '#a78bfa',
            '5': '#f472b6',
            '3': '#94a3b8',
            '6': '#fb923c',
            '7': '#2dd4bf',
            'CALLBACK': '#22d3ee',
            'UC_YNWQMM': '#a3e635',
            'UC_1Y6ZZ6': '#4ade80',
            'UC_DW2DBL': '#fbbf24',
            'JUNK': '#d946ef',
            'CONVERTED': '#38bdf8'
        };

        // Initialize Charts
        let leadDistributionChart = null;
        let revenueChart = null;

        // Chart initialization with better defaults
        function initializeCharts() {
            const distributionCtx = document.querySelector('#lead-distribution-chart canvas');
            leadDistributionChart = new Chart(distributionCtx, {
                type: 'doughnut',
                data: {
                    labels: [],
                    datasets: [{
                        data: [],
                        backgroundColor: [],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                boxWidth: 12,
                                font: {
                                    size: 11
                                }
                            }
                        }
                    },
                    animation: false // Disable animation for faster rendering
                }
            });

            const revenueCtx = document.querySelector('#revenue-chart canvas');
            revenueChart = new Chart(revenueCtx, {
                type: 'bar',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Potential Revenue (AED)',
                        data: [],
                        backgroundColor: [],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    animation: false
                }
            });
        }

        // Batch DOM updates
        function updateSummaryCards({
            totalLeads,
            totalOpportunity,
            conversionRate,
            meetingsBooked
        }) {
            const updates = [
                ['total-leads', 'Total Leads', 'text-blue-400', totalLeads.toLocaleString()],
                ['potential-revenue', 'Potential Revenue', 'text-emerald-400', `AED ${totalOpportunity.toLocaleString(undefined, { maximumFractionDigits: 2 })}`],
                ['conversion-rate', 'Conversion Rate', 'text-violet-400', `${conversionRate}%`],
                ['meetings-booked', 'Meetings Booked', 'text-rose-400', meetingsBooked.toLocaleString()]
            ];

            updates.forEach(([id, label, colorClass, value]) => {
                const element = document.getElementById(id);
                element.innerHTML = `
            <div class="${colorClass} text-sm mb-2">${label}</div>
            <div class="text-3xl font-semibold">${value}</div>
        `;
            });
        }

        // Optimized chart updates with data limits
        function updateLeadDistributionChart(statuses, statusData) {
            const limitedStatuses = statuses.slice(0, 10); // Limit to top 10 statuses
            const labels = limitedStatuses.map(status => STATUS_LABELS[status] || status);
            const data = limitedStatuses.map(status => statusData[status]);
            const backgroundColor = limitedStatuses.map(status => STATUS_COLORS[status]);

            leadDistributionChart.data.labels = labels;
            leadDistributionChart.data.datasets[0].data = data;
            leadDistributionChart.data.datasets[0].backgroundColor = backgroundColor;
            leadDistributionChart.update('none'); // No animation
        }

        function updateRevenueChart(statuses, revenueData) {
            const sortedStatuses = statuses.sort((a, b) => revenueData[b] - revenueData[a]).slice(0, 8);
            const labels = sortedStatuses.map(status => STATUS_LABELS[status] || status);
            const data = sortedStatuses.map(status => revenueData[status]);
            const backgroundColor = sortedStatuses.map(status => STATUS_COLORS[status]);

            revenueChart.data.labels = labels;
            revenueChart.data.datasets[0].data = data;
            revenueChart.data.datasets[0].backgroundColor = backgroundColor;
            revenueChart.update('none');
        }

        // Optimized fetch with caching and timeout
        async function fetchLeadsByStatus(status) {
            const allLeads = [];
            let start = 0;
            const timeout = 5000; // 5 second timeout per request

            try {
                while (true) {
                    const controller = new AbortController();
                    const timeoutId = setTimeout(() => controller.abort(), timeout);

                    const response = await fetch(
                        `https://mondus.group/rest/1/dw9gd4xauhctd7ha/crm.lead.list?filter[STATUS_ID]=${status}&start=${start}&select[0]=ID&select[1]=OPPORTUNITY`, {
                            signal: controller.signal
                        }
                    );

                    clearTimeout(timeoutId);
                    const data = await response.json();

                    if (!data.result || data.result.length === 0) break;

                    allLeads.push(...data.result);
                    if (!data.next) break;

                    start = data.next;
                    await new Promise(resolve => setTimeout(resolve, 100)); // Rate limiting
                }
            } catch (error) {
                console.error(`Error fetching ${status} leads:`, error);
            }
            return allLeads;
        }

        // Main data loading with better error handling and optimization
        async function loadDashboardData() {
            try {
                const statuses = Object.keys(STATUS_LABELS);
                const statusPromises = statuses.map(status =>
                    fetchLeadsByStatus(status).catch(() => [])
                );

                const allLeadsArrays = await Promise.all(statusPromises);

                // Use Map for better performance with large datasets
                const statusData = new Map();
                const revenueData = new Map();
                let totalLeads = 0,
                    totalOpportunity = 0,
                    meetingsBooked = 0,
                    convertedLeads = 0;

                statuses.forEach((status, index) => {
                    const leads = allLeadsArrays[index];
                    const count = leads.length;
                    const opportunity = leads.reduce((sum, lead) =>
                        sum + (parseFloat(lead.OPPORTUNITY) || 0), 0);

                    statusData.set(status, count);
                    revenueData.set(status, opportunity);

                    totalLeads += count;
                    totalOpportunity += opportunity;

                    if (status === '4') meetingsBooked = count;
                    if (status === 'CONVERTED') convertedLeads = count;
                });

                const conversionRate = totalLeads > 0 ?
                    ((convertedLeads / totalLeads) * 100).toFixed(1) : 0;

                // Batch DOM updates
                updateSummaryCards({
                    totalLeads,
                    totalOpportunity,
                    conversionRate,
                    meetingsBooked
                });

                const filteredStatuses = statuses.filter(status => statusData.get(status) > 0);

                // Update charts in microtasks to prevent blocking
                queueMicrotask(() => {
                    updateLeadDistributionChart(filteredStatuses, statusData);
                    updateRevenueChart(filteredStatuses, revenueData);
                });

            } catch (error) {
                console.error('Error loading dashboard data:', error);
            }
        }

        // Initialize when DOM is ready
        document.addEventListener('DOMContentLoaded', () => {
            initializeCharts();
            loadDashboardData();
        });
    </script>
</main>