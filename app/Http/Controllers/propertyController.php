<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class propertyController extends Controller
{
    function save_short_desc(Request $request)
    {
        //dd($request->all());
	if($request->input('reraApproved') == "true")
	{
		$rera = true;
	}
	else
	{
		$rera = false;
	}
        if($request->input('amenities') == null)
        {
            $amenties = [];
        }
        else{
            $amenties = $request->input('amenities');
        }

        $data = array(
            "title" => $request->input('title'),
            "availability" => $request->input('availability'),
            "propertyOverview" => $request->input('propertyOverview'),
            "propertyType" => $request->input('propertyType'),
            "price" => $request->input('price'),
            "buildYear" => $request->input('buildYear'),
            "summary" => $request->input('summary'),
            "address" => $request->input('address'),
            "city" => $request->input('city'),
            "street" => $request->input('state'),
            "pincode" => $request->input('pincode'),
            "latitude" => $request->input('latitude'),
            "longitude" => $request->input('longitude'),
            "nearby" => $request->input('nearby'),
            "amenities" => $amenties,
		"reraApproved" => $rera
        );

        if($brochure = $request->file('propBrochure'))
        {
            $result = $brochure->storeOnCloudinaryAs('brochures');

            $data["brochure"] = [
                "imgUrl" => $result->getSecurePath(),
                "publicId" => $result->getPublicId()
            ];
        }
        else
        {
            $data["brochure"] = [];
        }
	
	//dd($data["brochure"]);
        if($brochure = $request->file('priceList'))
        {
            $result = $brochure->storeOnCloudinaryAs('priceList');

            $data["priceList"] = [
                "imgUrl" => $result->getSecurePath(),
                "publicId" => $result->getPublicId()
            ];
        }
        else
        {
            $data["priceList"] = [];
        }

        if($file=$request->file('floor_file'))
        {
            $i=0;
            foreach($request->file('floor_file') as $floor)
            {
                $result = $floor->storeOnCloudinaryAs('floorPlans');

                $data["dimensions"][$i] = [
                    "configuration" => $request->input('Config')[$i],
                    "area" => $request->input('dimensions')[$i],
                    "floorPlanImg"=>[
                        "imgUrl" => $result->getSecurePath(),
                        "publicId" => $result->getPublicId()
                    ]
                ];

                $i++;
            }
        }
        else
        {   
            $i=0;
            foreach($request->input('Config') as $config)
            {
               $data["dimensions"][$i]=[
                "configuration" => $config[$i],
                "area" => $request->input('dimensions')[$i]
                ]; 

                $i++;
            }
            
        }
        

        // dd($request->all(),$data,$request->input('floor_file'));
        
        
        $result = $request->file('bannerImg')->storeOnCloudinaryAs('propertyBanner');
        
        // dd($result);
        // dd($result->getSecurePath(),$result->getPublicId());
        $data["bannerImg"] = [
            "imgUrl" => $result->getSecurePath(),
            "publicId" => $result->getPublicId()
        ];

        //dd($request->all(),$data);
        
        $response = Http::withHeaders([
            'authorization' => 'Bearer '.$_COOKIE["token"],
        ])->post(env('API_URL').'list-property', $data)->json();

        // $response = Http::withHeaders([
        //     'authorization' => 'Bearer '.$request->cookie('token'),
        // ])->post('http://localhost:5000/api/list-property', $data)->json();

        //dd($data,$response);

        if($response["status"] == "success")
        {
            $p_id = $response["data"]["_id"];
            
            $data2 = array(
                "propertyId" => $p_id,
                );

            $i=0;

            foreach($request->file('showcaseImg') as $images)
            {
                $result = $images->storeOnCloudinaryAs('PropertyImages');

                $data2["showcaseImg"][$i] = [
                    "imgUrl" => $result->getSecurePath(),
                    "publicId" => $result->getPublicId()
                ];

                $i++;
            }

            // dd($data2);

            $response2 = Http::withHeaders([
                'authorization' => 'Bearer '.$_COOKIE['token'],
            ])->put(env('API_URL').'property-images', $data2)->json();

            // $response2 = Http::withHeaders([
            //     'authorization' => 'Bearer '.$request->cookie('token'),
            // ])->put('http://localhost:5000/api/property-images', $data2)->json();

            //dd($data,$data2,$response2);
            
	if($response2["status"] == "success")
            {
                return redirect('/admin/propertyList')->with('message2', 'Property Added Successfully');
            }
            else{
                return redirect('/admin/propertyList')->with('message', 'Unable to Add Property. Please contact administrator.');
            }
        }
        else{
            return redirect('/admin/propertyList')->with('message', 'Unable to Add Property. Please contact administrator.');
        }

    }

    function update_prop_view(Request $request)
    {
        $id = $request->id;
        $detailes = Http::get(env('API_URL').'property/'.$id)->json();
        // dd($detailes);
        return view('front.admin.update_property',compact('detailes'));
    }

    function update_desc(Request $request)
    {
        // dd($request->all());
        $id = $request->input('p_id');
        $data = $request->all();

        $response2 = Http::withHeaders([
            'authorization' => 'Bearer '.$_COOKIE['token'],
        ])->put(env('API_URL').'update/property/'.$id, $data)->json();

        // dd($response2);
        if($response2["status"] == "success")
        {
            return redirect('/admin/propertyList')->with('message2', 'Property Added Successfully');
        }
        else
        {
            return redirect('/admin/propertyList')->with('message', 'Something went wrong. Please contact administrator');
        }
        
    }
}

