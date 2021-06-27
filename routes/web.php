<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', 'HomeController@index')->name('home');
Route::get('/delete/ramy-email', 'Auth\RegisterController@delete_email')->name('admin.resume.role.index');
Route::get('/email/verify/{id}/{hash}', 'Auth\ApiVerificationController@verify')->name('verification.verify');





Route::get('/', 'HomeController@employerIndex')->name('employerIndex');


Auth::routes(['verify' => true]);

// language routes
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

// google login
Route::get('auth/google', 'SocialLoginController@redirectToGoogle');
Route::get('auth/google/callback', 'SocialLoginController@handleGoogleCallback');
// twitter login
Route::get('/auth/redirect/{provider}', 'SocialLoginController@redirect');
Route::get('/callback/{provider}', 'SocialLoginController@callback');


// Profile routes
Route::get('/profile', 'ProfileController@show');
Route::post('/profile', 'ProfileController@update');
Route::post('/profile/subscribe-newsletter', 'ProfileController@subscribe');



// squad routes
Route::get('/squad/create', 'SquadController@create')->name('squad.create');
Route::post('/squad', 'SquadController@store')->name('squad.store');
Route::get('/squad/edit', 'SquadController@edit')->name('squad.edit');
Route::post('/squad/update', 'SquadController@update')->name('squad.update');
Route::get('/squad/thankyou', 'SquadController@thankyou')->name('squad.thankyou');



/*
  //////////////////////\\\\\\\\\\\\\\\\\\\\\\\
 //////////////////////  \\\\\\\\\\\\\\\\\\\\\\\
////////////////////// /\ \\\\\\\\\\\\\\\\\\\\\\\
                  admin routes
\\\\\\\\\\\\\\\\\\\\\\ \/ ///////////////////////
 \\\\\\\\\\\\\\\\\\\\\\  ///////////////////////
  \\\\\\\\\\\\\\\\\\\\\\///////////////////////
*/



// job-role routes
Route::get('/admin/job-role/create', 'admin\EmployeeRoleController@create')->name('admin.resume.role.create');
Route::post('/admin/job-role/create', 'admin\EmployeeRoleController@store')->name('admin.resume.role.store');
Route::get('/admin/job-roles', 'admin\EmployeeRoleController@index')->name('admin.resume.role.index');
Route::get('/admin/job-role/{role}/edit', 'admin\EmployeeRoleController@edit')->name('admin.resume.role.edit');
Route::post('/admin/job-role/{role}/edit', 'admin\EmployeeRoleController@update')->name('admin.resume.role.update');
Route::delete('/admin/job-role/{role}/delete', 'admin\EmployeeRoleController@destroy')->name('admin.resume.role.delete');

// job-skill routes
Route::get('/admin/job-skill/create', 'admin\EmployeeSkillController@create')->name('admin.resume.skill.create');
Route::post('/admin/job-skill/create', 'admin\EmployeeSkillController@store')->name('admin.resume.skill.store');
Route::get('/admin/job-skills', 'admin\EmployeeSkillController@index')->name('admin.resume.skill.index');
Route::get('/admin/job-skill/{skill}/edit', 'admin\EmployeeSkillController@edit')->name('admin.resume.skill.edit');
Route::post('/admin/job-skill/{skill}/edit', 'admin\EmployeeSkillController@update')->name('admin.resume.skill.update');
Route::delete('/admin/job-skill/{skill}/delete', 'admin\EmployeeSkillController@destroy')->name('admin.resume.skill.delete');

