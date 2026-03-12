<?php

namespace App\Filament\Resources\ProductVariants\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductVariantForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('product_id')
                    ->relationship('product', 'name')
                    ->required(),
                TextInput::make('sku')
                    ->label('SKU')
                    ->required(),
                TextInput::make('color')
                    ->required(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('stock')
                    ->required()
                    ->numeric(),
                TextInput::make('stock_reserved')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('weight')
                    ->numeric(),
                TextInput::make('height')
                    ->numeric(),
                TextInput::make('width')
                    ->numeric(),
                TextInput::make('length')
                    ->numeric(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
