<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\AstrologicalSign;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->paginate(5);

        return response()->json($users, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AstrologicalSign $astro_sign)
    {
        if (Auth::check()) {

            $this->validate($request, [
                'name' => 'required|max:100',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'birthday_date' => 'required|date_format:d-m-Y',
            ]);

            $birthday_date = (new \DateTime($request->birthday_date))->format('Y-m-d');

            $zodiak_sign = $astro_sign->whatsTheZodiakSign($birthday_date);
            $chinese_sign = $astro_sign->whatTheChineseSign($birthday_date);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'birthday_date' => $birthday_date,
                'zodiak_sign' => $zodiak_sign,
                'chinese_sign' => $chinese_sign,
            ]);

            return response()->json($user, 201);
        }

        return response()->json(['message' => 'Not authenticate'], 401);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $user = User::find(['id' => $request->id]);

        return response()->json($user, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AstrologicalSign $astro_sign)
    {
        if (Auth::check()) {

            $user = User::findOrFail(['id' => $request->id])->first();

            $validated = Validator::validate($request->all(), [
                'name' => 'string|max:100',
                'email' => 'email|unique:users',
                'password' => 'min:8',
                'birthday_date' => 'date_format:d-m-Y',
            ]);

            if ($validated) {

                $user->update($request->all());
                return response()->json($user, 201);
            }
        }
        return response()->json(['message' => 'Not authenticate'], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (Auth::check()) {

            $user = User::findOrFail(['id' => $request->id]);

            DB::table('users')->delete($user);

            return response()->json(['message' => 'L\'utilisateur id #' . $request->id . ' a bien été supprimé'], 200);
        }
        return response()->json(['message' => 'Not authenticate'], 401);
    }
}
