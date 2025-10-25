<?php

namespace App\Livewire\Menu;

use App\Livewire\Forms\MenuForm;
use App\Models\Menu;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Actions extends Component
{
    use WithFileUploads;
   
    public $show = false;

    #[On('createMenu')]
    public function createMenu(){
        $this->show = true;
    }

    #[On('editMenu')]
    public function editMenu(Menu $menu){
        $this->form->setMenu($menu);
        $this->show = true;
    }

    public function simpan(){
if($this->photo){
    $this->form->photo= $this->photo->hashName('menu');
    $this->photo->store('menu');
}

        if (isset($this->form->menu))
        {
            $this->form->update();

        }   
         else{
            $this->form->store();
         }
         $this->closeModal();

         $this->dispatch('reload');
    }

    #[On('deleteMenu')]
    public function deleteMenu(Menu $menu){
        $menu->delete();
        $this->dispatch('reload');
    }

    public function closeModal(){
        $this->show =false;
        $this->photo =null;
        $this->form->reset();
    }

    public $photo;

    public MenuForm  $form;
    public function render()
    {
        return view('livewire.menu.actions', [
            'types' => Menu::$types // ✅ Mengirimkan `$types` dengan benar
        ]);
  }
}
