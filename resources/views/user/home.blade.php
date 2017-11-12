@extends('user.app')
@section('title')
@section('sub-heading')
@section('main-content')

<!-- Main Content -->
      <div class="col-lg-8 col-md-10 mx-auto">
      @foreach($posts as $post)
       <div class="post-preview">
            <a href="{{route('post',$post->slug)}}">
              <h2 class="post-title">
                {{$post->title}}
              </h2>
              <h3 class="post-subtitle">
                {{$post->subtitle}}
              </h3>
            </a>
            <p class="post-meta">Posted by
              <a href="#">Rocky</a>
            {{$post->created_at->diffForHumans()}}</p>
          </div>
      @endforeach
          
          <hr>
          <!-- Pager -->
          {{$posts->links()}}
          <div class="clearfix">
          
            <a class="btn btn-secondary float-right"></a>
          </div>
        </div>
      </div>
    </div>
@endsection
