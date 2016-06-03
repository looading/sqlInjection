## 输入
```bash
陈天壹' union all select 1,2,3,4,5 #

陈天壹' union all select 1,2,3,@@version,5 #


陈天壹' union all select 1,2,3,4,5 #

陈天壹' union all select 1,2,3,name,5 from user#

```

## 解决办法
```bash
1、参数化
mysql_real_escape_string
$name = $mysqli->real_escape_string($name); //转义
echo $name;

打开magic_quotes_gpc来防止SQL注入 php.ini中有一个设置：magic_quotes_gpc = Off    
这个默认是关闭的，如果它打开后将自动把用户提交对sql的查询进行转换，   
比如把 ' 转为 \'等，对于防止sql注射有重大作用。      
如果magic_quotes_gpc=Off，则使用addslashes()函数
2、过滤文本
正则替换
3、前端过滤
等。。。
```