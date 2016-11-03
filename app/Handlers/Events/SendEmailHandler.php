<?php namespace App\Handlers\Events;

use App\Events\SendEmail;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

use Mail;

class SendEmailHandler {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  SendEmail  $event
	 * @return void
	 */
	public function handle(SendEmail $event)
	{
		// Mail::send('emails.emailtemplate',array(),function($message) use ($event){
		// 	$message->from('trungtamthongbao@gmail.com','Parfarome');
		// 	$message->to($event->email)->subject('Thank you for your register');
		// });
		Mail::send('emails.emailtemplate',array(),function($mes) use ($event){
			$mes->from('web@parfarome.com','Parfarome');
			$mes->to($event->email)->subject('Thank you for your register');
		});
	}

}
