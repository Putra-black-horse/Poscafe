<?php

namespace App\Livewire\Transaksi;

use App\Models\Transaksi;
use Livewire\Attributes\On;
use Livewire\Component;

class Detail extends Component
{
 public   $show = false;
 public Transaksi $transaksi;

 
 
 #[On('detailTransaksi')]
 public function detailTransaksi(Transaksi $transaksi){
    $this->show = true;  // show modal
    $this->transaksi = $transaksi;

 } 

 public function closeModal() {
    $this->show = false;  // hide modal
 }


 public function render()
    {
        return view('livewire.transaksi.detail');
    }
}
