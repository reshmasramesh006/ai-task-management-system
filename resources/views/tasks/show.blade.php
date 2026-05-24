@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gradient-to-r from-slate-900 to-slate-700 p-8">

    <div class="max-w-6xl mx-auto">

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold text-white">
                Task Detail + AI Summary
            </h1>

            <a href="{{ route('tasks.index') }}"
               class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-xl">
                Back
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

            <!-- Main Content -->
            <div class="lg:col-span-3 bg-white rounded-3xl shadow-xl p-8">

                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800">
                            {{ $task->title }}
                        </h2>

                        <div class="flex gap-4 mt-4">

                            <span class="bg-gray-100 px-4 py-1 rounded-full text-sm">
                                Status: {{ $task->status }}
                            </span>

                            <span class="bg-gray-100 px-4 py-1 rounded-full text-sm">
                                Priority: {{ $task->priority }}
                            </span>

                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-gray-50 rounded-2xl p-6 mb-6">

                    <h3 class="text-xl font-semibold mb-4">
                        Description
                    </h3>

                    <p class="text-gray-600 mb-4">
                        {{ $task->description }}
                    </p>

                    <div class="grid grid-cols-2 gap-4">

                        <div>
                            <p class="text-sm text-gray-500">Assigned To</p>
                            <p class="font-medium">{{ $task->assigned_to ?? 'N/A' }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Due Date</p>
                            <p class="font-medium">{{ $task->due_date }}</p>
                        </div>

                    </div>

                </div>

                <!-- AI Summary -->
                <div class="bg-gray-50 rounded-2xl p-6">

                    <h3 class="text-xl font-semibold mb-4">
                        AI Generated Summary
                    </h3>

                    <div class="bg-white rounded-xl p-4 border">
                        {{ $task->ai_summary ?? 'No AI summary available.' }}
                    </div>

                </div>

            </div>

            <!-- Sidebar -->
            <div class="space-y-6">

                <div class="bg-white rounded-2xl shadow-lg p-6">

                    <div class="flex items-center gap-3 mb-6">
                        <img src="https://i.pravatar.cc/50"
                             class="w-12 h-12 rounded-full">

                        <div>
                            <h4 class="font-bold">Admin User</h4>
                            <p class="text-sm text-gray-500">Administrator</p>
                        </div>
                    </div>

                    <div class="space-y-3">

                        <div class="flex justify-between">
                            <span>Total Tasks</span>
                            <span class="font-bold">150</span>
                        </div>

                        <div class="flex justify-between">
                            <span>Completed</span>
                            <span class="font-bold">90</span>
                        </div>

                        <div class="flex justify-between">
                            <span>Pending</span>
                            <span class="font-bold">60</span>
                        </div>

                    </div>

                </div>

                <!-- Refresh Button -->
                <button
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-2xl">
                    Refresh AI Summary
                </button>

            </div>

        </div>

    </div>

</div>

@endsection