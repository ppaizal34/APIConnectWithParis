<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\RateLimit;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RateLimitsResource\Pages;
use Filament\Tables\Contracts\HasTable;
use App\Filament\Resources\RateLimitsResource\RelationManagers;

class RateLimitsResource extends Resource
{
    protected static ?string $model = RateLimit::class;
    protected static ?string $redirectAfterCreate = "admin/rate-limits";
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Rate Limits')
                    ->description('Create rate limit on here')
                    ->schema([
                        TextInput::make('name')
                                ->autofocus()
                                ->placeholder('Masukkan nama rate limit, misalnya: Basic atau Premium')
                                ->autocomplete(false)
                                ->required()
                                ->unique(ignorable: fn($record) => $record),
                        TextInput::make('max_requests')
                                ->placeholder('Enter the maximum number of requests, Example: 5 or 10')
                                ->required(),
                        TextInput::make('message')
                                ->autocomplete(false)
                                ->default('To many request')
                                ->required(),
                        TextInput::make('http_status_code')
                                ->autocomplete(false)
                                ->default('429')
                                ->required(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('No')->rowIndex(),
                TextColumn::make('name'),
                TextColumn::make('max_requests'),
                TextColumn::make('message'),
                TextColumn::make('http_status_code'),
                TextColumn::make('created_at')
                            ->since(),
                TextColumn::make('updated_at')
                            ->since(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListRateLimits::route('/'),
            'create' => Pages\CreateRateLimits::route('/create'),
            'edit' => Pages\EditRateLimits::route('/{record}/edit'),
        ];
    }
}
