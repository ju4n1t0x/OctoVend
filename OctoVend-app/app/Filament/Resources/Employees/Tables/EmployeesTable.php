<?php

namespace App\Filament\Resources\Employees\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EmployeesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('user.email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('employee_type')
                    ->label('Tipo')
                    ->sortable(),
                TextColumn::make('dni')
                    ->searchable(),
                TextColumn::make('file_id')
                    ->label('Legajo')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('telephone_number')
                    ->label('Teléfono')
                    ->searchable(),
                TextColumn::make('birth_date')
                    ->label('Nacimiento')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('age')
                    ->label('Edad')
                    ->suffix(' años')
                    ->sortable(false),
                TextColumn::make('address')
                    ->label('Direccion')
                    ->searchable(),
                TextColumn::make('city.name')->label('Ciudad'),
                TextColumn::make('state.name')->label('Provincia'),
                TextColumn::make('country.name')->label('Pais'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
