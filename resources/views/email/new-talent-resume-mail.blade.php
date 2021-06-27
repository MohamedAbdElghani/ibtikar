@component('mail::message')
# New resume submitted on ibtikar hiring portal

<table style="margin-bottom: 40px;">
  <tbody>
    <tr>
      <th style="min-width: 150px;text-align: left; margin-bottom: 5px;">Name</th>
      <td style="text-align: left; margin-bottom: 5px;">{{$name}}</td>
    </tr>
    <tr>
      <th style="min-width: 150px;text-align: left; margin-bottom: 5px;">Email</th>
      <td style="text-align: left; margin-bottom: 5px;"><a href="mailto:{{$email}}" target="_blank">{{$email}}</a></td>
    </tr>
    <tr>
      <th style="min-width: 150px;text-align: left; margin-bottom: 5px;">Phone</th>
      <td style="text-align: left; margin-bottom: 5px;"><a href="tel:{{$phone}}">{{$phone}}</a></td>
    </tr>
    <tr>
    <tr>
      <th style="min-width: 150px;text-align: left; margin-bottom: 5px;">Birthdate</th>
      <td style="text-align: left; margin-bottom: 5px;">{{$birthdate}}</td>
    </tr>
    <tr>
      <th style="min-width: 150px;text-align: left; margin-bottom: 5px;">Country</th>
      <td style="text-align: left; margin-bottom: 5px;">{{$country}}</td>
    </tr>
    <tr>
      <th style="min-width: 150px;text-align: left; margin-bottom: 5px;">CV</th>
      <td style="text-align: left; margin-bottom: 5px;"><a href="{{$cv_file}}" target="_blank">Download CV file</a></td>
    </tr>
    <tr>
      <th style="min-width: 150px;text-align: left; margin-bottom: 5px;">Role</th>
      <td style="text-align: left; margin-bottom: 5px;">{{$current_role}}</td>
    </tr>
    <tr>
      <th style="min-width: 150px;text-align: left; margin-bottom: 5px;">How long</th>
      <td style="text-align: left; margin-bottom: 5px;">{{$how_long}}</td>
    </tr>
    <tr>
      <th style="min-width: 150px;text-align: left; margin-bottom: 5px;">Skills</th>
      <td style="text-align: left; margin-bottom: 5px;">{{$skills}}</td>
    </tr>
    @if($linkedin_url)
    <tr>
      <th style="min-width: 150px;text-align: left; margin-bottom: 5px;">Linkedin</th>
      <td style="text-align: left; margin-bottom: 5px;"><a href="{{$linkedin_url}}" target="_blank">{{$linkedin_url}}</a></td>
    </tr>
    @endif
    @if($personal_website_url)
    <tr>
      <th style="min-width: 150px;text-align: left; margin-bottom: 5px;">Personal website</th>
      <td style="text-align: left; margin-bottom: 5px;"><a href="{{$personal_website_url}}" target="_blank">{{$personal_website_url}}</a></td>
    </tr>
    @endif
    @if($github_url)
    <tr>
      <th style="min-width: 150px;text-align: left; margin-bottom: 5px;">Github</th>
      <td style="text-align: left; margin-bottom: 5px;"><a href="{{$github_url}}" target="_blank">{{$github_url}}</a></td>
    </tr>
    @endif
  </tbody>
</table>

Thanks,<br>
ibtikar
@endcomponent
