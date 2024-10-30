<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }

        .status {
            font-weight: bold;
        }

        .btn-status {
            font-weight: bold;
        }

        .btn-on {
            background-color: green;
            color: white;
        }

        .btn-off {
            background-color: red;
            color: white;
        }


        .chart-container {
            height: 300px;
            /* Adjust the height of the chart */
        }

        .card-title {
            font-weight: bold;
        }

        .table-responsive {
            max-height: 400px;
            /* Limit height of the table container */
            overflow-y: auto;
            /* Enable scrolling if needed */
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
            /* Highlight table rows on hover */
        }

        @media (max-width: 576px) {
            .chart-container {
                height: 250px;
                /* Adjust chart height for small screens */
            }
        }
    </style>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script>
        //var server = '';
        //var server = 'https://catuses.com';
        var server = 'http://192.168.1.150/';

        let potentiometerChart;
        const MAX_DATA_POINTS = 25; // Maximum number of data points to display

        // Fetch LED status and update UI
        function fetchStatus() {
            fetch(server + '/proyecto/show_status.php')
                .then(response => response.text())
                .then(data => {
                    const status = parseInt(data, 10);
                    const ledStatus = document.getElementById('ledStatus');
                    const toggleButton = document.getElementById('toggleButton');

                    if (status === 1) {
                        ledStatus.textContent = "Sistema Fotovoltaico";
                        ledStatus.style.color = "green";
                        toggleButton.classList.remove('btn-off');
                        toggleButton.classList.add('btn-on');
                        toggleButton.textContent = "PASAR A Corriente Alterna";
                    } else {
                        ledStatus.textContent = "Alimentacion CA";
                        ledStatus.style.color = "red";
                        toggleButton.classList.remove('btn-on');
                        toggleButton.classList.add('btn-off');
                        toggleButton.textContent = "ENCENDER INVERSOR";
                    }
                })
                .catch(error => console.error('Error fetching status:', error));
        }

        // Fetch table data for LED status history
        // Fetch table data for LED status history
        function fetchTableData() {
            fetch(server + '/proyecto/fetch_table_data.php')
                .then(response => {
                    // Check if the response is OK (status code in the range 200-299)
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json(); // Parse JSON from the response
                })
                .then(data => {
                    // Initialize DataTable with desired options
                    const table = $('#statusTable').DataTable({
                        destroy: true, // Allows reinitialization of the table
                        searching: false, // Disables search box
                        paging: false, // Disables pagination
                        info: false, // Disables info display
                        lengthChange: false, // Disables page length options
                    });

                    table.clear(); // Clear existing data in the table

                    // Add a new row for each item in the data
                    data.forEach(row => {
                        table.row.add([row.id, row.status == 1 ? 'SISTEMA INVERSOR' : 'CORRIENTE ALTERNA']);
                    });

                    table.draw(); // Redraw the table to reflect the new data
                })
                .catch(error => console.error('Error fetching table data:', error)); // Handle errors
        }


        // Fetch potentiometer data and update both table and chart
        function fetchPotentiometerData() {
            fetch(server + '/proyecto/fetch_potentiometer_data.php')
                .then(response => response.json())
                .then(data => {
                    const potTable = $('#potentiometerTable').DataTable();
                    potTable.clear();
                    const labels = [];
                    const values = [];

                    data.forEach(row => {
                        potTable.row.add([row.id, row.pot_value, row.recorded_at]);
                        labels.push(row.recorded_at);
                        values.push(row.pot_value);
                    });
                    potTable.draw();

                    // Update Chart
                    updateChart(potentiometerChart, labels, values);
                })
                .catch(error => console.error('Error fetching potentiometer data:', error));
        }

        // Update the Chart.js chart
        function updateChart(chart, labels, data) {
            if (data.length > MAX_DATA_POINTS) {
                // Keep only the last MAX_DATA_POINTS entries
                data = data.slice(-MAX_DATA_POINTS);
                labels = labels.slice(-MAX_DATA_POINTS);
            }

            chart.data.labels = labels;
            chart.data.datasets[0].data = data;
            chart.update();
        }

        $(document).ready(function() {
            fetchStatus();
            fetchTableData();
            fetchPotentiometerData();

            setInterval(fetchStatus, 1000); // Fetch LED status every second
            setInterval(fetchTableData, 1000); // Fetch status table every second
            setInterval(fetchPotentiometerData, 1000); // Fetch potentiometer data every second

            // Initialize DataTables
            $('#statusTable').DataTable();
            $('#potentiometerTable').DataTable();

            // Initialize Chart.js
            const ctx = document.getElementById('potentiometerChart').getContext('2d');
            potentiometerChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [], // Start with empty labels
                    datasets: [{
                        label: 'Lectura del voltaje en tiempo real',
                        data: [], // Start with empty data
                        backgroundColor: 'rgba(0, 123, 255, 0.2)',
                        borderColor: 'rgba(0, 123, 255, 1)',
                        borderWidth: 2,
                        fill: true
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Timestamp'
                            },
                            ticks: {
                                autoSkip: true, // Skip some labels if there are too many
                                maxTicksLimit: 10 // Max number of ticks on x-axis
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Voltaje'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });

            // Button toggle listener
            $('#toggleButton').click(function() {
                const status = $(this).hasClass('btn-on') ? 0 : 1;
                fetch(server + `/proyecto/save.php?status=${status}`)
                    .then(response => response.text())
                    .then(data => {
                        console.log('Response:', data);
                        fetchStatus();
                    })
                    .catch(error => console.error('Error updating status:', error));
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <h1 class="mb-4">Sistema Conmutador DC/AC </h1>
        <div class="container mt-4"> <!-- Added margin top for spacing -->
            <div class="row">
                <!-- LED Status Card -->
                <div class="col-md-6 mb-4"> <!-- Margin bottom for spacing -->
                    <div class="card shadow-sm"> <!-- Added shadow for depth -->
                        <div class="card-body text-center"> <!-- Center align text -->
                            <h5 class="card-title">Alimentación del Conmutador</h5>
                            <p id="ledStatus" class="status display-4">Cargando...</p> <!-- Increased font size -->
                            <button id="toggleButton" class="btn btn-primary btn-lg">Cambiar estado del Sistema</button> <!-- Larger button -->
                        </div>
                    </div>
                </div>

                <!-- Status Table -->
                <div class="col-md-6 mb-4"> <!-- Margin bottom for spacing -->
                    <div class="card shadow-sm"> <!-- Added shadow for depth -->
                        <div class="card-body">
                            <h5 class="card-title">Estado del Sistema</h5> <!-- Added title for context -->
                            <table id="statusTable" class="table table-striped table-bordered">
                                <thead class="thead-dark"> <!-- Dark header for contrast -->
                                    <tr>
                                        <th>Id</th>
                                        <th>Origen</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <hr>


        <div class="container mt-4">
            <h2 class="text-center mb-4">Monitoreo de Voltaje</h2>
            <div class="row align-items-stretch">
                <!-- Potentiometer Chart -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Gráfico de Voltaje</h5>
                            <div class="chart-container">
                                <canvas id="potentiometerChart" width="600" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Potentiometer Table -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Lectura de Voltajes en Tiempo Real (c/1s)</h5>
                            <div class="table-responsive">
                                <table id="potentiometerTable" class="table table-striped table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Id</th>
                                            <th>Voltaje</th>
                                            <th>Fecha y Hora</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>





    </div>
</body>

</html>