// job-experience routes
Route::get('/admin/job-experience/create', 'admin\EmployeeRoleExperienceController@create')->name('admin.resume.experience.create');
Route::post('/admin/job-experience/create', 'admin\EmployeeRoleExperienceController@store')->name('admin.resume.experience.store');
Route::get('/admin/job-experiences', 'admin\EmployeeRoleExperienceController@index')->name('admin.resume.experience.index');
Route::get('/admin/job-experience/{experience}/edit', 'admin\EmployeeRoleExperienceController@edit')->name('admin.resume.experience.edit');
Route::post('/admin/job-experience/{experience}/edit', 'admin\EmployeeRoleExperienceController@update')->name('admin.resume.experience.update');
Route::delete('/admin/job-experience/{experience}/delete', 'admin\EmployeeRoleExperienceController@destroy')->name('admin.resume.experience.delete');

// preview candidate resume routes
Route::get('/talent/preview/candidate-resume/{user}', 'admin\PreviewCandidateResumeController@show')->name('admin.preview.resume.show');



/*
  //////////////////////\\\\\\\\\\\\\\\\\\\\\\\
 //////////////////////  \\\\\\\\\\\\\\\\\\\\\\\
////////////////////// /\ \\\\\\\\\\\\\\\\\\\\\\\
                employee routes
\\\\\\\\\\\\\\\\\\\\\\ \/ ///////////////////////
 \\\\\\\\\\\\\\\\\\\\\\  ///////////////////////
  \\\\\\\\\\\\\\\\\\\\\\///////////////////////
*/


// employee routes
Route::get('/talent', 'employee\EmployeeProfileController@dashboard')->name('employee.dashboard');

// Route::get('/talent/login', 'employee\EmployeeProfileController@showLoginForm')->middleware('preventBackHistory')
//     ->name('employee_profile.showLoginForm');
// Route::post('/talent/logout', 'employee\EmployeeProfileController@logout')->middleware('preventBackHistory')->name('employee_profile.logout');

// Route::get('/talent/profile', 'employee\EmployeeProfileController@show')->middleware('verified')->name('employee_profile.show');
// Route::get('/talent/profile/edit', 'employee\EmployeeProfileController@edit')->middleware('verified')->name('employee_profile.edit');
// Route::post('/talent/profile', 'employee\EmployeeProfileController@update')->name('employee_profile.update');
// Route::get('/talent/profile/login-credentials', 'employee\EmployeeProfileController@loginCredentials')->name('employee_profile.logincredintials');
// Route::post('/talent/profile/login-credentials', 'employee\EmployeeProfileController@loginCredentialsUpdate')->name('employee_profile.loginCredintialsUpdate');

// Route::get('/talent/email/verified-successfully', 'employee\EmployeeProfileController@verifiedSuccessfully')->name('employee_profile.verifiedSuccessfully');

// Route::get('/talent/profile/complete', 'employee\EmployeeProfileController@compelete')->middleware(['role', 'preventBackHistory'])
//     ->name('employee_profile.compelete');
// Route::post('/talent/profile/complete', 'employee\EmployeeProfileController@compeleteStore')->name('employee_profile.compelete.store');
// Route::post('/talent/profile/complete-img', 'employee\EmployeeProfileController@compeleteStoreImg')->name('employee_profile.compelete.storeImg');



