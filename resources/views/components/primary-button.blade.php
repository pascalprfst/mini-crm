<button {{ $attributes->merge(['type' => 'submit', 'class' => 'disabled:cursor-not-allowed disabled:bg-slate-400 text-xs  inline-flex items-center px-4 py-2 bg-main border border-transparent rounded-sm font-semibold  text-white uppercase tracking-widest hover:bg-main-dark focus:bg-slate-700 active:bg-slate-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{$slot}}
</button>
