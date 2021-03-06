<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// ROUTE MAHASISWA
$route['login']                         = 'mhs/AuthController';
$route['register']                      = 'mhs/AuthController/register';
$route['proses_register']               = 'mhs/AuthController/proses_register';
$route['proses_login']                  = 'mhs/AuthController/proses_login';
$route['proses_logout']                 = 'mhs/AuthController/proses_logout';
$route['proses_forgot']                 = 'mhs/AuthController/proses_forgot';
$route['proses_reset']                  = 'mhs/AuthController/proses_reset';
$route['forgot-password']               = 'mhs/AuthController/forgotPassword';
$route['forgot-password/(:any)']        = 'mhs/AuthController/resetPassword/$1';
$route['email-verification']            = 'mhs/AuthController/emailVerif';
$route['send-code']                     = 'mhs/AuthController/send_code';
$route['proses_verif']                  = 'mhs/AuthController/proses_verif';


// ROUTE COURSE
$route['course']                        = 'mhs/CourseController';
$route['course/submit']                 = 'mhs/CourseController/submitCourse';
$route['course/takeTest']               = 'mhs/CourseController/takeTest';
$route['course/(:any)/(:any)/(:any)']   = 'mhs/CourseController/courseDetail/$1/$2/$3';

// ROUTE ADMIN
$route['admin']             = 'adm/AuthController';
$route['admin/auth']        = 'adm/AuthController/auth_login';
$route['admin/dashboard']   = 'adm/DashboardController';
$route['logout']            = 'adm/AuthController/logout';

// Worksheet
$route['admin/worksheet']                   = 'adm/WorksheetController';
$route['admin/worksheet/store']             = 'adm/WorksheetController/store';
$route['admin/worksheet/edit']              = 'adm/WorksheetController/edit';
$route['admin/worksheet/changeStatus']      = 'adm/WorksheetController/changeStatus';
$route['admin/worksheet/softDestroy']       = 'adm/WorksheetController/softDestroy';
$route['admin/worksheet/ajxCheckPosition']  = 'adm/WorksheetController/ajxCheckPosition';
$route['admin/question/manage/(:any)']      = 'adm/QuestionController/index/$1';
$route['admin/question/store']              = 'adm/QuestionController/store';
$route['admin/question/edit']               = 'adm/QuestionController/edit';
$route['admin/question/softDestroy']        = 'adm/QuestionController/softDestroy';
$route['admin/question/ajxGet']             = 'adm/QuestionController/ajxGet';

// Student
$route['admin/student/verification']        = 'adm/StudentController/verification';
$route['admin/student/changeStatus']        = 'adm/StudentController/changeStatus';
$route['admin/student/ajxGet']              = 'adm/StudentController/ajxGet';

// Assignment
$route['admin/assignment/student']                           = 'adm/AssignmentController';
$route['admin/assignment/student/(:any)']                    = 'adm/AssignmentController/worksheet/$1';
$route['admin/assignment/worksheet']                         = 'adm/AssignmentController/worksheetmenu';
$route['admin/assignment/worksheetstudent/(:any)']           = 'adm/AssignmentController/wsstudent/$1';
$route['admin/assignment/submit_feedback']                            = 'adm/AssignmentController/submitFeedback';
$route['admin/wsdetail/(:any)/(:any)/(:any)']                = 'adm/AssignmentController/wsdetail/$1/$2/$3';

// Video
$route['admin/video']                            = 'adm/VideoController';
$route['admin/video/store']                      = 'adm/VideoController/store';
$route['admin/video/edit']                       = 'adm/VideoController/edit';
$route['admin/video/changeStatus']               = 'adm/VideoController/changeStatus';
$route['admin/video/delete']                     = 'adm/VideoController/delete';