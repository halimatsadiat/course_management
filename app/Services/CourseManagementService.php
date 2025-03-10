<?php

namespace App\Services;

use App\Models\CourseManagement;
use App\Repositories\CourseManagementRepository;
use Illuminate\Database\Eloquent\Collection;

class CourseManagementService
{
    public function __construct(
        protected CourseManagementRepository $courseManagementRepository
    ) {
    }

    public function create(array $data): CourseManagement
    {
        return $this->courseManagementRepository->create($data);
    }

    public function update(array $data, int $id): int
    {
        return $this->courseManagementRepository->update($data, $id);
    }

    public function delete(int $id): bool
    {
       return $this->courseManagementRepository->delete($id);
    }

    public function all()
    {
        return $this->courseManagementRepository->all();
    }

    public function find(int $id): CourseManagement
    {
        return $this->courseManagementRepository->find($id);
    }
}