<?php

namespace App\Filament\Resources\Employees;

use App\Filament\Resources\Employees\Pages\CreateEmployees;
use App\Filament\Resources\Employees\Pages\EditEmployees;
use App\Filament\Resources\Employees\Pages\ListEmployees;
use App\Filament\Resources\Employees\Schemas\EmployeesForm;
use App\Filament\Resources\Employees\Tables\EmployeesTable;
use App\Models\Employee;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class EmployeesResource extends Resource
{
    protected static ?string $model = Employee::class;
    protected static ?string $modelLabel = 'Empleado';
    protected static ?string $pluralModelLabel = 'Empleados';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Identification;
    protected static string | UnitEnum | null $navigationGroup = 'Administración de usuarios';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return EmployeesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EmployeesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEmployees::route('/'),
            'create' => CreateEmployees::route('/create'),
            'edit' => EditEmployees::route('/{record}/edit'),
        ];
    }
}
