# wp-js-info

Access to some WordPress data/info from JavaScript

---

### About

Once installed and activated, provides access to some wordpress data/info via `window.wpJsInfo` object.

### Why?

Sometimes I need to execute some snippets of JS only on particular pages/posts.

The suggested WordPress way of passing data from PHP to JavaScript is via parameter of [wp_localize_script()](https://codex.wordpress.org/Function_Reference/wp_localize_script).
I feel this a bit hack-ish as the real intend of the function is for pass localization strings to use in Javascript.

### Example

`window.wpJsInfo`

![screenshot](http://i.imgur.com/Hu29k9g.png)

`window.wpJsInfo.post`

![screenshot](http://i.imgur.com/6ljvDSI.png)

... and so on

### License

MIT

:)