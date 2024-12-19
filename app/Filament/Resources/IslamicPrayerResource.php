<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\IslamicPrayer;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Actions\Action;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section as FormSection;
use App\Filament\Resources\IslamicPrayerResource\Pages;
use Filament\Infolists\Components\Section as InfoSection;
use App\Filament\Resources\IslamicPrayerResource\RelationManagers;

class IslamicPrayerResource extends Resource
{
    protected static ?string $model = IslamicPrayer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Data API Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FormSection::make('Islamic Prayer')
                ->description('Create Islamic Prayer on here')
                ->schema([
                    TextInput::make('doa'),
                    TextInput::make('ayat'),
                    TextInput::make('latin'),
                    TextInput::make('artinya'),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no')->rowIndex(),
                TextColumn::make('doa')->searchable(),
                TextColumn::make('created_at')->since()->sortable(),
                TextColumn::make('updated_at')->since()->sortable(),
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
            'index' => Pages\ListIslamicPrayers::route('/'),
            'create' => Pages\CreateIslamicPrayer::route('/create'),
            'edit' => Pages\EditIslamicPrayer::route('/{record}/edit'),
            'view' => Pages\ViewIslamicPrayer::route('/{record}'),
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
                        ->url(fn (IslamicPrayer $record) => url("/admin/islamic-prayers/{$record->id}/edit")),
                        Action::make('delete')
                        ->label('Delete')
                        ->color('danger')
                        ->icon('heroicon-o-trash')
                        ->action(function (IslamicPrayer $record) {
                            $record->delete();
                            Notification::make()
                                ->title('Doa deleted successfully.')
                                ->success()
                                ->send();
                    
                            return redirect('/admin/islamic-prayers'); // Tambahkan redirect manual
                        })
                        ->requiresConfirmation()
                        ->modalHeading('Delete Islamic Prayer')
                ])
                ->description('Memberikan panduan doa harian untuk mendekatkan diri kepada Sang Pencipta')
                ->schema([
                    InfoSection::make([
                        TextEntry::make('doa'),
                        TextEntry::make('created_at')->since(),
                        TextEntry::make('updated_at')->since(),
                    ]), 
                    
                    InfoSection::make([
                        TextEntry::make('ayat'),
                        TextEntry::make('latin'),
                        TextEntry::make('artinya'),
                    ]),
                ]),
            ]);
    }
}
