<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class OnboardingLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        // Ini memberitahu Laravel:
        // "Kalau ada yang panggil <x-onboarding-layout>,
        // ambil filenya di resources/views/layouts/onboarding.blade.php"
        return view('layouts.onboarding');
    }
}
