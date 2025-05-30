<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailRegistered extends Mailable
{
	use Queueable, SerializesModels;

	private $email;
	private $password;

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	/**
	 * Create a new message instance.
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Get the message envelope.
	 */
	public function envelope(): Envelope
	{
		return new Envelope(
			subject: 'Mail Registered',
		);
	}

	/**
	 * Get the message content definition.
	 */
	public function content(): Content
	{
		return new Content(
			view: 'mails.registered',
			with: [
				'email' => $this->email,
				'password' => $this->password,
			]
		);
	}

	/**
	 * Get the attachments for the message.
	 *
	 * @return array<int, \Illuminate\Mail\Mailables\Attachment>
	 */
	public function attachments(): array
	{
		return [];
	}
}
