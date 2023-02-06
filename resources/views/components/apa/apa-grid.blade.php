@props(['title', 'src'])

<div class="apa-block card">
    <h4 class="title">
        {{ $title }}</h4>
    <div class="apa-grid">
        <div class="apa-block-img">
            <img src="{{ $src }}" alt="{{ $title }}">
        </div>
        <div class=" apa-items">
            <ul class="flex flex-col gap-1 arrow">
                {{ $slot }}
            </ul>
        </div>
    </div>
</div>
