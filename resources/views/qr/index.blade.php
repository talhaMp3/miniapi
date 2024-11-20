<x-app-layout>
    <div class="container-fluid feature bg-light py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h1 class="text-center">Generate QR Code</h1>
            <p><strong>API Information:</strong> This application uses a QR Code generation API to create a QR Code based on the data you provide.</p>

            <form action="/generate-qr" method="GET" class="text-center">
                <div class="form-group">
                    <input type="text" class="form-control" name="data" placeholder="Enter data for QR Code" required>
                </div>
                <div class="form-group mt-3">
                    <label for="size">Select Size:</label>
                    <select class="form-control" name="size" id="size" required>
                        <option value="150x150">150x150</option>
                        <option value="200x200">200x200</option>
                        <option value="250x250">250x250</option>
                        <option value="300x300">300x300</option>
                        <option value="350x350">350x350</option>
                        <option value="400x400">400x400</option>
                        <option value="450x450">450x450</option>
                        <option value="500x500">500x500</option>
                        <option value="550x550">550x550</option>
                        <option value="600x600">600x600</option>
                        <option value="650x650">650x650</option>
                        <option value="700x700">700x700</option>
                        <option value="750x750">750x750</option>
                        <option value="800x800">800x800</option>
                        <option value="850x850">850x850</option>
                        <option value="900x900">900x900</option>
                        <option value="950x950">950x950</option>
                        <option value="1000x1000">1000x1000</option>
                        <option value="1050x1050">1050x1050</option>
                        <option value="1100x1100">1100x1100</option>
                        <option value="1150x1150">1150x1150</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Generate QR Code</button>
            </form>

            @if(isset($qrCodeUrl))
                <h2 class="text-center mt-5">Your QR Code:</h2>
                <div class="text-center">
                    <img src="{{ $qrCodeUrl }}" alt="QR Code" class="img-fluid mt-3">
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
