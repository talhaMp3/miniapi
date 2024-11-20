<x-app-layout>


        <!-- Contact Start -->
        <div class="container-fluid contact bg-light py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" >
                    <h4 class="text-primary">Search for a Word</h4>
                </div>
                <div class="row g-5">
                    
                    <div class="col-xl-12 wow fadeInLeft" data-wow-delay="0.4s">
                        <div>
                             <form action="{{ url('/dictionary') }}" method="POST">
        @csrf
                                <div class="row g-3">
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0"  placeholder="Search for a Word"  id="word" name="word" required>
                                            <label for="word">Search for a Word</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if (isset($wordData))
                    <div class="col-xl-12 wow  card fadeInRight " data-wow-delay="0.2s">
                        <div class="card-body">
                             @if ($wordData)
                            @foreach ($wordData[0]['meanings'] as $meaning)
                            <h3 class="card-subtitle mb-2 text-muted">Part of Speech: {{ $meaning['partOfSpeech'] }}</h3>
                            @foreach ($meaning['definitions'] as $definition)
                                <p class="card-text">Definition: {{ $definition['definition'] }}</p>
                                @if (isset($definition['example']))
                                    <p class="card-text"><strong>Example:</strong> {{ $definition['example'] }}</p>
                                @endif
                            @endforeach
                        @endforeach
                    @else
                        <h2 class="text-danger">Word not found. Please try another.</h2>
                    @endif
                        </div>
                    </div>
        @endif
                   
                  
                </div>
            </div>
        </div>
        <!-- Contact End -->




</x-app-layout>