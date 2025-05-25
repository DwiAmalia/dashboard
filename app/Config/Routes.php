<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//without filter token a.k.a bypass
$routes->get('/signin', 'AuthenticationController::signin', ['as' => 'signin']);
$routes->get('/signup', 'AuthenticationController::signup', ['as' => 'signup']);
$routes->post('/signin-process', 'AuthenticationController::signinProcess', ['as' => 'signinProcess']);
$routes->get('/forgot-password', 'AuthenticationController::forgotPassword', ['as' => 'forgotPassword']);
$routes->get('/comingSoon', 'HomeController::comingSoon', ['as' => 'comingSoon']);
$routes->get('/error', 'HomeController::error', ['as' => 'error']);
$routes->get('/faq', 'HomeController::faq', ['as' => 'faq']);
$routes->get('/maintenance', 'HomeController::maintenance', ['as' => 'maintenance']);
$routes->get('terms-condition', 'HomeController::termsCondition', ['as' => 'termsCondition']);

$routes->group('', function ($routes) {
    $routes->get('/', 'DashboardController::index', ['as' => 'index']);
});
$routes->group('presensi', function ($routes) {
    $routes->get('presensi-data', 'PresensiController::presensiData', ['as' => 'presensiData']);
});

$routes->group('penduduk', function ($routes) {
    // List all penduduk data
    $routes->get('penduduk-data', 'PendudukController::index', ['as' => 'pendudukData']);

    // Get specific penduduk by NIK
    $routes->get('penduduk-details/(:segment)', 'PendudukController::show/$1', ['as' => 'pendudukDetails']);

    // Create new penduduk
    $routes->get('penduduk-create', 'PendudukController::create', ['as' => 'pendudukCreate']);
    $routes->post('penduduk-store', 'PendudukController::store', ['as' => 'pendudukStore']);

    // Edit penduduk
    $routes->get('penduduk-edit/(:segment)', 'PendudukController::edit/$1', ['as' => 'pendudukEdit']);
    $routes->post('penduduk-update/(:segment)', 'PendudukController::update/$1', ['as' => 'pendudukUpdate']);

    // Delete penduduk
    $routes->get('penduduk-delete/(:segment)', 'PendudukController::delete/$1', ['as' => 'pendudukDelete']);
});


// $routes->group('sse', function ($routes) {
//     $routes->get('sse-data', 'SseController::sseData', ['as' => 'sseData']);
// });

$routes->get('sse-data', 'SseController::sseData', ['as' => 'sseData']);

$routes->group('lapkin', function ($routes) {
    $routes->get('lapkin-data', 'LapkinController::lapkinData', ['as' => 'lapkinData']);
});

$routes->group('izin', function ($routes) {
    $routes->get('izin-data', 'IzinController::izinData', ['as' => 'izinData']);
});

$routes->group('pengaduan', function ($routes) {
    $routes->get('pengaduan-data', 'PengaduanController::pengaduanData', ['as' => 'pengaduanData']);
});

$routes->group('asn', function ($routes) {
    $routes->get('asn-data', 'AsnController::asnData', ['as' => 'asnData']);
});

$routes->group('authentication', function ($routes) {
    $routes->get('logout', 'AuthenticationController::logout', ['as' => 'logout']);
    $routes->get('testConnection', 'AuthenticationController::testConnection', ['as' => 'testConnection']);
});


$routes->group('blog', function ($routes) {
    $routes->get('addBlog', 'BlogController::addBlog', ['as' => 'addBlog']);
    $routes->get('blog', 'BlogController::blog', ['as' => 'blog']);
    $routes->get('blogDetails', 'BlogController::blogDetails', ['as' => 'blogDetails']);
});

$routes->group('chart', function ($routes) {
    $routes->get('column-chart', 'ChartController::columnChart', ['as' => 'columnChart']);
    $routes->get('line-chart', 'ChartController::lineChart', ['as' => 'lineChart']);
    $routes->get('pie-chart', 'ChartController::pieChart', ['as' => 'pieChart']);
});

