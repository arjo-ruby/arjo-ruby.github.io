<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Mail_data
{

	private $sender_reciever;
	private $subject;
	private $time;
	private $thread_id;

	public function __construct()
	{
	}

	function init($thread_id,$sender_reciever,$subject,$time)
	{
		$this->sender_reciever=$sender_reciever;
		$this->subject=$subject;
		$this->time=$time;
		$this->thread_id=$thread_id;
	}

	function get()
	{
		$temp=array(
			'sender_reciever'=>$this->sender_reciever,
			'subject'=>$this->subject,
			'time'=>$this->time,
			'thread_id'=>$this->thread_id
			);
	}


}