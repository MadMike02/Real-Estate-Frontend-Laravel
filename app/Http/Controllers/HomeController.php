<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    function front()
    {
        $response = Http::get(env('API_URL').'latest/property')->json();
        $response2 = Http::get(env('API_URL').'featured/property')->json();
        $response3 = Http::get(env('API_URL').'experts')->json();
        // $data_array = json_decode($response->json(), true);
        // dd($response);
        // dd($response);

        return view('front.index',compact('response','response2','response3'));
    }
    function properties()
    {
        return view('front.properties');
    }

function agents_list()
    {
        return view('front.agents');
    }

    function latest_properties()
    {
        $response = Http::get(env('API_URL').'latest/property')->json();
        $feat_property = Http::get(env('API_URL').'featured/property')->json();
        // dd($response,$feat_property);
        return view('front.properties_latest',compact('response','feat_property'));
    }

    function bank_properties()
    {
        $response = Http::get(env('API_URL').'bank-morgage/property')->json();
	$feat_property = Http::get(env('API_URL').'featured/property')->json();
        // $response = Http::get('http://localhost:5000/api/bank-morgage/property')->json();
        if($response["status"] == "error")
        {
            return redirect('/')->with('message', $response["message"] );
        }
        else{
           return view('front.properties_latest',compact('response','feat_property')); 
        }
        // dd($response);
        
    }

    function property_detail(Request $request)
    {
        $id = $request->id;
        $detailes = Http::get(env('API_URL').'property/'.$id)->json();
        $feat_property = Http::get(env('API_URL').'featured/property')->json();
        // dd($detailes,$feat_property);
        return view('front.single_property',compact('detailes','feat_property'));
    }

    function home_search(Request $request)
    {
	//dd($request->all(),explode(',',$request->location));
	
        if($request->tab == "all")
        {
            $data = array(
            "propertyType" => $request->pType,
            "price" => "$request->min_price"."-"."$request->max_price");
        }
        else{
            $data = array(
                "availability" => $request->tab,
                "propertyType" => $request->pType,
                "price" => "$request->min_price"."-"."$request->max_price");
        }
	if(isset($request->rera))
	{
		$data["rera"] = true;
	}
	$location = explode(',',$request->location);
	$data["city"] = $location[0];
        //dd($request->all(),$data);

        $response = Http::post(env('API_URL').'search/property',$data)->json();
	$feat_property = Http::get(env('API_URL').'featured/property')->json();
        // $response = Http::post('http://localhost:5000/api/search/property',$data)->json();
//dd($data,$response);
        if($response["status"] == "error")
        {
            return redirect('/')->with('message', "Oops!!, No properties Found" );
        }
        else{
           return view('front.properties_latest',compact('response','feat_property'));
        }

        // dd($request->all(),$data,$response);
    }

    function property_comp()
    {
        return view('front.compare-properties');
    }
}