$routes->group('components', function ($routes) {
    $routes->get('alert', 'ComponentsController::alert', ['as' => 'alert']);
    $routes->get('avatar', 'ComponentsController::avatar', ['as' => 'avatar']);
    $routes->get('badges', 'ComponentsController::badges', ['as' => 'badges']);
    $routes->get('button', 'ComponentsController::button', ['as' => 'button']);
    $routes->get('calendar', 'ComponentsController::calendar', ['as' => 'calendar']);
    $routes->get('card', 'ComponentsController::card', ['as' => 'card']);
    $routes->get('carousel', 'ComponentsController::carousel', ['as' => 'carousel']);
    $routes->get('colors', 'ComponentsController::colors', ['as' => 'colors']);
    $routes->get('dropdown', 'ComponentsController::dropdown', ['as' => 'dropdown']);
    $routes->get('image-upload', 'ComponentsController::imageUpload', ['as' => 'imageUpload']);
    $routes->get('list', 'ComponentsController::list', ['as' => 'list']);
    $routes->get('pagination', 'ComponentsController::pagination', ['as' => 'pagination']);
    $routes->get('progress', 'ComponentsController::progress', ['as' => 'progress']);
    $routes->get('radio', 'ComponentsController::radio', ['as' => 'radio']);
    $routes->get('star-rating', 'ComponentsController::starRating', ['as' => 'starRating']);
    $routes->get('switch', 'ComponentsController::switch', ['as' => 'switch']);
    $routes->get('tabs', 'ComponentsController::tabs', ['as' => 'tabs']);
    $routes->get('tags', 'ComponentsController::tags', ['as' => 'tags']);
    $routes->get('tooltip', 'ComponentsController::tooltip', ['as' => 'tooltip']);
    $routes->get('typography', 'ComponentsController::typography', ['as' => 'typography']);
    $routes->get('videos', 'ComponentsController::videos', ['as' => 'videos']);
});


$routes->group('forms', function ($routes) {
    $routes->get('form', 'FormsController::form', ['as' => 'form']);
    $routes->get('form-layout', 'FormsController::formlayout', ['as' => 'formLayout']);
    $routes->get('form-validation', 'FormsController::formvalidation', ['as' => 'formValidation']);
    $routes->get('wizard', 'FormsController::wizard', ['as' => 'wizard']);
});

$routes->group('invoice', function ($routes) {
    $routes->get('invoice-add', 'InvoiceController::invoiceAdd', ['as' => 'invoiceAdd']);
    $routes->get('invoice-edit', 'InvoiceController::invoiceEdit', ['as' => 'invoiceEdit']);
    $routes->get('invoice-list', 'InvoiceController::invoiceList', ['as' => 'invoiceList']);
    $routes->get('invoice-preview', 'InvoiceController::invoicePreview', ['as' => 'invoicePreview']);
});

$routes->group('role-and-access', function ($routes) {
    $routes->get('assign-role', 'RoleAndAccessController::assignRole', ['as' => 'assignRole']);
    $routes->get('role-access', 'RoleAndAccessController::roleAaccess', ['as' => 'roleAaccess']);
});

$routes->group('settings', function ($routes) {
    $routes->get('company', 'SettingsController::company', ['as' => 'company']);
    $routes->get('currencies', 'SettingsController::currencies', ['as' => 'currencies']);
    $routes->get('language', 'SettingsController::language', ['as' => 'language']);
    $routes->get('notification', 'SettingsController::notification', ['as' => 'notification']);
    $routes->get('notification-alert', 'SettingsController::notificationAlert', ['as' => 'notificationAlert']);
    $routes->get('payment-gateway', 'SettingsController::paymentGateway', ['as' => 'paymentGateway']);
    $routes->get('theme', 'SettingsController::theme', ['as' => 'theme']);
});

$routes->group('tables', function ($routes) {
    $routes->get('table-basic', 'tableController::tableBasic', ['as' => 'tableBasic']);
    $routes->get('table-data', 'tableController::tableData', ['as' => 'tableData']);
});

$routes->group('users', function ($routes) {
    $routes->get('add-user', 'UsersController::addUser', ['as' => 'addUser']);
    $routes->get('users-grid', 'UsersController::usersGrid', ['as' => 'usersGrid']);
    $routes->get('users-list', 'UsersController::usersList', ['as' => 'usersList']);
    $routes->get('view-profile', 'UsersController::viewProfile', ['as' => 'viewProfile']);
});

$routes->group('', function ($routes) {
    $routes->get('blank-page', 'HomeController::blankPage', ['as' => 'blankPage']);
    $routes->get('calendar', 'HomeController::calendar', ['as' => 'calendar']);
    $routes->get('gallery', 'HomeController::gallery', ['as' => 'gallery']);
    $routes->get('starred', 'HomeController::starred', ['as' => 'starred']);
    $routes->get('testimonials', 'HomeController::testimonials', ['as' => 'testimonials']);
    $routes->get('veiw-details', 'HomeController::veiwDetails', ['as' => 'veiwDetails']);
    $routes->get('widgets', 'HomeController::widgets', ['as' => 'widgets']);
});
