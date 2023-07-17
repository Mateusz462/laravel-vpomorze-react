<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// // Switch between the included languages
// Route::get('lang/{lang }', [LanguageController::class, 'swap']);
//
// /*
//  * Frontend Routes
//  * Namespaces indicate folder structure
//  */
// Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
//
// });
//
// /*
//  * Backend Routes
//  * Namespaces indicate folder structure
//  */
// Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
//     /*
//      * These routes need view-backend permission
//      * (good if you want to allow more than one group in the backend,
//      * then limit the backend features by different roles or permissions)
//      *
//      * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
//      * These routes can not be hit if the password is expired
//      */
//      Route::redirect('/', '/panel/home', 301);
//
//      // All route names are prefixed with 'admin.auth'.
//     Route::group([
//         'prefix' => 'auth',
//         'as' => 'auth.',
//         'namespace' => 'Auth',
//         'middleware' => 'access.routeNeedsPermission:view-access-management',
//     ], function () {
//         // User Management
//         Route::group(['namespace' => 'User'], function () {
//             // For DataTables
//             //Route::post('user/get', 'UserTableController')->name('user.get');
//
//             // User Status'
//             Route::get('user/deactivated', [UserStatusController::class, 'getDeactivated'])->name('user.deactivated');
//             Route::get('user/deleted', [UserStatusController::class, 'getDeleted'])->name('user.deleted');
//
//             // User CRUD
//             Route::get('user', [UserController::class, 'index'])->name('user.index');
//             Route::get('user/create', [UserController::class, 'create'])->name('user.create');
//             Route::post('user', [UserController::class, 'store'])->name('user.store');
//
//             // Specific User
//             Route::group(['prefix' => 'user/{user}'], function () {
//                 // User
//                 Route::get('/', [UserController::class, 'show'])->name('user.show');
//                 Route::get('edit', [UserController::class, 'edit'])->name('user.edit');
//                 Route::patch('/', [UserController::class, 'update'])->name('user.update');
//                 Route::delete('/', [UserController::class, 'destroy'])->name('user.destroy');
//
//                 // Account
//                 Route::get('account/confirm/resend', [UserConfirmationController::class, 'sendConfirmationEmail'])->name('user.account.confirm.resend');
//
//                 // Status
//                 Route::get('mark/{status}', [UserStatusController::class, 'mark'])->name('user.mark')->where(['status' => '[0,1]']);
//
//                 // Social
//                 Route::delete('social/{social}/unlink', [UserSocialController::class, 'unlink'])->name('user.social.unlink');
//
//                 // Confirmation
//                 Route::get('confirm', [UserConfirmationController::class, 'confirm'])->name('user.confirm');
//                 Route::get('unconfirm', [UserConfirmationController::class, 'unconfirm'])->name('user.unconfirm');
//
//                 // Password
//                 Route::get('password/change', [UserPasswordController::class, 'edit'])->name('user.change-password');
//                 Route::patch('password/change', [UserPasswordController::class, 'update'])->name('user.change-password.post');
//
//                 // log in as
//                 Route::get('login-as', 'UserAccessController@loginAs')->name('user.login-as');
//
//                 // Session
//                 Route::get('clear-session', [UserSessionController::class, 'clearSession'])->name('user.clear-session');
//
//                 // Deleted
//                 Route::delete('delete-permanently', [UserStatusController::class, 'delete'])->name('user.delete-permanently');
//                 Route::post('restore', [UserStatusController::class, 'restore'])->name('user.restore');
//             });
//         });
//
//         // Role Management
//         Route::group(['namespace' => 'Role'], function () {
//             Route::get('role', [RoleController::class, 'index'])->name('role.index');
//             Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
//             Route::post('role', [RoleController::class, 'store'])->name('role.store');
//
//             Route::group(['prefix' => 'role/{role}'], function () {
//                 Route::get('edit', [RoleController::class, 'edit'])->name('role.edit');
//                 Route::patch('/', [RoleController::class, 'update'])->name('role.update');
//                 Route::delete('/', [RoleController::class, 'destroy'])->name('role.destroy');
//             });
//
//             // For DataTables
//             //Route::post('role/get', 'RoleTableController')->name('role.get');
//         });
//
//         // Permission Management
//         Route::group(['namespace' => 'Permission'], function () {
//             Route::resource('permission', 'PermissionsController', ['except' => ['show']]);
//
//             //For DataTables
//             //Route::post('permission/get', 'PermissionTableController')->name('permission.get');
//         });
//     });
//
// });

