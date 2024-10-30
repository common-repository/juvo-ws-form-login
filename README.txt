=== JUVO Login for WS-Form ===
Contributors: juvodesign
Donate link: https://juvo-design.de
Tags: comments, spam
Requires at least: 5.6
Tested up to: 6.1
Stable tag: 1.0.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Integrates WS-Forms into the WordPress login system.

== Description ==
You love WSFrom and already use the user management add-on? Than this plugin will become handy. It connects the forms with the nativ login system.
The password reset url as well as the login url are automatically changed to your forms pages once set up.

== Frequently Asked Questions ==

= Is the Plugin compatible with the Members Plugin? =

Yes. The pages that are set up as login pages will not be blocked by hte members pages.

= How does this plugin integrate WSFrom with the WordPress login system? =

It allows you to set up a "Login", "Forgot Password" and "Reset Password" page. After that these pages are hooked into the `login_url` and `lostpassword_url`.

== Changelog ==
= 1.0.3 =
- Whitelist wsform rest calls within the members plugin
- Add registration page support

= 1.0.2 =
Fix wsform install check

= 1.0.1 =
Update dependencies and ci pipeline

= 1.0 =
Initial Release
