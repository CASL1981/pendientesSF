<x-pharmacy::pharmacy-layout>

    <div class="row grid-margin">
        <div class="col-md-12">
            @if (session('success'))
                <p style="color: green;">{{ session('success') }}</p>
            @endif
            @include('pharmacy::stocks.view', ['stocks'])
        </div>
    </div>

</x-pharmacy::pharmacy-layout>