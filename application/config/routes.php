<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = '';
$route['gallery']='gallery/index';
$route['profile/update']='profile/update';
$route['profile/edit']='profile/edit';
$route['profile']='profile/index';
$route['gradebook/(:any)']='gradebook/index/$1';
$route['weblinks/add_data']='weblinks/add_data';
$route['weblinks/add/(:any)']='weblinks/add_disp_view/$1';
$route['weblinks/deleter/(:any)/(:any)']='weblinks/deleter/$1/$2';
$route['weblinks/(:any)']='weblinks/index/$1';
$route['calendar/get_assign/(:num)/(:any)'] = 'calendar/get_assign/$1/$2';
$route['calendar/get_notes/(:num)/(:any)'] = 'calendar/get_notes/$1/$2';
$route['calendar/(:any)/(:any)'] = 'calendar/index/$1/$2';
$route['wizquiz/insert_question_individual'] = 'wizquiz/insert_question_individual';
$route['wizquiz/taken'] = 'wizquiz/taken';
$route['wizquiz/(:any)'] = 'wizquiz/index/$1';
$route['mail/compose/(:any)']='mail/compose/$1';
$route['mail/inner']='mail/compose_inner';
$route['mail/get_inbox/(:any)']='mail/get_inbox/$1';
$route['mail/get_sent/(:any)']='mail/get_sent/$1';
$route['mail/get_starred/(:any)']='mail/get_starred/$1';
$route['mail/get_draft/(:any)']='mail/get_draft/$1';
$route['mail/thread/(:any)']='mail/thread/$1';
$route['mail/seen/(:any)']='mail/seen/$1';
$route['forum/ask_insert/(:any)']= 'forum/ask_insert/$1';
$route['forum/ask/(:any)']= 'forum/ask/$1';
$route['forum/topic/(:any)/(:any)'] = 'forum/topic/$1/$2';
$route['forum/reply/(:any)/(:any)'] = 'forum/reply/$1/$2';
$route['forum/(:any)'] = 'forum/index/$1';
$route['assignment/new/(:any)'] = 'assignment/new_assignment/$1';
$route['assignment/(:any)/do_upload/(:any)'] = 'assignment/do_upload/$1/$2';
$route['assignment/(:any)'] = 'assignment/index/$1';
$route['services/(:any)'] = 'services/index/$1';
$route['notes/(:any)'] = 'notes/index/$1';


/* End of file routes.php */
/* Location: ./application/config/routes.php */