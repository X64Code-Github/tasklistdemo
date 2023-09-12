<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;
use Log;

use App\Models\Task;
use App\Models\Project;

class TaskList extends Component
{
    public $tasks;
    public $projects;
    public $ghostList;
    public $newTaskName;
    public $newTaskProject;
    public $newProjectName;
    public $activeProjectId = null;

    public function addNewTask() {

        // Define validation rules for the new task
        $rules = [
            'newTaskName' => 'required|string|max:255',
            'newTaskProject' => 'required|exists:projects,id,user_id,' . Auth::user()->id,
        ];

        // Validate the input data
        $this->validate($rules);

        Task::create([
            'task_name' => $this->newTaskName,
            'user_id' => Auth::user()->id,
            'project_id' => $this->newTaskProject,
            'priority' => (Task::where('user_id', Auth::user()->id)->max('priority') ?? 0) + 1
        ]);
    }

    public function addNewProject() {

        // Define validation rules for the new project
        $rules = [
            'newProjectName' => 'required|string|max:255',
        ];

        // Validate the input data
        $this->validate($rules);

        Project::create([
            'project_name' => $this->newProjectName,
            'user_id' => Auth::user()->id,
        ]);
    }

    public function updateTaskOrder($taskOrder) {
        if(is_null($this->activeProjectId)) {
            DB::transaction(function () use ($taskOrder) {
                foreach($taskOrder as $taskData) {
                    $taskId = $taskData['value'];
                    $newPriority = $taskData['order'];

                    // Find the task by ID and update its priority
                    Task::where('id', $taskId)->update(['priority' => $newPriority]);
                }
            });
        } else {

            /**
             *  Section Explanation
             *  
             *  I didn't think it was right that when the list is filtered by project
             *  that changing the priority of a task would basically ignore all unfiltered
             *  tasks.
             * 
             *  To counter this, tasks that are filtered out essentially remain static in
             *  their position. So if you filter to only show tasks belonging to project 2,
             *  then tasks in project 1 are basically locked in place.
             * 
             *  Reordering tasks in project 2 will only affect the spots in the order held by
             *  tasks in project 2. So for example:
             * 
             *  T1, P1, 1
             *  T2, P2, 2
             *  T3, P1, 3
             *  T4, P2, 4
             * 
             *  If we set T4 to come before T2, T1 and T3 are locked in. So the result is:
             *  
             *  T1, P1, 1
             *  T4, P2, 2
             *  T3, P1, 3
             *  T2, P2, 4
             * 
             *  While this does result in possibly unwanted changes to priority, such as T2
             *  now being lower priority than T3, I believe it holds more true to the project
             *  aspect of the task organizing.
            */
            $taskList = [];
            $counter = 0;
            foreach($this->ghostList as $key => $ghost) {
                if($ghost->project_id === $this->activeProjectId) {
                    $taskList[$taskOrder[$counter]['value']] = $key;
                    $counter++;
                } else {
                    $taskList[$ghost->id] = $key;
                }
            }

            DB::transaction(function () use ($taskList) {
                $iterationCount = 1;
                foreach($taskList as $id => $task) {
                    $taskId = $id;
                    $newPriority = $iterationCount;
                    $iterationCount++;

                    // Find the task by ID and update its priority
                    Task::where('id', $taskId)->update(['priority' => $newPriority]);
                }
            });
        }
    }

    public function deleteTask($taskId) {
        Task::find($taskId)->delete();
    }

    public function deleteProject($projectId) {
        Project::find($projectId)->delete();
    }

    public function setProjectFilter($projectId) {
        if($this->activeProjectId == $projectId) {
            $this->activeProjectId = null;
        } else {
            $this->activeProjectId = $projectId;
        }
    }

    public function render() {
        if(!is_null($this->activeProjectId)) {
            $this->tasks = Auth::user()->tasks()->where('project_id', $this->activeProjectId)->with('project')->orderBy('priority')->get();
        } else {
            $this->tasks = Auth::user()->tasks()->with('project')->orderBy('priority')->get();
        }
        $this->ghostList = Auth::user()->tasks()->with('project')->orderBy('priority')->get();
        $this->projects = Auth::user()->projects;

        return view('livewire.task-list');
    }
}
