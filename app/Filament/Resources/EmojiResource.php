<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Emoji;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\EmojiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section as FormSection;
use App\Filament\Resources\EmojiResource\RelationManagers;

class EmojiResource extends Resource
{
    protected static ?string $model = Emoji::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Data API Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FormSection::make('Emoji')
                ->description('Put the emoji details in')
                ->schema([
                    TextInput::make('emoji')
                        ->required(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no')->rowIndex(),
                TextColumn::make('emoji'),
                TextColumn::make('created_at')->since()->sortable(),
                TextColumn::make('updated_at')->since()->sortable(),
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
            'index' => Pages\ListEmoji::route('/'),
            'create' => Pages\CreateEmoji::route('/create'),
            'edit' => Pages\EditEmoji::route('/{record}/edit'),
        ];
    }
}
