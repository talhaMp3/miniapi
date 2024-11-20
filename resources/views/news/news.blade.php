<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">News Articles</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
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
</body>
</html>
