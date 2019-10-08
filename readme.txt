=== Github Card ===

Contributors: Neo
Plugin URI: https://github.com/ineo6/github-card
Tags: github, card
Requires at least: 3.9.0
Tested up to: 5.2.3
Stable tag: 1.0.0
Author URI: http://idayer.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Insert GitHub repository widget into you posts/pages.


== Description ==

Insert [GitHub](https://github.com/) repository into you posts/pages.

在 WordPress 文章/页面中嵌入 [GitHub](https://github.com/) 仓库卡片。

目前主要两个功能：

1. 短代码嵌入仓库卡片

[ghCard owner="ineo6" name="mini-deploy"]

2. 页面中嵌入用户和仓库卡片一览

<?php wp_github_card_user(array( 'user' => 'ineo6' ))?>

== Installation ==

1. Upload the plugin to your `/wp-content/plugins/` directory.
   上传插件到您的 WordPress 插件目录。

2. Activate the plugin through the 'Plugins' menu in WordPress.
   登录后台激活插件。

3. (Optional) Fill in your GitHub personal access token in plugin options page.
   （可选）在插件设置页面填写你的 GitHub 个人访问令牌。

== Screenshots ==

1. Github Card.
   仓库嵌入效果。

3. Generate a GitHub personal access token.
   生成 GitHub 个人访问令牌。


== Changelog ==

= 2.1.0 (2014-11-23) =
* Add GitHub authentication option.
* 增加 GitHub 认证选项。

= 2.0.2 (2014-11-04) =
* Update author's info and screenshot.
* 更新作者信息和截图。

= 2.0.1 (2014-09-03) =
* Back compatible with old shortcode syntax. Fix situation when repo info is wrong.
* 兼容旧版短码格式。处理仓库信息有误的情况。

= 2.0.0 (2014-09-02) =
* Completely rewritten. Fix bugs and improve usability. Compatible with WordPress visual style.
* 完全重写了代码。修复 bug，改善使用体验。兼容 WordPress 界面风格。

= 1.0.3 (2014-05-10) =
* Be compatible with GitHub API change.
* 修复 GitHub API 变更。

= 1.0.2 (2013-05-23) =
* Format numbers.
* 格式化数字。

= 1.0.1 (2013-05-23) =
* Add support to rich editor. Add support to language translation.
* 支持可视化编辑器。支持多语言。

= 1.0.0 (2013-05-22) =
* First drop.
* 发布第一个版本。


== Upgrade Notice ==

= 2.1.0 =
Add GitHub OAuth option.
增加 GitHub OAuth 认证选项。

= 2.0.2 =
Update author's info.
更新作者信息。

= 2.0.1 =
Back compatible with old shortcode syntax. Fix situation when repo info is wrong.
兼容旧版短码格式。处理仓库信息有误的情况。

= 2.0.0 =
Completely rewritten. Fix bugs and improve usability. Compatible with WordPress visual style.
完全重写了代码。修复 bug，改善使用体验。兼容 WordPress 界面风格。

= 1.0.3 =
Be compatible with GitHub API change.
修复 GitHub API 变更。

= 1.0.2 =
Format numbers.
格式化数字。

= 1.0.1 =
Add support to rich editor. Add support to language translation.
支持可视化编辑器。支持多语言。

= 1.0.0 =
Insert GitHub repository widget into you posts/pages.
向 WordPress 文章/页面中嵌入 GitHub 仓库挂件。
