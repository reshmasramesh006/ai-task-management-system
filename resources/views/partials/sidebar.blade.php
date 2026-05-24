<div class="space-y-6">

    <!-- PROFILE -->
    <div class="bg-white rounded-3xl overflow-hidden shadow-xl">

        <div class="p-6">

            <div class="flex items-center gap-4">

                <img src="https://ui-avatars.com/api/?name=Admin+User"
                     class="w-14 h-14 rounded-full">

                <div>
                    <h3 class="font-bold text-slate-800">
                        {{ auth()->user()->name ?? 'Admin User' }}
                    </h3>

                    <p class="text-sm text-slate-500">
                        Administrator
                    </p>
                </div>

            </div>

        </div>

        <!-- MENU -->
        <div class="border-t">

            <a href="#"
               class="block px-6 py-4 bg-blue-500 text-white font-medium">
                Tasks
            </a>

            <a href="#"
               class="block px-6 py-4 hover:bg-slate-50">
                Users
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="w-full text-left px-6 py-4 hover:bg-slate-50">
                    Logout
                </button>
            </form>

        </div>

    </div>

    <!-- STATS -->
    <div class="bg-white rounded-3xl p-6 shadow-xl">

        <h3 class="font-bold text-slate-800 mb-4">
            Monthly Task Completion
        </h3>

        <canvas id="taskChart"></canvas>

    </div>

</div>

<script>
    const ctx = document.getElementById('taskChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            datasets: [{
                label: 'Tasks',
                data: [12, 19, 8, 15, 22],
                borderRadius: 8,
            }]
        }
    });
</script>