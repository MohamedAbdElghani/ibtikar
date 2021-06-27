@component('mail::message')
# {{$name}} invited you to Ibtikar Talent portal!

<p>It is a marketplace where companies apply to hire you. We help people like you find new opportunities in software field.</p>


@component('mail::button', ['url' => 'https://squad.ibtikar.net.sa/talent/register'])
Accept Invitation
@endcomponent

<p>How it works:</p>

<p>
  1- Create account on Ibtikar Talent portal.<br>
  2- Submit your Resume.<br>
  3- We will contact you to offer you the right opportunity for you.
</p>

<p style="border-top: 1px solid #333;">
  <small>You are receiving this email because your friend {{$name}} {{$email}} has invited you to Ibtikar Talent portal.</small>
</p>

@endcomponent
