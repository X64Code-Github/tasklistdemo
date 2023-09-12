<div class="bg-gray-200 dark:bg-gray-600 rounded grid grid-cols-3 gap-x-2 divide-x-2 divide-zinc-500">
    <div class="col-span-2">
        <!-- Task Section -->
        <div class="py-2 px-2 flex items-center justify-between">
            <div class="grid grid-cols-1">
                <input type="text" wire:model="newTaskName">
                @error('newTaskName') <span class="error">{{ $message }}</span> @enderror 
            </div>
            <div class="grid grid-cols-1">
                <select wire:model="newTaskProject">
                    <option value=""></option>
                    @foreach($projects ?? [] as $project)
                        <option value="{{$project->id}}">{{$project->project_name}}</option>
                    @endforeach
                </select>
                @error('newTaskProject') <span class="error">{{ $message }}</span> @enderror 
            </div>
            <button wire:loading.attr="disabled" class="bg-blue-600 text-white px-4 py-2 rounded" wire:click="addNewTask()">Add New Task</button>
        </div>

        <ul class="px-2 py-2" wire:sortable="updateTaskOrder" wire:sortable.options="{ animation: 100 }">
            @foreach ($tasks ?? [] as $task)
                <li class="flex items-center justify-between border p-2 mb-2" wire:sortable.handle wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}">
                    <h4 class="text-lg">{{ $task->task_name }}</h4>
                    <h4 class="text-lg">{{ $task->project->project_name }}</h4>
                    <button class="bg-red-600 text-white px-4 py-2 rounded" wire:click="deleteTask({{ $task->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                        </svg>
                    </button>
                </li>
            @endforeach
        </ul>
    </div>

    <div>
        <!-- Program Section -->
        <div class="py-2 px-2 flex items-center justify-between">
            <div class="grid grid-cols-1">
                <input type="text" wire:model="newProjectName">
                @error('newProjectName') <span class="error">{{ $message }}</span> @enderror 
            </div>
            <button wire:loading.attr="disabled" wire:loading.remove class="bg-blue-600 text-white px-4 py-2 rounded" wire:click="addNewProject()">Add New Project</button>
        </div>

        <ul class="px-2 py-2">
            @foreach ($projects ?? [] as $project)
                <li class="flex items-center justify-between p-2 mb-2">
                    <h4 class="text-lg" wire:click="setProjectFilter({{ $project->id }})" @if ($activeProjectId === $project->id) style="font-weight: bold; color: blue;" @endif>{{ $project->project_name }}</h4>
                    <button class="bg-red-600 text-white px-4 py-2 rounded" wire:click="deleteProject({{ $project->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                        </svg>
                    </button>
                </li>
            @endforeach
        </ul>
    </div>
</div>
