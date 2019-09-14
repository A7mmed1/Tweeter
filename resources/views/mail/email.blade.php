<h1>  {{$comment->user->name}} just commented on your tweet </h1>
{{$comment->tweet->id}}
<a href="/tweets/{{ $comment->tweet->id }}">
{{$comment->tweet->title}} </a></strong></h4><br>
<a href="/comments/{{$comment->id}}"> New comment</a>
