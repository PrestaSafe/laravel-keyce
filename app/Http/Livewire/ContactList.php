<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $id_contact = '';
    public $name = '';
    public $sujet = '';
    public $email = '';
    public $message = '';

    public function render()
    {
        $contacts = $this->getContact();
        return view('livewire.contact-list',['contacts' => $contacts]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function getContact()
    {
        $contact = 
        ($this->search == '') 
        ? Contact::paginate(20)
        : Contact::where('name','like',"%$this->search%")
            ->orWhere('email','like',"%$this->search%")
            ->orWhere('sujet','like',"%$this->search%")
            ->orWhere('message','like',"%$this->search%")
            ->paginate(20);
    
        return $contact;  
    }

    public function delete($id)
    {
        Contact::destroy($id);
    }


    public function edit($id)
    {
        $c = Contact::find($id);
        $this->name = $c->name;
        $this->email = $c->email;
        $this->sujet = $c->sujet;
        $this->message = $c->message;
        $this->id_contact = $c->id;
        $c->save();
    }
    

    public function save()
    {
        $c = Contact::find($this->id_contact);
        $c->name = $this->name;
        $c->email = $this->email;
        $c->sujet = $this->sujet;
        $c->message = $this->message;
       
        $c->save();

        $this->reset(['name','email','sujet','message','id_contact']);
    }
}
