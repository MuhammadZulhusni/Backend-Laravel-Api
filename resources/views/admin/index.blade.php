@extends('admin.admin_master')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('admin')
<div class="content-body">
    <div class="container-fluid">
        <!-- Header Section - Retains previous elegant styling -->
        <div class="form-head mb-4 d-flex flex-wrap align-items-center justify-content-between">
            <h2 class="font-w600 mb-0">Dashboard Overview</h2>
			<div class="dashboard-date">
				<span class="text-gray-500 text-sm">{{ now()->format('F j, Y') }}</span>
			</div>
        </div>

        <!-- Stats Cards Grid -->
        <div class="row">
            <!-- Total Information Card -->
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card stat-card h-100 hover-scale" style="background: linear-gradient(135deg, #42A5F5, #2196F3);">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="stat-icon-vibrant"> {{-- New class for vibrant icon styling --}}
                                <svg width="40" height="40" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 15C29.5 15 21 23.5 21 34C21 44.5 29.5 53 40 53C50.5 53 59 44.5 59 34C59 23.5 50.5 15 40 15ZM40 20C46.6274 20 52 25.3726 52 32C52 38.6274 46.6274 44 40 44C33.3726 44 28 38.6274 28 32C28 25.3726 33.3726 20 40 20Z" fill="white"/>
                                    <path d="M40 46C38.62 46 37.49 46.99 37.05 48.33L32.18 63.63C31.54 65.57 32.74 67.5 34.72 67.5H45.28C47.26 67.5 48.46 65.57 47.82 63.63L42.95 48.33C42.51 46.99 41.38 46 40 46Z" fill="white"/>
                                </svg>
                            </div>
                            <div class="text-end">
                                <h3 class="mb-0 text-white">{{ $totalInformation }}</h3>
                                <p class="mb-0 text-white-50 ">Total Information</p> {{-- text-white-50 for subtle grey --}}
                            </div>
                        </div>
                        <div class="progress mt-3" style="height: 4px;">
                            <div class="progress-bar" role="progressbar" style="width: {{ min($totalInformation, 100) }}%; background: rgba(255, 255, 255, 0.4) !important;" aria-valuenow="{{ $totalInformation }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Services Card -->
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card stat-card h-100 hover-scale" style="background: linear-gradient(135deg, #EF5350, #E53935);">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="stat-icon-vibrant">
                                <svg width="40" height="40" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 15C29.5 15 21 23.5 21 34C21 44.5 29.5 53 40 53C50.5 53 59 44.5 59 34C59 23.5 50.5 15 40 15ZM40 20C46.6274 20 52 25.3726 52 32C52 38.6274 46.6274 44 40 44C33.3726 44 28 38.6274 28 32C28 25.3726 33.3726 20 40 20Z" fill="white"/>
                                    <path d="M40 46C38.62 46 37.49 46.99 37.05 48.33L32.18 63.63C31.54 65.57 32.74 67.5 34.72 67.5H45.28C47.26 67.5 48.46 65.57 47.82 63.63L42.95 48.33C42.51 46.99 41.38 46 40 46Z" fill="white"/>
                                </svg>
                            </div>
                            <div class="text-end">
                                <h3 class="mb-0 text-white">{{ $totalServices }}</h3>
                                <p class="mb-0 text-white-50">Total Services</p>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height: 4px;">
                            <div class="progress-bar" role="progressbar" style="width: {{ min($totalServices, 100) }}%; background: rgba(255, 255, 255, 0.4) !important;" aria-valuenow="{{ $totalServices }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Projects Card -->
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card stat-card h-100 hover-scale" style="background: linear-gradient(135deg, #66BB6A, #43A047);">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="stat-icon-vibrant">
                                <svg width="40" height="40" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M30 30L50 50M50 30L30 50" stroke="white" stroke-width="4" stroke-linecap="round"/>
                                    <circle cx="40" cy="40" r="30" stroke="white" stroke-width="4"/>
                                </svg>
                            </div>
                            <div class="text-end">
                                <h3 class="mb-0 text-white">{{ $totalProjects }}</h3>
                                <p class="mb-0 text-white-50">Total Projects</p>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height: 4px;">
                            <div class="progress-bar" role="progressbar" style="width: {{ min($totalProjects, 100) }}%; background: rgba(255, 255, 255, 0.4) !important;" aria-valuenow="{{ $totalProjects }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Courses Card -->
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card stat-card h-100 hover-scale" style="background: linear-gradient(135deg, #AB47BC, #8E24AA);">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="stat-icon-vibrant">
                                <svg width="40" height="40" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 20L20 40L40 60L60 40L40 20Z" fill="white"/>
                                    <path d="M40 28L28 40L40 52L52 40L40 28Z" fill="white"/>
                                </svg>
                            </div>
                            <div class="text-end">
                                <h3 class="mb-0 text-white">{{ $totalCourses }}</h3>
                                <p class="mb-0 text-white-50">Total Courses</p>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height: 4px;">
                            <div class="progress-bar" role="progressbar" style="width: {{ min($totalCourses, 100) }}%; background: rgba(255, 255, 255, 0.4) !important;" aria-valuenow="{{ $totalCourses }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Home Content Card -->
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card stat-card h-100 hover-scale" style="background: linear-gradient(135deg, #FFCA28, #FFC107);">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="stat-icon-vibrant">
                                <svg width="40" height="40" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 10L10 40H20V70H35V50H45V70H60V40H70L40 10Z" fill="white"/>
                                </svg>
                            </div>
                            <div class="text-end">
                                <h3 class="mb-0 text-white">{{ $totalHomeContent }}</h3>
                                <p class="mb-0 text-white-50">Home Content</p>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height: 4px;">
                            <div class="progress-bar" role="progressbar" style="width: {{ min($totalHomeContent, 100) }}%; background: rgba(255, 255, 255, 0.4) !important;" aria-valuenow="{{ $totalHomeContent }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Client Reviews Card -->
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card stat-card h-100 hover-scale" style="background: linear-gradient(135deg, #26A69A, #00897B);">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="stat-icon-vibrant">
                                <svg width="40" height="40" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M40 20L32 36L15 38L28 50L24 68L40 60L56 68L52 50L65 38L48 36L40 20Z" fill="white"/>
                                </svg>
                            </div>
                            <div class="text-end">
                                <h3 class="mb-0 text-white">{{ $totalClientReviews }}</h3>
                                <p class="mb-0 text-white-50">Client Reviews</p>
                            </div>
                        </div>
                        <div class="progress mt-3" style="height: 4px;">
                            <div class="progress-bar" role="progressbar" style="width: {{ min($totalClientReviews, 100) }}%; background: rgba(255, 255, 255, 0.4) !important;" aria-valuenow="{{ $totalClientReviews }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- The rest of your charts section would follow here, with updated Chart.js colors --}}
        <!-- Charts Section -->
        <div class="row">
            <!-- Bar Chart -->
            <div class="col-lg-8 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Technology Value Overview</h4>
                        <div class="dropdown">
                            <ul class="dropdown-menu" aria-labelledby="chartDropdown">
                                <li><a class="dropdown-item" href="#">This Week</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                                <li><a class="dropdown-item" href="#">All Time</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="position: relative; height: 300px;">
                            <canvas id="myBarChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Content Distribution</h4>
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="position: relative; height: 300px;">
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
        // Bar Chart Data
        const technologyLabels = @json($chartLabels);
        const technologyValues = @json($chartValues);
        
        // Pie Chart Data - Updated for dark theme
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
                    'rgba(66, 165, 245, 0.8)',
                    'rgba(239, 83, 80, 0.8)',
                    'rgba(102, 187, 106, 0.8)',
                    'rgba(171, 71, 188, 0.8)',
                    'rgba(255, 202, 40, 0.8)',
                    'rgba(38, 166, 154, 0.8)'
                ],
                borderColor: [
                    'rgba(66, 165, 245, 1)',
                    'rgba(239, 83, 80, 1)',
                    'rgba(102, 187, 106, 1)',
                    'rgba(171, 71, 188, 1)',
                    'rgba(255, 202, 40, 1)',
                    'rgba(38, 166, 154, 1)'
                ],
                borderWidth: 1
            }]
        };

        // Dark theme chart options
        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: {
                        color: '#e6e6e6' // Light text for dark background
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
                        color: 'rgba(42, 58, 94, 0.5)'
                    },
                    ticks: {
                        color: '#b8b8b8'
                    }
                },
                y: {
                    grid: {
                        color: 'rgba(42, 58, 94, 0.5)'
                    },
                    ticks: {
                        color: '#b8b8b8'
                    }
                }
            }
        };

        // Bar Chart with dark theme
        const barCtx = document.getElementById('myBarChart').getContext('2d');
        const myBarChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: technologyLabels,
                datasets: [{
                    label: 'Technology Value',
                    data: technologyValues,
                    backgroundColor: 'rgba(66, 165, 245, 0.7)',
                    borderColor: 'rgba(66, 165, 245, 1)',
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

        // Pie Chart with dark theme
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
                            color: '#e6e6e6',
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

        // Enhanced hover effect for dark cards
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

