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
Route::prefix('main_controller_panel')->group( function(){
	Route::get('/dashboard', 'AdminsController@getDashboard')->name('dashboard');

	Route::prefix('/')->group( function(){
		Route::get('', 'AdminsController@index')->name('login');
		Route::post('login', 'AdminsController@login')->name('admin.login');
		Route::get('logout', 'AdminsController@logout')->name('admin.logout');
	});
	
	Route::resource('news', 'newsController');
	Route::get('news/create', 'newsController@getCreate');

	Route::resource('events', 'eventsController');
	Route::get('events/create', 'eventsController@getCreate');

	Route::resource('galleries', 'galleriesController');
	Route::get('galleries/create', 'galleriesController@getCreate');

	Route::resource('classes', 'classesController');
	Route::get('classes/create', 'classesController@getCreate');

	Route::resource('hostels', 'hostelsController');
	Route::get('hostels/create', 'hostelsController@getCreate');

	Route::resource('books', 'booksController');
	Route::get('books/create', 'booksController@getCreate');

	Route::resource('attendances', 'attendancesController');
	Route::get('attendances/create', 'attendancesController@getCreate');
	Route::get('attend/students/get', 'attendancesController@getStudent');
	Route::get('attend/students/set', 'attendancesController@setStudent');
	Route::get('attend/download', 'attendancesController@download');
	Route::get('attend/download/{id}', 'attendancesController@singledownload');

	Route::resource('library', 'librariesController');
	Route::get('library/create', 'librariesController@getCreate');
	Route::get('librari/download', 'librariesController@download');
	Route::get('librari/download/{id}', 'librariesController@singleDownload');

	Route::resource('syllabus', 'syllabusController');
	Route::get('syllabus/create', 'syllabusController@getCreate');
	Route::get('syllabi/gettopic/get', 'syllabusController@getTopic');
	Route::get('syllabi/getlist/get/{id}', 'syllabusController@getList');
	Route::get('syllabi/import', 'syllabusController@import');
	Route::get('syllabi/gettopic/set', 'syllabusController@setTopic');
	Route::get('syllabi/getlist/set/{id}', 'syllabusController@setList');
	Route::get('syllabi/removelist/remove/{id}', 'syllabusController@removeList');
	Route::get('syllabi/print/{id}', 'syllabusController@print');
	Route::get('syllabus/download', 'syllabusController@download');
	Route::get('syllabus/download/{id}', 'syllabusController@download');

	Route::resource('idcards', 'idcardsController');


	Route::resource('subjects', 'subjectsController');
	Route::get('subjects/create', 'subjectsController@getCreate');

	Route::resource('results', 'resultsController');
	Route::get('results/result/{id}', 'resultsController@getCreate');

	Route::resource('staffs', 'staffsController');
	Route::get('staffs/create', 'staffsController@getCreate');
	Route::get('reset/{id}', 'staffsController@reset');

	Route::resource('students', 'studentsController');
	Route::get('students/create', 'studentsController@getCreate');
	Route::get('resetPass/{id}', 'studentsController@resetPass');

	Route::resource('messages', 'messagesController');
	Route::post('messages/create', 'messagesController@Create');
	Route::get('messages/reply/{id}', 'messagesController@setreply');
	Route::get('messages/main', 'messagesController@getmessages');

	Route::resource('payments', 'accountsController');
	Route::get('pay/{id}', 'accountsController@pay');
	Route::get('staff/{id}', 'accountsController@staff');
	
	Route::resource('settings', 'settingsController');
	Route::get('settings/dash/{id}', 'settingsController@wig');
	Route::post('settings/site', 'settingsController@site');
	Route::get('setting/', 'settingsController@enter');
	Route::post('settings/session/view/{id}', 'settingsController@upsession');
	Route::post('settings/session', 'settingsController@session');
	Route::post('settings/session/close/{id}', 'settingsController@closesession');
	Route::post('settings/term/close/{id}', 'settingsController@closeterm');
	Route::post('settings/session/delete/{id}', 'settingsController@delsession');
	Route::post('settings/term/delete/{id}', 'settingsController@delterm');
	Route::post('settings/result/{id}', 'settingsController@result');
	Route::post('settings/sitep/{id}', 'settingsController@sitep');
	Route::get('settings/create', 'settingsController@getCreate');
	Route::post('settings/pay/', 'settingsController@pay');
	Route::post('settings/delpay/{id}', 'settingsController@delpay');
	Route::post('settings/branch', 'settingsController@branch');
	Route::post('settings/edbranch/{id}', 'settingsController@edbranch');
	Route::post('settings/delbranch/{id}', 'settingsController@delbranch');
	Route::post('settings/faq/', 'settingsController@faq');
	Route::post('settings/service/', 'settingsController@service');
	Route::post('settings/servicedel/{id}', 'settingsController@servicedel');
	Route::post('settings/servicehead/{id}', 'settingsController@servicehead');
	Route::post('settings/faqup/{id}', 'settingsController@faqup');
	Route::post('settings/faqdel/{id}', 'settingsController@faqdel');
	Route::post('settings/serviceup/{id}', 'settingsController@serviceup');

	Route::resource('users', 'usersController');


	Route::resource('trash', 'trashController');
	Route::get('studentres/{id}', 'trashController@studentres')->name('studentres');
	Route::get('studentdel/{id}', 'trashController@studentdel')->name('studentdel');

	Route::get('staffres/{id}', 'trashController@staffres')->name('staffres');
	Route::get('staffdel/{id}', 'trashController@staffdel')->name('staffdel');

	Route::get('userres/{id}', 'trashController@userres')->name('userres');
	Route::get('userdel/{id}', 'trashController@userdel')->name('userdel');

	Route::get('classres/{id}', 'trashController@classres')->name('classres');
	Route::get('classdel/{id}', 'trashController@classdel')->name('classdel');

	Route::get('subjectres/{id}', 'trashController@subjectres')->name('subjectres');
	Route::get('subjectdel/{id}', 'trashController@subjectdel')->name('subjectdel');

	Route::get('bookres/{id}', 'trashController@bookres')->name('bookres');
	Route::get('bookdel/{id}', 'trashController@bookdel')->name('bookdel');

	Route::get('eventres/{id}', 'trashController@eventres')->name('eventres');
	Route::get('eventdel/{id}', 'trashController@eventdel')->name('eventdel');

	Route::get('galleryres/{id}', 'trashController@galleryres')->name('galleryres');
	Route::get('gallerydel/{id}', 'trashController@gallerydel')->name('gallerydel');

	Route::resource('assignments', 'assignmentsController');
	Route::get('assignments/create', 'assignmentsController@getCreate');
	Route::get('assignment/getsub', 'assignmentsController@getSub');
	Route::get('assignment/getview', 'assignmentsController@getView');
	Route::post('assignment/setassignment', 'assignmentsController@setAssignment');
	Route::post('assignment/setquestion/{id}', 'assignmentsController@setQuestion');
	Route::post('assignment/qpage/{id}', 'assignmentsController@Qpage');
	Route::post('assignment/qfinish/{id}', 'assignmentsController@Qfinish');
	Route::get('assignment/getassignment', 'assignmentsController@getAssignment');
	Route::get('assignment/getquestion', 'assignmentsController@getQuestion');
});







