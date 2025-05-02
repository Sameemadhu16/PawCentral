<?php
// Helper function to format chart data inside PHP
function prepareChartData($rawData)
{
    $labels = [];
    $values = [];
    foreach ($rawData as $row) {
        $labels[] = date('M', strtotime($row->month . '-01'));
        $values[] = (float) $row->count;
    }
    return ['labels' => $labels, 'values' => $values];
}

// Prepare chart datasets
$usersChartData = prepareChartData($data['monthlyUsers']);
$donationsChartData = prepareChartData($data['monthlyDonations']);
$medicalChartData = prepareChartData($data['monthlyMedicalProviders']);
$eventsChartData = prepareChartData($data['monthlyEvents']);
$petsChartData = prepareChartData($data['monthlyRegisteredPets']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Report</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }

        .report-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
        }

        h1 {
            margin-bottom: 30px;
        }

        .summary {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            flex: 1 1 200px;
            background: #eee;
            padding: 20px;
            border-radius: 10px;
        }

        .card h3 {
            margin: 0 0 10px;
        }

        .card p {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        .charts {
            margin-top: 30px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 20px;
        }

        .chart-card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>
    <div id="reportContent" class="report-container">
        <h1>Admin Report</h1>

        <div class="summary">
            <div class="card">
                <h3>Total Users</h3>
                <p><?= number_format($data['userCount']) ?></p>
                <small><?= number_format($data['thisMonthUsers']) ?> this month</small>
            </div>
            <div class="card">
                <h3>Total Donations</h3>
                <p>LKR <?= number_format($data['allDonations'], 2) ?></p>
                <small>LKR <?= number_format($data['thisMonthDonations'], 2) ?> this month</small>
            </div>
            <div class="card">
                <h3>Medical Providers</h3>
                <p><?= number_format($data['allMedicalProviders']) ?></p>
                <small><?= number_format($data['thisMonthMedicalProviders']) ?> this month</small>
            </div>
            <div class="card">
                <h3>Events</h3>
                <p><?= number_format($data['allEvents']) ?></p>
                <small><?= number_format($data['thisMonthEvents']) ?> this month</small>
            </div>
            <div class="card">
                <h3>Registered Pets</h3>
                <p><?= number_format($data['allRegisteredPets']) ?></p>
                <small><?= number_format($data['thisMonthRegisteredPets']) ?> this month</small>
            </div>
        </div>

        <div class="charts">
            <div class="chart-card">
                <h4>Users Monthly</h4>
                <canvas id="usersChart"></canvas>
            </div>

            <div class="chart-card">
                <h4>Donations Monthly</h4>
                <canvas id="donationsChart"></canvas>
            </div>

            <div class="chart-card">
                <h4>Medical Providers Monthly</h4>
                <canvas id="medicalChart"></canvas>
            </div>

            <div class="chart-card">
                <h4>Events Monthly</h4>
                <canvas id="eventsChart"></canvas>
            </div>

            <div class="chart-card">
                <h4>Registered Pets Monthly</h4>
                <canvas id="petsChart"></canvas>
            </div>

            <div class="chart-card">
                <h4>Current vs Last Month</h4>
                <canvas id="comparisonChart"></canvas>
            </div>
        </div>


    </div>
    <div>
        <button id="downloadPdf">Download PDF</button>
        <button id="closeReport">Close</button> <!-- Close button -->
    </div>


    <script>
        const { jsPDF } = window.jspdf;

        document.getElementById('downloadPdf').addEventListener('click', function() {
            html2canvas(document.getElementById('reportContent')).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF('l', 'mm', 'a4'); // Set orientation to landscape ('l')
                const imgProps = pdf.getImageProperties(imgData);
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

                pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);

                // Open the PDF in a new tab
                const pdfBlob = pdf.output('blob');
                const pdfUrl = URL.createObjectURL(pdfBlob);
                window.open(pdfUrl, '_blank');
            });
        });

        // Redirect to admin/overview when the close button is clicked
        document.getElementById('closeReport').addEventListener('click', function() {
            window.location.href = '<?= ROOT ?>/admin/overview';
        });

        function createLineChart(id, labels, data, label, color) {
            new Chart(document.getElementById(id), {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: label,
                        data: data,
                        backgroundColor: color,
                        borderColor: color,
                        fill: true,
                        tension: 0.4
                    }]
                }
            });
        }

        function createBarChart(id, labels, datasets) {
            new Chart(document.getElementById(id), {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: datasets
                }
            });
        }

        // Load charts
        createLineChart('usersChart', <?= json_encode($usersChartData['labels']) ?>, <?= json_encode($usersChartData['values']) ?>, 'User Registrations', 'rgba(66, 133, 244, 0.7)');
        createLineChart('donationsChart', <?= json_encode($donationsChartData['labels']) ?>, <?= json_encode($donationsChartData['values']) ?>, 'Donations (LKR)', 'rgba(234, 67, 53, 0.7)');
        createLineChart('medicalChart', <?= json_encode($medicalChartData['labels']) ?>, <?= json_encode($medicalChartData['values']) ?>, 'Medical Providers', 'rgba(251, 188, 5, 0.7)');
        createLineChart('eventsChart', <?= json_encode($eventsChartData['labels']) ?>, <?= json_encode($eventsChartData['values']) ?>, 'Events', 'rgba(52, 168, 83, 0.7)');
        createLineChart('petsChart', <?= json_encode($petsChartData['labels']) ?>, <?= json_encode($petsChartData['values']) ?>, 'Registered Pets', 'rgba(156, 39, 176, 0.7)');

        // Comparison Chart
        createBarChart('comparisonChart', ['Current Month', 'Last Month'], [{
                label: 'Users',
                data: [<?= $data['thisMonthUsers'] ?>, <?= $data['lastMonthUsers'] ?>],
                backgroundColor: 'rgba(66, 133, 244, 0.7)',
            },
            {
                label: 'Medical Providers',
                data: [<?= $data['thisMonthMedicalProviders'] ?>, <?= $data['lastMonthMedicalProviders'] ?>],
                backgroundColor: 'rgba(251, 188, 5, 0.7)',
            },
            {
                label: 'Events',
                data: [<?= $data['thisMonthEvents'] ?>, <?= $data['lastMonthEvents'] ?>],
                backgroundColor: 'rgba(52, 168, 83, 0.7)',
            },
            {
                label: 'Registered Pets',
                data: [<?= $data['thisMonthRegisteredPets'] ?>, <?= $data['lastMonthRegisteredPets'] ?>],
                backgroundColor: 'rgba(156, 39, 176, 0.7)',
            }
        ]);
    </script>
</body>

</html>