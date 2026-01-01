<?php

// Консольна команда для генерації ключа доступу до реєстрації.

namespace App\Console\Commands;

use App\Models\ActivityLog;
use App\Models\Key;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class GenerateAdminKey extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:key {--hours=24}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Генерує одноразовий ключ для реєстрації адміністратора.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $key = bin2hex(random_bytes(32)); // Generate the 64-bit Key
        $expires = Carbon::now()->addHours((int) $this->option('hours')); // Add expiration time

        // Додавання ключа в базу
        Key::create([
            'key' => $key,
            'expires_at' => $expires
        ]);

        // Реєстрація події
        ActivityLog::create([
            'event' => 'Генерація ключа доступу.',
            'data' => ['key' => $key]
        ]);

        $this->info("Ключ створено:");
        $this->line($key);
        $this->info("Дійсний до: " . $expires);

        return self::SUCCESS;
    }
}
