@extends('Master')
@section('title','Dashboard')

@section("content")
@php
use App\Models\User;
@endphp

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <!-- Welcome Header -->
            <div class="welcome-header text-center mb-5 fade-in-up">
                <h1 class="display-4 fw-bold gradient-text mb-3">Welcome back, {{ $user->name }}!</h1>
                <p class="lead text-light">{{ $user->role === User::ROLE_ADMIN ? 'Admin Dashboard' : 'User Dashboard' }}</p>
                <div class="mt-4 d-flex gap-4">
                    @if($user->role === User::ROLE_ADMIN)
                    <a href="{{ route('produits.create') }}" class="btn btn-gradient-primary btn-lg action-btn">
                        <i class="fas fa-plus-circle me-2"></i>
                        Create Product
                    </a>
                    <!--<a href="{{ route('pcpartspecs.index') }}" class="btn btn-gradient-primary btn-lg action-btn">
                        <i class="fas fa-arrow-right me-2"></i>
                        Manage Specs
                    </a>-->
                    @endif
                    <a href="{{ route('pcbuilds.index') }}" class="btn btn-gradient-primary btn-lg action-btn">
                        <i class="fas fa-arrow-right me-2"></i>
                        {{ $user->role === User::ROLE_ADMIN ? 'Manage PC Builds' : 'Your PC Builds' }}
                    </a>
                </div>
            </div>

            <!-- User Info Card -->
            <div class="card shadow-lg mb-5 card-hover fade-in-up" style="animation-delay: 0.2s;">
                <div class="card-body p-4">
                    <h4 class="card-title mb-4 d-flex align-items-center">
                        <i class="fas fa-user-circle me-3 text-primary"></i>
                        Profile Information
                    </h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="info-box p-3 rounded-3 h-100">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-user text-success me-2"></i>
                                    <h6 class="fw-semibold mb-0">Name</h6>
                                </div>
                                <p class="mb-0 text-muted">{{ $user->name }}</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="info-box p-3 rounded-3 h-100">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-envelope text-info me-2"></i>
                                    <h6 class="fw-semibold mb-0">Email</h6>
                                </div>
                                <p class="mb-0 text-muted">{{ $user->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($user->role === User::ROLE_ADMIN)
            <!-- Admin Statistics -->
            <div class="row mb-5">
                <!-- Email Statistics -->
                <div class="col-lg-8 mb-4">
                    <div class="card shadow-lg card-hover fade-in-up" style="animation-delay: 0.4s;">
                        <div class="card-body p-4">
                            <h4 class="card-title mb-4 d-flex align-items-center">
                                <i class="fas fa-chart-bar me-3 text-warning"></i>
                                Email Statistics
                            </h4>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="stat-card bg-gradient-primary text-white p-3 rounded-3 text-center">
                                        <div class="stat-icon mb-2">
                                            <i class="fas fa-paper-plane fa-2x"></i>
                                        </div>
                                        <h3 class="stat-number mb-1" data-count="{{ $emailStats['emails_sent'] ?? 0 }}">0</h3>
                                        <small class="opacity-75">Total Emails Sent</small>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="stat-card bg-gradient-success text-white p-3 rounded-3 text-center">
                                        <div class="stat-icon mb-2">
                                            <i class="fas fa-clock fa-2x"></i>
                                        </div>
                                        <div class="stat-number mb-1">
                                            {{ $emailStats['last_sent'] ?? 'Never' }}
                                        </div>
                                        <small class="opacity-75">Last Email Sent</small>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="stat-card bg-gradient-info text-white p-3 rounded-3 text-center">
                                        <div class="stat-icon mb-2">
                                            <i class="fas fa-percentage fa-2x"></i>
                                        </div>
                                        <h3 class="stat-number mb-1" data-count="{{ $emailStats['success_rate'] ?? 95 }}">0</h3>
                                        <small class="opacity-75">Success Rate %</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- System Overview -->
                <div class="col-lg-4 mb-4">
                    <div class="card shadow-lg card-hover fade-in-up" style="animation-delay: 0.6s;">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4 d-flex align-items-center">
                                <i class="fas fa-cogs me-2 text-secondary"></i>
                                System Overview
                            </h5>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <small class="text-muted">Total Users</small>
                                    <span class="badge bg-primary rounded-pill">{{ $systemStats['total_users'] ?? 42 }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <small class="text-muted">Active Products</small>
                                    <span class="badge bg-success rounded-pill">{{ $systemStats['active_products'] ?? 28 }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <small class="text-muted">Pending Orders</small>
                                    <span class="badge bg-warning rounded-pill">{{ $systemStats['pending_orders'] ?? 7 }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <small class="text-muted">Storage Used</small>
                                    <span class="badge bg-info rounded-pill">{{ $systemStats['storage_used'] ?? '2.4GB' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Admin Charts Section -->
            <div class="row mb-5">
                <!-- Email Performance Chart -->
                <div class="col-lg-6 mb-4">
                    <div class="card shadow-lg card-hover fade-in-up" style="animation-delay: 0.4s;">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4 d-flex align-items-center">
                                <i class="fas fa-envelope me-2 text-primary"></i>
                                Email Performance
                            </h5>
                            <div class="chart-container" style="position: relative; height: 300px;">
                                <canvas id="emailPerformanceChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Growth Chart -->
                <div class="col-lg-6 mb-4">
                    <div class="card shadow-lg card-hover fade-in-up" style="animation-delay: 0.6s;">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4 d-flex align-items-center">
                                <i class="fas fa-users me-2 text-success"></i>
                                User Growth
                            </h5>
                            <div class="chart-container" style="position: relative; height: 300px;">
                                <canvas id="userGrowthChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- System Health Chart -->
                <div class="col-lg-12 mb-4">
                    <div class="card shadow-lg card-hover fade-in-up" style="animation-delay: 0.8s;">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4 d-flex align-items-center">
                                <i class="fas fa-heartbeat me-2 text-danger"></i>
                                System Health Overview
                            </h5>
                            <div class="chart-container" style="position: relative; height: 350px;">
                                <canvas id="systemHealthChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if($user->role === User::ROLE_USER)
            <!-- User Dashboard -->
            <div class="row mb-5">
                <!-- User Activity Chart -->
                <div class="col-lg-6 mb-4">
                    <div class="card shadow-lg card-hover fade-in-up" style="animation-delay: 0.4s;">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4 d-flex align-items-center">
                                <i class="fas fa-chart-line me-2 text-primary"></i>
                                Your Activity
                            </h5>
                            <div class="chart-container" style="position: relative; height: 300px;">
                                <canvas id="userActivityChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Interest Chart -->
                <div class="col-lg-6 mb-4">
                    <div class="card shadow-lg card-hover fade-in-up" style="animation-delay: 0.6s;">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4 d-flex align-items-center">
                                <i class="fas fa-shopping-basket me-2 text-success"></i>
                                Product Interests
                            </h5>
                            <div class="chart-container" style="position: relative; height: 300px;">
                                <canvas id="productInterestChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Promotions Card -->
                <div class="col-lg-12 mb-4">
                    <div class="card shadow-lg card-hover fade-in-up" style="animation-delay: 0.8s;">
                        <div class="card-body text-center p-5">
                            <div class="mb-4">
                                <i class="fas fa-gift fa-4x text-primary mb-3 pulse-animation"></i>
                                <h2 class="gradient-text mb-3">Discover Amazing Promotions!</h2>
                                <p class="lead text-muted mb-4">
                                    Explore our latest collection and exclusive offers just for you.
                                </p>
                            </div>

                            <div class="row justify-content-center ">
                                <div class="col-md-4 text-center">
                                    <a href="{{ route('catalogue.pdf') }}" class="btn btn-gradient-primary btn-lg w-100 action-btn">
                                        <i class="fas fa-download me-2"></i>
                                        Download Catalogue
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

<style>
/* Enhanced Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
}

@keyframes gradient {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Base Classes */
.fade-in-up {
    animation: fadeInUp 0.8s ease-out forwards;
    opacity: 0;
}

.pulse-animation {
    animation: pulse 2s infinite;
}

/* Gradient Text */
.gradient-text {
    background: linear-gradient(45deg, #5c32a3, #7b4cbf, #ff6b6b, #4ecdc4);
    background-size: 400% 400%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: gradient 3s ease infinite;
}

/* Card Enhancements */
.card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
}

.card-hover:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
}

/* Info Box */
.info-box {
    background: linear-gradient(135deg, #f8f9ff 0%, #e8f2ff 100%);
    border: 1px solid rgba(92, 50, 163, 0.1);
    transition: all 0.3s ease;
}

.info-box:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(92, 50, 163, 0.1);
}

/* Statistics Cards */
.stat-card {
    transition: all 0.3s ease;
    cursor: pointer;
}

.stat-card:hover {
    transform: translateY(-5px) scale(1.02);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

.stat-icon {
    opacity: 0.8;
}

.stat-number {
    font-size: 1.8rem;
    font-weight: 700;
}

/* Gradient Backgrounds */
.bg-gradient-primary {
    background: linear-gradient(45deg, #5c32a3, #7b4cbf) !important;
}

.bg-gradient-success {
    background: linear-gradient(45deg, #28a745, #20c997) !important;
}

.bg-gradient-info {
    background: linear-gradient(45deg, #17a2b8, #20c997) !important;
}

.bg-gradient-warning {
    background: linear-gradient(45deg, #ffc107, #fd7e14) !important;
}

.bg-gradient-danger {
    background: linear-gradient(45deg, #dc3545, #e83e8c) !important;
}

/* Button Enhancements */
.btn-gradient-primary {
    background: linear-gradient(45deg, #5c32a3, #7b4cbf);
    border: none;
    color: white;
    transition: all 0.3s ease;
}

.btn-gradient-success {
    background: linear-gradient(45deg, #28a745, #20c997);
    border: none;
    color: white;
    transition: all 0.3s ease;
}

.btn-gradient-info {
    background: linear-gradient(45deg, #17a2b8, #20c997);
    border: none;
    color: white;
    transition: all 0.3s ease;
}

.btn-gradient-warning {
    background: linear-gradient(45deg, #ffc107, #fd7e14);
    border: none;
    color: white;
    transition: all 0.3s ease;
}

.action-btn {
    position: relative;
    overflow: hidden;
    transform: translateY(0);
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}

.action-btn:before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s;
}

.action-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

.action-btn:hover:before {
    left: 100%;
}

/* Welcome Header */
.welcome-header {
    position: relative;
    padding: 2rem 0;
    margin-bottom: 3rem;
}

.welcome-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 100px;
    height: 3px;
    background: linear-gradient(45deg, #5c32a3, #7b4cbf);
    border-radius: 2px;
}

/* Chart Container Styles */
.chart-container {
    width: 100%;
    min-height: 300px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .stat-card {
        margin-bottom: 1rem;
    }

    .action-btn {
        margin-bottom: 1rem;
    }

    .welcome-header h1 {
        font-size: 2rem;
    }

    .chart-container {
        height: 250px !important;
    }
}

/* Loading Animation for Numbers */
.stat-number[data-count] {
    opacity: 0;
    animation: countUp 1s ease-out forwards;
}

@keyframes countUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animate numbers counting up
    const counters = document.querySelectorAll('.stat-number[data-count]');

    const animateCounters = () => {
        counters.forEach(counter => {
            const target = parseInt(counter.dataset.count);
            const increment = target / 100;
            let current = 0;

            const updateCounter = () => {
                if (current < target) {
                    current += increment;
                    counter.textContent = Math.ceil(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target;
                }
            };

            // Delay animation
            setTimeout(() => {
                counter.style.opacity = '1';
                updateCounter();
            }, 1000);
        });
    };

    // Trigger animations
    setTimeout(animateCounters, 500);

    // Add hover effects for cards
    const cards = document.querySelectorAll('.card-hover');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // Parallax scroll effect for welcome header
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const header = document.querySelector('.welcome-header');
        if (header) {
            header.style.transform = `translateY(${scrolled * 0.2}px)`;
        }
    });

    // Add click ripple effect to buttons
    const buttons = document.querySelectorAll('.action-btn');
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');

            this.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });

    @if($user->role === User::ROLE_ADMIN)
    // Admin Charts
    // Email Performance Chart
    const emailCtx = document.getElementById('emailPerformanceChart').getContext('2d');
    const emailPerformanceChart = new Chart(emailCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Emails Sent',
                data: [120, 190, 170, 220, 250, 280, 310, 290, 330, 350, 380, 400],
                backgroundColor: 'rgba(92, 50, 163, 0.7)',
                borderColor: 'rgba(92, 50, 163, 1)',
                borderWidth: 1
            }, {
                label: 'Emails Failed',
                data: [5, 8, 6, 10, 12, 15, 14, 10, 12, 8, 10, 5],
                backgroundColor: 'rgba(220, 53, 69, 0.7)',
                borderColor: 'rgba(220, 53, 69, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: 'Monthly Email Performance',
                    font: {
                        size: 16
                    }
                },
                tooltip: {
                    mode: 'index',
                    intersect: false
                },
                legend: {
                    position: 'bottom',
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Emails'
                    }
                }
            },
            animation: {
                duration: 2000,
                easing: 'easeOutQuart'
            }
        }
    });

    // User Growth Chart
    const userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
    const userGrowthChart = new Chart(userGrowthCtx, {
        type: 'line',
        data: {
            labels: ['2019', '2020', '2021', '2022', '2023', '2024'],
            datasets: [{
                label: 'Total Users',
                data: [150, 320, 450, 620, 850, 1120],
                backgroundColor: 'rgba(40, 167, 69, 0.1)',
                borderColor: 'rgba(40, 167, 69, 1)',
                borderWidth: 3,
                pointBackgroundColor: 'rgba(40, 167, 69, 1)',
                pointRadius: 5,
                pointHoverRadius: 7,
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: 'User Growth Over Years',
                    font: {
                        size: 16
                    }
                },
                tooltip: {
                    mode: 'index',
                    intersect: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Users'
                    }
                }
            },
            animation: {
                duration: 2000,
                easing: 'easeOutQuart'
            }
        }
    });

    // System Health Chart
    const systemHealthCtx = document.getElementById('systemHealthChart').getContext('2d');
    const systemHealthChart = new Chart(systemHealthCtx, {
        type: 'radar',
        data: {
            labels: ['Performance', 'Uptime', 'Security', 'Storage', 'Network', 'Database'],
            datasets: [{
                label: 'System Health',
                data: [95, 99, 90, 85, 92, 88],
                backgroundColor: 'rgba(220, 53, 69, 0.2)',
                borderColor: 'rgba(220, 53, 69, 1)',
                pointBackgroundColor: 'rgba(220, 53, 69, 1)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgba(220, 53, 69, 1)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: 'System Health Metrics',
                    font: {
                        size: 16
                    }
                },
                legend: {
                    position: 'bottom',
                }
            },
            scales: {
                r: {
                    angleLines: {
                        display: true
                    },
                    suggestedMin: 50,
                    suggestedMax: 100
                }
            },
            animation: {
                duration: 2000,
                easing: 'easeOutQuart'
            }
        }
    });
    @endif

    @if($user->role === User::ROLE_USER)
    // User Charts
    // User Activity Chart
    const userActivityCtx = document.getElementById('userActivityChart').getContext('2d');
    const userActivityChart = new Chart(userActivityCtx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Page Views',
                data: [12, 19, 15, 22, 18, 25, 30],
                backgroundColor: 'rgba(92, 50, 163, 0.1)',
                borderColor: 'rgba(92, 50, 163, 1)',
                borderWidth: 3,
                pointBackgroundColor: 'rgba(92, 50, 163, 1)',
                pointRadius: 5,
                pointHoverRadius: 7,
                fill: true,
                tension: 0.3
            }, {
                label: 'Products Viewed',
                data: [5, 8, 6, 10, 7, 12, 15],
                backgroundColor: 'rgba(23, 162, 184, 0.1)',
                borderColor: 'rgba(23, 162, 184, 1)',
                borderWidth: 3,
                pointBackgroundColor: 'rgba(23, 162, 184, 1)',
                pointRadius: 5,
                pointHoverRadius: 7,
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: 'Your Weekly Activity',
                    font: {
                        size: 16
                    }
                },
                tooltip: {
                    mode: 'index',
                    intersect: false
                },
                legend: {
                    position: 'bottom',
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Activity Count'
                    }
                }
            },
            animation: {
                duration: 2000,
                easing: 'easeOutQuart'
            }
        }
    });

    // Product Interest Chart
    const productInterestCtx = document.getElementById('productInterestChart').getContext('2d');
    const productInterestChart = new Chart(productInterestCtx, {
        type: 'doughnut',
        data: {
            labels: ['Components', 'Consoles', 'Accessoires', 'Setups', 'Config'],
            datasets: [{
                data: [35, 25, 20, 10, 10],
                backgroundColor: [
                    'rgba(92, 50, 163, 0.8)',
                    'rgba(40, 167, 69, 0.8)',
                    'rgba(23, 162, 184, 0.8)',
                    'rgba(255, 193, 7, 0.8)',
                    'rgba(220, 53, 69, 0.8)'
                ],
                borderColor: [
                    'rgba(92, 50, 163, 1)',
                    'rgba(40, 167, 69, 1)',
                    'rgba(23, 162, 184, 1)',
                    'rgba(255, 193, 7, 1)',
                    'rgba(220, 53, 69, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: 'Your Product Interests',
                    font: {
                        size: 16
                    }
                },
                legend: {
                    position: 'right',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.label}: ${context.raw}%`;
                        }
                    }
                }
            },
            cutout: '70%',
            animation: {
                animateScale: true,
                animateRotate: true,
                duration: 2000,
                easing: 'easeOutQuart'
            }
        }
    });
    @endif
});

// Add ripple animation CSS
const rippleStyle = document.createElement('style');
rippleStyle.textContent = `
    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: scale(0);
        animation: ripple-animation 0.6s linear;
        pointer-events: none;
    }

    @keyframes ripple-animation {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
`;
document.head.appendChild(rippleStyle);
</script>

@endsection
