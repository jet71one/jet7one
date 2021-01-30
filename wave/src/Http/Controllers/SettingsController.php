<?php

namespace Wave\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Validator;
use Wave\User;
use App\Region;
use App\Notifications\TestNotification;
use App\TypeTour;
use Wave\KeyValue;
use Wave\ApiKey;
use TCG\Voyager\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function index($section = ''){
        $regions = Region::select('id','name')->get();
        $typeTours = TypeTour::select('id','name')->get();
        $authed_user = auth()->user();

        $images = json_decode($authed_user->images);
        $selectedRegions = json_decode($authed_user->region_id);
        //$regions = json_decode($authed_user->redion_id);
        // dd($authed_user);
        $selectedTypeTour = $authed_user->type_tour_id;

       
        if(empty($section)){
            return redirect(route('wave.settings', 'profile'));
        }
    	return view('theme::settings.index', compact('section','regions','selectedRegions','images','typeTours','selectedTypeTour'));
    }

    public function profilePut(Request $request){
       
        $request->validate([
            'name' => 'required|string',
            'email' => 'sometimes|required|email|unique:users,email,' . Auth::user()->id,
            'username' => 'sometimes|required|unique:users,username,' . Auth::user()->id,
            'phone' => 'string|nullable',
            'region_id' => 'array',
            'type_tour' => 'string',
            'lang' => 'string|nullable',
        ]);
        // dd($request);
    	$authed_user = auth()->user();
    	$authed_user->name = $request->name;
        $authed_user->email = $request->email;
        $authed_user->phone = $request->phone;
        $authed_user->lang = $request->lang;
        $authed_user->about = $request->about;
        
        
        $regions = json_encode($request->region_id);
        $authed_user->region_id = $regions;
        
        
    	$authed_user->type_tour_id = $request->type_tour;
        if($request->images){
            if($authed_user->role_id == '11'){
                
                $result = array();
                $i = 0;
                $count = count($request->images);
                    if($count < 5 or $count == 5){
                        foreach($request->images as $image){

                            $patch = $this->saveImage($image, $authed_user->username.'-'.$i);
                            $newarray=explode(" ",$patch); 
                            array_push($result, $patch);
                            $i++;
                        }
                    }
            }
            if($authed_user->role_id == '10'){
                
                $result = array();
                $i = 0;
                $count = count($request->images);
                    if($count < 3 or $count == 3){
                        foreach($request->images as $image){

                            $patch = $this->saveImage($image, $authed_user->username.'-'.$i);
                            $newarray=explode(" ",$patch); 
                            array_push($result, $patch);
                            $i++;
                        }
                    }
            }
            
          

          
            // else{
            //     if($authed_user->role_id = '10'){
            //         $result = array();
            //         $i = 1;
            //         for ($i = 1; $i < 3; $i++){
            //             $patch = $this->saveImage($image, $authed_user->username.'-'.$i);
            //             $newarray=explode(" ",$patch); 
                    
            //             array_push($result, $patch);
                        
            //         }
            //     }else{
            //         $result = "";
            //     }
            // }
            
            // foreach($request->images as $image){
                
                
            //     //$//result = array_push($result,$this->saveImage($image, $authed_user->username));
                
                


            //     $i++;
            // }
            //dd($result);
            $authed_user->images = json_encode($result);
            
            // /$authed_user->avatar = $this->saveAvatar($request->avatar, $authed_user->username);
         }

        if($request->avatar){
    	   $authed_user->avatar = $this->saveAvatar($request->avatar, $authed_user->username);
        }
    	$authed_user->save();

    	// foreach(config('wave.profile_fields') as $key){
    	// 	if(isset($request->{$key})){
        //         //dd($key);
	    // 		$type = $key . '_type__wave_keyvalue';
	    // 		if($request->{$type} == 'checkbox'){
	    //             if(!isset($request->{$key})){
	    //                 $request->request->add([$key => null]);
	    //             }
        //         }
        //         //dd($type);
        //         $row = (object)['field' => $key, 'type' => $request->{$type}, 'details' => ''];
        //         dd($row);
	    //         $value = $this->getContentBasedOnType($request, 'themes', $row);
        //        // dd($authed_user->keyValue($key));
	    // 		if(!is_null($authed_user->keyValue($key))){

	    // 			$keyValue = KeyValue::where('keyvalue_id', '=', $authed_user->id)->where('keyvalue_type', '=', 'users')->where('key', '=', $key)->first();
	    // 			$keyValue->value = $value;
        //             $keyValue->type = $request->{$type};
        //             $authed_user->keyValue($key);
        //              dd($keyValue->type);
                    
	    // 			$keyValue->save();
	    // 		} else {
	    // 			KeyValue::create(['type' => $request->{$type}, 'keyvalue_id' => $authed_user->id, 'keyvalue_type' => 'users', 'key' => $key, 'value' => $value]);
	    // 		}
	    // 	}
    	// }
        request()->user()->notify(new TestNotification());

    	return back()->with(['message' => 'Successfully updated user profile', 'message_type' => 'success']);
    }

    public function securityPut(Request $request){

        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|confirmed|min:'.config('wave.auth.min_password_length'),
        ]);

        if ($validator->fails()) {
            return back()->with(['message' => $validator->errors()->first(), 'message_type' => 'danger']);
        }

        if (! Hash::check($request->current_password, $request->user()->password)) {
            return back()->with(['message' => 'Incorrect current password entered.', 'message_type' => 'danger']);
        }

        auth()->user()->forceFill([
            'password' => bcrypt($request->password)
        ])->save();

        return back()->with(['message' => 'Successfully updated your password.', 'message_type' => 'success']);
    }

    public function paymentPost(Request $request){
        $subscribed = auth()->user()->updateCard($request->paymentMethod);
    }

    public function apiPost(Request $request){
        $apiKey = auth()->user()->createApiKey(str_slug($request->key_name));
        if(isset($apiKey->id)){
            return back()->with(['message' => 'Successfully created new API Key', 'message_type' => 'success']);
        } else {
            return back()->with(['message' => 'Error Creating API Key, please make sure you entered a valid name.', 'message_type' => 'danger']);
        }
    }

    public function apiPut(Request $request, $id){
        $apiKey = ApiKey::findOrFail($id);
        if($apiKey->user_id != auth()->user()->id){
            return back()->with(['message' => 'Canot update key name. Invalid User', 'message_type' => 'danger']);
        }
        $apiKey->name = str_slug($request->key_name);
        $apiKey->save();
        return back()->with(['message' => 'Successfully update API Key name.', 'message_type' => 'success']);
    }

    public function apiDelete(Request $request, $id){
        $apiKey = ApiKey::findOrFail($id);
        if($apiKey->user_id != auth()->user()->id){
            return back()->with(['message' => 'Canot delete Key. Invalid User', 'message_type' => 'danger']);
        }
        $apiKey->delete();
        return back()->with(['message' => 'Successfully Deleted API Key', 'message_type' => 'success']);
    }

    private function saveAvatar($avatar, $filename){
    	$path = 'avatars/' . $filename . '.png';
    	Storage::disk(config('voyager.storage.disk'))->put($path, file_get_contents($avatar));
    	return $path;
    }
    private function saveImage($image, $filename){
        $path = 'avatars/images/' . $filename . '.jpg';
        Storage::disk(config('voyager.storage.disk'))->put($path, file_get_contents($image));
        return $path;
    }

    public function invoice(Request $request, $invoiceId) {
        return $request->user()->downloadInvoice($invoiceId, [
            'vendor'  => setting('site.title', 'Wave'),
            'product' => ucfirst(auth()->user()->role->name) . ' Subscription Plan',
        ]);
    }
}
