@extends('user.app')


@section('title')
@section('sub-heading')

<!-- Main Content -->
@section('main-content')
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
              <a href="#">Start Bootstrap</a>
              on July 8, 2017</p>
          </div>
      @endforeach
          
          <hr>
          <!-- Pager -->
          
        </div>
        
      </div>
    </div>
@endsection
