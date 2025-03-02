@if (session('success'))
    <div class="z-30 fixed left-1/2 bg-slate-700 max-w-90 text-white text-sm px-4 py-1.5 rounded animate-slideIn">
        <div class="z-50 relative flex items-center gap-2">
            <i class="fa-solid fa-circle-check text-lg text-green-500"></i>
            <div class="text-center">
                {{session('success')}}
            </div>
        </div>
        <div class="bg-gray-800 top-0 left-0 h-full z-40 rounded absolute animate-widthExpand"></div>
    </div>
@endif
@if (session('error'))
    <div class="z-30 fixed left-1/2 bg-slate-700 max-w-64 text-white text-sm px-4 py-1.5 rounded animate-slideIn">
        <div class="z-50 relative flex items-center gap-2">
            <i class="fa-solid fa-circle-xmark text-lg text-red-500"></i>
            <div class="text-center">
                {{session('error')}}
            </div>
        </div>
        <div class="bg-gray-800 top-0 left-0 h-full z-40 rounded absolute animate-widthExpand"></div>
    </div>
@endif
