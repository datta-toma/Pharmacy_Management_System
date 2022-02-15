@extends('layouts.app')

@section('title','Login')

@section('content')



<div class="block mx-auto my-12 p-8 bg-white w-1/3 border boder-gray-200 rounded-lg shadow-lg">
    <h1 class="text-3xl text-center font-bold">Login</h1><br>

    <p class=" alert-danger"><?php
        $exception=Session::get('exception');

        if($exception)
        {
            echo $exception;
            Session::put('exception',null);

        }
        ?></p>


      <form class="mt-4" method="Post" action=" {{route('login.admin')}}">
        @csrf

        <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg
        placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Username" id="name" name="admin_username">

        <input type="email" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg
        placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Email" id="email" name="admin_email">

        <input type="password" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg
        placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Password" id="password" name="admin_password">


        <button type="submit" class="rounded-md bg-indigo-500 w-full text-lg text-white font-semibold
        p-2 my-3 hover:bg-indigo-600">login</button>


        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
          </label>

            <br><span class="psw">Forgot <a href="#">password?</a></span>


           <br>
           <a href="register">Create an new Account now!</a>

    </form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
</script>

@endsection
