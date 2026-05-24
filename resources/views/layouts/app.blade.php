<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-[#d6d6d6] min-h-screen font-sans">

<div class="p-4 md:p-6">

    <div class="max-w-7xl mx-auto rounded-[32px]
                bg-gradient-to-br from-[#1d2942] via-[#243656] to-[#2d4770]
                shadow-2xl p-6 md:p-8">

        <!-- HEADER -->
        <div class="flex flex-col md:flex-row justify-between md:items-center gap-6 mb-8">

            <div>
                <h1 class="text-4xl md:text-5xl font-bold text-white">
                    @yield('title')
                </h1>

                <p class="text-slate-300 mt-2 text-sm md:text-base">
                    Manage all your AI assisted tasks efficiently
                </p>
            </div>

            <a href="{{ route('tasks.create') }}"
               class="bg-blue-500 hover:bg-blue-600
                      text-white px-6 py-3 rounded-2xl
                      font-semibold shadow-lg transition duration-300
                      w-fit">

                + New Task
            </a>

        </div>

        <!-- FILTER -->
        <div class="mb-8">

            <p class="text-slate-300 mb-3 text-sm">
                Filter User Tasks
            </p>

            <div class="flex flex-wrap gap-4">

                <input type="text"
                       placeholder="Search Filter Task"
                       class="bg-white/95 rounded-xl px-4 py-3
                              outline-none w-full md:w-72
                              shadow-md">

                <select class="bg-white rounded-xl px-4 py-3 shadow-md">
                    <option>Status</option>
                </select>

                <select class="bg-white rounded-xl px-4 py-3 shadow-md">
                    <option>All Members</option>
                </select>

                <select class="bg-white rounded-xl px-4 py-3 shadow-md">
                    <option>Priority</option>
                </select>

            </div>

        </div>

        <!-- CONTENT -->
        <div class="grid grid-cols-12 gap-6">

            <!-- MAIN CONTENT -->
            <div class="col-span-12 xl:col-span-9">
                @yield('content')
            </div>

            <!-- SIDEBAR -->
            <div class="col-span-12 xl:col-span-3">
                @include('partials.sidebar')
            </div>

        </div>

    </div>

</div>

</body>
</html>