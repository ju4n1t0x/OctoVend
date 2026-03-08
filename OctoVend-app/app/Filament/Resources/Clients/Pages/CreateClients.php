<?php

namespace App\Filament\Resources\Clients\Pages;

use App\Enums\UserRole;
use App\Filament\Resources\Clients\ClientsResource;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;

class CreateClients extends CreateRecord
{
    protected static string $resource = ClientsResource::class;

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
            'role' => UserRole::Client,
        ]);

        $data['user_id'] = $user->id;

        unset($data['user_name'], $data['user_email'], $data['user_password']);

        return $data;
    }
}
