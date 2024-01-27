
<form action="/users/authenticate" method="POST">
    @csrf
  <div class="container">
    <h1>Login</h1>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required value="{{old('email')}}">

    @error('email')
        <p>{{$message}}</p>
    @enderror 

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required value="{{old('password')}}">

    @error('password')
        <p>{{$message}}</p>
    @enderror 

    <button type="submit" class="registerbtn">Login</button>
  </div>
  
  <div class="container signin">
    <p>Already have no account? <a href="/register">Sign up</a>.</p>
  </div>
</form>

