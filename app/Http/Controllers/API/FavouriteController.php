<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\FavouriteResource;
use App\Models\Favourite;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function lawyer()
    {
        $lawyer=auth()->user()->profile->favourites->where('type',Favourite::LAWYER);
        return $this->apiResponseResourceCollection(200,'Favourite Lawyers',FavouriteResource::collection($lawyer));
    }
    public function agent()
    {
        $agent = auth()->user()->profile->favourites->where('type', Favourite::AGENT);
        return $this->apiResponseResourceCollection(200, 'Favourite Lawyers', FavouriteResource::collection($agent));
    }
   
    public function store(Request $request)
    {
        if(auth()->user()->user_role==1 && auth()->user()->profile !=null){
        $input=$request->validate([
            'user_id'   =>'required',
            'type'      =>'required'
        ]);
        auth()->user()->profile->favourites()->create($input);
        return $this->apiResponse(201,'Added as Favourite');
    }
    else
            return $this->apiResponse(404, 'Not Found');
    }

  

    public function destroy(Favourite $favourite)
    {
        $favourite->delete();
        return $this->apiResponse(200,'Favourite Removed');
    }
}
