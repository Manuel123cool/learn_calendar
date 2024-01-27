
<form action="/users" method="POST">
    @csrf
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" id="name" required value="{{old('name')}}">

    @error('name')
        <p>{{$message}}</p>
    @enderror

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

    <label for="password_confirmation"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="password_confirmation" id="password_confirmation" required value="{{old('password_confirmation')}}">
    <hr>

    @error('password_confirmation')
        <p>{{$message}}</p>
    @enderror 

    <button type="submit" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="/login">Sign in</a>.</p>
  </div>
</form>

