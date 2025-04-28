<!-- public/invoice.php -->
<main class="flex-1 p-8 bg-gray-50 min-h-screen">
    <!-- Toast Container -->
    <div id="toast-container" class="fixed top-5 right-5 z-50 space-y-2"></div>

    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-gray-900">Invoices</h2>
                <p class="mt-2 text-lg text-gray-600">Monitor Business Invoices & Financial Transactions</p>
            </div>
            <!-- Add Invoice Button -->
            <button
                class="px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700"
                onclick="openModal()">
                Add Invoice
            </button>
        </div>
    </div>

    <section class="max-w-7xl mx-auto mt-10">
        <div class="bg-white shadow rounded-lg border border-gray-200 overflow-hidden">
            <!-- Table Header -->
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-semibold text-gray-800">Recent Invoices</h3>
                    <div class="text-sm text-gray-500">
                        <span id="current-count">0</span> of <span id="total-count">0</span> entries
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                Client Name
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                Client Address
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                Client Phone
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                Client Email
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                Due Date
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                Property Reference
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                                Price
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-600 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody id="invoices-body" class="bg-white divide-y divide-gray-200">
                        <!-- Skeleton Loading -->
                        <?php for ($i = 0; $i < 5; $i++): ?>
                            <tr class="animate-pulse">
                                <td class="px-6 py-4">
                                    <div class="h-4 bg-gray-200 rounded w-3/4"></div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="h-4 bg-gray-200 rounded w-3/4"></div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="h-4 bg-gray-200 rounded w-6 h-6 inline-block"></div>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination Controls -->
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                <div id="load-more-container" class="flex justify-center">
                    <button
                        id="load-more"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 disabled:opacity-50 disabled:cursor-not-allowed"
                        onclick="loadMoreInvoices()">
                        <span id="load-text">Load More</span>
                        <span id="load-spinner" class="hidden ml-2">
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Add Invoice Modal -->
    <div
        id="add-invoice-modal"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold text-gray-800">Add Invoice</h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
            </div>
            <form id="add-invoice-form">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-1">Client Name</label>
                    <input
                        type="text"
                        name="clientName"
                        class="w-full border border-gray-300 rounded px-3 py-2"
                        placeholder="Enter client name"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-1">Client Address</label>
                    <input
                        type="text"
                        name="clientAddress"
                        class="w-full border border-gray-300 rounded px-3 py-2"
                        placeholder="Enter client address"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-1">Client Phone</label>
                    <input
                        type="text"
                        name="clientPhone"
                        class="w-full border border-gray-300 rounded px-3 py-2"
                        placeholder="Enter client phone"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-1">Client Email</label>
                    <input
                        type="email"
                        name="clientEmail"
                        class="w-full border border-gray-300 rounded px-3 py-2"
                        placeholder="Enter client email"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-1">Due Date</label>
                    <input
                        type="date"
                        name="dueDate"
                        class="w-full border border-gray-300 rounded px-3 py-2"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-1">Property Reference</label>
                    <input
                        type="text"
                        name="propertyReference"
                        class="w-full border border-gray-300 rounded px-3 py-2"
                        placeholder="Enter property reference"
                        required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-1">Price</label>
                    <input
                        type="number"
                        step="0.01"
                        name="price"
                        class="w-full border border-gray-300 rounded px-3 py-2"
                        placeholder="Enter price"
                        required>
                </div>
                <div class="flex justify-end space-x-2">
                    <button
                        type="button"
                        onclick="closeModal()"
                        class="px-4 py-2 rounded bg-gray-200 text-gray-800 hover:bg-gray-300">
                        Cancel
                    </button>
                    <button
                        type="submit"
                        class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const API_BASE_URL = "https://mondus.group/rest/1/dw9gd4xauhctd7ha";
        const entityTypeId = 1096; // Invoices

        let currentStart = 0;
        let totalItems = 0;
        let hasMore = true;

        // Fetch invoices and update the table
        async function fetchInvoices(start = 0) {
            try {
                toggleLoading(true);
                const response = await fetch(`${API_BASE_URL}/crm.item.list?entityTypeId=${entityTypeId}&start=${start}`);
                const data = await response.json();

                // Update pagination state
                currentStart = data.next || 0;
                hasMore = !!data.next;
                totalItems = data.total;

                // Update counters
                document.getElementById('total-count').textContent = totalItems;
                document.getElementById('current-count').textContent =
                    Math.min(start + data.result.items.length, totalItems);

                // Render invoices
                renderInvoices(data.result.items);

                // Update load more button
                document.getElementById('load-more').disabled = !hasMore;
            } catch (error) {
                console.error('Error fetching invoices:', error);
                showError('Failed to load invoices. Please try again.');
            } finally {
                toggleLoading(false);
            }
        }

        function renderInvoices(items) {
            const tbody = document.getElementById('invoices-body');
            // Clear skeletons on first load
            if (currentStart === 0) tbody.innerHTML = '';

            items.forEach(item => {
                const row = document.createElement('tr');
                row.className = 'hover:bg-gray-50 relative';
                row.innerHTML = `
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            ${item.ufCrm16ClientName || 'N/A'}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            ${item.ufCrm16ClientAddress || 'N/A'}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            ${item.ufCrm16ClientPhone || 'N/A'}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            ${item.ufCrm16ClientEmail || 'N/A'}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            ${new Date(item.ufCrm16DueDate).toLocaleDateString('en-GB', {
              day: '2-digit',
              month: '2-digit',
              year: 'numeric'
            }) || 'N/A'}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            ${item.ufCrm16PropertyReference || 'N/A'}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
            AED ${parseFloat(item.ufCrm16Price || 0).toLocaleString('en-US')}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
            <button onclick="toggleMenu(event, '${item.id}')" class="focus:outline-none">
              <!-- Simple menu icon -->
              <svg class="h-5 w-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                <path d="M6 10a2 2 0 114 0 2 2 0 01-4 0zm4-6a2 2 0 11-4 0 2 2 0 014 0zm0 12a2 2 0 11-4 0 2 2 0 014 0z"/>
              </svg>
            </button>
            <!-- Dropdown Menu -->
            <div id="menu-${item.id}" class="hidden absolute right-0 mt-2 w-36 bg-white rounded-md shadow-lg border border-gray-200 z-50">
              <a href="javascript:void(0)" onclick="deleteInvoice('${item.id}')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Delete</a>
              <a href="javascript:void(0)" onclick="downloadInvoicePDF('${item.id}')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Download as PDF</a>
            </div>
          </td>
        `;
                tbody.appendChild(row);
            });
        }

        function loadMoreInvoices() {
            if (hasMore) fetchInvoices(currentStart);
        }

        function toggleLoading(isLoading) {
            const loadText = document.getElementById('load-text');
            const spinner = document.getElementById('load-spinner');
            const button = document.getElementById('load-more');

            if (isLoading) {
                button.disabled = true;
                loadText.textContent = 'Loading...';
                spinner.classList.remove('hidden');
            } else {
                button.disabled = !hasMore;
                loadText.textContent = 'Load More';
                spinner.classList.add('hidden');
            }
        }

        function showError(message) {
            const container = document.getElementById('load-more-container');
            const errorDiv = document.createElement('div');
            errorDiv.className = 'text-red-500 text-sm text-center mt-2';
            errorDiv.textContent = message;
            container.appendChild(errorDiv);
        }

        // Modal handling functions
        function openModal() {
            document.getElementById('add-invoice-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('add-invoice-modal').classList.add('hidden');
            document.getElementById('add-invoice-form').reset();
        }

        // Toast function
        function showToast(message, type = 'success') {
            const toastContainer = document.getElementById('toast-container');
            const toast = document.createElement('div');
            toast.className = `px-4 py-2 rounded shadow text-white ${
        type === 'success' ? 'bg-green-500' : 'bg-red-500'
      }`;
            toast.textContent = message;
            toastContainer.appendChild(toast);
            setTimeout(() => {
                toast.classList.add('opacity-0');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

        // Handle the add invoice form submission
        document.getElementById('add-invoice-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const invoiceData = {
                ufCrm16ClientName: formData.get('clientName'),
                ufCrm16ClientAddress: formData.get('clientAddress'),
                ufCrm16ClientPhone: formData.get('clientPhone'),
                ufCrm16ClientEmail: formData.get('clientEmail'),
                ufCrm16DueDate: formData.get('dueDate'),
                ufCrm16PropertyReference: formData.get('propertyReference'),
                ufCrm16Price: formData.get('price')
            };

            try {
                const response = await fetch(`${API_BASE_URL}/crm.item.add`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        entityTypeId,
                        fields: invoiceData
                    })
                });
                const data = await response.json();
                if (data.result) {
                    showToast("Invoice added successfully", "success");
                    closeModal();
                    currentStart = 0;
                    fetchInvoices(0);
                } else {
                    throw new Error(data.error_description || 'Failed to add invoice');
                }
            } catch (error) {
                console.error('Error adding invoice:', error);
                showToast("Error adding invoice: " + error.message, "error");
            }
        });

        // Toggle dropdown menu for action column
        function toggleMenu(event, id) {
            event.stopPropagation();
            const menu = document.getElementById(`menu-${id}`);
            // Hide any other open menus
            document.querySelectorAll('[id^="menu-"]').forEach(m => {
                if (m !== menu) m.classList.add('hidden');
            });
            menu.classList.toggle('hidden');
        }

        // Delete invoice function
        async function deleteInvoice(id) {
            try {
                toggleLoading(true);
                const response = await fetch(`${API_BASE_URL}/crm.item.delete`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        entityTypeId,
                        id
                    })
                });
                const data = await response.json();
                if (data.result) {
                    showToast("Invoice deleted successfully", "error");
                    currentStart = 0;
                    fetchInvoices(0);
                } else {
                    throw new Error(data.error_description || "Failed to delete invoice");
                }
            } catch (error) {
                console.error(error);
                showToast("Failed to delete invoice", "error");
            } finally {
                toggleLoading(false);
            }
        }

        // Download invoice as PDF using jsPDF
        async function downloadInvoicePDF(id) {
            try {
                const response = await fetch(`${API_BASE_URL}/crm.item.get?id=${id}&entityTypeId=${entityTypeId}`);
                const result = await response.json();
                const item = result.result.item;

                if (typeof window.jspdf === "undefined") {
                    showToast("PDF library not loaded", "error");
                    return;
                }

                const doc = new window.jspdf.jsPDF();
                const pageWidth = doc.internal.pageSize.width;
                const margin = 15;
                let y = 20;

                // **Invoice Header**
                doc.setFont("helvetica", "bold");
                doc.setFontSize(20);
                doc.text("Sales Invoice", pageWidth / 2, y, {
                    align: "center"
                });
                y += 10;

                // **Company Details (Left) and Invoice Info (Right)**
                doc.setFontSize(12);
                doc.text("Mondus Properties LLC", margin, y);
                y += 6;
                doc.text("Office 2402, Irish Bay Tower", margin, y);
                y += 6;
                doc.text("Dubai, United Arab Emirates", margin, y);
                y += 6;
                doc.text("TRN: 10417007400003", margin, y);
                y += 10;

                doc.text("Invoice No:", pageWidth / 2 + 20, 30);
                doc.text(id, pageWidth / 2 + 50, 30);
                doc.text("Dated:", pageWidth / 2 + 20, 36);
                doc.text(new Date().toLocaleDateString(), pageWidth / 2 + 50, 36);

                // **Buyer Details (Boxed Section)**
                y += 10;
                doc.setDrawColor(0);
                doc.setLineWidth(0.5);
                doc.rect(margin, y - 5, pageWidth - margin * 2, 40);
                doc.setFont("helvetica", "bold");
                doc.text("Buyer", margin + 5, y);
                doc.setFont("helvetica", "normal");
                y += 7;
                doc.text(`Name: ${item.ufCrm16ClientName || "N/A"}`, margin + 5, y);
                y += 6;
                doc.text(`Country: ${item.ufCrm16ClientCountry || "N/A"}`, margin + 5, y);
                y += 6;
                doc.text(`TRN: ${item.ufCrm16ClientTRN || "N/A"}`, margin + 5, y);
                y += 10;

                // **Invoice Details Table**
                const tableStartY = y + 5;
                doc.autoTable({
                    startY: tableStartY,
                    head: [
                        ["Particulars", "VAT %", "Amount", "Taxable Value (AED)", "VAT (AED)"]
                    ],
                    body: [
                        [
                            item.ufCrm16PropertyReference || "N/A",
                            "5%",
                            `${parseFloat(item.ufCrm16Price || 0).toLocaleString("en-US", { minimumFractionDigits: 2 })}`,
                            `${(parseFloat(item.ufCrm16Price || 0) / 1.05).toLocaleString("en-US", { minimumFractionDigits: 2 })}`,
                            `${(parseFloat(item.ufCrm16Price || 0) * 0.05).toLocaleString("en-US", { minimumFractionDigits: 2 })}`
                        ],
                    ],
                    styles: {
                        fontSize: 10
                    },
                    theme: "striped",
                    margin: {
                        left: margin,
                        right: margin
                    },
                });

                // **Summary Section**
                y = doc.lastAutoTable.finalY + 10;
                doc.setFont("helvetica", "normal");
                doc.text(`Amount Chargeable (in words): ${convertToWords(parseFloat(item.ufCrm16Price || 0))} AED`, margin, y);
                y += 6;
                doc.text(`VAT Amount (in words): ${convertToWords((parseFloat(item.ufCrm16Price || 0) * 0.05))} AED`, margin, y);
                y += 10;

                doc.text("Taxable Value:", pageWidth - 100, y);
                doc.text(`${(parseFloat(item.ufCrm16Price || 0) / 1.05).toLocaleString("en-US", { minimumFractionDigits: 2 })} AED`, pageWidth - 50, y);
                y += 6;
                doc.text("Value Added Tax 5%:", pageWidth - 100, y);
                doc.text(`${(parseFloat(item.ufCrm16Price || 0) * 0.05).toLocaleString("en-US", { minimumFractionDigits: 2 })} AED`, pageWidth - 50, y);
                y += 6;
                doc.setFont("helvetica", "bold");
                doc.text("Invoice Total:", pageWidth - 100, y);
                doc.text(`${parseFloat(item.ufCrm16Price || 0).toLocaleString("en-US", { minimumFractionDigits: 2 })} AED`, pageWidth - 50, y);

                // **Bank Details**
                y += 15;
                doc.setFont("helvetica", "bold");
                doc.text("Company's Bank Details", margin, y);
                y += 6;
                doc.setFont("helvetica", "normal");
                doc.text("Bank Holder's Name: Mondus Properties LLC", margin, y);
                y += 6;
                doc.text("Bank Name: Mashreq Bank", margin, y);
                y += 6;
                doc.text("A/c No: 000123456789", margin, y); // Placeholder, replace with actual data if available
                y += 6;
                doc.text("IBAN: AE07033000012345678901", margin, y); // Placeholder, replace with actual data if available
                y += 6;
                doc.text("Branch & SWIFT Code: BURJUMAN, DUBAI & BOMLAEAD", margin, y);

                // **Footer**
                y += 15;
                doc.setFontSize(8);
                doc.text("This is a Computer Generated Invoice", pageWidth / 2, y, {
                    align: "center"
                });

                // **Save PDF**
                doc.save(`Invoice_${id}.pdf`);
            } catch (error) {
                console.error(error);
                showToast("Failed to generate PDF", "error");
            }
        }

        // Helper function to convert numbers to words (simplified example)
        function convertToWords(number) {
            const units = ["", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine"];
            const teens = ["Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen"];
            const tens = ["", "", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"];

            if (number < 10) return units[Math.floor(number)];
            if (number < 20) return teens[number - 10];
            if (number < 100) return tens[Math.floor(number / 10)] + (number % 10 ? " " + units[number % 10] : "");
            return "Approximate"; // Simplified, expand for larger numbers if needed
        }

        // Hide any open dropdown menus when clicking outside
        document.addEventListener('click', () => {
            document.querySelectorAll('[id^="menu-"]').forEach(menu => menu.classList.add('hidden'));
        });

        // Initial load
        document.addEventListener('DOMContentLoaded', () => fetchInvoices(0));
    </script>
</main>