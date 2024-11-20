<x-app-layout>
    <div class="container-fluid feature bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h1 class="display-4 mb-4">Your Public IP Address</h1>
                
                @if (isset($ip))
                    <h2 class="text-center">IP Address: <strong>{{ $ip }}</strong></h2>
                @elseif (session('error'))
                    <h2 class="text-center text-danger">{{ session('error') }}</h2>
                @endif

                <div class="text-center mt-4">
                    <a href="/get-ip" class="btn btn-primary rounded-pill py-2 px-4">Refresh IP</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
