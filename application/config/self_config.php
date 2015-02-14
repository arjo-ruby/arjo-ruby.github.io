<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
*own configuration file
*
*
*/
$config['student']=1;

$config['teacher']=2;

$config['admin']=3;

$config['all_section']='Z';

$config['all_class']=0;

//dont put / after the last word. Remember ork is the folder name of temp folder
$config['root_folder_file']='/var/www/classroome/assets/work';

$config['temp_directory']='/var/www/classroome/assets/tmp';

$config['temp_directory_link']='assets/tmp';

/*mail*/
$config['normal']=4;

$config['deleted']=1;

$config['draft']=3;

$config['starred']=5;

$config['read']=1;

$config['unread']=0;

$config['unseen']=0;

$config['seen']=1;
/*mail ends*/

/*
*
*
*
*wizquiz starts
*
*
*
*/

//no of question needed to solve to change levels
//user will have to provide simulataneously correct ans to upgrade to new level
//if he answers any ques wrong  his counter is automatically set to -1 (not to 0)
$config['easytomedium']=2;

$config['mediumtohard']=2;

//in negative
$config['hardtomedium']=-2;

$config['mediumtoeasy']=-2;

//total no fo question presented in quiz
$config['total_ques']=5;

/*
*numeric convension of levels
*/
$config['easy_level']=1;

$config['medium_level']=2;

$config['hard_level']=3;

//when wizquiz starts the initial point allocated to the user
$config['point_starting']=0;

//points for solving correctly
$config['point_correct_easy']=1;

$config['point_correct_medium']=2;

$config['point_correct_hard']=3;

//points for solving wrong

$config['point_wrong_easy']=-1;

$config['point_wrong_medium']=-2;

$config['point_wrong_hard']=-3;

//time for quiz question dealy in seconds
$config['quiz_dealy_time']=60;

//time for quiz start take dealy in seconds
$config['quiz_start_dealy_time']=900;

/*
*
*
*
*wizquiz ends
*
*
*
*/

$config['forum_title_length']=160;

$config['weblink_normal_offset']=1;

$config['weblink_delete_offset']=0;

$config['weblink_maxlen_description']=200;

/* End of file config.php */
/* Location: ./application/config/config.php */

?>