
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
   