<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/talent/{lang}/email-verification/resend', 'Auth\ApiVerificationController@resend')->name('verification.resend');
Route::get('/email/verify/{id}/{hash}', 'Auth\ApiVerificationController@verify')->name('verification.verify');
Route::post('/coderbyte/update', 'admin\PreviewCandidateResumeController@coderbyte');

// login & register routes
Route::post('/talent/{lang}/register', 'Auth\RegisterController@registerApi');
Route::post('/talent/{lang}/login', 'Auth\LoginController@loginApi');
Route::post('/talent/{lang}/forgot-password', 'Auth\ForgotPasswordController@forgotPassword');
Route::post('/talent/{lang}/reset-password', 'Auth\ForgotPasswordController@changePassword');

Route::middleware('auth:api')->group(function () {
  // complete profile route
  Route::get('/talent/{lang}/profile/complete', 'employee\EmployeeProfileController@apiCompelete');
  Route::post('/talent/{lang}/profile/complete', 'employee\EmployeeProfileController@apiCompeleteStore');
  Route::post('/talent/{lang}/profile/complete-img', 'employee\EmployeeProfileController@compeleteStoreImg');

  // primary role route
  Route::get('/talent/{lang}/resume/build/primary-role', 'employee\CandidateSpecialistController@apiPrimaryRole');
  Route::post('/talent/{lang}/resume/build/primary-role', 'employee\CandidateSpecialistController@apiPrimaryRoleStore');

  // skills route
  Route::get('/talent/{lang}/resume/build/skills', 'employee\CandidateSkillController@apiSkill');
  Route::post('/talent/{lang}/resume/build/skills', 'employee\CandidateSkillController@apiSkillStore');

  // experience route
  Route::get('/talent/{lang}/resume/build/primary-role-experience', 'employee\CandidateSpecialistController@apiPrimaryRoleExperience');
  Route::post('/talent/{lang}/resume/build/primary-role-experience', 'employee\CandidateSpecialistController@apiPrimaryRoleExperienceStore');

  // work history route
  Route::get('/talent/{lang}/resume/build/work-history', 'employee\CandidateWorkHistoryController@apiShow');
  Route::get('/talent/{lang}/resume/build/work-history/create', 'employee\CandidateWorkHistoryController@apiCreate');
  Route::post('/talent/{lang}/resume/build/work-history', 'employee\CandidateWorkHistoryController@apiStore');
  Route::get('/talent/{lang}/resume/build/work-history/{work}/edit', 'employee\CandidateWorkHistoryController@apiEdit');
  Route::post('/talent/{lang}/resume/build/work-history/{work}/update', 'employee\CandidateWorkHistoryController@apiUpdate');
  Route::delete('/talent/{lang}/resume/build/work-history/{work}/delete', 'employee\CandidateWorkHistoryController@apiDestroy');

  // educations routes
  Route::get('/talent/{lang}/resume/build/education', 'employee\CandidateEducationalBackgroundController@apiShow');
  Route::get('/talent/{lang}/resume/build/education/create', 'employee\CandidateEducationalBackgroundController@apiCreate');
  Route::post('/talent/{lang}/resume/build/education', 'employee\CandidateEducationalBackgroundController@apiStore');
  Route::get('/talent/{lang}/resume/build/education/{education}/edit', 'employee\CandidateEducationalBackgroundController@apiEdit');
  Route::post('/talent/{lang}/resume/build/education/{education}/update', 'employee\CandidateEducationalBackgroundController@apiUpdate');
  Route::delete('/talent/{lang}/resume/build/education/{education}/delete', 'employee\CandidateEducationalBackgroundController@apiDestroy');

  // certifications routes
  Route::get('/talent/{lang}/resume/build/certification', 'employee\CandidateCertificationController@apiShow');
  Route::get('/talent/{lang}/resume/build/certification/create', 'employee\CandidateCertificationController@apiCreate');
  Route::post('/talent/{lang}/resume/build/certification', 'employee\CandidateCertificationController@apiStore');
  Route::get('/talent/{lang}/resume/build/certification/{certification}/edit', 'employee\CandidateCertificationController@apiEdit');
  Route::post('/talent/{lang}/resume/build/certification/{certification}/update', 'employee\CandidateCertificationController@apiUpdate');
  Route::delete('/talent/{lang}/resume/build/certification/{certification}/delete', 'employee\CandidateCertificationController@apiDestroy');

  // job-search-status routes
  Route::get('/talent/{lang}/resume/build/job-search-status', 'employee\CandidateResumeController@apiJobSearchStatus');
  Route::post('/talent/{lang}/resume/build/job-search-status', 'employee\CandidateResumeController@apiJobSearchStatusStore');

  // preferred-salary routes
  Route::get('/talent/{lang}/resume/build/preferred-salary', 'employee\CandidateResumeController@apiPreferredSalary');
  Route::post('/talent/{lang}/resume/build/preferred-salary', 'employee\CandidateResumeController@apiPreferredSalaryStore');

  // camera-time routes
  Route::get('/talent/{lang}/resume/build/camera-time', 'employee\CandidateResumeController@apiCameraTime');
  Route::post('/talent/{lang}/resume/build/camera-time/store', 'employee\CandidateResumeController@cameraTimeStore');

  // online-presence routes
  Route::get('/talent/{lang}/resume/build/online-presence', 'employee\CandidateResumeController@apiOnlinePresence');
  Route::post('/talent/{lang}/resume/build/online-presence', 'employee\CandidateResumeController@apiOnlinePresenceStore');
  Route::post('/talent/{lang}/resume/build/online-presence-file', 'employee\CandidateResumeController@onlinePresenceStoreFile');

  // preview routes
  Route::get('/talent/{lang}/resume/build/preview-resume', 'employee\PreviewController@apiPreviewResume');
  Route::post('/talent/{lang}/resume/build/submit-resume', 'employee\PreviewController@submitResume');
  // ajax preview update resume
  Route::post('/talent/{lang}/resume/preview/update-profile-info', 'employee\PreviewController@ajaxUpdateProfileInfo');
  // ajax delete video
  Route::delete('/talent/{lang}/resume/preview/delete-video', 'employee\PreviewController@ajaxDeleteVideo');
  // ajax update about
  Route::post('/talent/{lang}/resume/preview/update-about', 'employee\PreviewController@ajaxUpdateAbout');
  // ajax update intro
  Route::post('/talent/{lang}/resume/preview/update-intro', 'employee\PreviewController@ajaxUpdateIntro');
  // ajax update skills
  Route::post('/talent/{lang}/resume/preview/update-skills', 'employee\PreviewController@ajaxUpdateSkills');
  // ajax update experience
  Route::post('/talent/{lang}/resume/preview/update-experience', 'employee\PreviewController@ajaxUpdateExperience');
  Route::delete('/talent/{lang}/resume/preview/delete-experience', 'employee\PreviewController@deleteExperience');
  // ajax update education
  Route::post('/talent/{lang}/resume/preview/update-education', 'employee\PreviewController@ajaxUpdateEducation');
  Route::delete('/talent/{lang}/resume/preview/delete-education', 'employee\PreviewController@deleteEducation');
  // ajax update certification
  Route::post('/talent/{lang}/resume/preview/update-certification', 'employee\PreviewController@ajaxUpdateCertification');
  Route::delete('/talent/{lang}/resume/preview/delete-certification', 'employee\PreviewController@deleteCertification');

  // check progress
  Route::get('/talent/{lang}/resume/check-progress', 'employee\EmployeeProfileController@apiCheckProgress');

  // invite friends
  Route::post('/talent/{lang}/invite-firends', 'employee\InviteController@invitePost');

  // login credintials
  Route::get('/talent/{lang}/profile/login-credentials', 'employee\EmployeeProfileController@loginCredentials');
  Route::post('/talent/{lang}/profile/login-credentials', 'employee\EmployeeProfileController@loginCredentialsUpdate');

});