// ////////// employee resume routes \\\\\\\\\\\
// Route::get('/talent/resume/thank-you', 'employee\PreviewController@thankYou')->name('employee_resume.thanks');
// Route::get('/talent/resume/build', 'employee\CandidateResumeController@create')->name('employee_resume.create');
// // primaryRole routes
// Route::get('/talent/resume/build/primary-role', 'employee\CandidateSpecialistController@primaryRole')->name('employee_resume.build.primary_role');
// Route::post('/talent/resume/build/primary-role', 'employee\CandidateSpecialistController@primaryRoleStore')->name('employee_resume.build.primary_role.store');
// // primaryRole skills routes
// Route::get('/talent/resume/build/skills', 'employee\CandidateSkillController@create')
//     ->name('employee_resume.build.skills');
// Route::post('/talent/resume/build/skills', 'employee\CandidateSkillController@store')
//     ->name('employee_resume.build.skills.store');
// // primary-role-experience routes
// Route::get('/talent/resume/build/primary-role-experience', 'employee\CandidateSpecialistController@primaryRoleExperience')
//     ->name('employee_resume.build.primary_role_experience');
// Route::post('/talent/resume/build/primary-role-experience', 'employee\CandidateSpecialistController@postPrimaryRolesExperience')
//     ->name('employee_resume.build.primary_role_experience.store');
// // Work History skills routes
// Route::get('/talent/resume/build/work-history', 'employee\CandidateWorkHistoryController@show')
//     ->name('employee_resume.build.work_history');
// Route::get('/talent/resume/build/work-history/create', 'employee\CandidateWorkHistoryController@create')
//     ->name('employee_resume.build.work_history.create');
// Route::post('/talent/resume/build/work-history', 'employee\CandidateWorkHistoryController@store')
//     ->name('employee_resume.build.work_history.store');
// Route::get('/talent/resume/build/work-history/{work}/edit', 'employee\CandidateWorkHistoryController@edit')
//     ->name('employee_resume.build.work_history.edit');
// Route::post('/talent/resume/build/work-history/{work}/update', 'employee\CandidateWorkHistoryController@update')
//     ->name('employee_resume.build.work_history.update');
// Route::delete('/talent/resume/build/work-history/{work}/delete', 'employee\CandidateWorkHistoryController@destroy')
//     ->name('employee_resume.build.work_history.delete');
// // online-presence routes
// Route::get('/talent/resume/build/online-presence', 'employee\CandidateResumeController@onlinePresence')
//     ->name('employee_resume.build.online_presence');
// Route::post('/talent/resume/build/online-presence', 'employee\CandidateResumeController@onlinePresenceStore')
//     ->name('employee_resume.build.online_presence.store');
// Route::post('/talent/resume/build/online-presence-file', 'employee\CandidateResumeController@onlinePresenceStoreFile')
//     ->name('employee_resume.build.online_presence.storeFile');
// // educations routes
// Route::get('/talent/resume/build/education', 'employee\CandidateEducationalBackgroundController@show')
//     ->name('employee_resume.build.education');
// Route::get('/talent/resume/build/education/create', 'employee\CandidateEducationalBackgroundController@create')
//     ->name('employee_resume.build.education.create');
// Route::post('/talent/resume/build/education', 'employee\CandidateEducationalBackgroundController@store')
//     ->name('employee_resume.build.education.store');
// Route::get('/talent/resume/build/education/{education}/edit', 'employee\CandidateEducationalBackgroundController@edit')
//     ->name('employee_resume.build.education.edit');
// Route::post('/talent/resume/build/education/{education}/update', 'employee\CandidateEducationalBackgroundController@update')
//     ->name('employee_resume.build.education.update');
// Route::delete('/talent/resume/build/education/{education}/delete', 'employee\CandidateEducationalBackgroundController@destroy')
//     ->name('employee_resume.build.education.delete');
// // certifications routes
// Route::get('/talent/resume/build/certification', 'employee\CandidateCertificationController@show')
//     ->name('employee_resume.build.certification');
// Route::get('/talent/resume/build/certification/create', 'employee\CandidateCertificationController@create')
//     ->name('employee_resume.build.certification.create');
// Route::post('/talent/resume/build/certification', 'employee\CandidateCertificationController@store')
//     ->name('employee_resume.build.certification.store');
// Route::get('/talent/resume/build/certification/{certification}/edit', 'employee\CandidateCertificationController@edit')
//     ->name('employee_resume.build.certification.edit');
// Route::post('/talent/resume/build/certification/{certification}/update', 'employee\CandidateCertificationController@update')
//     ->name('employee_resume.build.certification.update');
// Route::delete('/talent/resume/build/certification/{certification}/delete', 'employee\CandidateCertificationController@destroy')
//     ->name('employee_resume.build.certification.delete');
// // job-search-status routes
// Route::get('/talent/resume/build/job-search-status', 'employee\CandidateResumeController@jobSearchStatus')
//     ->name('employee_resume.build.job_search');
// Route::post('/talent/resume/build/job-search-status', 'employee\CandidateResumeController@jobSearchStatusStore')
//     ->name('employee_resume.build.job_search.store');
// // preferred-salary routes
// Route::get('/talent/resume/build/preferred-salary', 'employee\CandidateResumeController@preferredSalary')
//     ->name('employee_resume.build.preferred_salary');
// Route::post('/talent/resume/build/preferred-salary', 'employee\CandidateResumeController@preferredSalaryStore')
//     ->name('employee_resume.build.preferred_salary.store');
// // camera-time routes
// Route::get('/talent/resume/build/camera-time', 'employee\CandidateResumeController@cameraTime')
//     ->name('employee_resume.build.camera_time');
// Route::post('/talent/resume/build/camera-time/store', 'employee\CandidateResumeController@cameraTimeStore')
//     ->name('employee_resume.build.camera_time.store');

    
// // preview resume routes
// Route::get('/talent/resume/build/preview-resume', 'employee\PreviewController@previewResume')->middleware('preventBackHistory')
//     ->name('employee_resume.build.previewResume');
// Route::post('/talent/resume/build/submit-resume', 'employee\PreviewController@submitResume')
//     ->name('employee_resume.build.submitResume');
// // ajax preview update resume
// Route::post('/talent/resume/preview/update-profile-info', 'employee\PreviewController@ajaxUpdateProfileInfo')
//     ->name('employee_resume.preview.ajaxUpdateProfileInfo');
// // ajax delete video
// Route::delete('/talent/resume/preview/delete-video', 'employee\PreviewController@ajaxDeleteVideo')
//     ->name('employee_resume.preview.ajaxDeleteVideo');
// // ajax update about
// Route::post('/talent/resume/preview/update-about', 'employee\PreviewController@ajaxUpdateAbout')
//     ->name('employee_resume.preview.ajaxUpdateAbout');
// // ajax update intro
// Route::post('/talent/resume/preview/update-intro', 'employee\PreviewController@ajaxUpdateIntro')
//     ->name('employee_resume.preview.ajaxUpdateIntro');
// // ajax update skills
// Route::post('/talent/resume/preview/update-skills', 'employee\PreviewController@ajaxUpdateSkills')
//     ->name('employee_resume.preview.ajaxUpdateSkills');
// // ajax update experience
// Route::post('/talent/resume/preview/update-experience', 'employee\PreviewController@ajaxUpdateExperience')
//     ->name('employee_resume.preview.ajaxUpdateExperience');
// Route::delete('/talent/resume/preview/delete-experience', 'employee\PreviewController@deleteExperience')
//     ->name('employee_resume.preview.ajaxDeteteExperience');
// // ajax update education
// Route::post('/talent/resume/preview/update-education', 'employee\PreviewController@ajaxUpdateEducation')
//     ->name('employee_resume.preview.ajaxUpdateEducation');
// Route::delete('/talent/resume/preview/delete-education', 'employee\PreviewController@deleteEducation')
//     ->name('employee_resume.preview.ajaxDeteteEducation');
// // ajax update certification
// Route::post('/talent/resume/preview/update-certification', 'employee\PreviewController@ajaxUpdateCertification')
//     ->name('employee_resume.preview.ajaxUpdateCertification');
// Route::delete('/talent/resume/preview/delete-certification', 'employee\PreviewController@deleteCertification')
//     ->name('employee_resume.preview.ajaxDeteteCertification');
// //////////// Invite routes
// // invite routes
// Route::get('/talent/invite-firends', 'employee\InviteController@show')
//     ->name('employee.invite.show');
// Route::post('/talent/invite-firends', 'employee\InviteController@invitePost')
//     ->name('employee.invite.invitePost');









Route::get('/talent/test-hubspot-api', 'employee\EmployeeProfileController@hubspot');
