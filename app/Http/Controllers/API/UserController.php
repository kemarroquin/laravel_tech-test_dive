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
     * @OA\Get(
     *  path="/api/user/all",
     *  tags={"user"},
     *  operationId="user@index",
     *  @OA\Response(
     *      response=200,
     *      description="Get resource",
     *      @OA\JsonContent(
     *          type="array",
     *          @OA\Items(ref="#\App\Models\API\User")
     *      )
     *  ),
     *  @OA\Response(
     *      response=400,
     *      description="Bad request (URL or Params)"
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="Resources not found"
     *  )
     * )
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
     * @OA\POST(
     *  path="/api/user/create",
     *  tags={"user"},
     *  operationId="user@store",
     *  @OA\Response(
     *      response=200,
     *      description="Create resource",
     *      @OA\JsonContent(
     *          type="array",
     *          @OA\Items(ref="#\App\Models\API\User")
     *      )
     *  ),
     *  @OA\Response(
     *      response=400,
     *      description="Bad request (URL or Params)"
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="Resources not found"
     *  ),
     *  @OA\Response(
     *      response=405,
     *      description="Validation exception"
     *  ),
     *  @OA\RequestBody(ref="\App\Http\Requests\API\StoreUserRequest")
     * )
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
     * @OA\Get(
     *  path="/api/user/filter/id/{id}",
     *  tags={"user"},
     *  operationId="user@showById",
     * @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="User to get by id",
     *      required=true,
     *      @OA\Schema(
     *          type="integer",
     *          format="int64"
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Get resource",
     *      @OA\JsonContent(
     *          type="array",
     *          @OA\Items(ref="#\App\Models\API\User")
     *      )
     *  ),
     *  @OA\Response(
     *      response=400,
     *      description="Bad request (URL or Params)"
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="Resources not found"
     *  )
     * )
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
     * @OA\Get(
     *  path="/api/user/filter/firstname/{firstname}",
     *  tags={"user"},
     *  operationId="user@showByFirstname",
     * @OA\Parameter(
     *      name="firstname",
     *      in="path",
     *      description="User to get by firstname",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Get resource",
     *      @OA\JsonContent(
     *          type="array",
     *          @OA\Items(ref="#\App\Models\API\User")
     *      )
     *  ),
     *  @OA\Response(
     *      response=400,
     *      description="Bad request (URL or Params)"
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="Resources not found"
     *  )
     * )
     *
     * @param  string  $firstname
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
     * @OA\Get(
     *  path="/api/user/filter/lastname/{lastname}",
     *  tags={"user"},
     *  operationId="user@showByLastname",
     * @OA\Parameter(
     *      name="lastname",
     *      in="path",
     *      description="User to get by lastname",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Get resource",
     *      @OA\JsonContent(
     *          type="array",
     *          @OA\Items(ref="#\App\Models\API\User")
     *      )
     *  ),
     *  @OA\Response(
     *      response=400,
     *      description="Bad request (URL or Params)"
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="Resources not found"
     *  )
     * )
     *
     * @param  string  $lastname
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
     * @OA\Get(
     *  path="/api/user/filter/email/{email}",
     *  tags={"user"},
     *  operationId="user@showByEmail",
     * @OA\Parameter(
     *      name="email",
     *      in="path",
     *      description="User to get by email",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Get resource",
     *      @OA\JsonContent(
     *          type="array",
     *          @OA\Items(ref="#\App\Models\API\User")
     *      )
     *  ),
     *  @OA\Response(
     *      response=400,
     *      description="Bad request (URL or Params)"
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="Resources not found"
     *  )
     * )
     *
     * @param  string  $email
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
     * @OA\Get(
     *  path="/api/user/filter/phone/{phone}",
     *  tags={"user"},
     *  operationId="user@showByphone",
     * @OA\Parameter(
     *      name="phone",
     *      in="path",
     *      description="User to get by phone",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Get resource",
     *      @OA\JsonContent(
     *          type="array",
     *          @OA\Items(ref="#\App\Models\API\User")
     *      )
     *  ),
     *  @OA\Response(
     *      response=400,
     *      description="Bad request (URL or Params)"
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="Resources not found"
     *  )
     * )
     *
     * @param  string  $phone
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
     * @OA\Get(
     *  path="/api/user/filter/birthdate/{birthdate}",
     *  tags={"user"},
     *  operationId="user@showByBirthdate",
     * @OA\Parameter(
     *      name="birthdate",
     *      in="path",
     *      description="User to get by birthdate",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Get resource",
     *      @OA\JsonContent(
     *          type="array",
     *          @OA\Items(ref="#\App\Models\API\User")
     *      )
     *  ),
     *  @OA\Response(
     *      response=400,
     *      description="Bad request (URL or Params)"
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="Resources not found"
     *  )
     * )
     *
     * @param  string  $birthdate
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
     * @OA\Get(
     *  path="/api/user/filter/gender/{gender}",
     *  tags={"user"},
     *  operationId="user@showByGender",
     * @OA\Parameter(
     *      name="gender",
     *      in="path",
     *      description="User to get by gender",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Get resource",
     *      @OA\JsonContent(
     *          type="array",
     *          @OA\Items(ref="#\App\Models\API\User")
     *      )
     *  ),
     *  @OA\Response(
     *      response=400,
     *      description="Bad request (URL or Params)"
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="Resources not found"
     *  )
     * )
     *
     * @param  string  $gender
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
     * @OA\Get(
     *  path="/api/user/filter/city/{city}",
     *  tags={"user"},
     *  operationId="user@showByCity",
     * @OA\Parameter(
     *      name="city",
     *      in="path",
     *      description="User to get by city",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Get resource",
     *      @OA\JsonContent(
     *          type="array",
     *          @OA\Items(ref="#\App\Models\API\User")
     *      )
     *  ),
     *  @OA\Response(
     *      response=400,
     *      description="Bad request (URL or Params)"
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="Resources not found"
     *  )
     * )
     *
     * @param  string  $city
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
     * @OA\Get(
     *  path="/api/user/filter/country/{country}",
     *  tags={"user"},
     *  operationId="user@showByCountry",
     * @OA\Parameter(
     *      name="country",
     *      in="path",
     *      description="User to get by country",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Get resource",
     *      @OA\JsonContent(
     *          type="array",
     *          @OA\Items(ref="#\App\Models\API\User")
     *      )
     *  ),
     *  @OA\Response(
     *      response=400,
     *      description="Bad request (URL or Params)"
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="Resources not found"
     *  )
     * )
     *
     * @param  string  $country
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
     * @OA\Get(
     *  path="/api/user/filter/address/{address}",
     *  tags={"user"},
     *  operationId="user@showByAddress",
     * @OA\Parameter(
     *      name="address",
     *      in="path",
     *      description="User to get by address",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Get resource",
     *      @OA\JsonContent(
     *          type="array",
     *          @OA\Items(ref="#\App\Models\API\User")
     *      )
     *  ),
     *  @OA\Response(
     *      response=400,
     *      description="Bad request (URL or Params)"
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="Resources not found"
     *  )
     * )
     *
     * @param  string  $address
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
     * @OA\Get(
     *  path="/api/user/filter/status/{status}",
     *  tags={"user"},
     *  operationId="user@showByStatus",
     * @OA\Parameter(
     *      name="status",
     *      in="path",
     *      description="User to get by status",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Get resource",
     *      @OA\JsonContent(
     *          type="array",
     *          @OA\Items(ref="#\App\Models\API\User")
     *      )
     *  ),
     *  @OA\Response(
     *      response=400,
     *      description="Bad request (URL or Params)"
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="Resources not found"
     *  )
     * )
     *
     * @param  string  $status
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
     * @OA\Put(
     *  path="/api/user/update/{id}",
     *  tags={"user"},
     *  operationId="user@update",
     * @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="User to update by id",
     *      required=true,
     *      @OA\Schema(
     *          type="integer",
     *          format="int64"
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Update resource",
     *      @OA\JsonContent(
     *          type="array",
     *          @OA\Items(ref="#\App\Models\API\User")
     *      )
     *  ),
     *  @OA\Response(
     *      response=400,
     *      description="Bad request (URL or Params)"
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="Resources not found"
     *  ),
     *  @OA\Response(
     *      response=405,
     *      description="Validation exception"
     *  ),
     *  @OA\RequestBody(ref="\App\Http\Requests\API\UpdateUserRequest")
     * )
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
     * @OA\Delete(
     *  path="/api/user/delete/{id}",
     *  tags={"user"},
     *  operationId="user@destroy",
     * @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="User to delete by id",
     *      required=true,
     *      @OA\Schema(
     *          type="integer",
     *          format="int64"
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Delete resource",
     *      @OA\JsonContent(
     *          type="array",
     *          @OA\Items(ref="#\App\Models\API\User")
     *      )
     *  ),
     *  @OA\Response(
     *      response=400,
     *      description="Bad request (URL or Params)"
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="Resources not found"
     *  )
     * )
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
