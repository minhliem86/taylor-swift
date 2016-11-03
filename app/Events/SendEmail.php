<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class SendEmail extends Event {

	use SerializesModels;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public $email;
	public function __construct($email)
	{
		$this->email = $email;
	}

}
