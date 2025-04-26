<!-- public/reports.php -->
<main class="flex-1 p-6">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-2xl font-semibold text-gray-800">Lead Tracking & Metrics</h2>
        <p class="mt-2 text-gray-600 text-sm">Track and analyze lead statuses</p>
    </div>
    <section class="max-w-7xl mx-auto mt-8">
        <!-- Status Cards Grid -->
        <div id="status-cards" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Skeleton Loading Cards -->
            <?php for ($i = 0; $i < 14; $i++): ?>
                <div class="bg-white rounded-lg p-6 shadow-md border border-gray-200 animate-pulse">
                    <div class="h-4 bg-gray-300 rounded mb-2"></div>
                    <div class="h-8 bg-gray-300 rounded w-1/2"></div>
                </div>
            <?php endfor; ?>
        </div>
    </section>

    <!-- Opportunities Section -->
    <div class="max-w-7xl mx-auto mt-8">
        <h2 class="text-2xl font-semibold text-gray-800">Opportunities from leads</h2>
        <p class="mt-2 text-gray-600 text-sm">Track total amount from different leads</p>
    </div>

    <section class="max-w-7xl mx-auto mt-8">
        <div id="opportunity-cards" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Skeleton Loading Cards -->
            <?php for ($i = 0; $i < 14; $i++): ?>
                <div class="bg-white rounded-lg p-6 shadow-md border border-gray-200 animate-pulse">
                    <div class="h-4 bg-gray-300 rounded mb-2"></div>
                    <div class="h-8 bg-gray-300 rounded w-1/2"></div>
                </div>
            <?php endfor; ?>
        </div>
    </section>

    <script>
        const STATUS_LABELS = {
            'NEW': 'New Leads',
            'IN_PROCESS': 'Assigned Leads',
            'UC_D8R7A2': 'Owner Data',
            'PROCESSED': 'No Answer',
            'UC_EU1DSN': 'Contacted',
            'UC_LX1OM8': 'Qualified',
            'UC_D1TW61': 'Viewing Meeting Scheduled',
            'UC_UC1880': 'Rescheduled',
            'UC_P5ICBK': 'Offer Negotiation',
            'UC_SVI0LM': 'Document Collection',
            "UC_O2E1T3": "Form B Request",
            "UC_IWPVRY": "Form F Request",
            "CONVERTED": "Closed",
            "JUNK": "Junk Lead",
            "1": "Not interested",
            "2": "Switch Off"
        };

        const STATUS_COLORS = {
            'NEW': 'text-sky-400',
            'IN_PROCESS': 'text-sky-300',
            'UC_D8R7A2': 'text-cyan-400',
            'PROCESSED': 'text-cyan-300',
            'UC_EU1DSN': 'text-sky-400',
            'UC_LX1OM8': 'text-lime-400',
            'UC_D1TW61': 'text-cyan-400',
            'UC_UC1880': 'text-amber-400',
            'UC_P5ICBK': 'text-rose-400',
            'UC_SVI0LM': 'text-blue-400',
            'UC_O2E1T3': 'text-green-600',
            'UC_IWPVRY': 'text-sky-400',
            'CONVERTED': 'text-lime-400',
            'JUNK': 'text-rose-400',
            '1': 'text-rose-400',
            '2': 'text-rose-400'
        };

        // Create loading placeholders
        function createLoadingCards() {
            const statusCardsContainer = document.getElementById('status-cards');
            const opportunityCardsContainer = document.getElementById('opportunity-cards');

            statusCardsContainer.innerHTML = '';
            opportunityCardsContainer.innerHTML = '';

            Object.keys(STATUS_LABELS).forEach(status => {
                const loadingCard = document.createElement('div');
                loadingCard.className = 'bg-white rounded-lg p-6 shadow-sm border border-gray-200';
                loadingCard.id = `status-card-${status}`;
                loadingCard.innerHTML = `
            <div class="${STATUS_COLORS[status] || 'text-gray-600'} text-sm mb-2">${STATUS_LABELS[status]}</div>
            <div class="text-3xl font-semibold animate-pulse bg-gray-200 h-8 w-24 rounded"></div>
        `;
                statusCardsContainer.appendChild(loadingCard);

                const opportunityLoadingCard = loadingCard.cloneNode(true);
                opportunityLoadingCard.id = `opportunity-card-${status}`;
                opportunityCardsContainer.appendChild(opportunityLoadingCard);
            });
        }

        function loadStatusData() {
            // Start fetching each status one by one
            const statuses = Object.keys(STATUS_LABELS);
            let index = 0;

            function loadNextStatus() {
                if (index >= statuses.length) return;

                const status = statuses[index];
                index++;

                fetchLeadsByStatus(status)
                    .then(leads => {
                        // Update count card
                        const count = leads.length;
                        updateSingleStatusCard(status, count);

                        // Update opportunity card
                        const sum = leads.reduce((sum, lead) => sum + (parseFloat(lead.OPPORTUNITY) || 0), 0);
                        updateSingleOpportunityCard(status, sum);

                        // Load next status after a small delay for visual effect
                        setTimeout(loadNextStatus, 100);
                    })
                    .catch(error => {
                        console.error(`Error fetching ${status} leads:`, error);
                        updateSingleStatusCard(status, 'Error');
                        updateSingleOpportunityCard(status, 'Error');

                        // Continue with next status even if this one failed
                        setTimeout(loadNextStatus, 100);
                    });
            }

            // Start the loading sequence
            loadNextStatus();
        }

        async function fetchLeadsByStatus(status) {
            const allLeads = [];
            let start = 0;

            try {
                // Fetch leads with the specific status
                while (true) {
                    const response = await fetch(`https://mondus.group/rest/1/dw9gd4xauhctd7ha/crm.lead.list?filter[STATUS_ID]=${status}&start=${start}&select[0]=ID&select[1]=OPPORTUNITY`);
                    const data = await response.json();

                    if (!data.result || data.result.length === 0) {
                        break;
                    }

                    allLeads.push(...data.result);

                    if (!data.next) {
                        break;
                    }

                    start = data.next;
                }

                return allLeads;
            } catch (error) {
                console.error(`Error fetching ${status} leads:`, error);
                throw error;
            }
        }

        function updateSingleStatusCard(status, count) {
            const cardElement = document.getElementById(`status-card-${status}`);
            if (!cardElement) return;

            const label = STATUS_LABELS[status] || status;
            const colorClass = STATUS_COLORS[status] || 'text-gray-600';
            const formattedValue = typeof count === 'number' ? count.toLocaleString() : count;

            cardElement.innerHTML = `
        <div class="${colorClass} text-sm mb-2">${label}</div>
        <div class="text-3xl font-semibold">${formattedValue}</div>
    `;

            // Add a fade-in effect
            cardElement.classList.add('transition-opacity', 'duration-500');
            cardElement.style.opacity = '1';
        }

        function updateSingleOpportunityCard(status, sum) {
            const cardElement = document.getElementById(`opportunity-card-${status}`);
            if (!cardElement) return;

            const label = STATUS_LABELS[status] || status;
            const colorClass = STATUS_COLORS[status] || 'text-gray-600';
            const formattedValue = typeof sum === 'number' ?
                `AED ${sum.toLocaleString(undefined, { maximumFractionDigits: 2 })}` : sum;

            cardElement.innerHTML = `
        <div class="${colorClass} text-sm mb-2">${label}</div>
        <div class="text-3xl font-semibold">${formattedValue}</div>
    `;

            // Add a fade-in effect
            cardElement.classList.add('transition-opacity', 'duration-500');
            cardElement.style.opacity = '1';
        }

        document.addEventListener('DOMContentLoaded', () => {
            createLoadingCards();
            loadStatusData();
        });
    </script>
</main>