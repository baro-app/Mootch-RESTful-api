    function loading(el) {
        $(el).append("<div id=\"loading\"></div>");
        $(el).children('#loading').css('height',$(el).height());
        $(el).children('#loading').css('width',$(el).width());
        $(el).children('#loading').css('top',$(el).position().top);
        $(el).children('#loading').css('left',$(el).position().left);
    }

    function removeLoading(el) {
        $('#ccform > #loading').remove(); 
//        $(el).children('#loading').each(function(){ $(this).remove() });
    }

$(function() {

    $.fn.glowInput = function() {
        $(this).addClass('invalid'); 
    };

    $('.content').delegate('#email', 'blur', function() {
        var input = this;
        if($(this).val() == '') {
            $(this).removeClass('invalid');
            return false;
        }
        $.get('/validate/email/'+$(this).val(), function(data) {
            var result = $.parseJSON(data);
            if(result.success=="true") {
                $(input).removeClass('invalid');
                $(input).addClass('valid');
            } else {
                $(input).removeClass('valid');
                $(input).addClass('invalid');
            }
        });
    });

    $('.content').delegate('#cell', 'blur', function() {
        var input = this;
        if($(this).val() == '') {
            $(this).removeClass('invalid');
            return false;
        }
        $.get('/validate/phone/'+$(this).val(), function(data) {
            var result = $.parseJSON(data);
            if(result.success=="true") {
                $(input).removeClass('invalid');
                $(input).addClass('valid');
            } else {
                $(input).removeClass('valid');
                $(input).addClass('invalid');
            }
        });
    });

    $('.content').delegate('#ccnum', 'blur', function() {
        var input = this;
        if($(this).val() == '') {
            $(this).removeClass('invalid');
            return false;
        }
        $.get('/validate/cc/'+$(this).val(), function(data) {
            var result = $.parseJSON(data);
            if(result.success=="true") {
                $(input).removeClass('invalid');
                $(input).addClass('valid');
            } else {
                $(input).removeClass('valid');
                $(input).addClass('invalid');
            }
        });
    });

    $('.content').delegate('#ccexp', 'blur', function() {
        var input = this;
        if($(this).val() == '') {
            $(this).removeClass('invalid');
            return false;
        }
        $.get('/validate/ccexp/'+$(this).val(), function(data) {
            var result = $.parseJSON(data);
            if(result.success=="true") {
                $(input).removeClass('invalid');
                $(input).addClass('valid');
            } else {
                $(input).removeClass('valid');
                $(input).addClass('invalid');
            }
        });
    });

    $('.content').delegate('#cccvv', 'blur', function() {
        var input = this;
        if($(this).val() == '') {
            $(this).removeClass('invalid');
            return false;
        }
        $.get('/validate/cccvv/'+$(this).val(), function(data) {
            var result = $.parseJSON(data);
            if(result.success=="true") {
                $(input).removeClass('invalid');
                $(input).addClass('valid');
            } else {
                $(input).removeClass('valid');
                $(input).addClass('invalid');
            }
        });
    });

    window.step = 1;
    window.stepbreak = false;
    $('.content').delegate('#startjob', 'submit', function(e) {
        window.stepbreak = false;
        e.preventDefault();
        if(window.step == 1) {
        $('#inputs').children('input[type=text]').each(function() {
            if(!$(this).hasClass('valid') || $(this).val() == '') {
                $(this).glowInput();
                window.stepbreak = true;
            }
        });
        if(window.stepbreak) return false;
        $.get('/jobs/create/'+$('#email').val()+'/'+$('#cell').val(), function(data) {
            var result = $.parseJSON(data);
            if(result.success=='true') {
                $('#code-expander').slideDown();
                $('#code').fadeIn();
                window.step = 2;
            } else {

            }
        });
        } else if(window.step == 2) {
            $.get('/jobs/confirm/'+$('#code').val(), function(data) {
                var result = $.parseJSON(data);
                if(result.success=='true') {
                    $('#code').removeClass('invalid');
                    $('#code').addClass('valid');
                    $('.content').fadeOut(200, function() {
                        $.get('/index/import', function(data) {
                            $('.content').html(data);
                            $('.content').fadeIn(200);
                        });
                    });
                     
                } else {
                    $('#code').removeClass('valid');
                    $('#code').addClass('invalid');
                }
            });
        }
    });

    $('.content').delegate('#gotocontent','click',function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        $('.content').fadeOut(200, function() {
            $.get(href, function(data) {
                $('.content').html(data);
                $('.content').fadeIn(200);
            });
        });
    });


});
