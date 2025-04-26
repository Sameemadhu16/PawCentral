
        // Charts initialization
        document.addEventListener('DOMContentLoaded', function() {
            // Donation Trends Chart
            const trendCtx = document.getElementById('donationTrendChart').getContext('2d');
            const trendChart = new Chart(trendCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Donations Received (LKR)',
                        data: [12000, 19000, 15000, 22000, 30000, 45000],
                        borderColor: '#8257E5',
                        backgroundColor: 'rgba(130, 87, 229, 0.1)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Category Chart
            const categoryCtx = document.getElementById('categoryChart').getContext('2d');
            const categoryChart = new Chart(categoryCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Medical', 'Food', 'Shelter', 'Supplies', 'Transport', 'Other'],
                    datasets: [{
                        data: [35, 25, 15, 10, 8, 7],
                        backgroundColor: [
                            '#8257E5',
                            '#41B883',
                            '#FF9800',
                            '#2196F3',
                            '#F44336',
                            '#9E9E9E'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'right',
                        }
                    }
                }
            });

            // Filter functionality
            document.getElementById('statusFilter').addEventListener('change', function() {
                // Add filter logic here
                console.log('Filter changed to: ' + this.value);
                // This would typically trigger an AJAX call to refresh the table
            });
        });

        // Add this to your donation.js file
        document.addEventListener('DOMContentLoaded', function() {
          // Make request cards clickable
          const requestCards = document.querySelectorAll('.request-card');
          requestCards.forEach(card => {
            // Extract the ID from the approve button's URL
            const approveBtn = card.querySelector('.approve');
            if (approveBtn) {
              const href = approveBtn.getAttribute('onclick');
              const idMatch = href.match(/id=(\d+)/);
              const id = idMatch ? idMatch[1] : null;

              if (id) {
                // Make the whole card clickable, but avoid triggering when
                // buttons are clicked
                card.addEventListener('click', function(e) {
                  // Check if the click was on a button
                  if (!e.target.closest('.btn')) {
                    window.location.href =
                        ROOT + '/admin/donation_card?id=' + id;
                  }
                });
              }
            }
          });

          // Update view buttons to go to the donation card page
          const viewButtons = document.querySelectorAll('.view-btn');
          viewButtons.forEach(button => {
            button.addEventListener('click', function() {
              // Get the donation ID from the row (you might need to add data
              // attributes or extract from other elements)
              const row = this.closest('tr');
              const petName = row.querySelector('td:first-child').textContent;
              // For demonstration, we're using index+1 as ID. In real
              // application, you should use actual IDs
              const index = Array.from(row.parentNode.children).indexOf(row);
              window.location.href =
                  ROOT + '/admin/donation_card?id=' + (index + 1);
            });
          });
        });

        // Donation card page functionality
            // Tab functionality
            document.querySelectorAll('.tab').forEach(tab => {
              tab.addEventListener('click', function() {
                // Remove active class from all tabs
                document.querySelectorAll('.tab').forEach(
                    t => t.classList.remove('active'));

                // Add active class to clicked tab
                this.classList.add('active');

                // Hide all tab content
                document.querySelectorAll('.tab-content').forEach(content => {
                  content.style.display = 'none';
                });

                // Show the corresponding tab content
                const tabId = this.getAttribute('data-tab');
                document.getElementById(tabId).style.display = 'block';
              });
            });
