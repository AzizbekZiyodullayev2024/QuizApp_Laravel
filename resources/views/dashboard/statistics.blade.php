<x-header></x-header>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<body class="bg-gray-100">
<div class="min-h-screen flex">
    <!-- Sidebar -->
    <x-dashboard.sidebar></x-dashboard.sidebar>
    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Top Navigation -->
        <x-dashboard.navbar></x-dashboard.navbar>

        <!-- Main Content Area -->
        <main class="p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Statistics Overview</h1>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <h3 class="text-gray-500 text-sm">Total Quizzes</h3>
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <p class="text-3xl font-bold mt-2">42</p>
                    <p class="text-green-500 text-sm mt-2">↑ 12% from last month</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <h3 class="text-gray-500 text-sm">Average Score</h3>
                        <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <p class="text-3xl font-bold mt-2">85%</p>
                    <p class="text-green-500 text-sm mt-2">↑ 5% from last month</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <h3 class="text-gray-500 text-sm">Completion Rate</h3>
                        <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <p class="text-3xl font-bold mt-2">92%</p>
                    <p class="text-green-500 text-sm mt-2">↑ 3% from last month</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex justify-between items-center">
                        <h3 class="text-gray-500 text-sm">Time Spent</h3>
                        <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <p class="text-3xl font-bold mt-2">24h</p>
                    <p class="text-green-500 text-sm mt-2">↑ 2h from last month</p>
                </div>
            </div>

            <!-- Charts -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-4">Progress Over Time</h3>
                    <canvas id="progressChart" height="300"></canvas>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-4">Category Performance</h3>
                    <canvas id="categoryChart" height="300"></canvas>
                </div>
            </div>

            <!-- Recent Quiz Attempts -->
            <div class="bg-white rounded-lg shadow mb-8">
                <div class="p-6 border-b">
                    <h3 class="text-lg font-semibold">Recent Quiz Attempts</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quiz Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Score</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Time</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                        @foreach($data as $item)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900"><a href="{{ route('my-results', ['result'=>$item['result']->id]) }}">{{ $item['result']->quiz->title }}</a></td>
                                <td class="px-6 py-4 text-sm text-gray-500"><a href="{{ route('my-results', ['result'=>$item['result']->id]) }}">{{ $item['result']->started_at }}</a></td>
                                <td class="px-6 py-4 text-sm text-gray-900"><a href="{{ route('my-results', ['result'=>$item['result']->id]) }}">{{ $item['score'] }}%</a></td>
                                <td class="px-6 py-4 text-sm text-gray-500"><a href="{{ route('my-results', ['result'=>$item['result']->id]) }}">{{ $item['time_taken'] }}</a></td>
                                <td class="px-6 py-4">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"><a
                                            href="{{ route('my-results', ['result'=>$item['result']->id]) }}">{{ $item['status'] }}</a></span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>
<script>
    // Progress Chart
    const progressCtx = document.getElementById('progressChart').getContext('2d');
    new Chart(progressCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Average Score',
                data: [65, 70, 75, 80, 85, 90],
                borderColor: 'rgb(59, 130, 246)',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });

    // Category Chart
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    new Chart(categoryCtx, {
        type: 'radar',
        data: {
            labels: ['JavaScript', 'HTML', 'CSS', 'React', 'Node.js', 'Python'],
            datasets: [{
                label: 'Performance',
                data: [85, 90, 88, 82, 75, 80],
                backgroundColor: 'rgba(59, 130, 246, 0.2)',
                borderColor: 'rgb(59, 130, 246)',
                pointBackgroundColor: 'rgb(59, 130, 246)',
            }]
        },
        options: {
            scales: {
                r: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });
</script>
</body>
</html>