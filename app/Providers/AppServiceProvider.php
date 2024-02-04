<?php

namespace App\Providers;

use App\Repositories\CourseRepository as ICourseRepository;
use App\Repositories\Eloquent\CourseRepository;
use App\Repositories\Eloquent\InstructorRepository;
use App\Repositories\InstructorRepository as IInstructorRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ICourseRepository::class, CourseRepository::class);
        $this->app->bind(IInstructorRepository::class, InstructorRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if (\DB::Connection() instanceof \Illuminate\Database\SQLiteConnection) {
            \DB::connection()->getPdo()->sqliteCreateFunction('REGEXP', function ($pattern, $value) {
                mb_regex_encoding('UTF-8');
                return (false !== mb_ereg($pattern, $value)) ? 1 : 0;
            });
        }
    }
}
