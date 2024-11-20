<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mars Rover Photos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Mars Rover Photos</h1>

        <form action="/nasa/mars-rover-photos" method="GET" class="mb-4">
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <label for="rover">Select Rover:</label>
                    <select name="rover" id="rover" class="form-control">
                        <option value="Curiosity" {{ (isset($rover) && $rover == 'Curiosity') ? 'selected' : '' }}>Curiosity</option>
                        <option value="Opportunity" {{ (isset($rover) && $rover == 'Opportunity') ? 'selected' : '' }}>Opportunity</option>
                        <option value="Spirit" {{ (isset($rover) && $rover == 'Spirit') ? 'selected' : '' }}>Spirit</option>
                    </select>
                </div>
                <div class="col-auto">
                    <label for="sol">Sol:</label>
                    <input type="number" name="sol" id="sol" class="form-control" value="{{ $sol ?? 1000 }}">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mt-4">Get Photos</button>
                </div>
            </div>
        </form>

        @if(isset($error))
            <div class="alert alert-danger">{{ $error }}</div>
        @endif

        @if(isset($photos) && count($photos) > 0)
            <div class="row">
                @foreach($photos as $photo)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ $photo['img_src'] }}" class="card-img-top" alt="Mars Rover Photo">
                            <div class="card-body">
                                <h5 class="card-title">Camera: {{ $photo['camera']['full_name'] }}</h5>
                                <p class="card-text"><small class="text-muted">Taken on Sol: {{ $photo['sol'] }}</small></p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center">
    {{-- {{ $photos->links() }} <!-- This will render pagination links --> --}}
</div>
            </div>
        @else
            <p>No Mars Rover Photos available at the moment. Please try again later.</p>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
