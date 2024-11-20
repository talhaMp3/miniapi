<x-app-layout>




        <!-- Contact Start -->
        <div class="container-fluid contact bg-light py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" >
                    <h4 class="text-primary">New news Articles</h4>
                </div>
  <div class="row">
          @if (isset($articles))
            @foreach ($articles as $article)
              <div class="col-sm-4">
                  <div class="card mb-3">
                    <img src="{{ $article['urlToImage'] }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article['title'] }}</h5>
                        <p class="card-text">{{ $article['description'] }}</p>
                        <a href="{{ $article['url'] }}" class="btn btn-primary" target="_blank">Read more</a>
                    </div>
                </div>
              </div>
            @endforeach
            <div class="d-flex justify-content-center">
                {{ $articles->links() }}
            </div>
        @else
            <p>No news articles available.</p>
        @endif
  </div>
            </div>
        </div>
        <!-- Contact End -->



</x-app-layout>




