<!-- public/expense.php -->
<main class="flex-1 p-8 bg-gray-50 min-h-screen">
  <!-- Toast Container -->
  <div id="toast-container" class="fixed top-5 right-5 z-50 space-y-2"></div>

  <div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center">
      <div>
        <h2 class="text-3xl font-bold tracking-tight text-gray-900">Transactions & Expenses</h2>
        <p class="mt-2 text-lg text-gray-600">Monitor Business Expenses & Financial Transactions</p>
      </div>
      <!-- Add Expense Button -->
      <button
        class="px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700"
        onclick="openModal()">
        Add Expense
      </button>
    </div>
  </div>

  <section class="max-w-7xl mx-auto mt-10">
    <div class="bg-white shadow rounded-lg border border-gray-200 overflow-hidden">
      <!-- Table Header -->
      <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
        <div class="flex justify-between items-center">
          <h3 class="text-xl font-semibold text-gray-800">Recent Expenses</h3>
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
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Reference</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Title</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Description</th>
              <th class="px-4 py-2 text-right text-xs font-medium text-gray-600 uppercase tracking-wider">Amount</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Category</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Customer Name</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Date</th>
              <th class="px-4 py-2 text-center text-xs font-medium text-gray-600 uppercase tracking-wider">Paid</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Paid Through</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Tax Status</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Tax Treatment</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Place of Supply</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Tax</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Notes</th>
              <th class="px-4 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Receipt File</th>
              <th class="px-4 py-2 text-right text-xs font-medium text-gray-600 uppercase tracking-wider">Action</th>
            </tr>
          </thead>
          <tbody id="expenses-body" class="bg-white divide-y divide-gray-200">
            <!-- Skeleton Loading -->
            <?php for ($i = 0; $i < 5; $i++): ?>
              <tr class="animate-pulse">
                <td class="px-4 py-2">
                  <div class="h-4 bg-gray-200 rounded w-3/4"></div>
                </td>
                <td class="px-4 py-2">
                  <div class="h-4 bg-gray-200 rounded w-3/4"></div>
                </td>
                <td class="px-4 py-2 text-right">
                  <div class="h-4 bg-gray-200 rounded w-1/2 ml-auto"></div>
                </td>
                <td class="px-4 py-2">
                  <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                </td>
                <td class="px-4 py-2">
                  <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                </td>
                <td class="px-4 py-2">
                  <div class="h-4 bg-gray-200 rounded w-full"></div>
                </td>
                <td class="px-4 py-2">
                  <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                </td>
                <td class="px-4 py-2 text-center">
                  <div class="h-4 bg-gray-200 rounded w-1/4 inline-block"></div>
                </td>
                <td class="px-4 py-2">
                  <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                </td>
                <td class="px-4 py-2">
                  <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                </td>
                <td class="px-4 py-2">
                  <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                </td>
                <td class="px-4 py-2">
                  <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                </td>
                <td class="px-4 py-2">
                  <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                </td>
                <td class="px-4 py-2">
                  <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                </td>
                <td class="px-4 py-2 text-right">
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
            onclick="loadMoreExpenses()">
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

  <!-- Modal with Add Expense Form -->
  <div
    id="add-expense-modal"
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md max-h-[80vh] overflow-y-auto">
      <div class="flex justify-between items-center mb-4">
        <h3 class="text-xl font-semibold text-gray-800">Add Expense</h3>
        <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
      </div>
      <form id="add-expense-form">
        <!-- Name -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-1" for="name">Name</label>
          <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="Enter expense name" required>
        </div>

        <!-- Date Picker -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-1" for="date">Date</label>
          <input type="date" id="date" name="date" class="w-full border border-gray-300 rounded px-3 py-2" required>
        </div>

        <!-- Customer Name -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-1" for="customer-name">Customer Name</label>
          <input type="text" id="customer-name" name="customer_name" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="Enter customer name" required>
        </div>

        <!-- Description -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-1" for="description">Description</label>
          <input type="text" id="description" name="description" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="Enter expense description" required>
        </div>

        <!-- Amount -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-1" for="amount">Amount</label>
          <input type="number" step="0.01" id="amount" name="amount" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="Enter amount" required>
        </div>

        <!-- Category -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-1" for="category">Category</label>
          <input type="text" id="category" name="category" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="Enter category" required>
        </div>

        <!-- Paid (existing field) -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-1" for="paid">Paid</label>
          <select id="paid" name="paid" class="w-full border border-gray-300 rounded px-3 py-2">
            <option value="Y">Yes</option>
            <option value="N">No</option>
          </select>
        </div>

        <!-- Paid Through -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-1" for="paid-through">Paid Through</label>
          <select id="paid-through" name="paid_through" class="w-full border border-gray-300 rounded px-3 py-2">
            <option value="Cash">Cash</option>
            <option value="Bank Transfer">Bank Transfer</option>
            <option value="Credit Card">Credit Card</option>
            <option value="Mobile Payment">Mobile Payment</option>
          </select>
        </div>

        <!-- Tax Status (radio buttons) -->
        <div class="mb-4">
          <span class="block text-gray-700 text-sm font-medium mb-1">Tax Status</span>
          <div class="flex items-center space-x-4">
            <label class="inline-flex items-center">
              <input type="radio" class="form-radio" name="tax_status" value="917" required>
              <span class="ml-2">Inclusive</span>
            </label>
            <label class="inline-flex items-center">
              <input type="radio" class="form-radio" name="tax_status" value="919">
              <span class="ml-2">Exclusive</span>
            </label>
          </div>
        </div>

        <!-- Tax Treatment -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-1" for="tax-treatment">Tax Treatment</label>
          <select id="tax-treatment" name="tax_treatment" class="w-full border border-gray-300 rounded px-3 py-2">
            <option value="VAT registered">VAT registered</option>
            <option value="Non VAT registered">Non VAT registered</option>
            <option value="GCC VAT registered">GCC VAT registered</option>
            <option value="GCC Non VAT registered">GCC Non VAT registered</option>
            <option value="Non GCC">Non GCC</option>
            <option value="Out of Scope">Out of Scope</option>
            <option value="Non VAT">Non VAT</option>
            <option value="VAT registered - Designated zone">VAT registered - Designated zone</option>
            <option value="Non VAT registered - Designated Zone">Non VAT registered - Designated Zone</option>
          </select>
        </div>

        <!-- Place of Supply -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-1" for="place-of-supply">Place of Supply</label>
          <select id="place-of-supply" name="place_of_supply" class="w-full border border-gray-300 rounded px-3 py-2">
            <option value="Abu Dhabi">Abu Dhabi</option>
            <option value="Dubai">Dubai</option>
            <option value="Sharjah">Sharjah</option>
            <option value="Ajman">Ajman</option>
            <option value="Umm Al Quwain">Umm Al Quwain</option>
            <option value="Ras Al Khaimah">Ras Al Khaimah</option>
            <option value="Fujairah">Fujairah</option>
          </select>
        </div>

        <!-- Tax -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-1" for="tax">Tax</label>
          <select id="tax" name="tax" class="w-full border border-gray-300 rounded px-3 py-2">
            <option value="Exempt">Exempt</option>
            <optgroup label="Tax">
              <option value="Standard rate (5%)">Standard rate (5%)</option>
              <option value="Zero Rate (0%)">Zero Rate (0%)</option>
            </optgroup>
          </select>
        </div>

        <!-- Reference -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-1" for="reference">Reference</label>
          <input type="text" id="reference" name="reference" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="Enter reference information">
        </div>

        <!-- Notes -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-1" for="notes">Notes</label>
          <textarea id="notes" name="notes" maxlength="500" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="Enter notes (max 500 characters)" rows="4"></textarea>
        </div>

        <!-- Receipt (modern drag & drop area with file selected feedback) -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-1" for="receipt">Receipt</label>
          <div id="receipt-container" class="relative border-2 border-dashed border-gray-300 rounded-lg px-4 py-6 flex flex-col items-center justify-center cursor-pointer hover:border-blue-400">
            <!-- Placeholder Image -->
            <img id="receipt-placeholder" src="https://www.shutterstock.com/image-vector/upload-document-data-file-cloud-600nw-2297720825.jpg" alt="Upload Receipt" class="w-16 h-16 mb-2 opacity-50">
            <p id="receipt-text" class="text-gray-600 text-sm text-center">
              Drag and drop your file here,<br>or click to select (single file only)
            </p>
            <!-- Invisible File Input -->
            <input type="file" id="receipt" name="receipt" accept="image/*,application/pdf" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
            <!-- File Name Display -->
            <span id="file-name" class="text-sm mt-2 text-gray-700 hidden"></span>
          </div>
        </div>

        <!-- Form Buttons -->
        <div class="flex justify-end space-x-2">
          <button type="button" onclick="closeModal()" class="px-4 py-2 rounded bg-gray-200 text-gray-800 hover:bg-gray-300">Cancel</button>
          <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Submit</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    const API_BASE_URL = "https://mondus.group/rest/1/dw9gd4xauhctd7ha";
    const expenseEntityTypeId = 1100;

    let currentStart = 0;
    let totalItems = 0;
    let hasMore = true;

    // Fetch expenses and update the table
    async function fetchExpenses(start = 0) {
      try {
        toggleLoading(true);
        const response = await fetch(`${API_BASE_URL}/crm.item.list?entityTypeId=${expenseEntityTypeId}&start=${start}`);
        const data = await response.json();

        currentStart = data.next || 0;
        hasMore = !!data.next;
        totalItems = data.total;

        document.getElementById('total-count').textContent = totalItems;
        document.getElementById('current-count').textContent = Math.min(start + data.result.items.length, totalItems);

        renderExpenses(data.result.items);
        document.getElementById('load-more').disabled = !hasMore;
      } catch (error) {
        console.error('Error fetching expenses:', error);
        showError('Failed to load expenses. Please try again.');
      } finally {
        toggleLoading(false);
      }
    }

    function renderExpenses(items) {
      const tbody = document.getElementById('expenses-body');
      if (currentStart === 0) tbody.innerHTML = '';

      items.forEach(item => {
        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-50 relative';
        row.innerHTML = `
        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">
          ${item.ufCrm17Reference || 'N/A'}
        </td>
      <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">
        ${item.title || 'N/A'}
      </td>
      <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">
        ${item.ufCrm17Description || 'N/A'}
      </td>
      <td class="px-4 py-2 whitespace-nowrap text-right text-sm font-medium text-gray-900">
        AED ${parseFloat(item.ufCrm17Amount || 0).toLocaleString('en-US')}
      </td>
      <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">
        ${item.ufCrm17Category || 'N/A'}
      </td>
      <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">
        ${item.ufCrm17CustomerName || 'N/A'}
      </td>
      <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">
      ${item.ufCrm17Date ? new Date(item.ufCrm17Date).toLocaleDateString() : 'N/A'}
      </td>
      <td class="px-4 py-2 whitespace-nowrap text-center text-sm">
      ${item.ufCrm17Paid === 'Y' ? 
      '<span class="px-2 inline-flex text-xs font-semibold rounded-full bg-green-100 text-green-800">Yes</span>' : 
      '<span class="px-2 inline-flex text-xs font-semibold rounded-full bg-red-100 text-red-800">No</span>'}
      </td>
      <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">
      ${item.ufCrm17PaidThrough || 'N/A'}
      </td>
      <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">
      ${item.ufCrm17TaxStatus || 'N/A'}
      </td>
      <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">
      ${item.ufCrm17TaxTreatment || 'N/A'}
      </td>
      <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">
      ${item.ufCrm17PlaceOfSupply || 'N/A'}
      </td>
      <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">
      ${item.ufCrm17Tax || 'N/A'}
      </td>
      <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">
        ${item.ufCrm17Notes || 'N/A'}
      </td>
      <td class="px-6 py-4 whitespace-nowrap text-sm">
      ${item.ufCrm17Receipt?.urlMachine ? `<a href="${item.ufCrm17Receipt.urlMachine}" target="_blank" class="text-blue-600 underline">Download</a>` : 'N/A'}
  </td>
      <td class="px-4 py-2 whitespace-nowrap text-right">
        <button onclick="toggleMenu(event, '${item.id}')" class="focus:outline-none">
          <svg class="h-5 w-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
            <path d="M6 10a2 2 0 114 0 2 2 0 01-4 0zm4-6a2 2 0 11-4 0 2 2 0 014 0zm0 12a2 2 0 11-4 0 2 2 0 014 0z"/>
          </svg>
        </button>
        <div id="menu-${item.id}" class="hidden absolute right-0 mt-2 w-32 bg-white rounded-md shadow-lg border border-gray-200 z-50">
          <a href="javascript:void(0)" onclick="deleteExpense('${item.id}')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Delete</a>
        </div>
      </td>
    `;
        tbody.appendChild(row);
      });
    }

    function loadMoreExpenses() {
      if (hasMore) fetchExpenses(currentStart);
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
      document.getElementById('add-expense-modal').classList.remove('hidden');
    }

    function closeModal() {
      document.getElementById('add-expense-modal').classList.add('hidden');
      document.getElementById('add-expense-form').reset();
      // Reset file input feedback
      const fileNameElement = document.getElementById('file-name');
      const placeholderImg = document.getElementById('receipt-placeholder');
      const receiptText = document.getElementById('receipt-text');
      fileNameElement.textContent = '';
      fileNameElement.classList.add('hidden');
      placeholderImg.classList.remove('hidden');
      receiptText.classList.remove('hidden');
    }

    // Toast function
    function showToast(message, type = 'success') {
      const toastContainer = document.getElementById('toast-container');
      const toast = document.createElement('div');
      toast.className = `px-4 py-2 rounded shadow text-white ${type === 'success' ? 'bg-green-500' : 'bg-red-500'}`;
      toast.textContent = message;
      toastContainer.appendChild(toast);
      setTimeout(() => {
        toast.classList.add('opacity-0');
        setTimeout(() => toast.remove(), 300);
      }, 3000);
    }

    // Convert a file to an array: [filename, base64 content]
    function convertFileToArray(file) {
      return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.onload = function(event) {
          const base64Content = event.target.result.split(',')[1];
          resolve([file.name, base64Content]);
        };
        reader.onerror = function(error) {
          reject(error);
        };
        reader.readAsDataURL(file);
      });
    }

    // Handle the add expense form submission
    document.getElementById('add-expense-form').addEventListener('submit', async function(e) {
      e.preventDefault();
      const formData = new FormData(this);

      const expenseData = {
        title: formData.get('name'),
        ufCrm17Description: formData.get('description'),
        ufCrm17Amount: formData.get('amount'),
        ufCrm17Category: formData.get('category'),
        ufCrm17Paid: formData.get('paid'),
        ufCrm17CustomerName: formData.get('customer_name'),
        ufCrm17Notes: formData.get('notes'),
        ufCrm17Date: formData.get('date'),
        ufCrm17PaidThrough: formData.get('paid_through'),
        ufCrm17TaxStatus: formData.get('tax_status'),
        ufCrm17TaxTreatment: formData.get('tax_treatment'),
        ufCrm17PlaceOfSupply: formData.get('place_of_supply'),
        ufCrm17Tax: formData.get('tax'),
        ufCrm17Reference: formData.get('reference')
      };

      const receiptFile = formData.get('receipt');
      if (receiptFile && receiptFile.size > 0) {
        try {
          const fileArray = await convertFileToArray(receiptFile);
          expenseData.ufCrm17Receipt = fileArray;
        } catch (error) {
          console.error("Error reading file:", error);
          showToast("Error processing receipt file", "error");
          return;
        }
      }

      try {
        const response = await fetch(`${API_BASE_URL}/crm.item.add`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            entityTypeId: expenseEntityTypeId,
            fields: expenseData
          })
        });
        const data = await response.json();
        if (data.result) {
          showToast("Expense added successfully", "success");
          closeModal();
          currentStart = 0;
          fetchExpenses(0);
        } else {
          throw new Error(data.error_description || 'Failed to add expense');
        }
      } catch (error) {
        console.error('Error adding expense:', error);
        showToast("Error adding expense: " + error.message, "error");
      }
    });

    // Update receipt input feedback to show selected file name
    const receiptInput = document.getElementById('receipt');
    const fileNameElement = document.getElementById('file-name');
    const placeholderImg = document.getElementById('receipt-placeholder');
    const receiptText = document.getElementById('receipt-text');

    receiptInput.addEventListener('change', function() {
      if (this.files && this.files.length > 0) {
        fileNameElement.textContent = this.files[0].name;
        fileNameElement.classList.remove('hidden');
        placeholderImg.classList.add('hidden');
        receiptText.classList.add('hidden');
      } else {
        fileNameElement.textContent = '';
        fileNameElement.classList.add('hidden');
        placeholderImg.classList.remove('hidden');
        receiptText.classList.remove('hidden');
      }
    });

    // Toggle dropdown menu for action column
    function toggleMenu(event, id) {
      event.stopPropagation();
      const menu = document.getElementById(`menu-${id}`);
      document.querySelectorAll('[id^="menu-"]').forEach(m => {
        if (m !== menu) m.classList.add('hidden');
      });
      menu.classList.toggle('hidden');
    }

    // Delete expense function
    async function deleteExpense(id) {
      try {
        toggleLoading(true);
        const response = await fetch(`${API_BASE_URL}/crm.item.delete`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify({
            entityTypeId: expenseEntityTypeId,
            id
          })
        });
        const data = await response.json();
        if (data.result) {
          showToast("Expense deleted successfully", "error");
          currentStart = 0;
          fetchExpenses(0);
        } else {
          throw new Error(data.error_description || "Failed to delete expense");
        }
      } catch (error) {
        console.error(error);
        showToast("Failed to delete expense", "error");
      } finally {
        toggleLoading(false);
      }
    }

    document.addEventListener('click', () => {
      document.querySelectorAll('[id^="menu-"]').forEach(menu => menu.classList.add('hidden'));
    });

    document.addEventListener('DOMContentLoaded', () => fetchExpenses(0));
  </script>
</main>