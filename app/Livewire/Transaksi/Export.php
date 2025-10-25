<?php

namespace App\Livewire\Transaksi;

use App\Exports\TransaksiExport;
use Livewire\Component;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class Export extends Component
{
    public $bulan;
    public function export(){
        $this->validate([
            'bulan' => 'required'
        ]);
        return FacadesExcel::download(new TransaksiExport($this->bulan),"laporan transaksi {$this->bulan}.xlsx");
    }
    public function render()
    {
        return view('livewire.transaksi.export');
    }
}
