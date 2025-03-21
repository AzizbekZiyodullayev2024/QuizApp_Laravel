<x-header></x-header>
<body class="flex flex-col min-h-screen bg-gray-100">
<!-- Navigation -->
<nav class="bg-white shadow-lg">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between">
            <div class="flex space-x-7">
                <div>
                    <a href="index.html" class="flex items-center py-4 px-2">
                        <span class="font-semibold text-gray-500 text-lg">Quiz Platform</span>
                    </a>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <a href="dashboard.html" class="py-2 px-4 text-gray-500 hover:text-gray-700">Dashboard</a>
                <a href="profile.html" class="py-2 px-4 text-gray-500 hover:text-gray-700">Profile</a>
            </div>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="flex-grow container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6" id="questionContainer">
        <form method="POST" action="{{ route('take-quiz', ['slug'=>$quiz->slug]) }}">
            @csrf
            <!-- Quiz Header -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">{{ $quiz->title }}</h1>
                    <p class="text-gray-600 mt-2">{{ $quiz->description }}</p>
                </div>
                <div class="text-right">
                    <div class="text-xl font-bold text-blue-600" id="timer">{{ $quiz->time_limit }}</div>
                    <div class="text-sm text-gray-500">Time Remaining</div>
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="mb-6">
                <div class="flex justify-between mb-2">
                    <span class="text-sm text-gray-600">Question <span id="current-question">1</span> of <span id="total-questions">10</span></span>
                    <span class="text-sm text-gray-600">Progress: <span id="progress">10%</span></span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: 10%"></div>
                </div>
            </div>

            <!-- Question Container -->
            <div class="mb-8">
                <div class="mb-4">
                    <h2 class="text-lg font-semibold text-gray-800" id="question">What is the output of console.log(typeof undefined)?</h2>
                </div>

                <!-- Options -->
                <div class="space-y-3" id="options">

                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="flex justify-between items-center">
                <button type="button" id="prev-btn" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 disabled:opacity-50">
                    Previous
                </button>
                <button type="button" id="next-btn" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Next
                </button>
            </div>

            <!-- Submit Button -->
            <div class="mt-8 text-center">
                <button id="submit-quiz" class="px-8 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    Submit Quiz
                </button>
            </div>
        </form>
    </div>
</main>
<!-- Footer -->
<footer class="bg-white shadow-lg mt-8">
    <div class="max-w-6xl mx-auto px-4 py-4">
        <div class="text-center text-gray-500 text-sm">
            © 2024 Quiz Platform. All rights reserved.
        </div>
    </div>
</footer>
<!-- Quiz JavaScript -->
<script>
    function startTimer(duration, display) {
        let timer = duration;
        setInterval(() => {
            const minutes = Math.floor(timer / 60);
            const seconds = timer % 60;
            display.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            if (--timer < 0) {
                timer = 0;
                // Handle timer completion
            }
        }, 1000);
    }

    // Initialize quiz
    let options = document.getElementById('options'),
        questions = JSON.parse(`<?php echo $quiz->toJson() ?>`).questions,
        currentQuestionIndex = 0;

    function getQuestion(index=0) {
        return questions[index];
    }
    function displayQuestion(question) {
        let questionElement = document.getElementById('question'),
            optionsElement = document.getElementById('options');
        questionElement.innerText = question.name;
        optionsElement.innerHTML = '';
        question.options.forEach((option)=>{
            optionsElement.innerHTML += `<label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50">
                    <input type="radio" name="answer" class="h-4 w-4 text-blue-600" value="${option.id}">
                    <span class="ml-3">${option.name}</span>
                </label>`;
        })
    }
    document.addEventListener('DOMContentLoaded', () => {
        let currentQuestion = getQuestion(currentQuestionIndex);
        displayQuestion(currentQuestion)
        const timerDisplay = document.getElementById('timer');
        startTimer(1200, timerDisplay); // 20 minutes
        // Add event listeners for navigation buttons
        document.getElementById('next-btn').addEventListener('click', () => {
            currentQuestionIndex++;
            let question = getQuestion(currentQuestionIndex);
            if (question) {
                displayQuestion(question);
            } else {
                currentQuestionIndex--;
                alert('Quiz completed');
            }
        });

        document.getElementById('prev-btn').addEventListener('click', () => {
            currentQuestionIndex--;
            let question = getQuestion(currentQuestionIndex);
            if (question) {
                displayQuestion(question);
            } else {
                currentQuestionIndex++;
                alert('You are at the first question');
            }
        });
    });
</script>
<x-main.footer></x-main.footer>