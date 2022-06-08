<?php

namespace App\Http\Resources;

use App\Models\User;
use App\Models\UserCase;
use Illuminate\Http\Resources\Json\JsonResource;

class UserCaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       if(auth()->user()->role==User::LAWYER)
       { 
            $user='Client';
            $name= $this->profile->name;
       }else
        {
            $user='Lawyer';
            $name = $this->lawyer->name;
        }
        return [
            'id'            =>$this->id,
            $user           =>$name,
            'title'         =>$this->name,
            'fee'           =>$this->fee,
            'details'       =>$this->details,
            'status'        =>$this->status==UserCase::PENDING
                                ? 'Pending' :
                            ($this->status == UserCase::HOLD ?
                                 'On Hold' :
                              ($this->status == UserCase::RUNNING ?
                                 'On going' :
                            ( $this->status == UserCase::DISMISSED ?
                                 'Case Dismissed' :
                               'Closed'))),
            'attachment'    =>setImage($this->attachment),
        ];
    }
}
