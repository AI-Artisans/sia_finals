<h2>Dashboard Overview</h2>

<!-- Stats Cards -->
<div class="row row-cards">
    <div class="col-sm-6 col-lg-6"> <!-- Increased width for better spacing -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Total Users</h4>
                <p class="text-muted" style="font-size: 1.5rem;">
                    <?= isset($total_users) ? $total_users : '100' ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-6"> <!-- Increased width for better spacing -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Total Posts</h4>
                <p class="text-muted" style="font-size: 1.5rem;">
                    <?= isset($total_posts) ? $total_posts : '200' ?>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="row row-cards mt-4">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Posts Trend</h4>
                <!-- Bar chart for posts per month -->
                <canvas id="postChart" style="max-height:300px;"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Include Chart.js from CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const postLabels = <?= json_encode($labels) ?>;
    const postData = <?= json_encode($data) ?>;

    const ctxPost = document.getElementById('postChart').getContext('2d');
    new Chart(ctxPost, {
        type: 'bar',
        data: {
            labels: postLabels,
            datasets: [{
                label: 'Posts per Month',
                data: postData,
                backgroundColor: '#36a2eb'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

</script>