<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\NationalHero;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Infolists\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Actions\Action;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section as FormSection;
use App\Filament\Resources\NationalHeroResource\Pages;
use Filament\Infolists\Components\Section as InfoSection;
use App\Filament\Resources\NationalHeroResource\RelationManagers;

class NationalHeroResource extends Resource
{
    protected static ?string $model = NationalHero::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Data API Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FormSection::make('National Hero')
                    ->description('Create National Hero on here')
                    ->schema([
                        TextInput::make('name'),
                        TextInput::make('birth_year'),
                        TextInput::make('death_year'),
                        TextInput::make('description'),
                        TextInput::make('ascension_year'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no')->rowIndex(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('birth_year')->sortable(),
                TextColumn::make('death_year')->sortable(),
                TextColumn::make('ascension_year')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListNationalHeroes::route('/'),
            'create' => Pages\CreateNationalHero::route('/create'),
            'edit' => Pages\EditNationalHero::route('/{record}/edit'),
            'view' => Pages\ViewNatioanlHero::route('/{record}'),

        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                InfoSection::make('Description')
                ->headerActions([
                    Action::make('edit')
                        ->label('Edit')
                        ->color('primary')
                        ->icon('heroicon-o-pencil')
                        ->url(fn (NationalHero $record) => url("/admin/national-heroes/{$record->id}/edit")),
                        Action::make('delete')
                        ->label('Delete')
                        ->color('danger')
                        ->icon('heroicon-o-trash')
                        ->action(function (NationalHero $record) {
                            $record->delete();
                            Notification::make()
                                ->title('Country deleted successfully.')
                                ->success()
                                ->send();
                    
                            return redirect('/admin/countries'); // Tambahkan redirect manual
                        })
                        ->requiresConfirmation()
                        ->modalHeading('Delete Country')
                ])
                ->description('Menyajikan informasi tentang tokoh-tokoh pahlawan nasional Indonesia yang berjasa bagi bangsa')
                ->schema([
                    InfoSection::make([
                        TextEntry::make('name'),
                        TextEntry::make('birth_year'),
                        TextEntry::make('death_year'),
                        TextEntry::make('ascension_year'),
                        TextEntry::make('created_at')->since(),
                        TextEntry::make('updated_at')->since(),
                    ])->columns(2), 
                    
                    InfoSection::make([
                        TextEntry::make('description'),
                    ]),
                ]),
            ]);
    }
}
