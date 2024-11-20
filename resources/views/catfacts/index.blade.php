<x-app-layout>
    <div class="container-fluid feature bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                {{-- <h4 class="text-primary">Our Features</h4> --}}
                <h1 class="display-4 mb-4">Cat Fact Generator</h1>
                <p class="mb-0">Get random and interesting facts about cats. Perfect for cat lovers and trivia enthusiasts!</p>
            </div>
            
            @if (isset($error))
                <div class="alert alert-danger">{{ $error }}</div>
            @endif

            <div class="row g-4">
                {{-- Loop through APIs if needed --}}
                <div class="col-md-10 col-lg-10 col-xl-12 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-item p-4 pt-0">
                        @if (isset($fact))
                            <h4 class="pt-3 mb-4">{{ $fact }}</h4>
                        @endif

                        <form action="/cat-fact" method="GET" class="mb-4">
                            <button class="btn btn-primary rounded-pill py-2 px-4" type="submit">Get a Random Cat Fact</button>
                        </form>
                    </div>
                </div>
                {{-- End loop --}}
            </div>
        </div>
    </div>
</x-app-layout>
