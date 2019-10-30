<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactEmail extends Mailable {
	use Queueable, SerializesModels;

	/**
	 * @var array
	 */
	private $datas;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($datas = []) {
		$this->datas = $datas;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		return $this->from($this->datas['email'])
			->view('emails.contact_email')
			->with([
				'fullname' => $this->datas['fullname'],
				'message' => $this->datas['message'],
				'email' => $this->datas['email'],
			]);
	}
}
