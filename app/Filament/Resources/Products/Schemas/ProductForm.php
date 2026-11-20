<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                //card
                Section::make()
                    ->schema([

                        //image
                        FileUpload::make('image')
                            ->label('Product Image')
                            ->placeholder('Product Image')
                            ->required(),

                        //title
                        TextInput::make('title')
                            ->label('Product Title')
                            ->placeholder('Product Title')
                            ->required(),

                        Grid::make(3)->schema([

                            //category
                            Select::make('category_id')
                                ->label('Category')
                                ->relationship('category', 'name')
                                ->required(),

                            //price
                            TextInput::make('price')
                                ->label('Price')
                                ->placeholder('Price')
                                ->required(),

                            //weight
                            TextInput::make('weight')
                                ->label('Weight')
                                ->placeholder('Weight')
                                ->required(),

                        ]),

                        //description
                        RichEditor::make('description')
                            ->label('Product Description')
                            ->placeholder('Product Description')
                            ->required(),

                    ])

            ]);
    }
}