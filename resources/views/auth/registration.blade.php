@extends('layouts.app')

@section('title','Register')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border boder-gray-200 rounded-lg shadow-lg">
    <h1 class="text-3xl text-center font-bold">Register</h1>
    <form class="mt-4" method="Post" action="{{route('register.action')}}">
        @csrf

        <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg
        placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Name" id="name" name="name">

        <input type="email" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg
        placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Email" id="email" name="email">

        <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg
        placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Password" id="password" name="password">

        <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg
        placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Password confirmation"
        id="password_confirmation" name="password_confirmation">


        <button type="submit" class="rounded-md bg-indigo-500 w-full text-lg text-white font-semibold
        p-2 my-3 hover:bg-indigo-600">Register</button>


            <br>
            <a href="login">I already have account!</a>

    </form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
</script>

@endsection
