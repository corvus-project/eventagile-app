<?php

namespace App\Filament\Resources\Users\Schemas;

use Dom\Text;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components(
                [
                    Flex::make(
                        [
                            Section::make('User Details')->schema([
                                
                            Grid::make(3)->schema([
                               
                                    TextEntry::make('name')->label('Name'),
                                    TextEntry::make('email')->label('Email address'),
                                    TextEntry::make('roles.name')->label('Role'),
                                    TextEntry::make('created_at')->label('Created at')->dateTime()->badge(),
                                    TextEntry::make('updated_at')->label('Last updated at')->dateTime()->badge(),
                                    TextEntry::make('email_verified_at')->label('Email verified at')->dateTime()->badge()

                               
                            ])

                            ])
                        ]
                    )

                ]
            )
            ->columns(1);
    }
}
