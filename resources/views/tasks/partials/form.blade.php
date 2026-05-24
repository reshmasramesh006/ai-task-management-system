@php
use App\Enums\PriorityEnum;
use App\Enums\StatusEnum;
@endphp
<div class="bg-white p-6 rounded-2xl shadow-lg space-y-4">

    <input type="text"
        name="title"
        value="{{ $task->title ?? old('title') }}"
        placeholder="Title"
        class="w-full p-3 border rounded-xl">

    <textarea name="description"
        class="w-full p-3 border rounded-xl"
        placeholder="Description">{{ $task->description ?? old('description') }}</textarea>

    <select name="priority" class="w-full p-3 border rounded-xl">

        @foreach(PriorityEnum::values() as $priority)

        <option value="{{ $priority }}"
            {{ old('priority', $task->priority ?? '') == $priority ? 'selected' : '' }}>

            {{ ucfirst($priority) }}

        </option>

        @endforeach

    </select>

    <select name="status" class="w-full p-3 border rounded-xl">

        @foreach(StatusEnum::values() as $status)

        <option value="{{ $status }}"
            {{ old('status', $task->status ?? '') == $status ? 'selected' : '' }}>

            {{ ucfirst(str_replace('_', ' ', $status)) }}

        </option>

        @endforeach

    </select>

    <select name="assigned_to"
        class="w-full p-3 border rounded-xl">

        @foreach($users as $user)

        <option value="{{ $user->id }}"
            {{ (isset($task) && $task->assigned_to == $user->id) ? 'selected' : '' }}>

            {{ $user->name }}

        </option>

        @endforeach

    </select>

    <input type="date"
        name="due_date"
        value="{{ $task->due_date ?? old('due_date') }}"
        class="w-full p-3 border rounded-xl">

    <button type="submit"
        class="bg-blue-500 text-white px-6 py-3 rounded-xl">
        Save Changes
    </button>

</div>