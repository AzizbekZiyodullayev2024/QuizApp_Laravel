<nav class="flex-grow p-4">
    <a href="/dashboard" class="block p-3 mb-2 text-gray-800 {{ Route::is('dashboard')  ?  'bg-gray-100' : 'hover:bg-gray-100 rounded-lg' }}">
        <i class="fas fa-home mr-2"></i> Dashboard
    </a>
    <a href="{{ route('my-quizzes') }}" class="block p-3 mb-2 text-gray-800 {{ Route::is('my-quizzes')  ?  'bg-gray-100' : 'hover:bg-gray-100 rounded-lg' }}">
        <i class="fas fa-book mr-2"></i> My Quizzes
    </a>
    <a href="{{ route('create-quiz') }}" class="block p-3 mb-2 text-gray-800 {{ Route::is('create-quiz')  ?  'bg-gray-100' : 'hover:bg-gray-100 rounded-lg' }}">
        <i class="fas fa-plus mr-2"></i> Create Quiz
    </a>
    <a href="{{ route('statistics') }}" class="block p-3 mb-2 text-gray-800 {{ Route::is('statistics')  ?  'bg-gray-100' : 'hover:bg-gray-100 rounded-lg' }}">
        <i class="fas fa-chart-bar mr-2"></i> Statistics
    </a>
</nav>