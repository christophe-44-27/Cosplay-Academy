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
		return $this->from('contact@cosplayschool.ca')
			->view('emails.contact_email')
			->with([
				'exp_name' => $this->datas['name'],
				'exp_subject' => $this->datas['subject'],
				'exp_phone' => (isset($this->datas['phone'])) ? $this->datas['phone'] : 'n/a',
				'exp_message' => $this->datas['message'],
				'exp_mail' => $this->datas['email'],
			]);
	}
}
