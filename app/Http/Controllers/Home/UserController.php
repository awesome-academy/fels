<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Notifications\FollowedUser;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
        {

            return redirect()->to('user/profile/' . Auth::user()->id);
        }

        return redirect()->to('/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = $this->user->findBy('id', $id);

            return view('users.profile', compact('user'));
        } catch (ModelNotFoundException $e) {

            return view('errors.404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $input = $request->except(['email', 'role_id']);
            $user = $this->user->getById($id);
            $this->authorize('update', $user);
            $this->user->update($user->id, $input);

            return redirect()->back()->with('status', trans('profile.update_success'));
        } catch (ModelNotFoundException $e) {

            return redirect()->back()->with('status', trans('profile.update_error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display the following users list.
     *
     * @param string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function following($id)
    {
        $user = $this->user->findBy('id', $id);

        if(!isset($user))
            return view('errors.404');

        $followings = $user->followings()->get();

        return view('users.following', compact('followings'));
    }

    /**
     * Follow or unfollow the other user.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function doFollow(Request $request)
    {
        try {
            $user = $this->user->getById($request->id);

            if (\Auth::user()->isFollowing($user)) {
                \Auth::user()->unFollowing($user->id);
            } else {
                \Auth::user()->follow($user->id);
                $user->notify(new FollowedUser(\Auth::user()));
            }

            return redirect()->back();
        } catch (ModelNotFoundException $e) {
            return view('errors.404');
        }
    }

    /**
     * Display the followers list.
     *
     * @param string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function followers($id)
    {
        $user = $this->user->findBy('id', $id);

        if(!isset($user))
            return view('errors.404');

        $followers = $user->followers()->get();

        return view('users.follower', compact('followers'));
    }

    /**
     * Display the results list test.
     *
     * @param string $id
     *
     * @return \Illuminate\Http\Response
     */
    public function results($id)
    {
        $user = $this->user->findBy('id', $id);

        if(!isset($user))
            return view('errors.404');

        $results = $user->results()->get();

        return view('users.results', compact('results'));
    }

    public function showNotification()
    {
        if (!\Auth::id()) {
            return view('errors.404');
        }
        $user = $this->user->findBy('id', \Auth::id());

        return view('users.notifications', compact('user'));
    }

    public function markAsRead()
    {
        if (!\Auth::id()) {
            return view('errors.404');
        }
        $user = $this->user->findBy('id', \Auth::id());
        $user->unreadNotifications->markAsRead();

        return redirect()->back();
    }

}
