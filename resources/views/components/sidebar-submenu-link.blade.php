@props(['href', 'icon' => null])

@php
    $isActive = request()->url() === $href || request()->fullUrlIs($href . '*');
@endphp

<a href="{{ $href }}" 
   @class([
       'flex items-center px-3 py-2 text-sm rounded-sm transition-colors duration-150 group',
       'text-main bg-white' => $isActive,
       'text-slate-700 hover:bg-white hover:text-main' => !$isActive
   ])>
    @if($icon)
        <i class="{{ $icon }} mr-2 transition-colors duration-150 {{ $isActive ? 'text-main' : 'text-slate-400 group-hover:text-main' }}"></i>
    @endif
    <span class="truncate">{{ $slot }}</span>
    <i class="fas fa-chevron-right ml-auto text-xs transition-all duration-150 {{ $isActive ? 'text-main opacity-100' : 'text-slate-400 group-hover:text-main opacity-0 group-hover:opacity-100' }}"></i>
</a> 