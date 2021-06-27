<?php

namespace App\Policies;

use App\CandidateResume;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CandidateResumePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any candidate resumes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the candidate resume.
     *
     * @param  \App\User  $user
     * @param  \App\CandidateResume  $candidateResume
     * @return mixed
     */
    public function view(User $user, CandidateResume $candidateResume)
    {
        //
    }

    /**
     * Determine whether the user can create candidate resumes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
      return in_array($user->role, [
        'employee',
      ]);
    }

    /**
     * Determine whether the user can update the candidate resume.
     *
     * @param  \App\User  $user
     * @param  \App\CandidateResume  $candidateResume
     * @return mixed
     */
    public function update(User $user, CandidateResume $candidateResume)
    {
        //
    }

    /**
     * Determine whether the user can delete the candidate resume.
     *
     * @param  \App\User  $user
     * @param  \App\CandidateResume  $candidateResume
     * @return mixed
     */
    public function delete(User $user, CandidateResume $candidateResume)
    {
        //
    }

    /**
     * Determine whether the user can restore the candidate resume.
     *
     * @param  \App\User  $user
     * @param  \App\CandidateResume  $candidateResume
     * @return mixed
     */
    public function restore(User $user, CandidateResume $candidateResume)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the candidate resume.
     *
     * @param  \App\User  $user
     * @param  \App\CandidateResume  $candidateResume
     * @return mixed
     */
    public function forceDelete(User $user, CandidateResume $candidateResume)
    {
        //
    }
}
