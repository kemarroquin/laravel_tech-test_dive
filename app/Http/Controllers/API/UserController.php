<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\API\User;
use App\Http\Requests\API\StoreUserRequest;
use App\Http\Requests\API\UpdateUserRequest;
use App\Http\Resources\API\UserCollection;
use App\Http\Resources\API\UserResource;
use App\Exceptions\ApiResponseExecption;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new UserCollection(User::with('company')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\API\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        return new UserResource(User::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function showById($id)
    {
        $user = User::with('company')->find($id);
        if(empty($user)) throw new ApiResponseExecption(404);

        return new UserResource($user);
    }
    
    /**
     * Display the specified resource LIKE Firstname.
     *
     * @param  integer  $firstname
     * @return \Illuminate\Http\Response
     */
    public function showByFirstname($firstname)
    {
        $user = User::with('company')->where('firstname', 'LIKE', '%'.$firstname.'%');
        if(empty($user->get()[0])) throw new ApiResponseExecption(404);

        return new UserCollection($user->get());
    }

    /**
     * Display the specified resource LIKE Lastname.
     *
     * @param  integer  $lastname
     * @return \Illuminate\Http\Response
     */
    public function showByLastname($lastname)
    {
        $user = User::with('company')->where('lastname', 'LIKE', '%'.$lastname.'%');
        if(empty($user->get()[0])) throw new ApiResponseExecption(404);

        return new UserCollection($user->get());
    }

    /**
     * Display the specified resource LIKE Email.
     *
     * @param  integer  $email
     * @return \Illuminate\Http\Response
     */
    public function showByEmail($email)
    {
        $user = User::with('company')->where('email', 'LIKE', '%'.$email.'%');
        if(empty($user->get()[0])) throw new ApiResponseExecption(404);

        return new UserCollection($user->get());
    }

    /**
     * Display the specified resource LIKE Phone.
     *
     * @param  integer  $phone
     * @return \Illuminate\Http\Response
     */
    public function showByPhone($phone)
    {
        $user = User::with('company')->where('phone', 'LIKE', '%'.$phone.'%');
        if(empty($user->get()[0])) throw new ApiResponseExecption(404);

        return new UserCollection($user->get());
    }

    /**
     * Display the specified resource LIKE Birthdate.
     *
     * @param  integer  $birthdate
     * @return \Illuminate\Http\Response
     */
    public function showByBirthdate($birthdate)
    {
        $user = User::with('company')->where('birthdate', 'LIKE', '%'.$birthdate.'%');
        if(empty($user->get()[0])) throw new ApiResponseExecption(404);

        return new UserCollection($user->get());
    }

    /**
     * Display the specified resource LIKE Gender.
     *
     * @param  integer  $gender
     * @return \Illuminate\Http\Response
     */
    public function showByGender($gender)
    {
        $user = User::with('company')->where('gender', 'LIKE', '%'.$gender.'%');
        if(empty($user->get()[0])) throw new ApiResponseExecption(404);

        return new UserCollection($user->get());
    }

    /**
     * Display the specified resource LIKE City.
     *
     * @param  integer  $city
     * @return \Illuminate\Http\Response
     */
    public function showByCity($city)
    {
        $user = User::with('company')->where('city', 'LIKE', '%'.$city.'%');
        if(empty($user->get()[0])) throw new ApiResponseExecption(404);

        return new UserCollection($user->get());
    }

    /**
     * Display the specified resource LIKE Country.
     *
     * @param  integer  $country
     * @return \Illuminate\Http\Response
     */
    public function showByCountry($country)
    {
        $user = User::with('company')->where('country', 'LIKE', '%'.$country.'%');
        if(empty($user->get()[0])) throw new ApiResponseExecption(404);

        return new UserCollection($user->get());
    }

    /**
     * Display the specified resource LIKE Address.
     *
     * @param  integer  $address
     * @return \Illuminate\Http\Response
     */
    public function showByAddress($address)
    {
        $user = User::with('company')->where('address', 'LIKE', '%'.$address.'%');
        if(empty($user->get()[0])) throw new ApiResponseExecption(404);

        return new UserCollection($user->get());
    }

    /**
     * Display the specified resource by Status.
     *
     * @param  integer  $status
     * @return \Illuminate\Http\Response
     */
    public function showByStatus($status)
    {
        $user = User::with('company')->where('status', 'LIKE', $status);
        if(empty($user->get()[0])) throw new ApiResponseExecption(404);

        return new UserCollection($user->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\API\UpdateUserRequest  $request
     * @param  \App\Models\API\User  $user
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user, $id)
    {
        $user = User::all()->find($id);
        if(empty($user)) throw new ApiResponseExecption(404);
        if(!$user->update($request->all())) throw new ApiResponseExecption(400);

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::all()->find($id);
        if(empty($user)) throw new ApiResponseExecption(404);
        if(!$user->delete()) throw new ApiResponseExecption(400);

        return $user;
    }
}
