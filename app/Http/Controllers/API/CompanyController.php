<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\API\Company;
use App\Http\Requests\API\StoreCompanyRequest;
use App\Http\Requests\API\UpdateCompanyRequest;
use App\Http\Resources\API\CompanyCollection;
use App\Http\Resources\API\CompanyResource;
use App\Exceptions\ApiResponseExecption;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *  path="/api/company/all",
     *  tags={"company"},
     *  operationId="company@index",
     *  @OA\Response(
     *      response=200,
     *      description="Get resource",
     *      @OA\JsonContent()
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
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CompanyCollection(Company::with('users')->get());
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @OA\POST(
     *  path="/api/company/create",
     *  tags={"company"},
     *  operationId="company@store",
     *  @OA\Response(
     *      response=200,
     *      description="Create resource",
     *      @OA\JsonContent()
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
     *  @OA\RequestBody(
     *      @OA\MediaType(
     *          mediaType="application/json",
     *             @OA\Schema(
     *                type="object",
     *                @OA\Property(
     *                    property="name",
     *                    description="Company name",
     *                    example="Prova Contratto S.A de C.V",
     *                    type="string"
     *                ),
     *                @OA\Property(
     *                    property="email",
     *                    description="Email",
     *                    example="hello@provacontratto.com.sv",
     *                    type="string"
     *                ),
     *                @OA\Property(
     *                    property="phone",
     *                    description="Phone",
     *                    example="(503) 2558-8798",
     *                    type="string"
     *                ),
     *                @OA\Property(
     *                    property="city",
     *                    description="City",
     *                    example="San Vicente",
     *                    type="string"
     *                ),
     *                @OA\Property(
     *                    property="country",
     *                    description="Country",
     *                    example="El Salvador",
     *                    type="string"
     *                ),
     *                @OA\Property(
     *                    property="address",
     *                    description="Address",
     *                    example="Lorem ipsum dolor sit amet consectetur adipisicing elit.",
     *                    type="string"
     *                ),
     *                @OA\Property(
     *                    property="status",
     *                    description="Status",
     *                    example="Activo",
     *                    type="string"
     *                )
     *            )
     *         )
     *     )
     * )
     * 
     *
     * @param  \App\Http\Requests\API\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        return new CompanyResource(Company::create($request->all()));
    }

    /**
     * Display the specified resource.
     * 
     * @OA\Get(
     *  path="/api/company/filter/id/{id}",
     *  tags={"company"},
     *  operationId="company@showById",
     * @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="Company to get by id",
     *      required=true,
     *      @OA\Schema(
     *          type="integer",
     *          format="int64"
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Get resource",
     *      @OA\JsonContent()
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
        $company = Company::with('users')->find($id);
        if(empty($company)) throw new ApiResponseExecption(404);

        return new CompanyResource($company);
    }
    
    /**
     * Display the specified resource LIKE Name.
     * 
     * @OA\Get(
     *  path="/api/company/filter/name/{name}",
     *  tags={"company"},
     *  operationId="company@showByName",
     * @OA\Parameter(
     *      name="name",
     *      in="path",
     *      description="Company to get by name",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Get resource",
     *      @OA\JsonContent()
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
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function showByName($name)
    {
        $company = Company::with('users')->where('name', 'LIKE', '%'.$name.'%');
        if(empty($company->get()[0])) throw new ApiResponseExecption(404);

        return new CompanyCollection($company->get());
    }

    /**
     * Display the specified resource LIKE Email.
     *
     * @OA\Get(
     *  path="/api/company/filter/email/{email}",
     *  tags={"company"},
     *  operationId="company@showByEmail",
     * @OA\Parameter(
     *      name="email",
     *      in="path",
     *      description="Company to get by email",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Get resource",
     *      @OA\JsonContent()
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
        $company = Company::with('users')->where('email', 'LIKE', '%'.$email.'%');
        if(empty($company->get()[0])) throw new ApiResponseExecption(404);

        return new CompanyCollection($company->get());
    }

    /**
     * Display the specified resource LIKE Phone.
     *
     * @OA\Get(
     *  path="/api/company/filter/phone/{phone}",
     *  tags={"company"},
     *  operationId="company@showByPhone",
     * @OA\Parameter(
     *      name="phone",
     *      in="path",
     *      description="Company to get by phone",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Get resource",
     *      @OA\JsonContent()
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
        $company = Company::with('users')->where('phone', 'LIKE', '%'.$phone.'%');
        if(empty($company->get()[0])) throw new ApiResponseExecption(404);

        return new CompanyCollection($company->get());
    }

    /**
     * Display the specified resource LIKE City.
     * 
     * @OA\Get(
     *  path="/api/company/filter/city/{city}",
     *  tags={"company"},
     *  operationId="company@showByCity",
     * @OA\Parameter(
     *      name="city",
     *      in="path",
     *      description="Company to get by city",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Get resource",
     *      @OA\JsonContent()
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
        $company = Company::with('users')->where('city', 'LIKE', '%'.$city.'%');
        if(empty($company->get()[0])) throw new ApiResponseExecption(404);

        return new CompanyCollection($company->get());
    }

    /**
     * Display the specified resource LIKE Country.
     *
     * @OA\Get(
     *  path="/api/company/filter/country/{country}",
     *  tags={"company"},
     *  operationId="company@showByCountry",
     * @OA\Parameter(
     *      name="country",
     *      in="path",
     *      description="Company to get by country",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Get resource",
     *      @OA\JsonContent()
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
        $company = Company::with('users')->where('country', 'LIKE', '%'.$country.'%');
        if(empty($company->get()[0])) throw new ApiResponseExecption(404);

        return new CompanyCollection($company->get());
    }

    /**
     * Display the specified resource LIKE Address.
     * 
     * @OA\Get(
     *  path="/api/company/filter/address/{address}",
     *  tags={"company"},
     *  operationId="company@showByAddress",
     * @OA\Parameter(
     *      name="address",
     *      in="path",
     *      description="Company to get by address",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Get resource",
     *      @OA\JsonContent()
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
        $company = Company::with('users')->where('address', 'LIKE', '%'.$address.'%');
        if(empty($company->get()[0])) throw new ApiResponseExecption(404);

        return new CompanyCollection($company->get());
    }

    /**
     * Display the specified resource by Status.
     * 
     * @OA\Get(
     *  path="/api/company/filter/status/{status}",
     *  tags={"company"},
     *  operationId="company@showByStatus",
     * @OA\Parameter(
     *      name="status",
     *      in="path",
     *      description="Company to get by status",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Get resource",
     *      @OA\JsonContent()
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
        $company = Company::with('users')->where('status', 'LIKE', $status);
        if(empty($company->get()[0])) throw new ApiResponseExecption(404);

        return new CompanyCollection($company->get());
    }

    /**
     * Update the specified resource in storage.
     * 
     * @OA\Put(
     *  path="/api/company/update/{id}",
     *  tags={"company"},
     *  operationId="company@update",
     * @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="Company to update by id",
     *      required=true,
     *      @OA\Schema(
     *          type="integer",
     *          format="int64"
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Update resource",
     *      @OA\JsonContent()
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
     *  @OA\RequestBody(
     *      @OA\MediaType(
     *          mediaType="application/json",
     *             @OA\Schema(
     *                type="object",
     *                @OA\Property(
     *                    property="name",
     *                    description="Company name",
     *                    example="Prova Contratto S.A de C.V",
     *                    type="string"
     *                ),
     *                @OA\Property(
     *                    property="email",
     *                    description="Email",
     *                    example="hello@provacontratto.com.sv",
     *                    type="string"
     *                ),
     *                @OA\Property(
     *                    property="phone",
     *                    description="Phone",
     *                    example="(503) 2558-8798",
     *                    type="string"
     *                ),
     *                @OA\Property(
     *                    property="city",
     *                    description="City",
     *                    example="San Vicente",
     *                    type="string"
     *                ),
     *                @OA\Property(
     *                    property="country",
     *                    description="Country",
     *                    example="El Salvador",
     *                    type="string"
     *                ),
     *                @OA\Property(
     *                    property="address",
     *                    description="Address",
     *                    example="Lorem ipsum dolor sit amet consectetur adipisicing elit.",
     *                    type="string"
     *                ),
     *                @OA\Property(
     *                    property="status",
     *                    description="Status",
     *                    example="Activo",
     *                    type="string"
     *                )
     *            )
     *         )
     *     )
     * )
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  \App\Models\API\Company  $company
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company, $id)
    {
        $company = Company::all()->find($id);
        if(empty($company)) throw new ApiResponseExecption(404);
        if(!$company->update($request->all())) throw new ApiResponseExecption(400);

        return new CompanyResource($company);
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @OA\Delete(
     *  path="/api/company/delete/{id}",
     *  tags={"company"},
     *  operationId="company@destroy",
     * @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="Company to delete by id",
     *      required=true,
     *      @OA\Schema(
     *          type="integer",
     *          format="int64"
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Delete resource",
     *      @OA\JsonContent()
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
        $company = Company::all()->find($id);
        if(empty($company)) throw new ApiResponseExecption(404);
        if(!$company->delete()) throw new ApiResponseExecption(400);

        return $company;
    }
}
