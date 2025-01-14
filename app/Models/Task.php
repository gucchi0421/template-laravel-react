<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function getTask(): Collection
    {
        return $this->all();
    }

    public function createTask(array $data): ?Task
    {
        return $this->create($data);
    }

    public function getTaskById(string $id): ?Task
    {
        return $this->find($id);
    }

    public function updateTask(string $id, array $data): bool
    {
        $task = $this->find($id);
        if (!$task) {
            return false;
        }
        return $task->update($data);
    }

    public function deleteTask(string $id): bool
    {
        $task = $this->find($id);
        if (!$task) {
            return false;
        }
        return $task->delete();
    }
}
