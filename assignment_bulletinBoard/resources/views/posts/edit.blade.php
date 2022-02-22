@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form method="POST" action="{{ route('posts.update', $post->id) }}" class="col-md-8">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">タイトル</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">コンテンツ</label>
                <textarea name="content" class="form-control" id="content" rows="10">{{ $post->content }}</textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">編集完了</button>
            </div>
        </form>
    </div>
</div>
@endsection
