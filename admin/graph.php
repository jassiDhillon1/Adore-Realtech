<?php
// Database connection
$connect = new PDO("mysql:host=localhost;dbname=advertindiaco_adore_db","advertindiaco_adore_user", "adore@321#@!");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



    // Query to get the count of properties by property type
    $query = "SELECT property_type.ptype_name, COUNT(properties.p_id) AS count 
              FROM properties 
              JOIN property_type ON properties.prop_type = property_type.id 
              GROUP BY properties.prop_type";
              
    $stmt = $connect->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Prepare data for chart
    $types = [];
    $counts = [];
    
    foreach ($results as $row) {
        $types[] = $row['ptype_name'];
        $counts[] = $row['count'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Types Bar Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div style="width: 70%; margin: auto;">
    <canvas id="propertyBarChart"></canvas>
</div>

<script>
    // Pass PHP data to JavaScript
    const types = <?php echo json_encode($types); ?>;
    const counts = <?php echo json_encode($counts); ?>;

    // Create the bar chart
    const ctx = document.getElementById('propertyBarChart').getContext('2d');
    const propertyBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: types,
            datasets: [{
                label: 'Number of Properties',
                data: counts,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                title: {
                    display: true,
                    text: 'Number of Properties by Property Type'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Count'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Property Type'
                    }
                }
            }
        }
    });
</script>

</body>
</html>

