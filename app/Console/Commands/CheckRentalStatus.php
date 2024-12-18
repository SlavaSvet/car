<?php

namespace App\Console\Commands;

use App\Enums\RentalStatus;
use Illuminate\Console\Command;
use App\Models\Rental;
use Carbon\Carbon;

class CheckRentalStatus extends Command
{
    /**
     * Название и описание команды.
     *
     * @var string
     */
    protected $signature = 'rental:check-status';
    protected $description = 'Check if rentals have expired and update their status to completed';

    /**
     * Выполнение команды.
     */
    public function handle()
    {
        // Получить текущую дату
        $today = Carbon::today();

        // Найти аренды, у которых статус активен и срок истёк
        $expiredRentals = Rental::where('status', 'active')
            ->where('end_date', '<', $today)
            ->get();

        // Обновить статус на "completed"
        foreach ($expiredRentals as $rental) {
            $rental->update(['status' => RentalStatus::COMPLETED->value]);
            $this->info("Updated rental ID {$rental->id} to completed.");
        }

        $this->info('Rental status check completed.');
    }
}
