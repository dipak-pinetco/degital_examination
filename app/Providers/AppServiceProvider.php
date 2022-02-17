<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use InvalidArgumentException;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Schema::defaultStringLength(191);

        // https://github.com/spatie/laravel-permission/issues/1689
        Schema::defaultStringLength(125);

        Builder::macro('whereLike', function ($attributes, string $searchTerm) {
            $this->where(function (Builder $query) use ($attributes, $searchTerm) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    $query->when(
                        str_contains($attribute, '.'),
                        function (Builder $query) use ($attribute, $searchTerm) {
                            [$relationName, $relationAttribute] = explode('.', $attribute);

                            $query->orWhereHas($relationName, function (Builder $query) use ($relationAttribute, $searchTerm) {
                                $query->where($relationAttribute, 'LIKE', "%{$searchTerm}%");
                            });
                        },
                        function (Builder $query) use ($attribute, $searchTerm) {
                            $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
                        }
                    );
                }
            });

            return $this;
        });

        Carbon::macro('humanReadable', function (string $formate = 'M d Y') {
            return $this->format($formate);
        });

        Validator::extend('existsWithOther', function ($attribute, $value, $parameters, $validator) {
            if (count($parameters) < 4) {
                throw new InvalidArgumentException("Validation rule game_fixture requires 4 parameters.");
            }

            $input = $validator->getData();
            $verifier = $validator->getPresenceVerifier();
            $collection = $parameters[0];
            $column = $parameters[1];
            $extra = [$parameters[2] => $parameters[3]];

            $count = $verifier->getMultiCount($collection, $column, (array) $value, $extra);

            return $count >= 1;
        });
    }
}
