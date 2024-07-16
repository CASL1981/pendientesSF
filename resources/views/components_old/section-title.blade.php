<div class="card">
    <div class="card-header d-flex justify-content-between">
        <div class="header-title">
            <h3 class="card-title">{{ $title }}</h3>

            <p class="">
                {{ $description }}
            </p>
        </div>
    </div>

    <div class="card-header d-flex justify-content-between">
        {{ $aside ?? '' }}
    </div>
</div>
