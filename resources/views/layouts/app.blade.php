    @include('layouts._header')
    @include('layouts._navebar')
    @include('layouts._sidebar')
    <div class="contains">


        <main class="">
            @yield('content')
        </main>
    </div>

    @include('layouts._footer')
