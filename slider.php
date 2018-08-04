
<!DOCTYPE HTML>
<html lang="en">
<head>
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <meta charset="utf-8">
    <title>Fancy Input - CSS3 text typing effects for input fields</title>
    <meta name="description" content="Makes HTML input field typing fun with some CSS3 effects">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/search2.css">
        <link rel="stylesheet" type="text/css" href="css/search.css">
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <script src="js/jquerymin.js"></script>
</head>
<body>
    <div id='wrap'>
        <div id='content'>
            <section class='input'>
                <div>
                    <input type='text' placeholder='type something...'>
                </div>
            </section>
            <section class='textarea'>
                <div>
                    <textarea cols='1'></textarea>
                </div>
            </section>
        </div>
    </div>
    <script src='js/fancyInput.js'></script>
    <script>
        // Capture TAB to switch between the Demo page views (input/textarea)
    
        $('section :input').val('').fancyInput()[0].focus();

        // Everything below is only for the DEMO
        function init(str){
            var input = $('section input').val('')[0],
                s = ''.split('').reverse(),
                len = s.length-1,
                e = $.Event('keypress');
                
                input.nextElementSibling.className = '';
            
            var initInterval = setInterval(function(){
                    if( s.length ){
                        var c = s.pop();
                        fancyInput.writer(c, input, len-s.length).setCaret(input);
                        input.value += c;
                        //e.charCode = c.charCodeAt(0);
                        //input.trigger(e);
                        
                    }
                    else clearInterval(initInterval);
            },150);
        }
        
        init();
        
        $('menu').on('click', 'button', toggleEffect);
        $('menu.radio').on('change', 'input', changeForm).find('input:first').prop('checked',true).trigger('change');
        
        // change effects
        function toggleEffect(num){
            var className = '';
                idx = $(this).index() + 1,
                $fancyInput = $('.fancyInput');

            if( idx > 1 )
                className = 'effect' + idx;

            $('#content').prop('class', className);
            $fancyInput.find(':input')[0].focus();
            
            $(this).addClass('active').siblings().removeClass('active');
        }
        
        function changeForm(e){
            // radio buttons stuff
            var page = this.value,
                highlight = $(e.delegateTarget).find('> div'),
                label = $(this.parentNode),
                marginLeft = parseInt( label.css('margin-left') , 10 ),
                xPos;
                
            highlight.css({'left':label.position().left + marginLeft, 'width':label.width() });
            
            // page change stuff
            xPos = '-' + label.index() * 50;
            $('#content').css( 'transform', 'translateX(' + xPos + '%)' );
            
            setTimeout(function(){
                $('#content').find('.' + page  + ' :input')[0].focus();
            }, 100);
        }
    </script>
</body> 
</html>
