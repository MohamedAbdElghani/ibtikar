<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewTalentResumeSubmittedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
      $name, 
      $email, 
      $country, 
      $phone, 
      $birthdate, 
      $linkedin_url,
      $personal_website_url,
      $github_url,
      $cv_file,
      $current_role,
      $skills,
      $how_long
    )
    {
      $this->name = $name;
      $this->email = $email;
      $this->country = $country;
      $this->phone = $phone;
      $this->birthdate = $birthdate;
      $this->linkedin_url = $linkedin_url;
      $this->personal_website_url = $personal_website_url;
      $this->github_url = $github_url;
      $this->cv_file = $cv_file;
      $this->current_role = $current_role;
      $this->skills = $skills;
      $this->how_long = $how_long;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.new-talent-resume-mail')->with([
          'name' => $this->name,
          'email' => $this->email,
          'country' => $this->country,
          'phone' => $this->phone,
          'birthdate' => $this->birthdate,
          'linkedin_url' => $this->linkedin_url,
          'personal_website_url' => $this->personal_website_url,
          'github_url' => $this->github_url,
          'cv_file' => $this->cv_file,
          'current_role' => $this->current_role,
          'skills' => $this->skills,
          'how_long' => $this->how_long,
        ]);
    }
}
