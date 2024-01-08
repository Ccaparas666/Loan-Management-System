<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Validation\Rule;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    // public function boot(): void
    // {
    //     //
    // }

    public function boot()
    
        {
            Rule::macro('uniqueComakerContactForBorrower', function ($table, $column, $exceptId = null) {
                $bno = request()->input('bno');
                return Rule::unique($table, $column)
                    ->where('bno', $bno)
                    ->where(function ($query) use ($exceptId) {
                        if ($exceptId) {
                            $query->where('lid', '!=', $exceptId);
                        }
                    });
            });
        }
    
}