Route::prefix('student_portal')->group( function(){
	Route::get('/student','student\StudentController@getDashboard')->name('student_dashboard');
	Route::resource('/class','student\ClassController');
	Route::get('/profile','student\StudentController@student');
	Route::resource('/result','student\ResultsController');
	Route::get('/result/view/{id}','student\ResultsController@getCreate');
	Route::prefix('/')->group( function(){
		Route::get('', 'student\StudentController@index')->name('student_login');
		Route::post('login', 'student\StudentController@login')->name('student.login');
		Route::get('logout', 'student\StudentController@logout')->name('student.logout');
	});
	//Route::get('login', 'User\LoginController@login')->name('user.login');
	//Route::get('register', 'User\LoginController@register')->name('user.register');
	Route::resource('/subject','student\SubjectController');
	Route::resource('/account','student\AccountController');
	Route::resource('/book','student\BookController');
	Route::resource('/message','student\MessageController');
	// Route::resource('/privacy','student\SitesController@privacy');
	// Route::resource('/terms','student\SitesController@terms');
	// Route::resource('/faq','student\SitesController@faq');
	// Route::resource('/help','student\SitesController@help');
});







Route::prefix('staff_portal')->group( function(){
	Route::get('/staff_index','staff\SitesController@getDashboard')->name('staff_index');
	Route::prefix('/')->group( function(){
		Route::get('', 'staff\SitesController@index')->name('staff_login');
		Route::post('login', 'staff\SitesController@login')->name('staff.login');
		Route::get('logout', 'staff\SitesController@logout')->name('staff.logout');
	});
	//Route::get('login', 'User\LoginController@login')->name('user.login');
	//Route::get('register', 'User\LoginController@register')->name('user.register');
	Route::resource('staff_info','staff\SitesController');
	Route::resource('/staff_privacy','staff\SitesController@privacy');
	Route::resource('/staff_term','staff\SitesController@terms');
	Route::resource('/staff_faq','staff\SitesController@faq');
	Route::resource('/staff_help','staff\SitesController@help');

	Route::resource('staff_event', 'staff\eventsController');
	Route::get('staff_event/create', 'staff\eventsController@getCreate');

	Route::resource('staff_news', 'staff\newsController');
	Route::get('staff_news/create', 'staff\newsController@getCreate');

	Route::resource('staff_gallery', 'staff\galleriesController');
	Route::get('staff_gallery/create', 'staff\galleriesController@getCreate');

	Route::resource('staff_class', 'staff\classesController');
	Route::get('staff_class/create', 'staff\classesController@getCreate');

	Route::resource('staff_hostel', 'staff\hostelsController');
	Route::get('staff_hostel/create', 'staff\hostelsController@getCreate');

	Route::resource('staff_book', 'staff\booksController');
	Route::get('staff_book/create', 'staff\booksController@getCreate');

	Route::resource('staff_attendance', 'staff\attendancesController');
	Route::get('staff_attendance/create', 'staff\attendancesController@getCreate');
	Route::get('staff_attend/students/get', 'staff\attendancesController@getStudent');
	Route::get('staff_attend/students/set', 'staff\attendancesController@setStudent');
	Route::get('staff_attend/download', 'staff\attendancesController@download');
	Route::get('staff_attend/download/{id}', 'staff\attendancesController@singledownload');

	Route::resource('staff_library', 'staff\librariesController');
	Route::get('staff_library/create', 'staff\librariesController@getCreate');
	Route::get('staff_librari/download', 'staff\librariesController@download');
	Route::get('staff_librari/download/{id}', 'staff\librariesController@singleDownload');

	Route::resource('staff_syllabus', 'staff\syllabusController');
	Route::get('staff_syllabus/create', 'staff\syllabusController@getCreate');
	Route::get('staff_syllabi/gettopic/get', 'staff\syllabusController@getTopic');
	Route::get('staff_syllabi/getlist/get/{id}', 'staff\syllabusController@getList');
	Route::get('staff_syllabi/import', 'staff\syllabusController@import');
	Route::get('staff_syllabi/gettopic/set', 'staff\syllabusController@setTopic');
	Route::get('staff_syllabi/getlist/set/{id}', 'staff\syllabusController@setList');
	Route::get('staff_syllabi/removelist/remove/{id}', 'staff\syllabusController@removeList');
	Route::get('staff_syllabi/print/{id}', 'staff\syllabusController@print');
	Route::get('staff_syllabus/download', 'staff\syllabusController@download');
	Route::get('staff_syllabus/download/{id}', 'staff\syllabusController@download');

	Route::resource('staff_idcard', 'staff\idcardsController');


	Route::resource('staff_subject', 'staff\subjectsController');
	Route::get('staff_subject/create', 'staff\subjectsController@getCreate');

	Route::resource('staff_account', 'staff\accountsController');
	Route::get('staff_account/create', 'staff\accountsController@getCreate');

	Route::resource('staff_result', 'staff\resultsController');
	Route::get('staff_result/result/{id}', 'staff\resultsController@getCreate');

	Route::resource('staff_profile', 'staff\staffsController');

	Route::resource('staff_staff', 'staff\staffsController');
	Route::get('staff_staff/create', 'staff\staffsController@getCreate');
	Route::get('staff_reset/{id}', 'staff\staffsController@reset');

	Route::resource('staff_student', 'staff\studentsController');
	Route::get('staff_student/create', 'staff\studentsController@getCreate');
	Route::get('staff_resetPass/{id}', 'staff\studentsController@resetPass');

	Route::resource('staff_message', 'staff\messagesController');
	Route::post('staff_message/create', 'staff\messagesController@Create');
	Route::get('staff_message/reply/{id}', 'staff\messagesController@setreply');
	Route::get('staff_message/main', 'staff\messagesController@getmessages');

	Route::resource('staff_payment', 'staff\accountsController');
	Route::get('staff_pay/{id}', 'staff\accountsController@pay');

	Route::resource('staff_user', 'staff\usersController');

	Route::resource('staff_assignment', 'staff\assignmentsController');
	Route::get('staff_assignment/create', 'staff\assignmentsController@getCreate');
	Route::get('staff_assignment/getsub', 'staff\assignmentsController@getSub');
	Route::get('staff_assignment/getview', 'staff\assignmentsController@getView');
	Route::post('staff_assignment/setassignment', 'staff\assignmentsController@setAssignment');
	Route::post('staff_assignment/setquestion/{id}', 'staff\assignmentsController@setQuestion');
	Route::post('staff_assignment/qpage/{id}', 'staff\assignmentsController@Qpage');
	Route::post('staff_assignment/qfinish/{id}', 'staff\assignmentsController@Qfinish');
	Route::get('staff_assignment/getassignment', 'staff\assignmentsController@getAssignment');
	Route::get('staff_assignment/getquestion', 'staff\assignmentsController@getQuestion');
});
//Auth::routes();





Route::prefix('')->group( function(){
	Route::resource('/','site\HomesController');
	Route::resource('/services','site\ServicesController');
	Route::get('/news','site\newsController@index');
	Route::get('/news_single/{id}','site\newsController@single');
	Route::resource('/event','site\EventsController');
	Route::get('/event_single/{id}','site\EventsController@single');
	Route::resource('/gallery','site\GalleriesController');
	Route::get('/gallery_single/{id}','site\GalleriesController@single');
	Route::resource('/aboutus','site\AboutusController');
	Route::resource('/contactus','site\ContactusController');
	Route::resource('terms','site\TermsController');
	Route::resource('/privacies','site\PrivaciesController');
	Route::resource('/FAQs','site\FAQsController');
});