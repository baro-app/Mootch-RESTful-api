<?php
    if(isset($_SESSION['job']) && ($_SESSION['job']['status']=='paid' || $_SESSION['job']['status'] == 'unconfirmed' ) && !$_SESSION['opened']) {
        unset($_SESSION);
        $_SESSION = array();
    }
?>
    <div class="">
        <div class="">
            <!-- <ul>
                <li>Import recipients from Google contacts, or in CSV file.</li>
                <li>Schedule devlivery date and time.</li>
                <li>Get notified by email upon completion.</li>
                <li>Choose to receive replies to your mobile phone.</li>
                <li>Flat rate, 2&cent; out, 1.5&cent; in (optional).</li>
            </ul> -->
        </div>
        <div class="startform">
            <form id="startjob">
                <div id="inputs">
                <!-- <h2 class="darkblue light">Pay As You Go</h2-->
                <h3 class="blue mb light">2&cent per SMS. No monthly fees.</h3>
                <label>Quickly blast an SMS to your <b>CSV</b> or <b>vCard</b> list<br>Enter your e-mail and mobile number to begin</label><br>
                <a class="" target="_blank" href="https://support.google.com/mail/answer/24911?hl=en"><span class="icloud-list"><img src="/images/google-icon.png"></span>Need help exporting a CSV from Google Contacts?</a><br>
	    		<a class="" target="_blank" href="http://help.apple.com/icloud/#mmfba74949"><span class="icloud-list"><img src="/images/icloud-icon.png"></span>Need help exporting a vCard File from iCloud.com?</a> 
                <input type="text" id="email" placeholder="E-Mail Address" style="margin-top:20px;"/><br/>
                <input type="text" id="cell" placeholder="Mobile Number"/><br/>
                <div id="code-expander" style="display:none;">
                	<label class="blue">We just texted you a code. Please enter it below.</label>
                    <input type="text" id="code" placeholder="Enter Your Confirmation Code." style="display:none;"/><br/>
                </div>
                </div>
                <input type="submit" value="Continue" class="btn-class bcNavy"/>
            </form>
        </div>
    </div>
<script>
$(function() {
<?php if(isset($_SESSION['job']) && count($_SESSION['job'])>0 && count($_SESSION['job']['numbers'])==0): ?>
    $('.content').fadeOut(200, function() {
        $.get('/index/import', function(data) {
            $('.content').html(data);
            $('.content').fadeIn(200); 
        });
    });
<?php elseif(isset($_SESSION['job']) && count($_SESSION['job']['numbers'])>0 && !$_SESSION['job']['message']): ?>
    $('.content').fadeOut(200, function() {
        $.get('/index/message', function(data) {
            $('.content').html(data);
            $('.content').fadeIn(200); 
        });
    });
<?php elseif(isset($_SESSION['job']) && count($_SESSION['job']['numbers'])>0 && $_SESSION['job']['message']): ?>
    $('.content').fadeOut(200, function() {
        $.get('/index/checkout', function(data) {
            $('.content').html(data);
            $('.content').fadeIn(200); 
        });
    });
<?php endif; ?>
});
</script>
