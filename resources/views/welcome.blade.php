<!DOCTYPE html>
<html>
<head>
   <title>Laravel</title>
   <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
</head>
<body>
   <center>
      <form action="/loginme" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      USERNAME<input type="text" name="username">
      PASSWORD<input type="password" name="password">
      <input type="submit" name="login" value="login">   
      </form>   </center>


</body>
</html>