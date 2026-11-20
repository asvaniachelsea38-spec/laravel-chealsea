<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make()
                    ->schema([

                        Forms\Components\TextInput::make('name')
                            ->label('Name')
                            ->placeholder('Name')
                            ->required(),

                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->placeholder('Email')
                            ->unique(ignorable: fn ($record) => $record)
                            ->required(),

                        Forms\Components\TextInput::make('password')
                            ->label('Password')
                            ->placeholder('Password')
                            ->dehydrateStateUsing(fn ($state) => $state ? bcrypt($state) : null)
                            ->dehydrated(fn ($state) => filled($state)) // hanya mengubah password jika field diisi
                            ->password(),

                    ]),

            ]);
    }
}