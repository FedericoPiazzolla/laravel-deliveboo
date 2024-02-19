<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\User;
use App\Models\Restaurant;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $types = Type::all();

        return view('auth.register', compact('types'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Regole di validazione delle informazioni dell'utente

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'vat_number' => ['required', 'string', 'max:13', 'unique:'.User::class],
        ]);

        // Creazione dell'istanza della classe User con riempimento dei dati dalla richiesta

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'vat_number' => $request->vat_number,
        ]);

        event(new Registered($user));

        $form_data = $request->all();

        
        $new_restaurant = new Restaurant();
        
        // $new_restaurant->restaurant_email = $request["restaurant_email"];
        // $new_restaurant->restaurant_name = $request["restaurant_name"];
        // $new_restaurant->restaurant_image = $request["restaurant_image"];
        // $new_restaurant->restaurant_address = $request["restaurant_address"];
        // $new_restaurant->user_id = $user->id;

        $new_restaurant->fill($form_data);
        $new_restaurant->slug = Str::slug($new_restaurant->restaurant_name);
        if($request->hasFile('restaurant_image')) {
            $path = Storage::put('uploads', $request->restaurant_image);
            $new_restaurant->restaurant_image = $path;
        }
        $new_restaurant->user_id = $user->id;

        $new_restaurant->save();

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
