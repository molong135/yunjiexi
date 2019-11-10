<div class="page__bd" style="height: 100%">
    <div class="weui-tab">
        <div class="weui-tab__panel">

            <div class="weui-panel__bd jiexi_list" style="">

            </div>
        </div>
        {include file="common/tab"}
    </div>
</div>
<style>
    .jiexi_list{
        background: #fff;
        color: #000
    }
    .weui-media-box__title{
        font-size: 15px;
    }
</style>
<script>

    var page=1;
    var reQuestTyep=true;

    function ajax_request(){
        reQuestTyep =false;
        $.post("{:url('wap/index/parseListJson')}", {page:page}, function(data) {
            if(data.status==200 && data.data.length>0){
                parse_tpl(data.data)
            } else if(data.status==200 && data.data.length==0){
                    return false
            }else{
                alert(data.msg)
            }
            return  false
        },'json');
    }
    function scrollIndexLIst(){

    }
    function parse_tpl(data) {

        var str_html = ''
        for (j in data){
            str_html+='<div class="weui-media-box weui-media-box_text">'
            str_html+='    <h4 class="weui-media-box__title new_title">来源：'+data[j].title+'</h4>'
            str_html+='    <p class="weui-media-box__desc">解析地址：'+data[j].parse_url+'</p>'
            str_html+='    <p class="weui-media-box__desc">解析时间：'+data[j].create_time+'</p>'
            if(data[j].status==1){
                str_html+='    <p class="weui-media-box__desc">解析状态：成功</p>'
            }else{
                str_html+='    <p class="weui-media-box__desc">解析状态：失败</p>'
            }


            str_html+='</div>'
        }
        $('.jiexi_list').append(str_html)

        reQuestTyep=true
        page++

        
    }
    ajax_request();


    $(function () {
        $(window).scroll(function () {
            alert(111)
        })
    })
    $('.weui-tab__panel').scroll(function () {
        var nDivHight = $(".weui-tab__panel").height();
        nScrollHight = $(this)[0].scrollHeight;
        nScrollTop = $(this)[0].scrollTop;
        if(nScrollTop + nDivHight >= nScrollHight){
            if(reQuestTyep==true){
                ajax_request();
            }
        }
    })


</script>