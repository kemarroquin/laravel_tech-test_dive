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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CompanyCollection(Company::with('users')->get());
    }

    /**
     * Store a newly created resource in storage.
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
     * @param  integer  $name
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
     * @param  integer  $email
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
     * @param  integer  $phone
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
     * @param  integer  $city
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
     * @param  integer  $country
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
     * @param  integer  $address
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
     * @param  integer  $status
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
