<?php

namespace App\Filament\Resources\Employees\Pages;

use App\Enums\UserRole;
use App\Filament\Resources\Employees\EmployeesResource;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployees extends CreateRecord
{
    protected static string $resource = EmployeesResource::class;

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = User::create([
            'name' => $data['user_name'],
            'email' => $data['user_email'],
            'password' => $data['user_password'],
            'role' => UserRole::Employee,
        ]);

        $data['user_id'] = $user->id;

        unset($data['user_name'], $data['user_email'], $data['user_password']);

        return $data;
    }
}
