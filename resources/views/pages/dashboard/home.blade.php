<?php

use App\Services\DashboardService;
use Livewire\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.admin')] class extends Component {
    public array $metrics = [];
    public array $dailyRegistrations = [];
    public array $eventStatus = [];
    public array $eventTimeline = [];
    public array $registrationMetrics = [];
    public array $attendanceStatus = [];
    public array $recentRegistrations = [];
    public array $recentEvents = [];
    public array $dashboardData = [];

    public array $eventStatusChart = [];
    /*     public array $eventStatusChart = [
        'type' => 'pie',
        'data' => [
            'labels' => ['Mary', 'Joe', 'Ana'],
            'datasets' => [
                [
                    'label' => '# of Votes',
                    'data' => [12, 19, 3],
                ]
            ]
        ]
    ];
 */
    public function mount()
    {
        $service = new DashboardService();
        $this->metrics = $service->getKeyMetrics();
        $this->dailyRegistrations = $service->getDailyRegistrations();
        $this->eventStatus = $service->getEventStatusDistribution();
        $this->eventTimeline = $service->getEventTimeline();
        $this->registrationMetrics = $service->getRegistrationMetrics();
        $this->attendanceStatus = $service->getAttendanceStatus();
        $this->recentRegistrations = $service->getRecentRegistrations();
        $this->recentEvents = $service->getRecentEvents();

        $this->eventStatusChart = [
            'type' => 'pie',
            'data' => [
                'labels' => $this->eventStatus['labels'] ?? ['No Data'],
                'datasets' => [
                    [
                        'label' => 'Event Status Distribution',
                        'data' => $this->eventStatus['values'] ?? [0],
                    ]
                ]
            ]
        ];


        $this->dashboardData = [
            'dailyRegistrations' => $dailyRegistrations ?? ['dates' => [], 'counts' => []],
            'eventStatus' => $eventStatus ?? ['labels' => [], 'values' => []],
            'eventTimeline' => $eventTimeline ?? ['labels' => [], 'values' => []],
            'registrationMetrics' => $registrationMetrics ?? ['labels' => [], 'values' => []],
            'attendanceStatus' => $attendanceStatus ?? ['labels' => [], 'values' => []],
        ];



        //dd($this->dailyRegistrations);
        // dd($this->dailyRegistrations, $this->eventStatus, $this->eventTimeline, $this->registrationMetrics, $this->attendanceStatus, $this->recentRegistrations, $this->recentEvents);
    }
};
?>

<x-slot name="title">
    {{ __('Dashboard') }}
</x-slot>

