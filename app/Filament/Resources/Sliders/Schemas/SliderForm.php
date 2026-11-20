<?php

namespace App\Filament\Resources\Sliders\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;

class SliderForm
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
                            ->label('Slider Image')
                            ->placeholder('Slider Image')
                            ->required(),

                        //link
                        TextInput::make('link')
                            ->label('Link')
                            ->placeholder('Link')
                            ->required(),

                    ])

            ]);
    }
}