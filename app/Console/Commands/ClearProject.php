<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Command;

class ClearProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'p:c';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'Limpia cache y optimiza el proyecto';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // ensures that the progress bar is at 100%
        $pass = $this->output->createProgressBar(6);
        $this->info('Ya inicio el proceso espera poco...');
        $pass->start();
        $this->newLine();
        Artisan::call('config:clear');
        $this->info('Comando ejecutado php artisan config:clear');
        $this->info('..........................................');
        Artisan::call('config:cache');
        $this->info('Comando ejecutado php artisan config:cache');
        $this->info('..........................................');
        Artisan::call('cache:clear');
        $this->info('Comando ejecutado php artisan cache:clear');
        $this->info('..........................................');
        Artisan::call('route:clear');
        $this->info('Comando ejecutado php artisan route:clear');
        $this->info('..........................................');
        Artisan::call('optimize');
        $this->info('Comando ejecutado php artisan optimize');
        $this->info('..........................................');
        $pass->finish();
        return Command::SUCCESS;
    }
}
