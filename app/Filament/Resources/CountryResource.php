<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Country;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section as FormSection;
use Filament\Infolists\Components\Section as InfoSection;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\Group;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\CountryResource\Pages;
use Filament\Infolists\Components\Actions\Action;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CountryResource\RelationManagers;

class CountryResource extends Resource
{
    protected static ?string $model = Country::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Data API Management';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            FormSection::make('Country')
                ->description('Put the country details in')
                ->schema([
                    TextInput::make('country_name')
                        ->required(),
        
                    Select::make('sovereign_state')
                        ->options([
                            'Yes' => 'Yes',
                            'No' => 'No',
                        ]),
        
                    TextInput::make('country_codes')
                        ->required(),
        
                    TextInput::make('official_name')
                        ->required(),
        
                    TextInput::make('capital_city')
                        ->required(),
        
                    Select::make('continent')
                        ->options([
                            'Asia' => 'Asia',
                            'Europe' => 'Europe',
                            'Africa' => 'Africa',
                            'Oceania' => 'Oceania',
                            'North America' => 'North America',
                            'South America' => 'South America',
                        ]), // Tambahkan koma di sini
        
                    TextInput::make('member_of')
                        ->required(),
        
                    TextInput::make('population')
                        ->required(),
        
                    TextInput::make('total_area')
                        ->required(),
        
                    TextInput::make('highest_point')
                        ->required(),
        
                    TextInput::make('lowest_point')
                        ->required(),
        
                    TextInput::make('gdp_percapita')
                        ->required(),
        
                    TextInput::make('currency')
                        ->required(),
        
                    TextInput::make('calling_code')
                        ->required(),
        
                    TextInput::make('internet_tld')
                        ->required(),
                ])->columns('2'),
        ]);
        
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('No')->rowIndex(),
                TextColumn::make('country_name')->searchable(),
                TextColumn::make('capital_city'),
                TextColumn::make('country_codes'),
                TextColumn::make('continent'),
                TextColumn::make('sovereign_state'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('sovereign_state')
                ->options([
                    'No' => 'No',
                    'Yes' => 'Yes',
                ]),
                Tables\Filters\SelectFilter::make('continent')
                ->options([
                    'Asia' => 'Asia',
                    'Europe' => 'Europe',
                    'Africa' => 'Africa',
                    'Oceania' => 'Oceania',
                    'North America' => 'North America',
                    'South America' => 'South America',
                ]),
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
            'index' => Pages\ListCountries::route('/'),
            'create' => Pages\CreateCountry::route('/create'),
            'edit' => Pages\EditCountry::route('/{record}/edit'),
            'view' => Pages\ViewCountry::route('/{record}'),
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                InfoSection::make('View Country')
                ->headerActions([
                    Action::make('edit')
                        ->label('Edit')
                        ->color('primary')
                        ->icon('heroicon-o-pencil')
                        ->url(fn (Country $record) => url("/admin/countries/{$record->id}/edit")),
                        Action::make('delete')
                        ->label('Delete')
                        ->color('danger')
                        ->icon('heroicon-o-trash')
                        ->action(function (Country $record) {
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
                ->description('Prevent abuse by limiting the number of requests per period')
                ->schema([
                    Group::make([
                            TextEntry::make('country_name')
                                ->icon('heroicon-m-flag')
                                ->badge()
                                ->color('success'),
                            TextEntry::make('sovereign_state')
                                ->icon('heroicon-m-archive-box-arrow-down')
                                ->badge()
                                ->color('success'),
                        ])
                        ->columns(2)
                        ->extraAttributes(['class' => 'p-4 border border-gray-300 rounded-md']),
                    
                        Group::make([
                            TextEntry::make('country_codes')
                                ->icon('heroicon-m-qr-code')
                                ->badge()
                                ->color('success'),
    
                            TextEntry::make('official_name')
                                ->icon('heroicon-m-building-office')
                                ->badge()
                                ->color('success'),
                        ])
                        ->columns(2)
                        ->extraAttributes(['class' => 'p-4 border border-gray-300 rounded-md']),
                    
                        Group::make([
                            TextEntry::make('capital_city')
                                ->icon('heroicon-m-building-library')
                                ->badge()
                                ->color('success'),

                            TextEntry::make('continent')
                                ->icon('heroicon-m-globe-alt')
                                ->badge()
                                ->color('success'),
                        ])
                        ->columns(2)
                        ->extraAttributes(['class' => 'p-4 border border-gray-300 rounded-md']),    

                        Group::make([
                            TextEntry::make('member_of')
                                ->Icon('heroicon-m-building-library')
                                ->separator(',')
                                ->badge()
                                ->color('success'),

                            TextEntry::make('population')
                                ->Icon('heroicon-m-user-group')
                                ->badge()
                                ->color('success'),
                        ])
                        ->columns(2)
                        ->extraAttributes(['class' => 'p-4 border border-gray-300 rounded-md']),
                        
                        Group::make([
                            TextEntry::make('total_area')
                                ->badge()
                                ->color('success'),

                            TextEntry::make('highest_point')
                                ->icon('heroicon-m-arrow-up')
                                ->badge()
                                ->color('success'),
                        ])
                        ->columns(2)
                        ->extraAttributes(['class' => 'p-4 border border-gray-300 rounded-md']),
                    
                        Group::make([
                            TextEntry::make('lowest_point')
                                ->icon('heroicon-m-arrow-down')
                                ->badge()
                                ->color('success'),

                            TextEntry::make('gdp_percapita')
                                ->icon('heroicon-m-currency-dollar')
                                ->badge()
                                ->color('success'),
                        ])
                        ->columns(2)
                        ->extraAttributes(['class' => 'p-4 border border-gray-300 rounded-md']),
                    
                        Group::make([
                            TextEntry::make('currency')
                                ->icon('heroicon-m-currency-dollar')
                                ->badge()
                                ->color('success'),

                            TextEntry::make('calling_code')
                                ->icon('heroicon-m-phone-arrow-up-right')
                                ->badge()
                                ->color('success'),
                        ])
                        ->columns(2)
                        ->extraAttributes(['class' => 'p-4 border border-gray-300 rounded-md']),
                    
                        Group::make([
                            TextEntry::make('internet_tld')
                                ->icon('heroicon-m-rss')
                                ->badge()
                                ->color('success'),

                            TextEntry::make('created_at')
                                ->icon('heroicon-m-calendar-date-range')
                                ->dateTime()
                                ->badge()
                                ->color('success'),
                        ])
                        ->columns(2)
                        ->extraAttributes(['class' => 'p-4 border border-gray-300 rounded-md']),
                    
                        Group::make([
                            TextEntry::make('updated_at')
                                ->icon('heroicon-m-calendar-date-range')
                                ->dateTime()
                                ->badge()
                                ->color('success'),
                        ])
                        ->columns(2)
                        ->extraAttributes(['class' => 'p-4 border border-gray-300 rounded-md']),   
                ])->columns(1)
            ]);
    }
}
