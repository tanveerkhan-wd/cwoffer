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


/*
* =>=>=>=>=> BUYER ROUTES <=<=<=<=<=
*/

Route::namespace('Front')->group(function () {
	Route::get('/','StaticPageController@index');
	Route::get('privacy-policy','StaticPageController@privacy');
	Route::get('terms-condition','StaticPageController@terms');
	
	//BUYER INTRO
	Route::get('buyer-intro/{property}','BuyerController@index')->name('front-buyer-intro');
	Route::post('buyer-intro','BuyerController@buyerIntro');
	Route::post('search-property','BuyerController@searchProperty');
	Route::post('addBuyerPost','BuyerController@addBuyerPost');
});
/*
* =>=>=>=>=> ADMIN ROUTES <=<=<=<=<=
*/
Route::get('admin/', function(){
	return redirect()->route('adminLoginForm');
});
Route::group(['middleware' => ['prevent-back-history','guest']],function(){

//Route::group(['middleware'=>'guest'],function(){
	Route::get('admin/login','UserController@index')->name('adminLoginForm');
	Route::post('/loginPost','UserController@loginPost')->name('adminLoginFormPost');
	Route::get('forgotPassword','UserController@forgotPassword')->name('forgotPassword');
	Route::post('forgotPasswordPost','UserController@forgotPasswordPost')->name('forgotPasswordPost');
	Route::get('/verifyOtp/{id}', 'UserController@getVerifyOtp')->name('getVerifyOtp');
	Route::post('/verifyOtpPost', 'UserController@verifyOtpPost')->name('verifyOtpPost');
	Route::get('/resetPassword/{token}', 'UserController@resetPassword')->name('resetPassword');
	Route::post('/resetPasswordPost', 'UserController@resetPasswordPost')->name('resetPasswordPost');
});

Route::get('logout','UserController@logout')->name('adminLogout');
Route::post('/changePasswordPost', 'UserController@changePasswordPost');
Route::get('seller/setPassword/{token}', 'UserController@setPassword')->name('setPassword');


