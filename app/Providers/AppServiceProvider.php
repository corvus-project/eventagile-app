<?php

namespace App\Providers;

use App\Policies\EventPolicy;
use App\Policies\UserPolicy;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Database\Eloquent\Model;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        FilamentAsset::register([
            Css::make('custom-stylesheet', __DIR__ . '/../../resources/css/custom.css'),
        ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading(
            fn($query) => $this->app->environment('local')
                ? logger()->warning('Lazy loading detected: ' . $query->toSql())
                : null
        );

        Model::handleLazyLoadingViolationUsing(function (Model $model, string $relation) {
            $class = $model::class;

            info("Attempted to lazy load [{$relation}] on model [{$class}].");
        });

        Gate::define('create-user', [UserPolicy::class, 'create']);
        Gate::define('update-user', [UserPolicy::class, 'update']);

        Gate::define('create-event', [EventPolicy::class, 'create']);
        Gate::define('update-event', [EventPolicy::class, 'update']);

        Gate::define('delete-event', [EventPolicy::class, 'delete']);
        Gate::define('view-event', [EventPolicy::class, 'view']);
        Gate::define('view-any-event', [EventPolicy::class, 'viewAny']);



        if (app()->environment('local', 'staging') || !$this->isMigrationOrSeederCommand()) {
            DB::listen(function ($query) {
                File::append(
                    storage_path('/logs/query.log'),
                    $query->sql . ' [' . implode(', ', $query->bindings) . ']' . PHP_EOL
                );
            });
        }
        RateLimiter::for('login', function (string $email, string $ip) {
            return Limit::perMinute(5)->by($email . $ip);
        });
    }

    private function isMigrationOrSeederCommand(): bool
    {
        $command = request()->server('argv')[1] ?? '';
        return in_array($command, ['migrate', 'migrate:fresh', 'migrate:reset', 'db:seed']);
    }
}
