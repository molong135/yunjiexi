{if !empty($_G['setting']['footer'])}
	{$_G['setting']['footer']|raw}
{else}
	<footer>
		<div class="container text-center">
			<p>© 2019 {if $_G['setting']['qq']}QQ：{$_G['setting']['qq']}{/if}</p>
			<p>
				<span><a href="{:url('index/index/index')}">素材解析</a></span>
				<span><a href="{:url('index/index/index')}">网站首页</a></span>
			</p>
			<p>本站内容完全来自于互联网，并不对其进行任何编辑或修改。本站用户不能侵犯包括他人的著作权在内的知识产权以及其他权利</p>
		</div>
	</footer>
{/if}
<script type="text/javascript" src="static/js/common.js"></script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?e58c2ac250afe009b339287bf35ce420";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

</body>
</html>
