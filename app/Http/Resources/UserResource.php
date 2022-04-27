<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * @var null
     */
    protected $message = null;

    /**
     * @param $message
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id, 
 			'name' => $this->name, 
 			'is_admin' => $this->is_admin, 
 			'email' => $this->email, 
 			'email_verified_at' => $this->email_verified_at, 
 			'password' => $this->password, 
 			'remember_token' => $this->remember_token, 
 			'created_at' => $this->created_at, 
 			'updated_at' => $this->updated_at, 
 			'user_type' => $this->user_type, 
 			'street_address' => $this->street_address, 
 			'province_id' => $this->province_id, 
 			'city_id' => $this->city_id, 
 			'barangay_id' => $this->barangay_id, 
 			'region_id' => $this->region_id, 
 			'contact_number' => $this->contact_number, 
 			'is_active' => $this->is_active, 
 			'service_category_id' => $this->service_category_id, 
 			
        ];
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param Request $request
     * @return array
     */
    public function with($request)
    {
        return [
            'success' => true,
            'message' => $this->message,
            'meta' => null,
            'errors' => null
        ];
    }
}
