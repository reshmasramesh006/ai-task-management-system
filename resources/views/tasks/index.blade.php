@extends('layouts.app')

@section('title', 'Task List')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    @forelse($tasks as $task)

        <div class="bg-white rounded-[28px]
                    p-6 shadow-xl
                    hover:shadow-2xl
                    transition duration-300
                    border border-white/40">

            <!-- TOP -->
            <div class="flex justify-between items-center mb-5">

                <div class="flex items-center gap-2">

                    <div class="w-2 h-2 rounded-full bg-blue-500"></div>

                    <span class="text-xs px-3 py-1 rounded-full bg-slate-100 text-slate-600 font-medium">
                        {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                    </span>

                </div>

                <button class="text-slate-400 text-xl">
                    ⋯
                </button>

            </div>

            <!-- TITLE -->
            <h2 class="text-xl md:text-2xl font-bold text-slate-800 mb-4 leading-snug">
                {{ $task->title }}
            </h2>

            <!-- TAGS -->
            <div class="flex flex-wrap gap-2 mb-4">

                <span class="text-xs px-3 py-1 rounded-full
                             bg-red-100 text-red-500 font-semibold">

                    Priority {{ ucfirst($task->priority) }}

                </span>

                @if($task->ai_priority)
                    <span class="text-xs px-3 py-1 rounded-full
                                 bg-blue-100 text-blue-500 font-semibold">

                        AI {{ ucfirst($task->ai_priority) }}

                    </span>
                @endif

            </div>

            <!-- DESCRIPTION -->
            <div class="bg-slate-50 rounded-2xl p-4 mb-5">

                <p class="text-sm text-slate-500 leading-relaxed line-clamp-3">
                    {{ $task->description }}
                </p>

            </div>

            <!-- FOOTER -->
            <div class="flex justify-between items-end">

                <div>

                    <p class="text-xs text-slate-400 mb-1">
                        Due {{ $task->due_date }}
                    </p>

                    <p class="text-sm font-semibold text-blue-500">
                        {{ ucfirst($task->priority) }}
                    </p>

                </div>

                <div class="flex gap-2">

                    <a href="{{ route('tasks.edit', $task->id) }}"
                       class="px-4 py-2 text-xs
                              bg-slate-200 hover:bg-slate-300
                              text-slate-700 rounded-xl
                              transition">

                        Edit
                    </a>

                    <a href="{{ route('tasks.show', $task->id) }}"
                       class="px-4 py-2 text-xs
                              bg-blue-500 hover:bg-blue-600
                              text-white rounded-xl
                              transition">

                        View
                    </a>

                </div>

            </div>

        </div>

    @empty

        <div class="text-white text-lg">
            No tasks found
        </div>

    @endforelse

</div>

@endsection