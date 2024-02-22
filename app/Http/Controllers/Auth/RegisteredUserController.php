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
use Illuminate\Support\Facades\DB;

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

            // user validations
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'vat_number' => ['required', 'string', 'max:13', 'unique:'.User::class],
            

            // restaurant validations
            'restaurant_image' => ['image', 'max:512'],
            'restaurant_logo' => ['image', 'max:512'],
            'restaurant_email' => ['required', 'string', 'email', 'max:255', 'unique:'.Restaurant::class],
            // ^
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

        // Controllo del caricamento del file restaurant_image nel form di creazione
        
        if($request->hasFile('restaurant_image')) {
            $path = Storage::put('uploads', $request->restaurant_image);
            $new_restaurant->restaurant_image = $path;
        }
     
         // Controllo del caricamento del file restaurant_logo nel form di creazione
        
         if($request->hasFile('restaurant_logo')) {
            $path = Storage::put('uploads', $request->restaurant_logo);
            $new_restaurant->restaurant_logo = $path;
        }

        /////////////

        // Creo la concatenazione dei dati arrivati dal form per comporre l'indirizzo
        $restaurant_address = $form_data["address"].", ".$form_data["number"].", ".$form_data["cap"].", ".$form_data["city"];

        $new_restaurant->fill($form_data);
        
        $new_restaurant->restaurant_address = $restaurant_address;
        $new_restaurant->slug = Str::slug($new_restaurant->restaurant_name);
        $new_restaurant->user_id = $user->id;
        
        $new_restaurant->save();
        
        if($request->has('types')) {
            $new_restaurant->types()->attach($request->types);
        }
    
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
