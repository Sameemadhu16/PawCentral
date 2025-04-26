document.addEventListener('DOMContentLoaded', function() {
  // Elements
  const popup = document.getElementById('popupNotification');
  const popupMessage = document.getElementById('popupMessage');
  const popupIcon = document.getElementById('popupIcon');
  const searchInput = document.getElementById('searchInput');
  const searchBtn = document.getElementById('searchBtn');
  const filterBtns = document.querySelectorAll('.filter-btn');
  const registrationTableBody =
      document.getElementById('registrationTableBody');
  const noResults = document.getElementById('noResults');

  // Stats counters
  const totalCount = document.getElementById('totalCount');
  const pendingCount = document.getElementById('pendingCount');
  const approvedCount = document.getElementById('approvedCount');
  const rejectedCount = document.getElementById('rejectedCount');

  // Initialize stats
  updateStats();

  // Show popup notification based on URL parameters
  function showPopup(message, isSuccess = true) {
    popupMessage.textContent = message;

    if (isSuccess) {
      popupIcon.className = 'fas fa-check-circle';
      popupIcon.style.color = 'var(--success)';
    } else {
      popupIcon.className = 'fas fa-exclamation-circle';
      popupIcon.style.color = 'var(--danger)';
    }

    popup.classList.add('show');

    setTimeout(() => {
      popup.classList.remove('show');
    }, 3000);
  }

  // Check URL for status parameters
  const urlParams = new URLSearchParams(window.location.search);
  if (urlParams.has('status')) {
    const status = urlParams.get('status');
    if (status === 'approved') {
      showPopup('Medical provider approved successfully!', true);
    } else if (status === 'rejected') {
      showPopup('Medical provider rejected successfully!', false);
    }
  }

  // Filter table by status
  function filterTable(status) {
    const rows = registrationTableBody.querySelectorAll('tr');
    let visibleCount = 0;

    rows.forEach(row => {
      const rowStatus = row.getAttribute('data-status');
      if (status === 'all' || status === rowStatus) {
        row.style.display = '';
        visibleCount++;
      } else {
        row.style.display = 'none';
      }
    });

    // Show/hide no results message
    if (visibleCount === 0) {
      noResults.classList.remove('hidden');
    } else {
      noResults.classList.add('hidden');
    }
  }

  // Search functionality
  searchInput.addEventListener('input', function() {
    const searchTerm = searchInput.value.toLowerCase().trim();
    const rows = registrationTableBody.querySelectorAll('tr');
    let visibleCount = 0;

    // Get active filter
    const activeFilter = document.querySelector('.filter-btn.active')
                             ?.getAttribute('data-status') || 'all';

    rows.forEach(row => {
      const serviceName = row.cells[0].textContent.toLowerCase();
      const rowStatus = row.getAttribute('data-status');

      // Check if row matches search term and active filter
      const matchesSearch = serviceName.includes(searchTerm);
      const matchesFilter =
          activeFilter === 'all' || activeFilter === rowStatus;

      if (matchesSearch && matchesFilter) {
        row.style.display = '';
        visibleCount++;
      } else {
        row.style.display = 'none';
      }
    });

    // Show/hide no results message
    if (visibleCount === 0) {
      noResults.classList.remove('hidden');
    } else {
      noResults.classList.add('hidden');
    }
  });

  // Update stats counters
  function updateStats() {
    const rows = registrationTableBody.querySelectorAll('tr');
    let total = rows.length;
    let pending = 0;
    let approved = 0;
    let rejected = 0;

    rows.forEach(row => {
      const status = row.getAttribute('data-status');
      if (status === 'pending')
        pending++;
      else if (status === 'approved')
        approved++;
      else if (status === 'rejected')
        rejected++;
    });

    totalCount.textContent = total;
    pendingCount.textContent = pending;
    approvedCount.textContent = approved;
    rejectedCount.textContent = rejected;
  }

  // Event Listeners
  filterBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      // Remove active class from all buttons
      filterBtns.forEach(b => b.classList.remove('active'));

      // Add active class to clicked button
      this.classList.add('active');

      // Filter table
      const status = this.getAttribute('data-status');
      filterTable(status);
    });
  });

  // Form submission confirmation
  const approveBtns = document.querySelectorAll('.action-btn.approve');
  const rejectBtns = document.querySelectorAll('.action-btn.reject');

  approveBtns.forEach(btn => {
    btn.addEventListener('click', function(e) {
      if (!confirm('Are you sure you want to approve this medical provider?')) {
        e.preventDefault();
      }
    });
  });

  rejectBtns.forEach(btn => {
    btn.addEventListener('click', function(e) {
      if (!confirm('Are you sure you want to reject this medical provider?')) {
        e.preventDefault();
      }
    });
  });
});