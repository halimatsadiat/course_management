<?php

namespace App\interface;
use App\Models\CourseManagement;
use Illuminate\Database\Eloquent\Collection;

interface CourseManagementInterface
{
    public function all(): Collection;

    public function create(array $data): CourseManagement;

    public function update(array $data, int $id): int;

    public function delete(int $id): bool;

    public function find(int $id): CourseManagement;
}
