<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Volcano;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\VolcanoResource\Pages;
use Filament\Infolists\Components\Actions\Action;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section as FormSection;
use Filament\Infolists\Components\Section as InfoSection;
use App\Filament\Resources\VolcanoResource\RelationManagers;

class VolcanoResource extends Resource
{
    protected static ?string $model = Volcano::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Data API Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FormSection::make('Volcano Indonesia')
                ->description('Create Volcano on here')
                ->schema([
                    TextInput::make('name')->required()->autofocus(),
                    TextInput::make('bentuk')->required(),
                    TextInput::make('tinggi_meter')->required(),
                    TextInput::make('estimasi_letusan_terakhir')->required(),
                    TextInput::make('geolokasi')->required(),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no')->rowIndex(),
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('estimasi_letusan_terakhir'),
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
            'index' => Pages\ListVolcanoes::route('/'),
            'create' => Pages\CreateVolcano::route('/create'),
            'edit' => Pages\EditVolcano::route('/{record}/edit'),
            'view' => Pages\ViewVolcano::route('/{record}'),
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
                    ->url(fn (Volcano $record) => url("/admin/volcanoes/{$record->id}/edit")),
                    Action::make('delete')
                    ->label('Delete')
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->action(function (Volcano $record) {
                        $record->delete();
                        Notification::make()
                            ->title('Volcano deleted successfully.')
                            ->success()
                            ->send();
                
                        return redirect('/admin/volcanoes'); // Tambahkan redirect manual
                    })
                    ->requiresConfirmation()
                    ->modalHeading('Delete Volcano')
            ])
            ->description('Menyajikan informasi tentang gunung berapi di Indonesia')
            ->schema([
                InfoSection::make([
                    TextEntry::make('name'),
                    TextEntry::make('bentuk'),
                    TextEntry::make('tinggi_meter'),
                    TextEntry::make('estimasi_letusan_terakhir'),
                    TextEntry::make('created_at')->since(),
                    TextEntry::make('updated_at')->since(),
                ])->columns(2), 
            ]),
        ]);
    }
}
