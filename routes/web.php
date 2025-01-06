<?php

use App\Http\Livewire\HomeComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\AboutusComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\Blog\BlogsComponent;
use App\Http\Livewire\Admin\WhyusComponent;
use App\Http\Livewire\SeoServicesComponent;
use App\Http\Livewire\Admin\OrdersComponent;
use App\Http\Livewire\PaidEstimateComponent;
use App\Http\Livewire\Admin\ServicesComponent;
use App\Http\Livewire\Admin\SettingsComponent;
use App\Http\Livewire\ServiceDetailsComponent;
use App\Http\Livewire\Admin\Blog\BlogComponent;
use App\Http\Livewire\Admin\DashboardComponent;
use App\Http\Livewire\Admin\EditTeamComponenet;
use App\Http\Livewire\Admin\EditWhyusComponent;
use App\Http\Livewire\WebsiteServicesComponent;
use App\Http\Livewire\Blog\BlogDetailsComponent;
use App\Http\Livewire\ContentMarketingComponent;
use App\Http\Livewire\Admin\CreateTeamComponenet;
use App\Http\Livewire\Admin\CreateWhyusComponent;
use App\Http\Livewire\Admin\EditServiceComponent;
use App\Http\Livewire\Admin\ManageTeamComponenet;
use App\Http\Livewire\Admin\CompanyStatsComponent;
use App\Http\Controllers\AdminGenerateOrderInvoice;
use App\Http\Livewire\Admin\Blog\EditBlogComponent;
use App\Http\Livewire\Admin\Client\ClientComponent;
use App\Http\Livewire\Admin\CreateServiceComponent;
use App\Http\Livewire\GoogleAdsManagementComponent;
use App\Http\Livewire\SocialMediaMarketingComponent;
use App\Http\Livewire\Admin\Blog\CreateBlogComponent;
use App\Http\Livewire\Admin\ManageServiceCompontent;
use App\Http\Livewire\DigitalMarketingConsultingComponent;
use App\Http\Livewire\EcommerceOptimizationServiceComponent;
use App\Http\Livewire\Admin\ServiceCategory\ServiceCategoryComponent;
use App\Http\Livewire\Admin\ServiceCategory\EditServiceCategoryComponent;
use App\Http\Livewire\Admin\ServiceCategory\CreateServiceCategoryComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', HomeComponent::class);
Route::get('seo-services', SeoServicesComponent::class)->name('seo-services');
Route::get('google-ads-management-agency', GoogleAdsManagementComponent::class)->name('google-adsmanagement-agency');
Route::get('web-services', WebsiteServicesComponent::class)->name('web-services');
Route::get('ecommerce-optimization-services', EcommerceOptimizationServiceComponent::class)->name('ecommerce-optimization-services');
Route::get('digital-marketing-consultant', DigitalMarketingConsultingComponent::class)->name('digital-marketing');
Route::get('social-media-marketing-management', SocialMediaMarketingComponent::class)->name('social-media-marketing-management');
Route::get('content-marketing-agency', ContentMarketingComponent::class)->name('content-marketing-agency');
Route::get('about-us', AboutusComponent::class)->name('about-us');
Route::get('estimate', PaidEstimateComponent::class)->name('estimate');
Route::get('contact-us', ContactComponent::class)->name('contact-us');
Route::get('/service-details/{slug}', ServiceDetailsComponent::class)->name('service.details');

//  blogs.routes
Route::get('/blogs', BlogsComponent::class)->name('blog.all');
Route::get('/blog-details/{slug}', BlogDetailsComponent::class)->name('blog.details');





Route::middleware(['auth:sanctum', 'authAdmin', 'verified',])->group(function () {
    Route::get('dashboard', DashboardComponent::class)->name('dashboard');
    Route::get('dashboard/orders',OrdersComponent::class)->name('admin.orders');
    Route::get('dashboard/settings',SettingsComponent::class)->name('admin.settings');
    
    Route::get('dashboard/why-us-section',WhyusComponent::class)->name('admin.whyus');
    Route::get('dashboard/why-us-section/create',CreateWhyusComponent::class)->name('admin.create');
    Route::get('dashboard/why-us-section/edit/{id}',EditWhyusComponent::class)->name('whyus.edit');

    Route::get('dashboard/services-section',ServicesComponent::class)->name('admin.services');
    Route::get('dashboard/services-section/create',CreateServiceComponent::class)->name('admin.service_create');
    Route::get('dashboard/services-section/edit/{id}',EditServiceComponent::class)->name('admin.service_edit');
    // invoice 
    Route::get('order-invoice/{id}',[AdminGenerateOrderInvoice::class,'invoice'])->name('invoice');

    //  clients routes
    Route::prefix('/admin')->group(function () {
        Route::get('/clients', ClientComponent::class)->name('admin.clients');
        Route::get('/clients/create', App\Http\Livewire\Admin\Client\CreateClient::class)->name('add.clients');
        Route::get('/clients/edit/{id}', App\Http\Livewire\Admin\Client\EditClient::class)->name('edit.clients');
        
        //  blogs
        Route::get('/blogs', BlogComponent::class)->name('blog.index');
        Route::get('/blog-create', CreateBlogComponent::class)->name('blog.create');
        Route::get('/blog-edit/{id}', EditBlogComponent::class)->name('blog.edit');
        
        //  company stats
        Route::get('/company-stats', CompanyStatsComponent::class)->name('company.stats');
        //  service category
        Route::get('/service-category', ServiceCategoryComponent::class)->name('service.category.index');
        Route::get('/service-category/create', CreateServiceCategoryComponent::class)->name('service.category.create');
        Route::get('/service-category/edit/{id}', EditServiceCategoryComponent::class)->name('service.category.edit');
        Route::get('/manage-services', ManageServiceCompontent::class)->name('service.manage.show');
        
    });

    // team 
    Route::get('dashboard/team', ManageTeamComponenet::class)->name('admin.team');
    Route::get('dashboard/team/create',CreateTeamComponenet::class)->name('admin.team_create');
    Route::get('dashboard/team/edit/{id}',EditTeamComponenet::class)->name('admin.team_edit');
});
