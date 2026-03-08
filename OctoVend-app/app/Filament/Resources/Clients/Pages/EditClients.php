<?php

namespace App\Filament\Resources\Clients\Pages;

use App\Filament\Resources\Clients\ClientsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditClients extends EditRecord
{
    protected static string $resource = ClientsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $user = $this->record->user;

        $data['user_name'] = $user->name;
        $data['user_email'] = $user->email;

        return $data;
    }

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $userData = [
            'name' => $data['user_name'],
            'email' => $data['user_email'],
        ];

        if (filled($data['user_password'] ?? null)) {
            $userData['password'] = $data['user_password'];
        }

        $this->record->user->update($userData);

        unset($data['user_name'], $data['user_email'], $data['user_password']);

        return $data;
    }
}
