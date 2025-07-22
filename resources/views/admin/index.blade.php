@extends('admin.admin_master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('admin')
<div class="content-body">
    <div class="container-fluid">
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
                            <div class="stat-icon-tile">
                                <i class="fas fa-info-circle fa-2x text-white"></i>
                            </div>
                            <div class="text-end">
                                <h3 class="mb-0 text-white">{{ $totalInformation }}</h3>
                                <p class="mb-0 text-white-50">Total Information</p>
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
                            <div class="stat-icon-tile">
                                <i class="fas fa-handshake fa-2x text-white"></i>
                            </div>
                            <div class="text-end">
                                <h3 class="mb-0 text-white">{{ $totalServices }}</h3>
                                <p class="mb-0 text-white-50">Total Services</p>
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
                            <div class="stat-icon-tile">
                                <i class="fas fa-project-diagram fa-2x text-white"></i>
                            </div>
                            <div class="text-end">
                                <h3 class="mb-0 text-white">{{ $totalProjects }}</h3>
                                <p class="mb-0 text-white-50">Total Projects</p>
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
                            <div class="stat-icon-tile">
                                <i class="fas fa-graduation-cap fa-2x text-white"></i>
                            </div>
                            <div class="text-end">
                                <h3 class="mb-0 text-white">{{ $totalCourses }}</h3>
                                <p class="mb-0 text-white-50">Total Courses</p>
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
                            <div class="stat-icon-tile">
                                <i class="fas fa-home fa-2x text-white"></i>
                            </div>
                            <div class="text-end">
                                <h3 class="mb-0 text-white">{{ $totalHomeContent }}</h3>
                                <p class="mb-0 text-white-50">Home Content</p>
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
                            <div class="stat-icon-tile">
                                <i class="fas fa-comments fa-2x text-white"></i>
                            </div>
                            <div class="text-end">
                                <h3 class="mb-0 text-white">{{ $totalClientReviews }}</h3>
                                <p class="mb-0 text-white-50">Client Reviews</p>
                            </div>
                        </div>
                        <div class="progress mt-3">
                            <div class="progress-bar" role="progressbar" style="width: {{ min($totalClientReviews, 100) }}%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        ---

        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card h-100" style="background-color: #2a3a5e; border: 1px solid #3b4e72; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">
                    <div class="card-header d-flex justify-content-between align-items-center" style="border-bottom: 1px solid #3b4e72;">
                        <h4 class="card-title mb-0" style="color: #e6e6e6;">Technology Value Overview</h4>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="myBarChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mb-4">
                <div class="card h-100" style="background-color: #2a3a5e; border: 1px solid #3b4e72; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);">
                    <div class="card-header" style="border-bottom: 1px solid #3b4e72;">
                        <h4 class="card-title mb-0" style="color: #e6e6e6;">Content Distribution</h4>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="contentPieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const technologyLabels = @json($chartLabels);
        const technologyValues = @json($chartValues);

        const contentData = {
            labels: ['Information', 'Services', 'Projects', 'Courses', 'Home Content', 'Reviews'],
            datasets: [{
                data: [
                    {{ $totalInformation }},
                    {{ $totalServices }},
                    {{ $totalProjects }},
                    {{ $totalCourses }},
                    {{ $totalHomeContent }},
                    {{ $totalClientReviews }}
                ],
                backgroundColor: [
                    'rgba(141, 198, 63, 0.7)',
                    'rgba(255, 179, 71, 0.7)',
                    'rgba(66, 133, 244, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 102, 102, 0.7)',
                    'rgba(0, 204, 153, 0.7)'
                ],
                borderColor: [
                    'rgba(141, 198, 63, 1)',
                    'rgba(255, 179, 71, 1)',
                    'rgba(66, 133, 244, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 102, 102, 1)',
                    'rgba(0, 204, 153, 1)'
                ],
                borderWidth: 1
            }]
        };

        Chart.defaults.color = '#ffffff !important';

        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: {
                        color: '#ffffff !important'
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(30, 30, 50, 0.9)',
                    titleColor: '#ffffff',
                    bodyColor: '#e6e6e6',
                    borderColor: '#2a3a5e',
                    borderWidth: 1,
                    padding: 12,
                    cornerRadius: 8
                }
            },
            scales: {
                x: {
                    grid: {
                        color: 'rgba(59, 78, 114, 0.5)'
                    },
                    ticks: {
                        color: '#ffffff !important'
                    }
                },
                y: {
                    grid: {
                        color: 'rgba(59, 78, 114, 0.5)'
                    },
                    ticks: {
                        color: '#ffffff'
                    }
                }
            }
        };

        const barCtx = document.getElementById('myBarChart').getContext('2d');
        const myBarChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: technologyLabels,
                datasets: [{
                    label: 'Technology Value',
                    data: technologyValues,
                    backgroundColor: 'rgba(84, 180, 211, 0.7)',
                    borderColor: 'rgba(84, 180, 211, 1)',
                    borderWidth: 1,
                    borderRadius: 4
                }]
            },
            options: {
                ...chartOptions,
                plugins: {
                    ...chartOptions.plugins,
                    legend: {
                        display: false
                    }
                }
            }
        });

        const pieCtx = document.getElementById('contentPieChart').getContext('2d');
        const contentPieChart = new Chart(pieCtx, {
            type: 'doughnut',
            data: contentData,
            options: {
                ...chartOptions,
                cutout: '70%',
                plugins: {
                    ...chartOptions.plugins,
                    legend: {
                        position: 'right',
                        labels: {
                            color: '#ffffff',
                            padding: 20,
                            boxWidth: 12,
                            font: {
                                size: 12
                            }
                        }
                    },
                    tooltip: {
                        ...chartOptions.plugins.tooltip,
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = Math.round((value / total) * 100);
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });

        const statCards = document.querySelectorAll('.stat-card');
        statCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
                this.style.boxShadow = '0 15px 35px rgba(0, 0, 0, 0.4)';
            });
            card.addEventListener('mouseleave', function() {
                this.style.transform = '';
                this.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.2)';
            });
        });
    });
</script>
@endsection