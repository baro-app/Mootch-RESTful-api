<script>
$(function() {

    $('#writemsg').ajaxForm({
        beforeSend: function() {
            //$('#fileiddnput > input').css('display','none');
            //$('#fileinput').html('<img src="/images/loading.gif"/>');
        },
        success: function(data) { 
            var res = $.parseJSON(data);
            if(res.success=='false') {
                alert(res.message);
            } else {
                    $('.content').fadeOut(200, function() {
                        $.get('/index/checkout', function(data) {
                            $('.content').html(data);
                            $('.content').fadeIn(200);
                        });
                    });
            }
        }
    });


    $('#charactersleft').html(160-$('#themessage').val().length);
    $('#themessage').keyup(function() {
        //var count = $('#charactersleft').html();
        $('#charactersleft').html(160-$(this).val().length);
    });

    <?php if($_SESSION['job']['status'] == 'paid'): ?>
    $('.content').fadeOut(200, function() {
        $.get('/index/checkout', function(data) {
            $('.content').html(data);
            $('.content').fadeIn(200); 
        });
    });
    <?php endif; ?>
});
</script>
<ul id="breadcrumb">
    <!-- <li><a href="#" title="Home"><img src="/images/home.png" alt="Home" class="home" /></a></li> -->
    <li><a href="/index/import" title="Import" id="gotocontent">Import</a></li>
    <li>Compose</li>

</ul>
<div class="">
    <label>Write message</label>
</div>
<div class="importform">
    <div id="charactersleft">
        160
    </div>
    <form id="writemsg" action="/messages/save" method="post">
        <textarea name="message" id="themessage" maxlength="160" resizable="no" style="width:100%; height:100px; font-size: 1.2em;margin:15px 0;"><?php if($_SESSION['job']['message']) echo $_SESSION['job']['message']['message']; ?></textarea>
        <input type="submit" value="Save message" class="btn-class bcNavy"/>
    </form>
</div>
