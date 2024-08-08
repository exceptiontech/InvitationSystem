<?php

namespace App\Http\Livewire\Admin\Cgc;

use App\Models\Category;
use App\Models\EventType;
use App\Models\Invitation;
use Livewire\Component;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Invitations extends Component
{
    use WithFileUploads;
    public $selectedItems = [];
    public $categories = [];
    public $newTypeName = '';

    public $event_title,$invitation_id,$show=1,$subject,$img,$invitaion_peview;
    public $organization,$eventTypes;
    public $event_date;
    public $event_time;
    public $event_type;
    public $location_link;
    public $send_date;
    public $send_time;
    public $resend_date;
    public $resend_time;
    public $send_to;
    public $schedule_invitation = false;
    public $send_now = true;
    public $send_by_email = false;
    public $send_by_whatsapp = false;

    public function addEventType()
    {
        $this->validate([
            'newTypeName' => 'required|string|max:255',
        ]);

        $eventType = EventType::create(['name' => $this->newTypeName]);

        $this->eventTypes = EventType::all();

        $this->newTypeName = '';
        session()->flash('success', ' type added successfully.');

        $this->eventTypes = EventType::all();


    }
    protected function rules()
    {
        return [
            'event_title' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_time' => 'required|nullable|date_format:H:i',
            'event_type' => 'required|string|max:255',
            'location_link' => 'required|url',
            'send_date' => 'required|date',
            'send_time' => 'required|date_format:H:i',
            // 'resend_date' => 'required|date',
            // 'resend_time' => 'required|date_format:H:i',
            'send_to' => 'required',
            'schedule_invitation' => 'boolean',
            'send_now' => 'boolean',
            'send_by_email' => 'boolean',
            'send_by_whatsapp' => 'boolean',
        ];
    }
    protected function messages()
    {
        return [
            'event_title.required' => 'The event title is required.',
            'event_title.string' => 'The event title must be a string.',
            'event_title.max' => 'The event title may not be greater than 255 characters.',
            'organization.required' => 'The organization is required.',
            'event_time.required' => 'The event time is required.',
            'organization.string' => 'The organization must be a string.',
            'organization.max' => 'The organization may not be greater than 255 characters.',
            'event_date.date' => 'The event date is not a valid date.',
            'event_date.required' => 'The event date is required.',
            'event_time.date_format' => 'The event time must be in the format HH:MM.',
            'event_type.string' => 'The event type must be a string.',
            'event_type.required' => 'The event type is required.',
            'event_type.max' => 'The event type may not be greater than 255 characters.',
            'location_link.url' => 'The location link format is invalid.',
            'send_date.date' => 'The send date is not a valid date.',
            'send_date.required' => 'The send date is required.',
            'send_time.date_format' => 'The send time must be in the format HH:MM.',
            'send_time.required' => 'The send is required',
            'location_link.required' => 'The location_link is required',
            'resend_date.date' => 'The resend date is not a valid date.',
            'resend_time.date_format' => 'The resend time must be in the format HH:MM.',
            'send_to.string' => 'The send to field must be a string.',
            'send_to.required' => 'The send to field is required.',
            'schedule_invitation.boolean' => 'The schedule invitation field must be true or false.',
            'send_now.boolean' => 'The send now field must be true or false.',
            'send_by_email.boolean' => 'The send by email field must be true or false.',
            'send_by_whatsapp.boolean' => 'The send by WhatsApp field must be true or false.',
        ];
    }
    public function submit()
    {
        // dd($this->selectedItems);

        $this->validate();

        // $this->reset();
        $this->show=2;
        // dd( $this->invitation_id);
    }
    public function creation()
    {
        $data=new Invitation();


        $data->event_title = $this->event_title;
        $data->user_id = auth()->user()->id;
        // dd($data);
        $data->organization = $this->organization;
        $data->event_date = $this->event_date;
        $data->event_time = $this->event_time;
        $data->event_type = $this->event_type;
        $data->location_link = $this->location_link;
        $data->send_date = $this->send_date;
        $data->send_time = $this->send_time;
        $data->resend_date = $this->resend_date;
        $data->resend_time = $this->resend_time;
        $data->send_to =implode(',', $this->selectedItems);
        $data->schedule_invitation = $this->schedule_invitation;
        $data->send_now = $this->send_now;
        $data->send_by_email = $this->send_by_email;
        $data->send_by_whatsapp = $this->send_by_whatsapp;
        // $data->save();

    // dd($data->id);
        // dd( $this->invitation_id);

        // $this->validate();
            // Retrieve the invitation by ID
            // $data = Invitation::find($this->invitation_id);
                // Update the subject and img fields
                $data->subject = $this->subject;

                if($this->img)
                {
                    // dd($this->img);
                    $img=$this->img;
                    $file_name = date('Y_m_d_h_i_s_').Str::slug( $data->event_title).'.'.$img->getClientOriginalExtension();
                    $file_sml_name_img = 'thumbnail_'.$file_name;
                    $destinationPath = public_path('/uploads');
                    $destinationPath_smll = public_path('/uploads/thumbnail');
                    // to finally create image instances
                    //$image = $manager->make($destinationPath."/".$file_name);
                    $image_data = Image::make($img->getRealPath());
                    // now you are able to resize the instance
                    $image_data->resize(1024,768);
                    // and insert a watermark for example
                    //$waterMarkUrl = public_path('uploads/logo.png');
                    //$image_data->insert($waterMarkUrl, 'bottom-right', 5, 5);
                    // finally we save the image as a new file
                    $img_name = $image_data->save($destinationPath."/".$file_name);
                    ///small img
                    $image_small_data = Image::make($img->getRealPath());
                    // now you are able to resize the instance
                    $image_small_data->resize(250,190);
                    // and insert a watermark for example
                    //$waterMarkUrl = public_path('uploads/logo.png');
                    //$image_small_data->insert($waterMarkUrl, 'bottom-right', 2, 2);
                    // finally we save the image as a new file
                    $img_sml_name = $image_small_data->save($destinationPath_smll."/".$file_sml_name_img);
                    // exit create img
                    if(is_null($data->img)==0)
                    {
                        @unlink("./uploads/".$data->img);
                    }
                    if(is_null($data->img_thumbnail)==0)
                    {
                        @unlink("./uploads/thumbnail/".$data->img_thumbnail);
                    }
                    $data->img = $file_name;
                }
                // Save the updated record
                $data->save();
                $this->invitation_id=$data->id;




        session()->flash('success', 'Invitation created successfully.');

        // $this->reset();

        $this->invitaion_peview=Invitation::find($this->invitation_id);
// dd($this->invitaion_peview);
        $this->show=3;


    }
    public function invitaion_peview(){
        $this->invitaion_peview=Invitation::find($this->invitation_id);
    }
    public function removeItem($id)
    {
        // dd( $this->selectedItems);

        $this->selectedItems = array_diff($this->selectedItems, [$id]);
    }
    public function updatedSelectedItems($value)
    {
        // dd($value);

        $this->selectedItems = array_unique($this->selectedItems);
    }
    public function mount()
    {
        $this->categories = Category::where('type',11)->get();
    }
    public function addItem($id)
    {
        // dd($this->selectedItems);

        if (!in_array($id, $this->selectedItems)) {
            $this->selectedItems[] = $id;
        }
    }


    public function render()
    {
        $this->eventTypes = EventType::all();

        return view('livewire.admin.cgc.invitations')->extends('admin.layouts.app',['script_editor'=>true,'script_datatables'=>true]);
    }
}
