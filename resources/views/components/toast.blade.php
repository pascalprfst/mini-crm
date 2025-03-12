<div>
    @if (session('success'))
        <div class="z-30 fixed left-1/2 bg-slate-700 max-w-90 text-white text-sm px-4 py-1.5 rounded slide-in">
            <div class="z-50 relative flex items-center gap-2">
                <i class="fa-solid fa-circle-check text-lg text-green-500"></i>
                <div class="text-center">
                    {{session('success')}}
                </div>
            </div>
            <div class="bg-gray-800 top-0 left-0 h-full z-40 rounded absolute width-expand"></div>
        </div>
    @endif
    @if (session('error'))
        <div class="z-30 fixed left-1/2 bg-slate-700 max-w-64 text-white text-sm px-4 py-1.5 rounded slide-in">
            <div class="z-50 relative flex items-center gap-2">
                <i class="fa-solid fa-circle-xmark text-lg text-red-500"></i>
                <div class="text-center">
                    {{session('error')}}
                </div>
            </div>
            <div class="bg-gray-800 top-0 left-0 h-full z-40 rounded absolute width-expand"></div>
        </div>
    @endif

    <style>
        @keyframes slideIn {
            0% {
                transform: translate(-50%, -100%);
            }
            10% {
                transform: translate(-50%, 24px);
            }
            90% {
                transform: translate(-50%, 24px);
            }
            100% {
                transform: translate(-50%, -100%);
            }
        }

        @keyframes widthExpand {
            0% {
                width: 0%;
            }
            100% {
                width: 100%;
            }
        }

        .slide-in {
            animation: slideIn 5s ease-in-out forwards;
        }

        .width-expand {
            animation: widthExpand 4750ms ease-in-out forwards;
        }
    </style>
</div>
