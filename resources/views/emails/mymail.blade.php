<h1>Hello {{ $user['name'] }}</h1>
<p>Please click on the link below for verification for your email {{ $user['email'] }}</p>
<a href="{{ url('/verification',$user->verification->token) }}">Verfify Email</a>