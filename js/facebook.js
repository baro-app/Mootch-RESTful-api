  window.fbAsyncInit = function() {
    FB.init({
      appId      : '102188763237859', // App ID
      channelUrl : '//sms.blastpress.com/channel.html', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

    // Additional initialization code here
  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     d.getElementsByTagName('head')[0].appendChild(js);
   }(document));

function fb_import() {
 FB.login(function(response) {
   if (response.authResponse) {
     console.log('Welcome!  Fetching your information.... ');
     FB.api('/me', function(response) {
       console.log('Good to see you, ' + response.name + '.');
       FB.api('/me/friends', function(response) {
         for(i=0; i<response.data.length; i++) { //response.data) {
           //alert(friend.name);
           $('#to_import').append('<input type="checkbox">'+response.data[i]['name']+"<br/>\n");
         }
       });
       FB.logout(function(response) {
         console.log('Logged out.');
       });
     });
   } else {
     console.log('User cancelled login or did not fully authorize.');
   }
 }, {scope: 'email, friends_about_me'});
}
