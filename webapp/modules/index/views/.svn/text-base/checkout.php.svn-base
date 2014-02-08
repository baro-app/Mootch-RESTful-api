<script>
$(function() {

window.submitting = false;

$('#ccform').submit(function(e) {
    if(window.submitting) return false;
    window.submitting = true;
    e.preventDefault();
    loading(this);
    Stripe.setPublishableKey('<?php echo STRIPE_PK; ?>');
    $('#inputs').children('input[type=text]').each(function() {
        if(!$(this).hasClass('valid') || $(this).val() == '') {
            $(this).glowInput();
            window.stopbreak = true;
        }
        if(window.stopbreak) {
            removeLoading(this);
            window.submitting = false;
            return false;
        }
        var split = $('#ccexp').val().split("/");
        Stripe.createToken({
            number: $('#ccnum').val(),
            cvc:$("#cccvv").val(),
            exp_month:split[0],
            exp_year:split[1]
        }, function(status, response) {
            if(response.error) {
                alert(response.error.message);
                window.submitting = false;
                removeLoading(this);
            } else {
                $.get('/checkout/charge/'+response['id'], function(data) {
                    window.submitting = false;
                    removeLoading(this);
                    var res = $.parseJSON(data);
                    if(res.success =='true') {
                        $('#breadcrumb').slideUp();
                        $('#breadcrumb').fadeOut(200);
                        $('#ccform').fadeOut(200, function() {
                            var ccform = this;
                            $.get('/index/confirm', function(data) {
                                $(ccform).html(data);
                                $(ccform).fadeIn(200);
                            });
                        });
                    } else {
                        alert(res.message);
                    }
                });
            }
        });
        return false;
    });
});

<?php if($_SESSION['job']['status']=='paid'): ?>
                        $('#ccform').fadeOut(200, function() {
                            var ccform = this;
                            $.get('/index/confirm', function(data) {
                                $(ccform).html(data);
                                $(ccform).fadeIn(200);
                            });
                        });
<?php endif; ?>
});
</script>
<?php if(!$_SESSION['opened']): ?>
<ul id="breadcrumb">
    <!-- <li><a href="#" title="Home"><img src="/images/home.png" alt="Home" class="home" /></a></li> -->
    <li><a href="/index/import" title="Import" id="gotocontent">Import</a></li>
    <li><a href="/index/message" title="Compose" id="gotocontent">Compose</a></li>
    <li>Checkout</li>
</ul>
<?php endif; ?>
<h3 class="secure mb" ><img src="/images/ssl.png" style="width:18px;margin-right:8px;">Secure 128-bit SSL Encrypted checkout</h3>
<!-- <span id="siteseal"><script type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=AuCviWPiOF96feEkW0K7wrXPnbywtbvdbZIkcFyWY4soP0SnaQL"></script></span> -->
<h3 class>Your Order Summary</h3>
<div class="clear"></div>
<p class="msg-preview">
<label>Message Preview</label>
	<br>
	<?php echo $_SESSION['job']['message']['message']; ?></p>
<div class="">
	<table class="co-table" border="" bordercolor="#eee">
		<!-- <thead>
			<tr>
				<td>Total Recipients</td>
				<td>3% CC Processing Feee</td>
			</tr>
		</thead> -->
		<tbody>
			<tr>
				<td>Total Recipients</td>
                <?php $cc = 0; foreach($_SESSION['files'] as $file)  {$cc+=$file['recipient_count'];  } ?> 
				<td><?php echo $cc; ?></td>
			</tr>			
			<tr>
				<td>SMS Fee</td>
				<td>$<?php $amount = $cc*0.02; echo number_format($amount, 2); ?></td>
			</tr>			
			<tr>
				<td>3% CC Processing Fee</td>
				<td>$<?php $fee = $amount *0.03; echo number_format($fee, 2); ?></td>
			</tr>
			<tr>
				<td>Service Fee</td>
				<td>$<?php $sfee = 1.00; echo number_format($sfee, 2); ?></td>
			</tr>
		</tbody>
		<tfoot>
			
			<tr class="green-box">
				<td><h3 style="font-size:18px;margin-top:8px;">Total Cost</h3></td>
				<td><h3 style="font-size:18px;margin-top:8px;">$<?php echo number_format($sfee+$fee+$amount, 2); ?></h3></td>
			</tr>
		</tfoot>
		<!-- <h3>Total Recipients: <span style="text-align:right;">1004</span></h3>
		<h3>3% CC Processing Fee: $3.57</h3> -->
	</table>
	<!-- <h3 style="font-size:18px;margin-top:8px;">Total Cost: $23.47</h3> -->
	</div>
<a href="http://stripe.com" target="_blank" class="fr"  style="margin-top:3px;">
	<img src="/images/outline.png">
</a>
<div class="logo-cont mb">
	<img src="/images/ccstrip.jpg">
</div>
<div class="clear"></div>
<!-- <input type="text" id="datepick" placeholder="Enter a Date and Time" class="hasDatePicker"> --><div class="cc" style="">
	<form id="ccform">
		<!-- <select>
			<option>Card Type</option>
			<option>Amex</option>
			<option>Visa</option>
		</select> -->
    <div id="inputs">
		<input id="ccnum" type="text" placeholder="Card Number">
		<input id="ccexp" type="text" placeholder="Exp Date - MM/YY" style="float:left;margin-right:2%;width:49%;">
		<input id="cccvv" type="text" placeholder="CVV" style="float:left;width:49%;">
		<div class="clear"></div>
		<small class="darkgrey">By completing this transaction, you agree to the <a href="/index/terms" target="_blank">Terms and Conditions</a></small>        
        <input type="submit" value="Confirm and Send" class="btn-class bcNavy">
    </div>
		<!-- <input type="text" placeholder="Billing Address">
		<input type="text" placeholder="Zip Code"> -->
	</form>
</div>
