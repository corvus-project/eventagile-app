<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class BackupTenantDatabases extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup-tenant-databases';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup tenant databases';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tenants = Tenant::all();
        Log::info('Starting tenant database backup process.');
        foreach ($tenants as $tenant) {
            $this->info("Backing up database for tenant: {$tenant->id}");

            if (file_exists(database_path($tenant->tenancy_db_name))) {
                copy(database_path($tenant->tenancy_db_name), base_path("backups/{$tenant->tenancy_db_name}_" . now()->format('Y-m-d_H-i-s')));
            }
            $this->info("Backup completed for tenant: {$tenant->id}");
            Log::info("Backup completed for tenant: {$tenant->id}");
        }
    }
}
