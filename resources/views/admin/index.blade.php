@extends('admin.admin_master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('admin')
<div class="content-body">
    <div class="container-fluid">
        <!-- Header Section -->
        <div class="form-head mb-4 d-flex flex-wrap align-items-center justify-content-between">
            <h2 class="font-w600 mb-0">Dashboard Overview</h2>
            <div class="dashboard-date">
                <span class="text-gray-500 text-sm">{{ now()->format('F j, Y') }}</span>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card stat-card h-100" style="background: linear-gradient(135deg, #FF5722, #FF9100);">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="stat-icon-vibrant">
                                <i class="fas fa-info-circle fa-2x text-white"></i>
                            </div>
                            <div class="text-end">
                                <h3 class="mb-0 text-white count-up">{{ $totalInformation }}</h3>
                                <p class="mb-0 text-white-90">Total Information</p>
                            </div>
                        </div>
                        <div class="progress mt-3">
                            <div class="progress-bar" role="progressbar" style="width: {{ min($totalInformation, 100) }}%;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card stat-card h-100" style="background: linear-gradient(135deg, #4CAF50, #8BC34A);">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="stat-icon-vibrant">
                                <i class="fas fa-handshake fa-2x text-white"></i>
                            </div>
                            <div class="text-end">
                                <h3 class="mb-0 text-white count-up">{{ $totalServices }}</h3>
                                <p class="mb-0 text-white-90">Total Services</p>
                            </div>
                        </div>
                        <div class="progress mt-3">
                            <div class="progress-bar" role="progressbar" style="width: {{ min($totalServices, 100) }}%;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card stat-card h-100" style="background: linear-gradient(135deg, #2196F3, #03A9F4);">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="stat-icon-vibrant">
                                <i class="fas fa-project-diagram fa-2x text-white"></i>
                            </div>
                            <div class="text-end">
                                <h3 class="mb-0 text-white count-up">{{ $totalProjects }}</h3>
                                <p class="mb-0 text-white-90">Total Projects</p>
                            </div>
                        </div>
                        <div class="progress mt-3">
                            <div class="progress-bar" role="progressbar" style="width: {{ min($totalProjects, 100) }}%;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card stat-card h-100" style="background: linear-gradient(135deg, #E91E63, #F06292);">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="stat-icon-vibrant">
                                <i class="fas fa-graduation-cap fa-2x text-white"></i>
                            </div>
                            <div class="text-end">
                                <h3 class="mb-0 text-white count-up">{{ $totalCourses }}</h3>
                                <p class="mb-0 text-white-90">Total Courses</p>
                            </div>
                        </div>
                        <div class="progress mt-3">
                            <div class="progress-bar" role="progressbar" style="width: {{ min($totalCourses, 100) }}%;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card stat-card h-100" style="background: linear-gradient(135deg, #7B1FA2, #AF52BF);">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="stat-icon-vibrant">
                                <i class="fas fa-home fa-2x text-white"></i>
                            </div>
                            <div class="text-end">
                                <h3 class="mb-0 text-white count-up">{{ $totalHomeContent }}</h3>
                                <p class="mb-0 text-white-90">Home Content</p>
                            </div>
                        </div>
                        <div class="progress mt-3">
                            <div class="progress-bar" role="progressbar" style="width: {{ min($totalHomeContent, 100) }}%;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card stat-card h-100" style="background: linear-gradient(135deg, #00BFA5, #26A69A);">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="stat-icon-vibrant">
                                <i class="fas fa-comments fa-2x text-white"></i>
                            </div>
                            <div class="text-end">
                                <h3 class="mb-0 text-white count-up">{{ $totalClientReviews }}</h3>
                                <p class="mb-0 text-white-90">Client Reviews</p>
                            </div>
                        </div>
                        <div class="progress mt-3">
                            <div class="progress-bar" role="progressbar" style="width: {{ min($totalClientReviews, 100) }}%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="row">
            <!-- Bar Chart (Full Width) -->
            <div class="col-12 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Technology Usage (Bar)</h4>
                        <div class="chart-container" style="position: relative; height: 300px;">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
const barCtx = document.getElementById('barChart').getContext('2d');

const labels = @json($chartLabels);
const data = @json($chartValues);

// Bar Chart
new Chart(barCtx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Technology',
            data: data,
            backgroundColor: 'rgba(54, 162, 235, 0.7)',
            borderColor: 'rgb(113, 121, 126)',
            borderWidth: 1,
            maxBarThickness: 40,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        aspectRatio: 2,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    color: 'white'
                },
                grid: {
                    color: 'rgb(113, 121, 126)'
                }
            },
            x: { // Added x-axis ticks and grid color for consistency
                ticks: {
                    color: 'white'
                },
                grid: {
                    color: 'rgb(113, 121, 126)'
                }
            }
        },
        plugins: {
            legend: {
                labels: {
                    color: 'white'
                }
            }
        }
    }
});
</script>
@endsection