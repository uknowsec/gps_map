
# 项目说明

服务端`server.php`接收GPS模块数据进行处理存入数据，`setPoint.php`和`json.php`查询得到数据库GPS数据，`index.html`通过`ajax`请求`setPoint.php`和`json.php`中的GPS数据通过百度地图API进行显示以及表格形式输出。


# 文件说明

```
map/
├── map 
│   ├── css
│   │   ├── icon.css
│   │   ├── weui2.css
│   │   └── weui.css
│   ├── index.html
│   ├── js
│   │   ├── correction.js
│   │   ├── jquery-1.6.2.js
│   │   └── zepto.min.js
│   ├── json.php
│   └── setPoint.php
├── map.sql
└── server.php
```

- js文件夹中的`correnction.js`文件是用来把GPS经纬度坐标转化为百度地图坐标的关键函数文件。
- `server.php`文件时服务端文件，通过php命令行的形式启动`php server.php`监听UDP端口接收GPS模块发来的GPS数据。
- `map`文件为GPS数据在百度地图显示的WEB目录文件。
- `map.sql`为数据库文件。

