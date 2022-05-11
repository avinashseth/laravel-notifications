<!DOCTYPE html>
<head>
  <title>Check your Account Balance</title>
  <h1>Your Account Balance</h1>
  <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
  <script>
    
    var pusher = new Pusher('{{env("PUSHER_APP_KEY")}}', {
      cluster: '{{env("PUSHER_APP_CLUSTER")}}',
      encrypted: true
    });

    var channel = pusher.subscribe('send-money');
    channel.bind('App\\Events\\SendMoneyEvent', function(data) {
      document.writeln(data.message + '<br />');
    });

  </script>
</head>