<!-- Main -->
<div class="container mx-auto flex flex-wrap pt-4 pb-12">
    <!-- Main content -->
    <main class="w-full  p-4 @if(request()->is('/') || request()->is('monsters')||request()->is('dashboard')) md:w-3/4 @endif">
        @yield('content')
    </main>
    
    @if (request()->is('dashboard')|| request()->is('/')|| request()->is('monsters'))
        <!-- Vérifie si la route est 'home' -->
        @include('templates.partials._aside')
    @endif
</div>
