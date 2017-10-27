/**
 * @author steve
 * [2017-04-12]
 * @copyright steve
 * @version v1.0
 */

// 拦截所以a标签点击事件
$('a').on('click',function () {
    return loadGet($(this),$('.ibox'));
});
// get请求加载
function loadGet(a,elm) {
    var _url = a.attr('href'),
        regxOne = /(#|javascript)/i,
        stateObject = {},
        title = $('title').text(),
        regxTwo = /(admin\/login|admin\/logout)$/i;
    if (!regxOne.exec(_url) && !regxTwo.exec(_url)) {
        if (!!(window.history && history.pushState)){
            var url_regx = /(page)/i;
            if(!url_regx.exec(_url))
                history.pushState( stateObject, title, _url );
        }
        startLoaded();
        $.ajax({
            url:_url,
            datatype:"html",
            type:"get",
            success:function(res) {
                setTimeout(endLoaded,500);
                window.url = _url;
                elm.html(res);
            },
            error:function(res) {
                endLoaded();
            }
        });
    } else {
        return true;
    }
    return false;
}
// 移除加载
function endLoaded() {
    $(".fideLoading").addClass('hide');
}
// 显示加载
function startLoaded(){
    var $div = $('.fideLoading');
    $div.append($("div.sk-spinner-wave"));
    $div.removeClass('hide');
}
// 菜单点击之后隐藏
$('.dropdown li>a').on('click',function(){
    if ($(".dropdown").hasClass("open")) {
        $(".dropdown").removeClass("open");
    }

});

//浏览器后退
window.addEventListener('load', function() {
    window.addEventListener('popstate', function() {
        var _url = window.location.href,
            regx = /(#|javascript)/i;
        if( !regx.exec(_url) ){
            var $content = $( 'body' ).find('.ibox');
            startLoaded();
            $.ajax({
                url:_url,
                type:'get',
                success:function(res){
                    endLoaded();
                    window.url=_url;
                    $content.html(res);
                },
                error:function(res){
                    endLoaded();
                },
            });
        }
    });
});
