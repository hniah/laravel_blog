<?php
namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmationEmail extends Mailable{
	use Queueable, SerializesModels;

	public $user;
	public function __construct(User $user){
		$this->user = $user;
	}

	public function build(){
		return $this->view('auth.emails.confirmation');
	}
}