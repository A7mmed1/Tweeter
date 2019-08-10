<?php

namespace App\Policies;

use App\User;
use App\Tweet;
use Illuminate\Auth\Access\HandlesAuthorization;

class TweetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any tweets.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the tweet.
     *
     * @param  \App\User  $user
     * @param  \App\Tweet  $tweet
     * @return mixed
     */
    public function view(User $user, Tweet $tweet)
    {
        //
    }

    /**
     * Determine whether the user can create tweets.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the tweet.
     *
     * @param  \App\User  $user
     * @param  \App\Tweet  $tweet
     * @return mixed
     */
    public function update(User $user, Tweet $tweet)
    {
        return $user->id === $tweet->user_id;
    }

    /**
     * Determine whether the user can delete the tweet.
     *
     * @param  \App\User  $user
     * @param  \App\Tweet  $tweet
     * @return mixed
     */
    public function delete(User $user, Tweet $tweet)
    {
        //
    }

    /**
     * Determine whether the user can restore the tweet.
     *
     * @param  \App\User  $user
     * @param  \App\Tweet  $tweet
     * @return mixed
     */
    public function restore(User $user, Tweet $tweet)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the tweet.
     *
     * @param  \App\User  $user
     * @param  \App\Tweet  $tweet
     * @return mixed
     */
    public function forceDelete(User $user, Tweet $tweet)
    {
        //
    }
}