Auth::routes();

// Socialite Routes
Route::get('login/{provider}', [App\Http\Controllers\SocialLoginController::class, 'login'])->name('social.login');
Route::get('login/{provider}/callback', [App\Http\Controllers\SocialLoginController::class, 'login']);

Route::get('/', function () {
    // return view('blog.comming-soon');
    return view('blog.home');
});

Route::get('/mapa', function () {
    // return view('blog.comming-soon');
    return view('blog.map');
});

Route::get('/maps', function () {
    // return view('blog.comming-soon');
    return view('blog.mapa');
});

Route::group(['middleware' => 'auth'], function () {

    Route::controller(App\Http\Controllers\TestController::class)->group(function() {
        Route::get('/raporty', 'raporty')->name('raporty.index');
        Route::get('/grafik', 'grafik')->name('grafik.index');
        Route::get('/wnioski', 'wnioski')->name('wnioski.index');
        Route::get('/zgloszenia', 'zgloszenia')->name('zgloszenia.index');
        Route::get('/pojazdy', 'pojazdy')->name('pojazdy.index');
        Route::get('/pojazdy/1', 'pojazdy_show')->name('pojazdy.show');
        Route::get('/sluzby', 'sluzby')->name('sluzby.index');
        Route::get('/dokumenty', 'dokumenty')->name('dokumenty.index');
        Route::get('/faq', 'faq')->name('faq.index');
        Route::get('/pobieralnia', 'pobieralnia')->name('pobieralnia.index');

        Route::get('/formularz', 'formularz')->name('formularz.index');
        Route::get('/account', 'account')->name('account.index');
        Route::get('/profile/{user?}', 'profile')->name('profile.index');
    });

    Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('list');

    Route::get('/ogloszenie/{ann}', [App\Http\Controllers\Admin\OgloszeniaController::class, 'show'])->name('ogloszenia.show');
    Route::get('/zebranie/{meet}', [App\Http\Controllers\Admin\MeetingsController::class, 'show'])->name('meetings.show');

    Route::group(['as' => 'manager.', 'prefix' => 'manager'], function () {
        Route::get('/', [App\Http\Controllers\Admin\ManagerController::class, 'index'])->name('index');
        Route::get('/admin', [App\Http\Controllers\Admin\ManagerController::class, 'admin'])->name('admin');
        Route::get('/transport-department', [App\Http\Controllers\Admin\ManagerController::class, 'carriage'])->name('transport-department');
        Route::get('/hr', [App\Http\Controllers\Admin\ManagerController::class, 'staff'])->name('staff');
        Route::get('/traffic-supervision', [App\Http\Controllers\Admin\ManagerController::class, 'supervision'])->name('traffic-supervision');
        Route::get('/control-room', [App\Http\Controllers\Admin\ManagerController::class, 'controlroom'])->name('control-room');
        Route::get('/workshop', [App\Http\Controllers\Admin\ManagerController::class, 'workshop'])->name('workshop');

        Route::group(['as' => 'transport.', 'prefix' => 'transport-department'], function () {
            Route::group(['as' => 'lines.', 'prefix' => 'lines'], function () {
                Route::get('/', [App\Http\Controllers\Departament\Transport\LinesController::class, 'index'])->name('index');
                Route::post('/', [App\Http\Controllers\Departament\Transport\LinesController::class, 'store'])->name('store');
                Route::get('/{line}/busstops', [App\Http\Controllers\Departament\Transport\LinesController::class, 'busstops'])->name('busstops');
            });
            Route::group(['as' => 'stints.', 'prefix' => 'stints'], function () {
                Route::get('/', [App\Http\Controllers\Departament\Transport\StintsController::class, 'index'])->name('index');
                Route::post('/', [App\Http\Controllers\Departament\Transport\StintsController::class, 'store'])->name('store');
                Route::get('/{stint}/brigades', [App\Http\Controllers\Departament\Transport\StintsController::class, 'brigades'])->name('brigades');
                Route::post('/{stint}/brigades', [App\Http\Controllers\Departament\Transport\StintsController::class, 'brigades_store'])->name('brigade.store');

                Route::get('/{brigade}/course-editor', [App\Http\Controllers\Departament\Transport\StintsController::class, 'editor'])->name('editor');
                // Route::get('/{stint}/busstops', [App\Http\Controllers\Departament\Transport\StintsController::class, 'busstops'])->name('busstops');
            });

            Route::group(['as' => 'measurement.', 'prefix' => 'measurement'], function () {
                Route::get('/', [App\Http\Controllers\Departament\Transport\LinesController::class, 'index'])->name('index');
                Route::get('/{line}', [App\Http\Controllers\Departament\Transport\LinesController::class, 'measurement_line'])->name('measurement_line');
            });

            Route::get('/matrix-generator', [App\Http\Controllers\Departament\Transport\LinesController::class, 'matrix'])->name('matrix');
            // Route::get('/{slut}', [App\Http\Controllers\Departament\Transport\LinesController::class, 'matrix']);
        });

        Route::group(['as' => 'hr.', 'prefix' => 'hr'], function () {
            Route::group(['as' => 'leaves.', 'prefix' => 'leaves'], function () {
                Route::get('/', [App\Http\Controllers\Departament\HR\LeavesController::class, 'index'])->name('index');
            });
        });

        Route::group(['as' => 'controlroom.', 'prefix' => 'control-room'], function () {
            Route::get('/graph-dyspo', [App\Http\Controllers\GraphController::class, 'graphdyspo'])->name('graph-dyspo');
            Route::get('/graph', [App\Http\Controllers\GraphController::class, 'index'])->name('index');
            Route::get('/graph/add-duty/', [App\Http\Controllers\GraphController::class, 'addduty'])->name('add-duty');
        });

        Route::group(['as' => 'management.', 'prefix' => 'management'], function () {
            Route::get('/stats', [App\Http\Controllers\Admin\ManagerController::class, 'stats'])->name('stats');
            // Route::group(['prefix' => 'ogloszenia'], function () {
            //     Route::resource('tags', App\Http\Controllers\Admin\OgloszeniaController::class);
            // });
            Route::group(['as' => 'meetings.'], function () {
                Route::get('zebrania', [App\Http\Controllers\Admin\MeetingsController::class, 'index'])->name('index');
                Route::get('zebrania/create', [App\Http\Controllers\Admin\MeetingsController::class, 'create'])->name('create');
                Route::post('zebrania', [App\Http\Controllers\Admin\MeetingsController::class, 'store'])->name('store');

                Route::group(['prefix' => 'zebranie/{meet}'], function () {
                    Route::get('/', [App\Http\Controllers\Admin\MeetingsController::class, 'show'])->name('showadmin');
                    Route::get('edit', [App\Http\Controllers\Admin\MeetingsController::class, 'edit'])->name('edit');
                    Route::put('/', [App\Http\Controllers\Admin\MeetingsController::class, 'update'])->name('update');
                    Route::delete('/', [App\Http\Controllers\Admin\MeetingsController::class, 'destroy'])->name('destroy');
                });
            });

            Route::group(['namespace'=> 'carriers', 'as' => 'carriers.', 'prefix' => 'carriers'], function () {
                Route::get('/', [App\Http\Controllers\Admin\CarriersController::class, 'index'])->name('index');
                Route::get('/show', [App\Http\Controllers\Admin\CarriersController::class, 'show'])->name('show');
                Route::get('create', [App\Http\Controllers\Admin\CarriersController::class, 'create'])->name('carriers.create');
                Route::post('/', [App\Http\Controllers\Admin\CarriersController::class, 'store'])->name('carriers.store');
            });

            Route::group(['as' => 'ogloszenia.'], function () {
                Route::get('/ogloszenia', [App\Http\Controllers\Admin\OgloszeniaController::class, 'index'])->name('index');
                Route::get('/ogloszenie/create', [App\Http\Controllers\Admin\OgloszeniaController::class, 'create'])->name('create');
                Route::post('/ogloszenia', [App\Http\Controllers\Admin\OgloszeniaController::class, 'store'])->name('store');

                Route::group(['prefix' => '/ogloszenie/{ann}'], function () {
                    Route::get('edit', [App\Http\Controllers\Admin\OgloszeniaController::class, 'edit'])->name('edit');
                    Route::put('/', [App\Http\Controllers\Admin\OgloszeniaController::class, 'update'])->name('update');
                    Route::delete('/', [App\Http\Controllers\Admin\OgloszeniaController::class, 'destroy'])->name('destroy');
                });

                Route::group(['as' => 'tags.', 'prefix' => 'ogloszenia'], function () {
                    Route::get('tags', [App\Http\Controllers\Admin\OgloszeniaController::class, 'index_tags'])->name('index');
                    Route::get('tag/create', [App\Http\Controllers\Admin\OgloszeniaController::class, 'create_tags'])->name('create');
                    Route::post('tags', [App\Http\Controllers\Admin\OgloszeniaController::class, 'store_tags'])->name('store');

                    Route::group(['prefix' => 'tag/{tag}'], function () {
                        Route::get('edit', [App\Http\Controllers\Admin\OgloszeniaController::class, 'edit_tags'])->name('edit');
                        Route::put('/', [App\Http\Controllers\Admin\OgloszeniaController::class, 'update_tags'])->name('update');
                        Route::delete('/', [App\Http\Controllers\Admin\OgloszeniaController::class, 'destroy_tags'])->name('destroy');
                    });
                });
            });
        });
    });




    Route::group(['namespace'=> 'settings', 'as' => 'settings.', 'prefix' => 'settings'], function () {
        Route::get('/', [App\Http\Controllers\SettingsControler::class, 'index'])->name('index');
        Route::get('/limitations', [App\Http\Controllers\SettingsControler::class, 'limitations'])->name('limitations');


        //Linie Management
        Route::group(['namespace' => 'Linie', 'as' => 'linie.'], function () {
            Route::get('linie', [App\Http\Controllers\LinieController::class, 'index'])->name('index');
            Route::get('linie/create', [App\Http\Controllers\LinieController::class, 'create'])->name('create');
            Route::post('linie', [App\Http\Controllers\LinieController::class, 'store'])->name('store');
            Route::group(['prefix' => 'linia/{linia}'], function () {
                Route::get('/', [App\Http\Controllers\LinieController::class, 'show'])->name('show');
                Route::get('edit', [App\Http\Controllers\LinieController::class, 'edit'])->name('edit');
                Route::put('/', [App\Http\Controllers\LinieController::class, 'update'])->name('update');
                Route::delete('/', [App\Http\Controllers\LinieController::class, 'destroy'])->name('destroy');
            });
        });

        //Role Management
        Route::group(['namespace' => 'Role', 'as' => 'roles.'], function () {
            Route::get('roles', [App\Http\Controllers\RoleController::class, 'index'])->name('index');
            Route::get('roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('create');
            Route::post('roles', [App\Http\Controllers\RoleController::class, 'store'])->name('store');

            Route::group(['prefix' => 'role/{role}'], function () {
                Route::get('edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('edit');
                Route::put('/', [App\Http\Controllers\RoleController::class, 'update'])->name('update');
                Route::delete('/', [App\Http\Controllers\RoleController::class, 'destroy'])->name('destroy');
            });
        });


        // Permission Management
        Route::group(['namespace' => 'Permission', 'as' => 'perms.'], function () {
            //Route::resource('permission', App\Http\Controllers\PermissionsController::class);
            Route::get('permissions', [App\Http\Controllers\PermissionsController::class, 'index'])->name('index');
            Route::get('permissions/create', [App\Http\Controllers\PermissionsController::class, 'create'])->name('create');
            Route::post('permissions', [App\Http\Controllers\PermissionsController::class, 'store'])->name('store');

            Route::group(['prefix' => 'permissions/{permission}'], function () {
                Route::get('edit', [App\Http\Controllers\PermissionsController::class, 'edit'])->name('edit');
                Route::patch('/', [App\Http\Controllers\PermissionsController::class, 'update'])->name('update');
                Route::delete('/', [App\Http\Controllers\PermissionsController::class, 'destroy'])->name('destroy');
            });

            Route::group(['prefix' => 'permissions/', 'as' => 'module.'], function () {
                //Route::resource('permission', App\Http\Controllers\PermissionsController::class);
                Route::get('module', [App\Http\Controllers\PermissionModuleController::class, 'index'])->name('index');
                Route::get('module/create', [App\Http\Controllers\PermissionModuleController::class, 'create'])->name('create');
                Route::post('module', [App\Http\Controllers\PermissionModuleController::class, 'store'])->name('store');

                Route::group(['prefix' => 'permissions/module/{module}'], function () {
                    Route::get('edit', [App\Http\Controllers\PermissionModuleController::class, 'edit'])->name('edit');
                    Route::patch('/', [App\Http\Controllers\PermissionModuleController::class, 'update'])->name('update');
                });
            });
        });

    });

    Route::group(['namespace' => 'Surveys', 'as' => 'survey.'], function () {
        Route::get('ankiety', [App\Http\Controllers\SurveyController::class, 'index'])->name('index');
        Route::get('ankiety/create', [App\Http\Controllers\SurveyController::class, 'create'])->name('create');
        Route::post('ankiety', [App\Http\Controllers\SurveyController::class, 'store'])->name('store');

        Route::group(['prefix' => 'ankieta/{survey}'], function () {
            Route::get('take/', [App\Http\Controllers\SurveyController::class, 'take'])->name('take');
            Route::get('/', [App\Http\Controllers\SurveyController::class, 'show'])->name('show');
            Route::get('edit', [App\Http\Controllers\SurveyController::class, 'edit'])->name('edit');
            Route::put('/', [App\Http\Controllers\SurveyController::class, 'update'])->name('update');
            Route::delete('/', [App\Http\Controllers\SurveyController::class, 'destroy'])->name('destroy');
        });
    });

    // Routes
    Route::get('admin/user/switch/start/{id}', [App\Http\Controllers\UserController::class, 'user_switch_start'])->name('admin.user.switch-start');
    Route::get('admin/user/switch/stop', [App\Http\Controllers\UserController::class, 'user_switch_stop'])->name('admin.user.switch-stop');

    Route::group(['prefix'=>'admin', 'namespace'=> 'user', 'as' => 'users.'], function () {
        Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('list');
        Route::get('users/card', [App\Http\Controllers\Admin\UserController::class, 'card'])->name('card');
        Route::get('users/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('create');
        Route::post('users', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('store');
        // Specific User
        Route::group(['prefix' => 'user/{user}'], function () {
            // User
            Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('user.show');
            Route::get('edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user.edit');
            Route::patch('/', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user.update');
            Route::delete('/', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('user.destroy');

            // // Account
            // Route::get('account/confirm/resend', [UserConfirmationController::class, 'sendConfirmationEmail'])->name('user.account.confirm.resend');
            //
            // // Status
            // Route::get('mark/{status}', [UserStatusController::class, 'mark'])->name('user.mark')->where(['status' => '[0,1]']);
            //
            // // Social
            // Route::delete('social/{social}/unlink', [UserSocialController::class, 'unlink'])->name('user.social.unlink');
            //
            // // Confirmation
            // Route::get('confirm', [UserConfirmationController::class, 'confirm'])->name('user.confirm');
            // Route::get('unconfirm', [UserConfirmationController::class, 'unconfirm'])->name('user.unconfirm');
            //
            // // Password
            // Route::get('password/change', [UserPasswordController::class, 'edit'])->name('user.change-password');
            // Route::patch('password/change', [UserPasswordController::class, 'update'])->name('user.change-password.post');
            //
            // // log in as
            // Route::get('login-as', 'UserAccessController@loginAs')->name('user.login-as');
            //
            // // Session
            // Route::get('clear-session', [UserSessionController::class, 'clearSession'])->name('user.clear-session');
            //
            // // Deleted
            // Route::delete('delete-permanently', [UserStatusController::class, 'delete'])->name('user.delete-permanently');
            // Route::post('restore', [UserStatusController::class, 'restore'])->name('user.restore');
        });
    });

    //Route::redirect('/', '/panel/home', 301);
    //Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home1');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/timetables', [App\Http\Controllers\TestController::class, 'timetablesindex'])->name('timetables.index');
Route::get('/timetables/{line}', [App\Http\Controllers\TestController::class, 'timetablesshow'])->name('timetables.show');