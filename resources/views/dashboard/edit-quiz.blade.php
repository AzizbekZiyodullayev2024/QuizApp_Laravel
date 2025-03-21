<x-header></x-header>
@vite('resources/js/add-quiz.js')
<body class="bg-gray-100">
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <x-dashboard.sidebar></x-dashboard.sidebar>
    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Top Navigation -->
        <x-dashboard.navbar></x-dashboard.navbar>

        <!-- Content -->
        <main class="p-6">
            <div class="min-h-screen bg-gray-100">
                <div class="container">
                    <!-- Header -->
                    <div class="mb-4">
                        <h2 class="text-2xl font-bold text-gray-800">My Quizzes</h2>
                        <p class="mt-2 text-gray-600">Fill in the details below to create a new quiz</p>
                    </div>

                    <!-- Main Form -->
                    <form class="space-y-4" id="quizForm" method="POST" action="{{ route('update-quiz', ['quiz'=>$quiz->id]) }}">
                        @csrf
                        <!-- Quiz Details Section -->
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Quiz Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700">Quiz Title</label>
                                    <input type="text" id="title" name="title" placeholder="Quiz Title" required
                                           value="{{ $quiz->title }}"
                                           class="w-full px-4 py-2 border rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                    <textarea id="description" name="description" rows="3" placeholder="Description" required
                                              class="w-full px-4 py-2 border rounded-lg mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ $quiz->description }}</textarea>
                                </div>
                                <div>
                                    <label for="timeLimit" class="block text-sm font-medium text-gray-700">Time Limit (minutes)</label>
                                    <input type="number" id="timeLimit" name="timeLimit" placeholder="Time Limit" min="1" required
                                           value="{{ $quiz->time_limit }}"
                                           class="px-4 py-2 border rounded-lg mt-1 block w-48 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>

                        <!-- Questions Section -->
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-xl font-semibold text-gray-800">Questions</h2>
                                <button type="button" id="addQuestionBtn" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    Add Question
                                </button>
                            </div>

                            <!-- Question Template -->
                            <div id="questionsContainer" class="space-y-6">
                                @foreach($quiz->questions as $questionKey => $question)
                                    <div class="p-4 border border-gray-200 rounded-lg" data-question-id="1">
                                        <div>
                                            <h3>1</h3>
                                        </div>
                                        <div class="mb-4">
                                            <label class="block text-sm font-medium text-gray-700">Question Text</label>
                                            <input name="questions[0][quiz]" type="text" required
                                                   value="{{ $question->name }}"
                                                   class="w-full px-4 py-2 border rounded-lg mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        </div>

                                        <div class="space-y-3" data-options-container>
                                            <div class="flex justify-between">
                                                <p class="text-sm font-medium text-gray-700">Answer Options</p>
                                                <button type="button" class="addOptionBtn px-3 py-1 text-sm bg-gray-100 text-gray-700 rounded hover:bg-gray-200">
                                                    Add Option
                                                </button>
                                            </div>
                                            <!-- Option 1 -->
                                            @foreach($question->options as $optionKey => $option)
                                                <div class="flex items-center gap-4">
                                                    <input type="radio"
                                                           {{ $option->is_correct ? 'checked' : ''}}
                                                           name="questions[{{ $questionKey }}][correct]" value="{{ $optionKey }}" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                                    <input type="text" name="questions[{{ $questionKey }}][options][]" value="{{ $option->name }}" required
                                                           class="w-full px-4 py-2 border rounded-lg block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                                    <button type="button" class="removeOptionBtn px-2 py-1 text-red-600 hover:text-red-800">×</button>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="mt-4 flex justify-end">
                                            <button type="button" class="removeQuestionBtn text-red-600 hover:text-red-800 font-medium">
                                                Remove Question
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit"
                                    class="px-6 py-3 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                Update Quiz
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>