<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Workspace $workspace): bool
    {
        return $workspace->id === $task->workspace_id;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Task $task): bool
    {
        return $user->workspaces->id === $task->workspace_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Workspace $workspace): bool
    {
        return $workspace->id === $task->workspace_id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Workspace $workspace, Task $task): bool
    {
        return $workspace->id === $task->workspace_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Workspace $workspace, Task $task): bool
    {
        return $workspace->id === $task->workspace_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Workspace $workspace, Task $task): bool
    {
        return $workspace->id === $task->workspace_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Workspace $workspace, Task $task): bool
    {
        return $workspace->id === $task->workspace_id;
    }
}
