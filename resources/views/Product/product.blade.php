@extends("Layout/index")

@section("title","Products")

@section("content")

    @if($status==1)
        <h1>All products</h1> 
    @elseif($status==2)
        <h1>Product selected</h1>  
    @elseif($status==3)
        <h1>Product created</h1>
    @elseif($status==4)
        <h1>Product updated</h1>
    @endif

    @if($status==1 || $status==3)
        <form action="/products" method="POST">
            @csrf
            <label for="">Name</label>
            <br>
            <input type="text" name="name">
            <br>
            <input type="range" name="amount" min=0 max=100 value="50">
            <br>
            <label for="">Usuario</label>
            <select name="user">
                @foreach($users as $user)
                    <option value="{{$user->id_user}}">{{$user->name}}</option>
                @endforeach
            </select>
            <br>
            <input type="submit" value="New product">
        </form>
        <ul>
            @foreach ($products as $product)
                <li>
                    <a href="/products/{{$product->id_product}}">
                        <label for="">Id : {{ $product->id_product}}</label>
                        <label for="">Name : {{ $product->name}}</label>
                        <label for="">Amount : {{ $product->amount}}</label>
                        <label for="">User : {{$product->user->name}}</label>
                    </a>
                    <hr>
                </li>
            @endforeach
        </ul>
    @else
        <form action="/products/u/{{$product->id_product}}" method="POST">
            @csrf
            <label for="">Name</label>
            <br>
            <input type="text" name="name" value="{{$product->name}}">
            <br>
            <input type="range" name="amount" min=0 max=100 value={{$product->amount}}>
            <br>
            <label for="">Usuario</label>
            <br>
            <select name="user">
                @foreach($users as $user)
                    @if($user->id_user==$product->id_user)
                        <option value="{{$user->id_user}}" selected>{{$user->name}}</option>
                    @else
                        <option value="{{$user->id_user}}">{{$user->name}}</option>
                    @endif
                @endforeach
            </select>
            <br>
            <input type="submit" value="Update product">
        </form>
        <form action="/products/d/{{$product->id_product}}" method="POST">
            @csrf
            <input type="submit" value="Delete product">
        </form>
    @endif    
@endsection
