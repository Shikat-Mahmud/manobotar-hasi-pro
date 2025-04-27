<?php

use App\Http\Controllers\backend\AboutUsController;
use App\Http\Controllers\backend\AdviserController;
use App\Http\Controllers\backend\BloodDonerController;
use App\Http\Controllers\backend\CommitteeController;
use App\Http\Controllers\backend\DonationController;
use App\Http\Controllers\backend\ForeignCommitteeController;
use App\Http\Controllers\backend\GalleryController;
use App\Http\Controllers\backend\InvestController;
use App\Http\Controllers\backend\ProjectController;
use App\Http\Controllers\backend\SponsorController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ReviewController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/app-download', [HomeController::class, 'appDownload'])->name('app.download');

Route::get('/admin-login', [IndexController::class, 'login'])->name('admin.login');

Route::middleware(['auth', 'permission:admin-panel'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users-create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users-store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users-details/{id}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/roles/{user}', [UserController::class, 'role'])->name('users.roles.edit');
    Route::post('/users/roles/{user}', [UserController::class, 'giveRole'])->name('users.roles');

    // search route
    Route::get('/search', [IndexController::class, 'search'])->name('search');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// all settings route start //
Route::get('/general-setting', [SettingsController::class, 'index'])->name('general.setting');
Route::post('/setting-update', [SettingsController::class, 'update'])->name('setting.update');

Route::get('/email-setting', [SettingsController::class, 'emailSetting'])->name('email.setting');
Route::post('/email-update', [SettingsController::class, 'emailUpdate'])->name('email.update');

Route::get('application-cache-clear', [SettingsController::class, 'cacheClear'])->name('application.cache.clear');
// all settings route end //


// all project route start //
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/add-project', [ProjectController::class, 'create'])->name('create.project');
Route::post('/add-project', [ProjectController::class, 'store'])->name('store.project');
Route::get('/edit-project/{id}', [ProjectController::class, 'edit'])->name('edit.project');
Route::post('/edit-project/{id}', [ProjectController::class, 'update'])->name('update.project');
Route::post('/destroy-project/{id}', [ProjectController::class, 'destroy'])->name('destroy.project');
Route::get('/project-change-status/{id}', [ProjectController::class, 'changeStatus'])->name('project.change.status');

Route::get('/project-details/{id}', [ProjectController::class, 'projectDetail'])->name('project.details');
// all project route end //


// all review route start //
Route::middleware('auth')->group(function () {
    Route::get('/reviews', [ReviewController::class, 'showReviews'])->name('reviews');
    Route::get('/review-status/{review}', [ReviewController::class, 'changeStatus'])->name('change.review.status');
});

Route::get('/event-review', [ReviewController::class, 'index'])->name('event.review');
Route::post('/event-review', [ReviewController::class, 'store'])->name('post.review');
// all review route end //


// all contact route start //
Route::middleware('auth')->group(function () {
    Route::get('/contact-list', [ContactController::class, 'showContact'])->name('contact.list');
    Route::get('/contact-view/{id}', [ContactController::class, 'view'])->name('contact.view');
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('post.contact');
// all contact route end //


// all adviser route start //
Route::middleware('auth')->group(function () {
    Route::get('/adviser-list', [AdviserController::class, 'list'])->name('adviser.list');
    Route::get('/add-adviser', [AdviserController::class, 'create'])->name('create.adviser');
    Route::post('/add-adviser', [AdviserController::class, 'store'])->name('store.adviser');
    Route::get('/edit-adviser/{id}', [AdviserController::class, 'edit'])->name('edit.adviser');
    Route::post('/edit-adviser/{id}', [AdviserController::class, 'update'])->name('update.adviser');
    Route::post('/destroy-adviser/{id}', [AdviserController::class, 'destroy'])->name('destroy.adviser');
});

Route::get('/advisers', [AdviserController::class, 'index'])->name('advisers');
// all adviser route end //


// all blood doner route start //
Route::middleware('auth')->group(function () {
    Route::get('/blood-doner-list', [BloodDonerController::class, 'list'])->name('blood-doner.list');
    Route::get('/add-blood-doner', [BloodDonerController::class, 'create'])->name('create.blood-doner');
    Route::post('/store-blood-doner', [BloodDonerController::class, 'store'])->name('store.blood-doner');
    Route::get('/edit-blood-doner/{id}', [BloodDonerController::class, 'edit'])->name('edit.blood-doner');
    Route::post('/update-blood-doner/{id}', [BloodDonerController::class, 'update'])->name('update.blood-doner');
    Route::post('/destroy-blood-doner/{id}', [BloodDonerController::class, 'destroy'])->name('destroy.blood-doner');
    Route::get('/show-blood-doner/{id}', [BloodDonerController::class, 'show'])->name('show.blood-doner');
    Route::get('/blood-doner-status/{id}', [BloodDonerController::class, 'changeStatus'])->name('blood-doner.status');
});

Route::get('/blood-donation-registration', [BloodDonerController::class, 'bloodDonate'])->name('donate.blood');
Route::post('/blood-donation-registration', [BloodDonerController::class, 'bloodDonateStore'])->name('donate.blood.post');

Route::get('/blood-doners', [BloodDonerController::class, 'index'])->name('blood-doners');
// all blood doner route end //


// all about us route start //
Route::middleware('auth')->group(function () {
    Route::get('/edit-about/{id}', [AboutUsController::class, 'edit'])->name('edit.about');
    Route::post('/update-about/{id}', [AboutUsController::class, 'update'])->name('update.about');
    Route::get('/show-about', [AboutUsController::class, 'show'])->name('show.about');
});

Route::get('/about', [AboutUsController::class, 'index'])->name('about');
// all about us route end //


// all committee route start //
Route::middleware('auth')->group(function () {
    Route::get('/committee-list', [CommitteeController::class, 'index'])->name('committee.list');
    Route::get('/committee-create', [CommitteeController::class, 'create'])->name('committee.create');
    Route::post('/committee-store', [CommitteeController::class, 'store'])->name('committee.store');
    Route::get('/committee-edit/{id}', [CommitteeController::class, 'edit'])->name('committee.edit');
    Route::post('/committee-update/{id}', [CommitteeController::class, 'update'])->name('committee.update');
    Route::get('/committee-show/{id}', [CommitteeController::class, 'show'])->name('committee.show');
    Route::post('/committee-destroy/{id}', [CommitteeController::class, 'destroy'])->name('committee.destroy');
});

Route::get('/committees', [CommitteeController::class, 'allCommittee'])->name('all.committee');
// all committee route end //


// all foreign route start //
Route::middleware('auth')->group(function () {
    Route::get('/foreign-committee-list', [ForeignCommitteeController::class, 'index'])->name('foreign.list');
    Route::get('/foreign-committee-create', [ForeignCommitteeController::class, 'create'])->name('foreign.create');
    Route::post('/foreign-committee-store', [ForeignCommitteeController::class, 'store'])->name('foreign.store');
    Route::get('/foreign-committee-edit/{id}', [ForeignCommitteeController::class, 'edit'])->name('foreign.edit');
    Route::post('/foreign-committee-update/{id}', [ForeignCommitteeController::class, 'update'])->name('foreign.update');
    Route::get('/foreign-committee-show/{id}', [ForeignCommitteeController::class, 'show'])->name('foreign.show');
    Route::post('/foreign-committee-destroy/{id}', [ForeignCommitteeController::class, 'destroy'])->name('foreign.destroy');
});

Route::get('/foreign-committees', [ForeignCommitteeController::class, 'allForeignCommittee'])->name('all.foreign');
// all foreign route end //


// all gallery route start //
Route::middleware('auth')->group(function () {
    Route::get('/gallery-list', [GalleryController::class, 'galleryList'])->name('gallery.list');
    Route::get('/add-gallery', [GalleryController::class, 'create'])->name('create.gallery');
    Route::post('/add-gallery', [GalleryController::class, 'store'])->name('store.gallery');
    Route::post('/destroy-gallery/{id}', [GalleryController::class, 'destroy'])->name('destroy.gallery');
});

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
// all gallery route end //


// all donation route start //
Route::middleware('auth')->group(function () {
    Route::get('/donations', [DonationController::class, 'index'])->name('donations');
    Route::get('/add-donation', [DonationController::class, 'create'])->name('create.donation');
    Route::post('/add-donation', [DonationController::class, 'store'])->name('store.donation');
    Route::get('/edit-donation/{id}', [DonationController::class, 'edit'])->name('edit.donation');
    Route::post('/edit-donation/{id}', [DonationController::class, 'update'])->name('update.donation');
    Route::post('/destroy-donation/{id}', [DonationController::class, 'destroy'])->name('destroy.donation');
});

Route::get('/our-doner', [DonationController::class, 'donerShow'])->name('our.doner');
// all donation route end //


// all investment route start //
Route::middleware('auth')->group(function () {
    Route::get('/invests', [InvestController::class, 'index'])->name('invests');
    Route::get('/add-investment', [InvestController::class, 'create'])->name('create.investment');
    Route::post('/add-investment', [InvestController::class, 'store'])->name('store.investment');
    Route::get('/edit-investment/{id}', [InvestController::class, 'edit'])->name('edit.investment');
    Route::post('/edit-investment/{id}', [InvestController::class, 'update'])->name('update.investment');
    Route::post('/destroy-investment/{id}', [InvestController::class, 'destroy'])->name('destroy.investment');
});
// all investment route end //


// all sponsor route start //
Route::middleware('auth')->group(function () {
    Route::get('/sponsors', [SponsorController::class, 'index'])->name('sponsors');
    Route::get('/add-sponsor', [SponsorController::class, 'create'])->name('create.sponsor');
    Route::post('/add-sponsor', [SponsorController::class, 'store'])->name('store.sponsor');
    Route::get('/edit-sponsor/{id}', [SponsorController::class, 'edit'])->name('edit.sponsor');
    Route::post('/edit-sponsor/{id}', [SponsorController::class, 'update'])->name('update.sponsor');
    Route::post('/destroy-sponsor/{id}', [SponsorController::class, 'destroy'])->name('destroy.sponsor');
});
// all sponsor route end //