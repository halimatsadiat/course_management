<?php

namespace App\Repositories;

use App\interface\CourseManagementInterface;
use App\Models\CourseManagement;
use Illuminate\Database\Eloquent\Collection;


class CourseManagementRepository implements CourseManagementInterface
{
    public function all(): Collection
    {
        return CourseManagement::all();
    }

    public function create(array $data): CourseManagement
    {
        return CourseManagement::create($data);
    }

    public function find(int $id): CourseManagement
    {
        return CourseManagement::find($id);
    }
    
    public function update(array $data, int $id): int
    {
        $CourseManagement = CourseManagement::findOrFail($id);

        return $CourseManagement->update($data);
    }

    public function delete(int $id): bool
    {
        $CourseManagement = CourseManagement::findOrFail($id);

        return $CourseManagement->delete();
    }

    
}