<?php echo "<!--".print_r($_SESSION, true)."-->";?>
<script>
function insert_file(res, wfileid) {
                    var numhtml = ""; //<div class=\"importedfile\">\n";
                    numhtml += "<div class=\"fl w60p\">" + res.filename + "<br/>\n";
                    numhtml += "Total Recipients: "+res.recipient_count+"</div>\n";
                    numhtml += "<div class=\"fr\"><a href=\"#\" id=\"" + wfileid +"-"+ res.id +"\" class=\"delfile\"></a></div>\n";
                    numhtml += "<br class=\"clear\"/>\n";
                    numhtml += ""; //"</div>\n";
                    $('#upload'+wfileid).html(numhtml);
}

$(function() {

    window.fileid = 1;
    var options = {
        beforeSend: function() {
            var id="upload"+window.fileid;
            $('#uploads').append('<div class="importedfile" id="'+id+'"><img src="/images/loading.gif"/></div>');
        },
        success: function(data) { 
            var res = $.parseJSON(data);
            if(res.success=='false') {
                $('#upload'+window.fileid).html(res.message);
            } else {
                    insert_file(res, window.fileid);
            }
            window.fileid++;
            $('#importcsv').resetForm();
        }
    };

    $('#fileinput').change(function() {
        $('#importcsv').ajaxSubmit(options);
    });

/*    function loadMesg() {
                    $('.content').fadeOut(200, function() {
                        $.get('/index/message', function(data) {
                            $('.content').html(data);
                            $('.content').fadeIn(200);
                        });
                    });
    }
*/
    <?php if($_SESSION['job']['status'] == 'paid'): ?>
    $('.content').fadeOut(200, function() {
        $.get('/index/checkout', function(data) {
            $('.content').html(data);
            $('.content').fadeIn(200); 
        });
    });
    <?php endif; ?>

    <?php if(is_array($_SESSION['files'])): ?>
    <?php foreach($_SESSION['files'] as $index=>$file): ?>
    $('#uploads').append('<div class="importedfile" id="upload'+window.fileid+'"><img src="/images/loading.gif"/></div>');
    insert_file({filename:"<?php echo $file['original_name']; ?>", recipient_count: <?php echo $file['recipient_count']; ?>, id: <?php echo $file['id']; ?>}, window.fileid);
    window.fileid++;
    <?php endforeach; ?>
    <?php endif; ?>

    $('.content').delegate('.delfile', 'click', function(e) {
        e.preventDefault();
        var ids = $(this).attr('id').split('-');
        $.get('/recipients/del/'+ids[1], function(data) {
            var res = $.parseJSON(data);
            if(res.success=='true') {
                $('#upload'+ids[0]).remove();
            } else {
                alert(res.message);
            }
        });
    });

    $('#submitbtn').click(function(e) {
        if($('.delfile').length < 1) {
            alert("Please upload at least one file.");
        } else {
            $.post('/recipients/save', {'save':1}, function(data) {
                var res = $.parseJSON(data);
                if(res.success=='true') {
                    $('.content').fadeOut(200, function() {
                        $.get('/index/message', function(data) {
                            $('.content').html(data);
                            $('.content').fadeIn(200); 
                        });
                    });
                } else {
                    alert(res.message);
                }
            });
        }
    });

});
</script>
<ul id="breadcrumb">
    <!-- <li><a href="#" title="Home"><img src="/images/home.png" alt="Home" class="home" /></a></li> -->
    <li>Import</li>

</ul>
<div class="mb">
    <h3 class="blue">Import multiple CSVs and vCard files</h3>
    <!-- <p>Import your contacts through a CSV file.</p> -->

                <a class="" target="_blank" href="https://support.google.com/mail/answer/24911?hl=en"><span class="icloud-list"><img src="/images/google-icon.png"></span>Need help exporting a CSV from Google Contacts?</a><br>
	    		<a class="" target="_blank" href="http://help.apple.com/icloud/#mmfba74949"><span class="icloud-list"><img src="/images/icloud-icon.png"></span>Need help exporting a vCard File from iCloud.com?</a> 
</div>
<div class="importform">
    <form id="importcsv" action="/recipients/importcsv" method="post">
        <div id="uploads" class="uploader">
        </div>
        <div id="fileinput" class="white maxh25p overscroll">
            <input type="file" name="csvfile" class="mt">
        </div>
    </form>
    <input id="submitbtn" type="button" value="Continue" class="btn-class bcNavy"/>
</div>
