<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;

class CategoryForm
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
                            ->label('Category Image')
                            ->placeholder('Category Image')
                            ->required(),

                        //name
                        TextInput::make('name')
                            ->label('Category Name')
                            ->placeholder('Category Name')
                            ->required(),

                    ])
            ]);
    }
}