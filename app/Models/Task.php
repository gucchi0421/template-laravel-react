<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function get_task(): Collection
    {
        return Task::all();
    }

    public function get_task_by_id(string $id): ?Task
    {
        return Task::find($id);
    }
}