<x-slot name="header">
    <h2 class="text-3xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Section 1: Key Metrics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Users -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 border-l-4 border-blue-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Total Users</p>
                        <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">{{ $metrics['total_users'] ?? 0 }}</p>
                    </div>
                    <div class="text-blue-500 text-3xl">👥</div>
                </div>
            </div>

            <!-- Total Events -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Total Events</p>
                        <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">{{ $metrics['total_events'] ?? 0 }}</p>
                    </div>
                    <div class="text-green-500 text-3xl">📅</div>
                </div>
            </div>

            <!-- Total Registrations -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 border-l-4 border-purple-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Total Registrations</p>
                        <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">{{ $metrics['total_registrations'] ?? 0 }}</p>
                    </div>
                    <div class="text-purple-500 text-3xl">✍️</div>
                </div>
            </div>

            <!-- Pending Registrations -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 border-l-4 border-orange-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Pending</p>
                        <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">{{ $metrics['pending_registrations'] ?? 0 }}</p>
                    </div>
                    <div class="text-orange-500 text-3xl">⏳</div>
                </div>
            </div>
        </div>

        <!-- Charts Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Section 2: Daily Registrations Chart -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Daily Registrations (Last 30 Days)</h3>
                <div id="dailyRegistrationsChart" class="h-80"></div>
            </div>

            <!-- Section 3: Event Status Distribution -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Event Status Distribution</h3>


                <x-chart wire:model="eventStatusChart" class="h-80" />
            </div>

            <!-- Section 4: Event Timeline (Upcoming vs Past) -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Events Timeline</h3>
                <div id="eventTimelineChart" class="h-80"></div>
            </div>

            <!-- Section 5: Registration Metrics (Top Events) -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Top Events by Registrations</h3>
                <div id="registrationMetricsChart" class="h-80"></div>
            </div>

            <!-- Section 6: Attendance Status -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Attendance Status</h3>
                <div id="attendanceStatusChart" class="h-80"></div>
            </div>
        </div>

        <!-- Section 7: Recent Activity Feed -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Registrations -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Recent Registrations</h3>
                <div class="space-y-4">
                    @forelse($recentRegistrations as $registration)
                    <div class="flex items-center justify-between pb-4 border-b border-gray-200 dark:border-gray-700 last:border-b-0">
                        <div>
                            <p class="font-medium text-gray-900 dark:text-white">{{ $registration['user_name'] }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $registration['event_title'] }}</p>
                            <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">{{ $registration['created_at'] }}</p>
                        </div>
                        <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ 
                                $registration['status'] === 'confirmed' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' :
                                ($registration['status'] === 'pending' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' :
                                'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300')
                            }}">
                            {{ ucfirst($registration['status']) }}
                        </span>
                    </div>
                    @empty
                    <p class="text-gray-500 dark:text-gray-400 text-center py-8">No registrations yet</p>
                    @endforelse
                </div>
            </div>

            <!-- Recent Events -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Recent Events</h3>
                <div class="space-y-4">
                    @forelse($recentEvents as $event)
                    <div class="flex items-center justify-between pb-4 border-b border-gray-200 dark:border-gray-700 last:border-b-0">
                        <div>
                            <p class="font-medium text-gray-900 dark:text-white">{{ $event['title'] }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $event['start_time'] }}</p>
                            <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">{{ $event['registrations'] }} registrations</p>
                        </div>
                        <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ 
                                $event['status'] === 'published' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' :
                                ($event['status'] === 'draft' ? 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300' :
                                'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200')
                            }}">
                            {{ ucfirst($event['status']) }}
                        </span>
                    </div>
                    @empty
                    <p class="text-gray-500 dark:text-gray-400 text-center py-8">No events yet</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dashboardData = this.dashboardData
        const isDark = document.documentElement.classList.contains('dark');
        const textColor = isDark ? '#D1D5DB' : '#374151';
        const gridColor = isDark ? '#374151' : '#E5E7EB';

        if (dashboardData.dailyRegistrations.dates.length && document.querySelector('#dailyRegistrationsChart')) {
            new ApexCharts(document.querySelector('#dailyRegistrationsChart'), {
                chart: {
                    type: 'area',
                    toolbar: {
                        show: true
                    },
                    background: isDark ? '#1F2937' : '#FFFFFF',
                },
                colors: ['#3B82F6'],
                series: [{
                    name: 'Registrations',
                    data: dashboardData.dailyRegistrations.counts
                }],
                xaxis: {
                    categories: dashboardData.dailyRegistrations.dates,
                    labels: {
                        style: {
                            colors: textColor
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: textColor
                        }
                    }
                },
                grid: {
                    borderColor: gridColor
                },
                stroke: {
                    curve: 'smooth',
                    width: 2
                }
            }).render();
        }

        if (dashboardData.eventStatus.labels.length && document.querySelector('#eventStatusChart')) {
            new ApexCharts(document.querySelector('#eventStatusChart'), {
                chart: {
                    type: 'donut',
                    background: isDark ? '#1F2937' : '#FFFFFF'
                },
                colors: ['#3B82F6', '#10B981', '#F59E0B', '#EF4444'],
                labels: dashboardData.eventStatus.labels,
                series: dashboardData.eventStatus.values,
                legend: {
                    labels: {
                        colors: textColor
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '65%'
                        }
                    }
                }
            }).render();
        }

        if (dashboardData.eventTimeline.labels.length && document.querySelector('#eventTimelineChart')) {
            new ApexCharts(document.querySelector('#eventTimelineChart'), {
                chart: {
                    type: 'bar',
                    background: isDark ? '#1F2937' : '#FFFFFF'
                },
                colors: ['#10B981', '#8B5CF6'],
                series: [{
                    name: 'Events',
                    data: dashboardData.eventTimeline.values
                }],
                xaxis: {
                    categories: dashboardData.eventTimeline.labels,
                    labels: {
                        style: {
                            colors: textColor
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: textColor
                        }
                    }
                },
                grid: {
                    borderColor: gridColor
                },
                plotOptions: {
                    bar: {
                        distributed: true,
                        horizontal: false,
                        columnWidth: '45%'
                    }
                }
            }).render();
        }

        if (dashboardData.registrationMetrics.labels.length && document.querySelector('#registrationMetricsChart')) {
            new ApexCharts(document.querySelector('#registrationMetricsChart'), {
                chart: {
                    type: 'bar',
                    background: isDark ? '#1F2937' : '#FFFFFF'
                },
                colors: ['#8B5CF6'],
                series: [{
                    name: 'Registrations',
                    data: dashboardData.registrationMetrics.values
                }],
                xaxis: {
                    categories: dashboardData.registrationMetrics.labels,
                    labels: {
                        style: {
                            colors: textColor
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: textColor
                        }
                    }
                },
                grid: {
                    borderColor: gridColor
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        columnWidth: '45%'
                    }
                }
            }).render();
        }

        if (dashboardData.attendanceStatus.labels.length && document.querySelector('#attendanceStatusChart')) {
            new ApexCharts(document.querySelector('#attendanceStatusChart'), {
                chart: {
                    type: 'pie',
                    background: isDark ? '#1F2937' : '#FFFFFF'
                },
                colors: ['#10B981', '#EF4444', '#F59E0B'],
                labels: dashboardData.attendanceStatus.labels,
                series: dashboardData.attendanceStatus.values,
                legend: {
                    labels: {
                        colors: textColor
                    }
                }
            }).render();
        }
    });
</script>