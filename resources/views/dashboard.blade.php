<!DOCTYPE html>
<html>
<head>
    <title>AMR Dashboard</title>

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f9;
        }

        .header {
            background: #0d6efd;
            color: white;
            padding: 20px;
            font-size: 22px;
            font-weight: bold;
        }

        .container {
            padding: 20px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            margin: 0;
            color: #6c757d;
            font-size: 16px;
        }

        .card .value {
            font-size: 30px;
            font-weight: bold;
            margin-top: 10px;
        }

        .card.blue { border-left: 5px solid #0d6efd; }
        .card.red { border-left: 5px solid #dc3545; }
        .card.green { border-left: 5px solid #198754; }

        .section {
            margin-top: 30px;
        }

        .chart-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            height: 500px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            color: #888;
            font-size: 14px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <div class="header">
        🇹🇿 AMR Surveillance Dashboard
    </div>

    <div class="container">

        <!-- CARDS -->
        <div class="cards">

            <div class="card blue">
                <h3>Total Samples</h3>
                <div class="value">{{ $samples }}</div>
            </div>

            <div class="card red">
                <h3>AMR Alerts</h3>
                <div class="value">{{ $alerts }}</div>
            </div>

            <div class="card green">
                <h3>AMU Usage</h3>
                <div class="value">{{ $amu }}</div>
            </div>

        </div>

        <!-- CHART SECTION -->
        <div class="section">
            <div class="chart-box">
              <div style="display:flex; gap:30px; flex-wrap:wrap;">
                <div>
                    <h4>Resistance Levels</h4>
                    <canvas id="resistanceChart"></canvas>
                </div>

                <div>
                    <h4>Samples by Facility</h4>
                    <canvas id="facilityChart"></canvas>
                </div>

                <div>
                    <h4>Sample Types</h4>
                    <canvas id="sampleTypeChart"></canvas>
                </div>

                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <div class="footer">
            Tanzania One Health AMR Platform © {{ date('Y') }}
        </div>

    </div>

</body>
<script>
    // 🔴 Resistance Levels
    const resistanceLabels = @json($resistance_levels->pluck('label'));
    const resistanceData = @json($resistance_levels->pluck('total'));

    new Chart(document.getElementById('resistanceChart'), {
        type: 'pie',
        data: {
            labels: resistanceLabels,
            datasets: [{
                data: resistanceData
            }]
        }
    });

    // 🏥 Samples by Facility
    const facilityLabels = @json($samples_by_facility->map(fn($x) => $x->facility->name ?? 'Unknown'));
    const facilityData = @json($samples_by_facility->pluck('total'));

    new Chart(document.getElementById('facilityChart'), {
        type: 'pie',
        data: {
            labels: facilityLabels,
            datasets: [{
                data: facilityData
            }]
        }
    });

    // 🧪 Sample Types
    const sampleTypeLabels = @json($sample_type_distribution->map(fn($x) => $x->sampleType->name ?? 'Unknown'));
    const sampleTypeData = @json($sample_type_distribution->pluck('total'));

    new Chart(document.getElementById('sampleTypeChart'), {
        type: 'pie',
        data: {
            labels: sampleTypeLabels,
            datasets: [{
                data: sampleTypeData
            }]
        }
    });
</script>
</html>