@extends("Layout/index")

@section("title","Users")

@section("content")

    @if($status==1)
        <h1>All users</h1> 
    @elseif($status==2)
        <h1>User selected</h1>  
    @elseif($status==3)
        <h1>User created</h1>
    @elseif($status==4)
        <h1>User updated</h1>
    @endif

    @if($status==1 || $status==3)
        <form action="/users" method="POST">
            @csrf
            <label for="">Name</label>
            <br>
            <input type="text" name="name">
            <br>
            <input type="submit" value="New user">
        </form>
        <ul>
            @foreach ($users as $user)
                <li>
                    <a href="/users/{{$user->id_user}}">
                        <label for="">Name : {{ $user->name}}</label>
                    </a>
                    <hr>
                </li>
            @endforeach
        </ul>
    @else
        <form action="/users/u/{{$user->id_user}}" method="POST">
            @csrf
            <label for="">Name</label>
            <br>
            <input type="text" name="name" value="{{$user->name}}">
            <br>
            <input type="submit" value="Update user">
        </form>
        <form action="/users/d/{{$user->id_user}}" method="POST">
            @csrf
            <input type="submit" value="Delete user">
        </form>

        @foreach ($user->products as $product)
        <li>
            <a href="/products/{{$product->id_product}}">
                <label for="">Id : {{ $product->id_product}}</label>
                <label for="">Name : {{ $product->name}}</label>
                <label for="">Amount : {{ $product->amount}}</label>
            </a>
            <hr>
        </li>
    @endforeach
    @endif    
@endsection
