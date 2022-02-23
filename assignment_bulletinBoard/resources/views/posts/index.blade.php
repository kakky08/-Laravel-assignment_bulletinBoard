@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if ($posts->count() !== 0)
            @foreach ($posts as $key=>$post)
            <div class="col-md-8 card-box">
                <div class="card text-center bg-light">
                    <div>
                        <h1>{{ $post->title }}</h1>
                        <p>{{ $post->content }}</p>
                    </div>
                    <ul class="card-footer bg-light d-flex flex-row justify-content-center">
                        <li><p class="post-text">投稿者 : {{ $post->user->name }}</p></li>
                        @if (Auth::id() === $post->user_id)
                            <li>
                                <form method="GET" action="{{ route('posts.edit', $post->id) }}">
                                    <button type="submit" class="btn btn-primary">編集する</button>
                                </form>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">削除する</button>
                                </form>
                            </li>
                            @endif
                            <li>
                                @if ($post->is_like())
                                <form method="POST" action="{{ route('posts.unlike', $post->id) }}" id="unlike{{ $key }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="javascript:document.getElementById('unlike{{ $key}}').submit()" lass="btn m-0 p-1 shadow-none">
                                        <i class="fas fa-heart mr-1 like-btn"></i>
                                    </a>
                                </form>
                                @else
                                <form method="POST" action="{{ route('posts.like', $post->id) }}" id="like{{ $key }}">
                                    @csrf
                                    <a href="javascript:document.getElementById('like{{ $key }}').submit()" lass="btn m-0 p-1 shadow-none">
                                        <i class="far fa-heart mr-1"></i>
                                    </a>
                                </form>
                                @endif
                            </li>
                            <li><p class="post-text">{{ $post->likes->count() }}</p></li>
                        </ul>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
</div>
@endsection
