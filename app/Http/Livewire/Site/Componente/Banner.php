<?php

namespace App\Http\Livewire\Site\Componente;

use App\Models\Banner as SiteBanner;
use Livewire\Component;

class Banner extends Component
{
    public function render()
    {
        $banner = SiteBanner::find(1);

        return view('livewire.site.componente.banner', ['banner' => $banner]);
    }
}
