
@props(['comment'])

<x-panel>
<article class="flex space-x-4">
    <div class="flex-shrink-0">
        <img class="rounded" src="https://i.pravatar.cc/100?u={{$comment->user_id}}" width="60" height="60" alt="">
    </div>
    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{$comment->author->username}}</h3>
            <p class="text-xs">Posted
            <time>{{$comment->created_at->diffForHumans()}}</time>
            </p>
        </header>
        <p>{{$comment->body}}</p>
    </div>
</article>
</x-panel>