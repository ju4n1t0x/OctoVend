<?php

namespace App\Filament\Resources\Clients\Schemas;

use App\Models\City;
use App\Models\State;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Collection;

class ClientsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Datos de acceso')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('user_name')
                            ->label('Nombre')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('user_email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('user_password')
                            ->label('Contraseña')
                            ->password()
                            ->revealable()
                            ->required(fn (string $context): bool => $context === 'create')
                            ->dehydrated(fn (?string $state): bool => filled($state))
                            ->minLength(8)
                            ->maxLength(255),
                    ]),
                Section::make('Datos personales')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('dni')
                            ->required(),
                        TextInput::make('telephone_number')
                            ->tel()
                            ->required(),
                        DatePicker::make('birth_date')
                            ->required(),
                    ]),
                Section::make('Direccion')
                    ->columnSpanFull()
                    ->schema([
                        Select::make('country_id')
                            ->relationship(name: 'country', titleAttribute: 'name')
                            ->searchable()
                            ->preload()
                            ->live()
                            ->afterStateUpdated(function (Set $set) {
                                $set('state_id', null);
                                $set('city_id', null);
                            })
                            ->required(),
                        Select::make('state_id')
                            ->options(fn (Get $get): Collection => State::query()
                                ->where('country_id', $get('country_id'))
                                ->pluck('name', 'id'))
                            ->searchable()
                            ->preload()
                            ->afterStateUpdated(function (Set $set) {
                                $set('city_id', null);
                            })
                            ->live()
                            ->required(),
                        Select::make('city_id')
                            ->options(fn (Get $get): Collection => City::query()
                                ->where('state_id', $get('state_id'))
                                ->pluck('name', 'id'))
                            ->searchable()
                            ->preload()
                            ->live()
                            ->required(),
                        TextInput::make('address')->required(),
                        TextInput::make('postal_code')->required(),
                    ]),
            ]);
    }
}
