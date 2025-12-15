<?php

// Консольна команда для видалення всіх використаних або протермінованих ключів доступу до реєстрації.

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteUsedKeys extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-used-keys';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
