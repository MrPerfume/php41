<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title>添加商品</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="<?php echo (C("BACK_CSS_URL")); ?>mine.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" charset="utf-8" src="<?php echo (C("PLUGIN_URL")); ?>ueditor/ueditor.config.js"></script>

    <script type='text/javascript'>
        UEDITOR_CONFIG.toolbars = [[
            'fullscreen', 'source', '|', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
            'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
            'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
            'directionalityltr', 'directionalityrtl', 'indent', '|',
            'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
            'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
            'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'map', 'gmap', 'insertframe', 'insertcode', 'webapp', 'pagebreak', 'template', 'background', '|',
            'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', '|',
            'inserttable', 'deletetable', 'insertparagraphbeforetable', '|',
        ]];

    </script>

    <script type="text/javascript" charset="utf-8" src="<?php echo (C("PLUGIN_URL")); ?>ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="<?php echo (C("PLUGIN_URL")); ?>ueditor/lang/zh-cn/zh-cn.js"></script>

    <script type="text/javascript" src="<?php echo (C("COMMON_URL")); ?>Js/jquery-1.11.3.min.js"></script>
</head>
<body>
<div class="div_head">
            <span>
                <span style="float:left">当前位置是：商品管理-》添加商品信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="<?php echo U('showlist');?>">【返回】</a>
                </span>
            </span>
</div>
<div></div>
<script type="text/javascript">
    //加载事件里边定义click事件
    $(function(){
        $('#tabbar-div span').click(function(){
            $('#tabbar-div span').attr('class','tab-back');//全部标签 变暗
            $(this).attr('class','tab-front');//当前被点击标签 高亮

            $('.table_a').hide();//全部table 变暗
            var idflag = $(this).attr('id');//当前被点击标签对应的table 高亮
            $('#'+idflag+"-tb").show();
        });
    });
</script>
<style type="text/css">
    #tabbar-div {
        background: none repeat scroll 0 0 #80BDCB;
        height: 27px;
        padding-left: 10px;
        padding-top: 1px;
    }
    #tabbar-div p {
        margin: 2px 0 0;
    }
    .tab-front {
        background: none repeat scroll 0 0 #BBDDE5;
        border-right: 2px solid #278296;
        cursor: pointer;
        font-weight: bold;
        line-height: 20px;
        padding: 4px 15px 4px 18px;
    }
    .tab-back {
        border-right: 1px solid #FFFFFF;
        color: #FFFFFF;
        cursor: pointer;
        line-height: 20px;
        padding: 4px 15px 4px 18px;
    }
    .tab-hover {
        background: none repeat scroll 0 0 #94C9D3;
        border-right: 1px solid #FFFFFF;
        color: #FFFFFF;
        cursor: pointer;
        line-height: 20px;
        padding: 4px 15px 4px 18px;
    }
</style>
<div id="tabbar-div">
    <p>
        <span id="general-tab" class="tab-front">通用信息</span>
        <span id="detail-tab" class="tab-back">详细描述</span>
        <span id="mix-tab" class="tab-back">其他信息</span>
        <span id="properties-tab" class="tab-back">商品属性</span>
        <span id="gallery-tab" class="tab-back">商品相册</span>
        <span id="linkgoods-tab" class="tab-back">关联商品</span>
        <span id="groupgoods-tab" class="tab-back">配件</span>
        <span id="article-tab" class="tab-back">关联文章</span>
    </p>
</div>
<div style="font-size: 13px;margin: 10px 5px">
    <form action="/index.php/Back/Goods/upd/goods_id/3.html" method="post" enctype="multipart/form-data">
        <input type="hidden" name='goods_id' value="<?php echo ($info["goods_id"]); ?>" />
        <table border="1" width="100%" class="table_a" id="general-tab-tb">
            <tr>
                <td>商品名称</td>
                <td><input type="text" name="goods_name" value="<?php echo ($info["goods_name"]); ?>"/></td>
            </tr>
            <tr>
                <td>商品价格</td>
                <td><input type="text" name="goods_price"  value="<?php echo ($info["goods_price"]); ?>"/></td>
            </tr>                    <tr>
            <td>商品logo图片</td>
            <td><input type="file" name="goods_logo_upd" />
                <?php if(!empty($info["goods_big_logo"])): ?><img src='<?php echo (C("SITE_URL")); echo ($info["goods_big_logo"]); ?>' width='200' height='200' alt=''/>
                    <span>如果选择上传新的logo图片，则会自动覆盖旧图片</span><?php endif; ?>

            </td>
        </tr>
        </table>
        <table border="1" width="100%" class="table_a" id="detail-tab-tb"
               style="display:none;"
        >
            <tr>
                <td>商品详细描述</td>
                <td>
                    <textarea name="goods_introduce" id='goods_introduce' style="width:730px;height:320px;"><?php echo ($info["goods_introduce"]); ?></textarea>
                </td>
            </tr>
            <script type='text/javascript'>
                var ue = UE.getEditor('goods_introduce');
            </script>
        </table>
        <table border="1" width="100%" class="table_a" id="mix-tab-tb"
               style="display:none;"
        >
            <tr>
                <td>商品重量</td>
                <td><input type="text" name="goods_weight" /></td>
            </tr>
        </table>
        <table border="1" width="100%" class="table_a" id="properties-tab-tb"
               style="display:none;"
        >
            <tr>
                <td>商品相关属性</td>
                <td></td>
            </tr>
        </table>
        <script type="text/javascript">
            function add_item(){
                //增加相册的项目
                var s = "<tr><td><span style='cursor:pointer;' onclick='$(this).parent().parent().remove()'>[-]</span>商品相册</td><td><input type='file' name='goods_pics_upd[]' /></td></tr>";
                $('#gallery-tab-tb').append(s);
            }
        </script>
        <table border="1" width="100%" class="table_a" id="gallery-tab-tb"
               style="display:none;">

            <?php if(!empty($picsinfo)): ?><style type='text/css'>li{float:left;}li{list-style:none;}
                </style>
                <script type="text/javascript">
                    function del_pics(pics_id){
                        //通过ajax进行下一步操作，触发服务器端unlink删除物理图片
                        $.ajax({
                            url:"<?php echo U('delPics');?>",
                            data:{"pics_id":pics_id},
                            //dataType:,
                            //type:,
                            success:function(msg){
                                //alert(msg);
                                //删除页面上相关的相册节点
                                $('#pics_'+pics_id).remove();
                            }
                        });
                    }
                </script>
                <tr>
                    <td colspan='100'>
                        <ul>
                            <?php if(is_array($picsinfo)): foreach($picsinfo as $key=>$v): ?><li id="pics_<?php echo ($v["id"]); ?>"><img src='<?php echo (C("SITE_URL")); echo ($v["pics_big"]); ?>' alt='' width='100' height='100'/>
                                    <span style='cursor:pointer;' onclick='if(confirm("确实要删除该相册图片么？")){del_pics(<?php echo ($v["id"]); ?>)}'>[-]</span>
                                </li><?php endforeach; endif; ?>
                        </ul>
                    </td>
                </tr><?php endif; ?>

            <tr>
                <td><span style='cursor:pointer;' onclick="add_item()">[+]</span>商品相册</td>
                <td><input type='file' name='goods_pics_upd[]' /></td>
            </tr>

        </table>
        <table width="100%">
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="修改" />
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>