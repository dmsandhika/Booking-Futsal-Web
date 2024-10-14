<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Booking;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BookingResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Filament\Resources\BookingLapanganRelationManagerResource\RelationManagers\LapanganRelationManager;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_pembayaran')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('id_lapangan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tanggal_booking')
                    ->required(),
                Forms\Components\TextInput::make('jam_mulai')
                    ->required(),
                Forms\Components\TextInput::make('jam_selesai')
                    ->required(),
                Forms\Components\TextInput::make('properti')
                    ->maxLength(255),
                Forms\Components\TextInput::make('total_harga')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('dibayar')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('jenis_pembayaran')
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->maxLength(255),
                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_pembayaran')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('id_lapangan')
                    ->label('Lapangan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_booking')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jam_mulai'),
                Tables\Columns\TextColumn::make('jam_selesai'),
                Tables\Columns\TextColumn::make('properti')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_harga')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dibayar')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenis_pembayaran'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('download')
                    ->label('Download')
                    ->url(fn ($record) => route('payment.download', $record->id)) // Replace with your download route
                    ->icon('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5"><path fill-rule="evenodd" d="M10 14a.75.75 0 01-.75-.75V3.5a.75.75 0 011.5 0v9.75A.75.75 0 0110 14z" clip-rule="evenodd"/><path d="M3.25 11.25a.75.75 0 00-.75.75v3.5A3.75 3.75 0 006.25 19h7.5A3.75 3.75 0 0018.25 15v-3.5a.75.75 0 00-.75-.75H3.25z" /></svg>')
                    ->color('primary'), // Optional: Customize button color
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
    
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}