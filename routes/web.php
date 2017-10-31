<?php

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
Route::group(['middleware'=>['auth']], function(){
	Route::get('/',['as'=>'/','uses'=>'LoginController@getLogin']);
});
Route::post('/login',['as'=>'login','uses'=>'LoginController@postLogin']);

Route::get('/noPermission',function(){
	return view('noPermission');
});

Route::group(['middleware'=>['auth']], function(){
	Route::get('/logout',['as'=>'logout','uses'=>'LoginController@getLogout']);
	Route::get('/dashboard','AdminHomeController@index')->name('dashboard');
	Route::get('dashbWorkers','AdminHomeController@readWorkers');
	Route::get('dashbServices','AdminHomeController@readServices');
	Route::get('dashbTrucks','AdminHomeController@readTrucks');
	Route::get('dashbIndClients','AdminHomeController@readIndClients');
	Route::get('dashbCompClients','AdminHomeController@readCompClients');
	Route::get('dashbContracts','AdminHomeController@readContracts');

	//////////////////////////////////////////////////////////////
	//UTILITIES
	//
	Route::resource('utilities','UtilitiesController');
	Route::post('addEmpID','UtilitiesController@storeEmpID');
	Route::post('addClientID','UtilitiesController@storeClientID');
	Route::post('addQuoteID','UtilitiesController@storeQuoteID');
	Route::post('addContractID','UtilitiesController@storeContractID');
	Route::post('addInvoiceID','UtilitiesController@storeInvoiceID');
	Route::post('addDeliveryID','UtilitiesController@storeDeliveryID');
	Route::post('addOrID','UtilitiesController@storeOrID');

	//
	//////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////
	//MAINTENANCE
	//Specialize
	Route::resource('specialization','SpecializationController');
	Route::get('readByAjax7','SpecializationController@readByAjax');
	Route::put('specialization/checkbox/{id}', 'SpecializationController@checkbox');
	Route::put('specialization/{id}/delete ','SpecializationController@delete');
	//Worker
	Route::resource('worker','EmployeeController');
	Route::get('worker/{id}/editSpec','EmployeeController@editSpec');
	Route::resource('empspec','EmpSpecController');
	Route::get('readByAjax8','EmployeeController@readByAjax');
	Route::put('worker/checkbox/{id}', 'EmployeeController@checkbox');
	Route::put('worker/{id}/delete ','EmployeeController@delete');
	//Add Worker
	Route::resource('addworker','AddEmployeeController');
	Route::resource('workerspec','EmpSpecController');
	//Group UOM
	Route::resource('groupuomeasure','GroupUOMController');
	Route::get('readByAjax10','GroupUOMController@readByAjax');
	Route::put('groupuomeasure/checkbox/{id}', 'GroupUOMController@checkbox');
	Route::put('groupuomeasure/{id}/delete ','GroupUOMController@delete');
	//Detail UOM
	Route::resource('detailuomeasure','DetailUOMController');
	Route::get('readByAjax11','DetailUOMController@readByAjax');
	Route::put('detailuomeasure/checkbox/{id}', 'DetailUOMController@checkbox');
	Route::put('detailuomeasure/{id}/delete ','DetailUOMController@delete');
	//Material Type
	Route::resource('materialtype','MaterialTypeController');
	Route::get('readByAjax9','MaterialTypeController@readByAjax');
	Route::put('materialtype/checkbox/{id}', 'MaterialTypeController@checkbox');
	Route::put('materialtype/{id}/delete ','MaterialTypeController@delete');
	//Material Class
	Route::resource('materialclass','MaterialClassController');
	Route::get('readByAjax','MaterialClassController@readByAjax');
	Route::put('materialclass/checkbox/{id}', 'MaterialClassController@checkbox');
	Route::put('materialclass/{id}/delete ','MaterialClassController@delete');
	//Material Category
	//Route::resource('materialcat','MaterialCatController');
	//Route::get('readByAjax9','MaterialCatController@readByAjax');
	//Route::put('materialcat/checkbox/{id}', 'MaterialCatController@checkbox');
	//Route::put('materialcat/{id}/delete ','MaterialCatController@delete');
	//Route::get('materialcat/{id}/editSubCat','MaterialCatController@editSubCat');
	//Material
	Route::resource('material','MaterialController');
	Route::get('readByAjax2','MaterialController@readByAjax');
	Route::put('material/checkbox//{id}', 'MaterialController@checkbox');
	Route::put('material/{id}/delete ','MaterialController@delete');
	Route::get('getMatClass/{id}','MaterialController@getMatClass');
	//Route::get('getMatCat/{id}','MaterialController@getMatCat');
	//Route::get('getMatSubCat/{id}','MaterialController@getMatSubCat');
	Route::get('getMatUOM/{id}','MaterialController@getMatUOM');
	Route::get('getMatSymbol/{id}','MaterialController@getMatSymbol');
	//EquipmentType
	Route::resource('equiptype','EquipTypeController');
	Route::get('readByAjax3','EquipTypeController@readByAjax');
	Route::put('equiptype/checkbox/{id}', 'EquipTypeController@checkbox');
	Route::put('equiptype/{id}/delete ','EquipTypeController@delete');
	//Equipment
	Route::resource('equipment','EquipmentController');
	Route::get('readByAjax4','EquipmentController@readByAjax');
	Route::put('equipment/checkbox/{id}', 'EquipmentController@checkbox');
	Route::put('equipment/{id}/delete ','EquipmentController@delete');
	//Services Offered
	Route::resource('serviceOff','ServicesOfferedController');
	Route::get('readByAjax5','ServicesOfferedController@readByAjax');
	Route::put('serviceOff/checkbox/{id}', 'ServicesOfferedController@checkbox');
	Route::put('serviceOff/{id}/delete ','ServicesOfferedController@delete');
	//Delivery Trucks
	Route::resource('deliverytruck','DeliveryTruckController');
	Route::get('readByAjax6','DeliveryTruckController@readByAjax');
	Route::put('deliverytruck/checkbox/{id}', 'DeliveryTruckController@checkbox');
	Route::put('deliverytruck/{id}/delete ','DeliveryTruckController@delete');
	//Discount
	Route::resource('discount','DiscountController');
	Route::get('readByAjax12','DiscountController@readByAjax');
	Route::put('discount/checkbox/{id}', 'DiscountController@checkbox');
	Route::put('discount/{id}/delete ','DiscountController@delete');
	///////////////////////////////////////////////////////////////////////////////
	//TRANSACTION
	//Client
	Route::resource('client','ClientController');
	Route::resource('newcompclient','CompanyClientController');
	Route::resource('newindclient','IndividualClientController');
	//Qoute
	Route::resource('quote','QuoteController');
	Route::get('draftQuotesAjax','QuoteController@draftQuotesAjax');
	Route::get('readServiceBlock','QuoteController@showService');
	Route::get('readServices/{id}','QuoteController@readByAjax');
	Route::post('quote/header','QuoteController@header');
	//QouteList
	Route::resource('quotelist','QuoteListController');
	Route::get('readQuotes','QuoteListController@readByAjax');

	Route::resource('quotedetail','QuoteDetailController');
	Route::get('newresource/{id}','QuoteDetailController@newresource');
	Route::get('readMaterial/{id}','QuoteDetailController@readMaterial');
	Route::get('readEquipment/{id}','QuoteDetailController@readEquipment');
	Route::get('readWorker/{id}','QuoteDetailController@readWorker');
	Route::get('getMatPrice/{id}','QuoteDetailController@getMatPrice');
	Route::get('findMatbyClass/{id}','QuoteDetailController@findMatbyClass');
	Route::get('findMatbyNone','QuoteDetailController@findMatbyNone');
	Route::get('findMatbyUOM/{id}','QuoteDetailController@findMatbyUOM');
	Route::get('compute/{id}','QuoteDetailController@compute');


	Route::post('addMatQuote','QuoteDetailController@addMatQuote');
	Route::post('addEquipQuote','QuoteDetailController@addEquipQuote');
	Route::post('addWorkerQuote','QuoteDetailController@addWorkerQuote');
	Route::post('finalquote','QuoteDetailController@finalquote');
	Route::post('finalquote2','QuoteDetailController@finalquote2');
	Route::post('quoteadditional','QuoteDetailController@quoteadditional');
	Route::get('readAdditional/{id}','QuoteDetailController@readAdditional');


	Route::get('getQDID','QuoteDetailController@getQDID');

	Route::get('addmaterial/{id}','QuoteDetailController@getaddmaterial');
	Route::post('addmaterial','QuoteDetailController@postaddmaterial');
	Route::get('readMaterialAdded/{id}','QuoteDetailController@readByAjax');
	Route::get('addequipment/{id}','QuoteDetailController@getaddequipment');
	Route::post('addequipment','QuoteDetailController@postaddequipment');
	Route::get('addworkers/{id}','QuoteDetailController@getaddworker');
	Route::post('addworkers','QuoteDetailController@postaddworker');
	//

	Route::resource('contractadd','ContractController');
	Route::get('findClientbyNone','ContractController@findClientbyNone');
	Route::get('findByClient/{id}','ContractController@findByClient');


	//Contract List
	Route::resource('contractlist','ContractListController');


	//Billling
	Route::resource('billing','BillingController');
	Route::get('readByAjax13','BillingController@readByAjax');
	Route::get('readByAjax19','BillingController@readByAjax2');
	Route::post('billing/{id}/storeThis',['as'=>'billing.storeThis','uses'=>'BillingController@storeThis']);
	Route::get('/billing/collect/{id}/showThis',['as'=>'billing.showThis','uses'=>'BillingController@showThis']);
	Route::get('/billing/{id}/turnover',['as'=>'billing.turnover','uses'=>'BillingController@turnover']);
	Route::get('/billing/collect/{id}',['as'=>'collect.show','uses'=>'BillingController@showCollect']);


	Route::resource('individualbilling','IndividualBillingController');
	Route::get('readByAjax29','IndividualBillingController@readByAjax');
	Route::get('readByAjax30','IndividualBillingController@readByAjax2');
	Route::post('individualbilling/{id}/storeThis',['as'=>'individualbilling.storeThis','uses'=>'IndividualBillingController@storeThis']);


	Route::resource('stockadjustment','StockController');
	Route::get('readByAjax15','StockController@readByAjax');
	Route::post('stockadjustment/{id}/storeThis',['as'=>'stockadjustment.storeThis','uses'=>'StockController@storeThis']);
	Route::post('stockadjustment/{id}/storeThat',['as'=>'stockadjustment.storeThat','uses'=>'StockController@storeThat']);


	Route::resource('progressmonitoring','ProgressMonitoringController');
	Route::get('readByAjax14','ProgressMonitoringController@readByAjax');
	Route::get('findWorker/{id}','ProgressMonitoringController@findWorker');
	Route::get('findSpec/{id}','ProgressMonitoringController@findSpec');
	Route::get('findEquip/{id}','ProgressMonitoringController@findEquip');
	Route::get('findStock/{id}','ProgressMonitoringController@findStock');
	Route::get('findWork/{id}','ProgressMonitoringController@findWork');
	Route::get('findMat/{id}','ProgressMonitoringController@findMat');
	Route::get('findEqui/{id}','ProgressMonitoringController@findEqui');
	Route::get('findHistory/{id}','ProgressMonitoringController@findHistory');
	Route::get('findWorkerbyNone','ProgressMonitoringController@findWorkerbyNone');
	Route::get('progressmonitoring/{id}/readByAjax2',['as'=>'progressmonitoring.readByAjax2','uses'=>'ProgressMonitoringController@readByAjax2']);
	Route::post('progressmonitoring/{id}/storeThis',['as'=>'progressmonitoring.storeThis','uses'=>'ProgressMonitoringController@storeThis']);
	Route::post('progressmonitoring/{id}/storeOA',['as'=>'progressmonitoring.storeOA','uses'=>'ProgressMonitoringController@storeOA']);

	Route::resource('indprogressmonitoring','IndividualProgressMonitoring');
	Route::get('readByAjax31','IndividualProgressMonitoring@readByAjax');
	Route::get('ifindWorker/{id}','IndividualProgressMonitoring@findWorker');
	Route::get('ifindSpec/{id}','IndividualProgressMonitoring@findSpec');
	Route::get('ifindEquip/{id}','IndividualProgressMonitoring@findEquip');
	Route::get('ifindStock/{id}','IndividualProgressMonitoring@findStock');
	Route::get('ifindWork/{id}','IndividualProgressMonitoring@findWork');
	Route::get('ifindMat/{id}','IndividualProgressMonitoring@findMat');
	Route::get('ifindEqui/{id}','IndividualProgressMonitoring@findEqui');
	Route::get('ifindHistory/{id}','IndividualProgressMonitoring@findHistory');
	Route::get('ifindWorkerbyNone','IndividualProgressMonitoring@findWorkerbyNone');
	Route::get('indprogressmonitoring/{id}/readByAjax2',['as'=>'indprogressmonitoring.readByAjax2','uses'=>'IndividualProgressMonitoring@readByAjax2']);
	Route::post('indprogressmonitoring/{id}/storeThis',['as'=>'indprogressmonitoring.storeThis','uses'=>'IndividualProgressMonitoring@storeThis']);
	Route::get('/indprogressmonitoring/{id}/indturnover',['as'=>'indprogressmonitoring.indturnover','uses'=>'IndividualProgressMonitoring@indturnover']);
	Route::put('/indprogressmonitoring/{id}/updturnover',['as'=>'indprogressmonitoring.updturnover','uses'=>'IndividualProgressMonitoring@updturnover']);




	Route::resource('delivery','DeliveryController');
	Route::get('readByAjax16','DeliveryController@readByAjax');
	Route::get('findDelMat/{id}','DeliveryController@findDelMat');
	Route::put('delivery/{id}/delete ','DeliveryController@delete');
	Route::get('findTruck/{id}','DeliveryController@findTruck');
	Route::get('findMatD/{id}','DeliveryController@findMatD');
	Route::get('findDel/{id}','DeliveryController@findDel');

	Route::resource('clientqueries','QueriesClientController');
	Route::get('readByAjax20','QueriesClientController@readByAjax');
	Route::get('readByAjax21','QueriesClientController@readByAjax2');
	Route::get('findLocation','QueriesClientController@findLocation');
	Route::get('findIndLocation','QueriesClientController@findIndLocation');
	Route::get('readByAjax22/{id}','QueriesClientController@readByAjax3');
	Route::get('readByAjax33/{id}','QueriesClientController@readByAjax4');


	Route::resource('stockqueries','QueriesStockController');
	Route::get('readByAjax23','QueriesStockController@readByAjax');
	Route::get('readByAjax24','QueriesStockController@readByAjax2');
	Route::get('readByAjax25','QueriesStockController@readByAjax3');
	Route::get('findMate/{id}','QueriesStockController@findMate');
	Route::get('findStartDate/{id}','QueriesStockController@findStartDate');

	Route::resource('invoicequeries','QueriesInvoiceController');
	Route::get('readByAjax26','QueriesInvoiceController@readByAjax');
	Route::get('readByAjax27','QueriesInvoiceController@readByAjax2');
	Route::get('readByAjax28','QueriesInvoiceController@readByAjax3');
	Route::get('findClient/{id}','QueriesInvoiceController@findClient');
	Route::get('findQProj/{id}','QueriesInvoiceController@findQProj');
	Route::get('findIStartDate/{id}','QueriesInvoiceController@findIStartDate');

	Route::resource('deliveryqueries','QueriesDeliveryController');
	Route::get('readByAjax34','QueriesDeliveryController@readByAjax');
	Route::get('findbyProject/{id}','QueriesDeliveryController@findbyProject');
	Route::get('byPending','QueriesDeliveryController@byPending');
	Route::get('byFinished','QueriesDeliveryController@byFinished');
	Route::get('byLocation/{id}','QueriesDeliveryController@byLocation');
	Route::get('finddelStartDate/{id}','QueriesDeliveryController@finddelStartDate');
	
	Route::resource('projectqueries','QueriesProjectController');
	Route::get('readByAjax35/{id}','QueriesProjectController@readByAjax');
	Route::get('byPending','QueriesProjectController@byPending');
	Route::get('byOngoing','QueriesProjectController@byOngoing');
	Route::get('byTerminated}','QueriesProjectController@byTerminated');
	Route::get('findPStartDate/{id}','QueriesProjectController@findPStartDate');



	//User Account
	Route::resource('userlevel','UserLevelController');
	Route::get('readByAjax17','UserLevelController@readByAjax');
	Route::put('userlevel/checkbox/{id}', 'UserLevelController@checkbox');


	//Reports
	Route::resource('pdf','invoicepdfController');
	Route::post('pdf/{id}/quotation',['as'=>'pdf.quotation','uses'=>'invoicepdfController@quotation']);
	Route::get('pdf/showind/{id}',['as'=>'pdf.showind','uses'=>'invoicepdfController@showind']);
	Route::get('pdf/orcomp/{id}',['as'=>'pdf.orcomp','uses'=>'invoicepdfController@orcomp']);
	Route::get('pdf/orind/{id}',['as'=>'pdf.orind','uses'=>'invoicepdfController@orind']);

	Route::resource('progressreport','ProgressReportController');
	Route::get('findByCompClient','ProgressReportController@findByCompClient');
	Route::get('findByIndClient','ProgressReportController@findByIndClient');
	Route::post('progress_report','ProgressReportController@progress_report');

	Route::resource('deliveryreport','DeliveryReportController');
	Route::post('delivery_report','DeliveryReportController@delivery_report');

	Route::get('soareport','SOAReportController@index');
	Route::post('soa','SOAReportController@soa');

	Route::get('collectionreport','CollectionReportController@index');
	Route::post('overall_collection','CollectionReportController@collection_report');

	Route::get('referencesreport','ReferencesReportController@index');
	Route::post('references','ReferencesReportController@references');
	Route::get('findByRepClient/{id}','ReferencesReportController@findByRepClient');








});


Route::group(['middleware'=>['authen','roles'],'roles'=>['admin']],function(){
	Route::get('/createUser',function(){
		echo 'admin test success';
	});
});

Auth::routes();

Route::get('/home', 'HomeController@index');
