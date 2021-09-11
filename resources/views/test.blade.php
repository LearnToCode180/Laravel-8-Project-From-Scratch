<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
     {{-- <h1>Hello {{ $name }}</h1> {{-- {!! $name !!} --}}
      
     <h1>Hello @{{ $name }}</h1> 
    {{ __('Hello World') }}

     @php
        $drp = 1
     @endphp

     <script>
        //  var app = @json($objJSON);
        //  console.log(app);
     </script>
     
     @if ($id > 5)
     
     @elseif($id < 5) 
     
     @else

     @endif

     @switch($id)
        @case(1)
           first case...
        @break

        @case(2)
           second case... 
        @break

        @default
            Default case
     @endswitch

     @isset($id)
         
     @endisset

     @empty($id)

     @endempty

     @for ($i=0; $i < 10; $i++)
         $loop->index
         $loop->iteration
         $loop->remaining
         $loop->count
         $loop->first ,last
         $loop->even ,odd
         $loop->depth
         $loop->parent->
     @endfor

     @foreach (user as users)
         $loop->index 
         @continue($user->id > 1)
         @break($user->id > 10)
     @endforeach

     @while($id > 5)
     @endwhile

</body>
</html>