<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:71:"E:\wamp\www\phpfile\tp5\public/../application/index\view\lst\index.html";i:1508754462;s:75:"E:\wamp\www\phpfile\tp5\public/../application/index\view\common\header.html";i:1508755752;s:74:"E:\wamp\www\phpfile\tp5\public/../application/index\view\common\right.html";i:1508331283;s:75:"E:\wamp\www\phpfile\tp5\public/../application/index\view\common\footer.html";i:1505732199;}*/ ?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Tp5练习</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="童老师ThinkPHP交流群：484519446" />
<meta name="description" content="童老师ThinkPHP交流群：484519446" /> 
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link href="__PUBLIC__/style/lady.css" type="text/css" rel="stylesheet" />
<!-- <link href="__PUBLIC__/style/bootstrap.css" rel="stylesheet"> -->
<link id="beyond-link" href="__PUBLIC__/style/beyond.css" rel="stylesheet" type="text/css">
<script type='text/javascript' src='images/js/ismobile.js'></script>
<script type='text/javascript' src='__PUBLIC__/style/bootstrap.js'></script>
</head>
<body>
     <div class="ladytop">
            <div class="nav">
                <div class="left"><a href="<?php echo url('Index/index'); ?>"><img src="__PUBLIC__/images/hunshang.png" alt="wed114婚尚"></a></div>
                <div class="right">
                <div class="box">
                <?php if(is_array($cates) || $cates instanceof \think\Collection || $cates instanceof \think\Paginator): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <a href="<?php echo url('Lst/index',array('cateid'=>$v['id'])); ?>"  rel='dropmenu209'><?php echo $v['catename']; ?></a> 
                <?php endforeach; endif; else: echo "" ;endif; ?>
                 </div>
                </div>
            </div>
        </div>
        <div class="hotmenu">
            <div class="con">热门标签：
                <?php if(is_array($tags) || $tags instanceof \think\Collection || $tags instanceof \think\Paginator): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <a href="<?php echo url('Lst/index',array('tagid'=>$v['id'])); ?>"  rel='dropmenu209'><?php echo $v['tagname']; ?></a> 
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>

<!--顶部通栏-->
	<div class="position">
	<a href="<?php echo url('index/Index'); ?>" target="_blank">主页</a> > <a href='<?php echo url('Lst/index',array('cateid'=>$cid)); ?>'><?php echo $catename; ?></a> >  
	</div>

	<div class="overall">

		<div class="left">
				<?php if(is_array($articles) || $articles instanceof \think\Collection || $articles instanceof \think\Paginator): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
					
				<div class="xnews2">
					<div class="pic">
					<a target="_blank" href="<?php echo url('Article/index',array('aid'=>$v['id'])); ?>">
					<img src="__IMG__<?php echo $v['pic']; ?>" alt="在家如何自制烤肉 烤肉串致癌不适宜多吃"/></a>
					</div>
					<div class="dec">
						<h3><a target="_blank" href="<?php echo url('Article/index',array('aid'=>$v['id'])); ?>"><?php echo $v['title']; ?></a></h3>
						<div class="time">发布时间：<?php echo date("Y-m-d",$v['time']); ?></div>
						<p><?php echo $v['desc']; ?></p>
						<div class="tags"><?php echo $v['keywords']; ?></div>
					</div>
				</div>
				<?php endforeach; endif; else: echo "" ;endif; ?>
					<div class="pages">
						<div class="plist" >
							<?php echo $pages; ?>
						</div>
					</div>
		</div>
		<!--右侧各种广告-->
                <!--猜你喜欢-->
		<div class="right">
                
			<div id="hm_t_57953"><div style="display: block; margin: 0px; padding: 0px; float: none; clear: none; overflow: hidden; position: relative; border: 0px none; background: transparent none repeat scroll 0% 0%; max-width: none; max-height: none; border-radius: 0px; box-shadow: none; transition: none 0s ease 0s ; text-align: left; box-sizing: content-box; width: 300px;">
			<div class="hm-t-container" style="width: 298px;"><div class="hm-t-main"><div class="hm-t-header">热门点击</div><div class="hm-t-body">
			<ul class="hm-t-list hm-t-list-img">
			<?php if(is_array($rmclick) || $rmclick instanceof \think\Collection || $rmclick instanceof \think\Paginator): $i = 0; $__LIST__ = $rmclick;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<li class="hm-t-item hm-t-item-img"><a data-pos="0" title="<?php echo $vo['title']; ?>" target="_blank" href="<?php echo url('Article/Index',array('aid'=>$vo['id'])); ?>" class="hm-t-img-title" style="visibility: visible;"><span><?php echo $vo['title']; ?></span></a></li>
			<?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			</div></div></div>

			</div></div>
			<div style="height:15px"></div>
			<div id="hm_t_57953"><div style="display: block; margin: 0px; padding: 0px; float: none; clear: none; overflow: hidden; position: relative; border: 0px none; background: transparent none repeat scroll 0% 0%; max-width: none; max-height: none; border-radius: 0px; box-shadow: none; transition: none 0s ease 0s ; text-align: left; box-sizing: content-box; width: 300px;">
			<div style="width: 298px;" class="hm-t-container"><div class="hm-t-main"><div class="hm-t-header">推荐阅读</div><div class="hm-t-body">
			<ul class="hm-t-list hm-t-list-img">
			<?php if(is_array($tjarticles) || $tjarticles instanceof \think\Collection || $tjarticles instanceof \think\Paginator): $i = 0; $__LIST__ = $tjarticles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<li class="hm-t-item hm-t-item-img"><a style="visibility: visible;" class="hm-t-img-title" href="<?php echo url('Article/Index',array('aid'=>$vo['id'])); ?>" target="_blank" title="<?php echo $vo['title']; ?>" data-pos="0"><span><?php echo $vo['title']; ?></span></a></li>
			<?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			</div></div></div>

			</div></div>
			<div style="height:15px"></div>

			<div id="bdcs"><div class="bdcs-container"><meta content="IE=9" http-equiv="x-ua-compatible">   <!-- 嵌入式 -->  <div id="default-searchbox" class="bdcs-main bdcs-clearfix">      <div id="bdcs-search-inline" class="bdcs-search bdcs-clearfix">          <form id="bdcs-search-form" autocomplete="off" class="bdcs-search-form" target="_blank" method="get" action="">              <input type="hidden" value="10711555151249188672" name="s">              <input type="hidden" value="1" name="entry">                                              <input type="hidden" value="gbk" name="ie">                                                          <input type="text" placeholder="请输入关键词" id="bdcs-search-form-input" class="bdcs-search-form-input" name="q" autocomplete="off" style="line-height: 30px; width:220px;">              <input type="submit" value="搜索" id="bdcs-search-form-submit" class="bdcs-search-form-submit bdcs-search-form-submit-magnifier">                       </form>      </div>                <div id="bdcs-search-sug" class="bdcs-search-sug" style="top: 552px; width: 239px;">              <ul id="bdcs-search-sug-list" class="bdcs-search-sug-list"></ul>          </div>                  </div>                           </div></div>

			<div style="height:15px"></div>


                
            </div>
	</div>
	<!-- 底部 -->
	<div class="footerd">
<ul>
<li>Copyright &#169; 2008-2016  all rights reserved 版权所有   <a href="http://www.miibeian.gov.cn" target="_blank" rel="nofollow">蜀icp备08107937号</a></li> 
</ul>
</div>

	<div style="display:none;">
			<script src='goto/my-65537.js' language='javascript'></script><script src="images/js/count_zixun.js" language="JavaScript"></script>
	</div>
</body>
</html>