Route::prefix('seller')->namespace('Admin')->group(function () {
	//SELLER
	Route::group(['middleware'=>'seller'],function(){
		/*====== Base Routes =======*/
		Route::get('/dashboard','DashboardController@dashboard')->name('sellerDashboard');
		Route::get('/profile', 'DashboardController@profile');

		/* ======== Routes For Seller Properties ========== */
		Route::get('/properties','PropertyController@index');
		Route::post('/properties','PropertyController@getProperty');
		Route::post('/properties/addPost','PropertyController@addPropertyPost');
		Route::get('/properties/add','PropertyController@addProperty');
		Route::get('/properties/relist/{id}','PropertyController@editProperty');
		Route::post('/properties/addImage','PropertyController@addImages');
		Route::get('/properties/imageRemove/{id}','PropertyController@imageRemove');
		Route::get('/properties/edit/{id}','PropertyController@editProperty');
		Route::get('/properties/view/{id}','PropertyController@viewProperty');
		Route::post('/properties/status','PropertyController@proStatus');
		Route::post('/properties/delete','PropertyController@proDelete');
		Route::get('/file-export','PropertyController@fileExport')->name('file-export');
		
		/* ======== Routes For Admin Offers ========== */
		Route::get('/offers','OfferController@index');
		Route::post('/offers','OfferController@getOffer');
		Route::get('/offers/view/{id}','OfferController@viewOffer');
		Route::post('/offer/contractStatus','OfferController@offerContractStatus');
		Route::get('/file-export-all-offer','OfferController@fileExport')->name('file-export-all-offer');
		Route::post('/offer/accept','OfferController@offerAccept');
		Route::post('/offer/reject','OfferController@offerReject');
		//Route::post('/offer/delete','OfferController@offerDelete');

		/* ======== Routes For Admin Leads ========== */
		Route::get('/leads','LeadController@index');
		Route::post('/leads','LeadController@getLead');
		Route::get('/file-export-all-lead','LeadController@fileExport')->name('file-export-all-lead');

	});
});
Route::prefix('admin')->namespace('Admin')->group(function () {
	
	//ADMIN
	Route::group(['middleware'=>'admin'],function(){
		/*====== Seller Agents =======*/
		Route::get('/sellerAgents','SellerAgentController@index');
		Route::post('/sellerAgents','SellerAgentController@getSubAdmins');		
		Route::get('/addSellerAgent','SellerAgentController@addSellerAgent');		
		Route::post('/addSellerAgentPost','SellerAgentController@addSellerAgentPost');		
		Route::get('/editSellerAgent/{id}','SellerAgentController@editSellerAgent');		
		Route::get('/viewSellerAgent/{id}','SellerAgentController@viewSellerAgent');		
		Route::post('/statusSellerAgent','SellerAgentController@statusSellerAgent');		
		Route::post('/deleteSellerAgent','SellerAgentController@deleteSellerAgent');	
		Route::post('/sellerAgent/propertyList','SellerAgentController@propertyList');	
		

		/* ======== Routes For Admin Email SMS Templates ========== */
		Route::get('/emailSmsTemplates','EmailSmsMasterController@index');
		Route::post('/emailSmsTemplates','EmailSmsMasterController@getEmailTemplates');
		Route::get('/emailSmsTemplates/edit/{id}','EmailSmsMasterController@editEmailTemplate');
		Route::post('/emailSmsTemplates/edit','EmailSmsMasterController@editEmailTemplatePost');

		/* ======== Routes For Admin Settings ========== */
		Route::get('/settings','SettingController@index');
		Route::post('/setting/editSeo','SettingController@editSeo');
		Route::post('/setting/editHome','SettingController@editHome');
		Route::post('setting/editIntroOne','SettingController@editIntroOne');
		Route::post('setting/editIntroTwo','SettingController@editIntroTwo');
		Route::post('/setting/editIntroOffer','SettingController@editIntroOffer');
		Route::post('/setting/editAssistMe','SettingController@editAssistMe');
		Route::post('/setting/editOfferApproved','SettingController@editOfferApproved');
		Route::post('/setting/editAgentText','SettingController@editAgentText');
		Route::post('/setting/editGeneralLogo','SettingController@editGeneralLogo');
		Route::post('/setting/editOfferNotApproved','SettingController@editOfferNotApproved');
		Route::post('/setting/editSmtp','SettingController@editSmtp');
		
		Route::post('/setting/cms','SettingController@getCms');
		Route::post('/setting/addCms','SettingController@addCms');
		Route::get('/setting/cms/edit/{id}','SettingController@editCms');
	});

	Route::group(['middleware'=>'auth'],function(){
		
		/*====== Base Routes =======*/
		Route::get('/dashboard','DashboardController@dashboard')->name('adminDashboard');
		Route::get('/profile', 'DashboardController@profile')->name('adminProfile');
		Route::post('/editProfile', 'DashboardController@editProfile');
		Route::post('/changePasswordPost', 'DashboardController@changePasswordPost');

		/* ======== Routes For Admin Properties ========== */
		Route::get('/properties','PropertyController@index');
		Route::post('/properties','PropertyController@getProperty');
		Route::post('/properties/addPost','PropertyController@addPropertyPost');
		Route::post('/properties/addImage','PropertyController@addImages');
		Route::get('/properties/imageRemove/{id}','PropertyController@imageRemove');
		Route::get('/properties/edit/{id}','PropertyController@editProperty');
		Route::get('/properties/view/{id}','PropertyController@viewProperty');
		Route::post('/properties/status','PropertyController@proStatus');
		Route::post('/properties/delete','PropertyController@proDelete');
		Route::get('/file-export','PropertyController@fileExport')->name('file-export');
		
		/* ======== Routes For Admin Offers ========== */
		Route::get('/offers','OfferController@index');
		Route::post('/offers','OfferController@getOffer');
		Route::get('/offers/view/{id}','OfferController@viewOffer');
		Route::post('/offer/contractStatus','OfferController@offerContractStatus');
		Route::get('/file-export-all-offer','OfferController@fileExport')->name('file-export-all-offer');
		Route::post('/offer/accept','OfferController@offerAccept');
		Route::post('/offer/reject','OfferController@offerReject');


		/* ======== Routes For Admin Leads ========== */
		Route::get('/leads','LeadController@index');
		Route::post('/leads','LeadController@getLead');
		Route::get('/file-export-all-lead','LeadController@fileExport')->name('file-export-all-lead');

	});
});