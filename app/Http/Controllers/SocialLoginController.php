<?php

namespace App\Http\Controllers;

use App\Helpers\Auth\SocialiteHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use App\Models\Auth\SocialAccount;
use App\Exceptions\GeneralException;
use App\Repositories\Frontend\Auth\UserRepository;

class SocialLoginController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @var SocialiteHelper
     */
    protected $socialiteHelper;

    /**
     * SocialLoginController constructor.
     *
     * @param UserRepository  $userRepository
     * @param SocialiteHelper $socialiteHelper
     */
    public function __construct(UserRepository $userRepository, SocialiteHelper $socialiteHelper)
    {
        $this->userRepository = $userRepository;
        $this->socialiteHelper = $socialiteHelper;
    }

    /**
     * @param Request $request
     * @param $provider
     *
     * @throws GeneralException
     *
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function login(Request $request, $provider)
    {
        // There's a high probability something will go wrong
        $user = null;

        // If the provider is not an acceptable third party than kick back
        if (! in_array($provider, $this->socialiteHelper->getAcceptedProviders(), true)) {
            Toastr::error('Próbujesz skorzystać z innego serwisu niż jest dostępny!','Wystąpił błąd!');
            return redirect()->route('login')->with('error', 'Wystąpił błąd! Próbujesz skorzystać z innego serwisu niż jest dostępny!');
        }

        /*
         * The first time this is hit, request is empty
         * It's redirected to the provider and then back here, where request is populated
         * So it then continues creating the user
         */
        if (! $request->all()) {
            return $this->getAuthorizationFirst($provider);
        }

        // Create the user if this is a new social account or find the one that is already there.
        try {
            $user = $this->userRepository->findOrCreateProvider($this->getProviderUser($provider), $provider);
        } catch (Exception $e) {
            Toastr::error($e->getMessage(),'Wystąpił błąd!');
            return redirect()->route('login')->with('error', $e->getMessage());
        }

        if ($user === null) {
            Toastr::error('Nie odnaleziono takiego użytkownika!','Wystąpił błąd!');
            return redirect()->route('login')->with('error', 'Wystąpił błąd! Nie odnaleziono takiego użytkownika!');
        }

        // Check to see if they are active.
        // if (! $user->isActive()) {
        //     throw new GeneralException(__('exceptions.frontend.auth.deactivated'));
        // }

        // Account approval is on
        // if ($user->isPending()) {
        //     throw new GeneralException(__('exceptions.frontend.auth.confirmation.pending'));
        // }

        // User has been successfully created or already exists
        auth()->login($user, true);

        // Set session variable so we know which provider user is logged in as, if ever needed
        session(['socialite_provider' => $provider]);

        //event(new UserLoggedIn(auth()->user()));

        // Return to the intended url or default to the class property
        return redirect()->intended(route('home'));
    }

    /**
     * @param  $provider
     *
     * @return mixed
     */
    protected function getAuthorizationFirst($provider)
    {
        $socialite = Socialite::driver($provider)->stateless();
        $scopes = empty(config("services.{$provider}.scopes")) ? false : config("services.{$provider}.scopes");
        $with = empty(config("services.{$provider}.with")) ? false : config("services.{$provider}.with");
        $fields = empty(config("services.{$provider}.fields")) ? false : config("services.{$provider}.fields");

        if ($scopes) {
            $socialite->scopes($scopes);
        }

        if ($with) {
            $socialite->with($with);
        }

        if ($fields) {
            $socialite->fields($fields);
        }

        return $socialite->redirect();
    }

    /**
     * @param $provider
     *
     * @return mixed
     */
    protected function getProviderUser($provider)
    {
        return Socialite::driver($provider)->stateless()->user();
    }
}
