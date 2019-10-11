=== Card For GitHub ===
Contributors: neo
Tags: GitHub,card,code
Requires at least: 4.0
Tested up to: 5.2.3
Requires PHP: 5.6
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add [GitHub](https://github.com/) repository card into your posts.

== Description ==

Add [GitHub](https://github.com/) repository card into your posts.

在 WordPress 文章/页面中嵌入 [GitHub](https://github.com/) 仓库卡片。

目前主要两个功能：

1. 短代码嵌入仓库卡片

[ghCard owner="ineo6" name="mini-deploy"]

2. 页面中嵌入用户和仓库卡片一览

`<?php wp_github_card_user(array( 'user' => 'ineo6' ))?>`

== Installation ==

1. Upload the plugin to your `/wp-content/plugins/` directory.
   上传插件到您的 WordPress 插件目录。

2. Activate the plugin through the 'Plugins' menu in WordPress.
   登录后台激活插件。

3. (Optional) Fill in your GitHub personal access token in plugin options page.
   （可选）在插件设置页面填写你的 GitHub 个人访问令牌。

== Screenshots ==

1. Github Card
2. Generate a GitHub personal access token

== Changelog ==

= 1.0 (2019-10-01) =
* First release.