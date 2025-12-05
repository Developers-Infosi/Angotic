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


Route::get('/', ['as' => 'site.home', 'uses' => 'Site\HomeController@index']);
Route::get('sobre', ['as' => 'site.about', 'uses' => 'Site\AboutController@index']);
Route::get('agenda', ['as' => 'site.schedule', 'uses' => 'Site\ScheduleController@index']);
/**speaker */
Route::get('speakers', ['as' => 'site.speaker', 'uses' => 'Site\SpeakerController@index']);
Route::get('speaker/{name}', ['as' => 'site.speaker.show', 'uses' => 'Site\SpeakerController@show']);
/**End speaker */
Route::get('patrocinadores', ['as' => 'site.sponsor', 'uses' => 'Site\SponsorController@index']);
Route::get('startup', ['as' => 'site.startup', 'uses' => 'Site\StartupController@index']);
/* gallery */
Route::get('galerias/', ['as' => 'site.gallery', 'uses' => 'Site\GalleryController@index']);
Route::get('galeria/{name}', ['as' => 'site.gallery.show', 'uses' => 'Site\GalleryController@show']);
Route::get('canal', ['as' => 'site.Channel', 'uses' => 'Site\ChannelController@index']);
/**news */
Route::get('noticias', ['as' => 'site.news', 'uses' => 'Site\NewsController@index']);
Route::get('noticia/{name}', ['as' => 'site.news.show', 'uses' => 'Site\NewsController@show']);
/**End news */
/** participantes */
Route::get('participantes', ['as' => 'site.registration.index', 'uses' => 'Site\RegistrationController@create']);
Route::post('participantes/store', ['as' => 'site.registration.store', 'uses' => 'Site\RegistrationController@store']);
Route::get('participantes/invoice/{code}', ['as' => 'site.registration.invoice', 'uses' => 'Site\RegistrationController@invoice']);
Route::get('participantes/pagamento-express/{code}', ['as' => 'site.registration.payexpress', 'uses' => 'Site\RegistrationController@payexpress']);
/**End participantes */
Route::get('Eu-vou', ['as' => 'site.frame', 'uses' => 'Site\FrameController@index']);
Route::get('contactos', ['as' => 'site.contact', 'uses' => 'Site\ContactController@index']);
Route::post('site/help/email', ['as' => 'site.help.email', 'uses' => 'Site\Email\HelpController@send']);
Route::get('informações-uteis', ['as' => 'site.information', 'uses' => 'Site\InformationController@index']);
Route::get('media-kit', ['as' => 'site.mediakit', 'uses' => 'Site\MediakitController@index']);
Route::get('politicas-de-privacidade', ['as' => 'site.policyPrivacy', 'uses' => 'Site\PolicyPrivacyController@index']);


/* inclui as rotas de autenticação do ficheiro auth.php */
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';



