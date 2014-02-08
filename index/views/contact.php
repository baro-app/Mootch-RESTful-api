<?php if($mailsend): ?>
<h2>Thank you for your message!</h2>
We will be getting back to you shortly.
<?php else: ?>
<form action="/index/contact" method="post">
<h3>Contact Us</h3>
<label class="mb dblock">Have any feedback or want to get in touch with us?</label>
<input name="email" type="text" class="grey" placeholder="Your E-Mail Address">
<textarea name="message" class="grey"></textarea>
<input type="submit" class="btn-class bcNavy" value="Submit"/>
</form>
<?php endif; ?>
