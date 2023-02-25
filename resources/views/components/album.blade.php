@props([
    'desc'])

<a href="{{$action}}">
    <div class="item ">
        <div class="image ">
            <img src="{{$image}}" alt="">
        </div>
        <h3 class="title">
            {{$title}}
        </h3>
        <p class="text-left pb-3 px-6">
            {{$desc}}
        </p>
        <div class="times">
            <span>{{$date}}</span>
        </div>
    </div>
</a>