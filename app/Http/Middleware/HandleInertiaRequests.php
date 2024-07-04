<?php

namespace App\Http\Middleware;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function share(Request $request)
    {
        $user = $request->user();

        return array_merge(parent::share($request), [
            // Lazily...

            // 'auth' => [
            //     'user' => fn () =>$user
            //         ? $user->only('id', 'name', 'email')
            //         : null,
            //     'roles' => fn () => $user
            //         ? $user->getRoleNames()
            //         : [],
            //     'permissions' => fn () => $user
            //         ? $user->getPermissionNames()
            //         : [],
            // ],

            'auth.user' => fn () => $request->user()
                ? new UserResource($request->user())
                : null,

            'flash' => function () use ($request) {
                return [
                    'success' => $request->session()->get('success'),
                ];
            },
            'showingMobileMenu' => false,
        ]);
    }
}
