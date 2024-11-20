<x-app-layout>
    <div class="container-fluid feature bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h1 class="display-4 mb-4">Dog Fact Generator</h1>
                <p class="mb-0">Discover fun and interesting facts about dogs! Perfect for dog lovers and trivia fans!</p>
            </div>

            @if (isset($error))
                <div class="alert alert-danger">{{ $error }}</div>
            @endif

            <div class="row g-4">
                <div class="col-md-10 col-lg-10 col-xl-12 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-item p-4 pt-0">
                        @if (isset($fact))
                            <h4 class="pt-3 mb-4">{{ $fact }}</h4>
                        @else
                            <p>No dog fact available at the moment. Please try again later.</p>
                        @endif

                        <form action="/dog-fact" method="GET" class="mb-4">
                            <button class="btn btn-primary rounded-pill py-2 px-4" type="submit">Get Another Dog Fact</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
