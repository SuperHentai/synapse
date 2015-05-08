<!DOCTYPE html>
<html>
<?php
include('header.php');
include ('logo.php');
//require_once("dbConn.php");

?>
<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div align="center" style="width:55%;margin-left: auto;margin-right: auto;" class="row">
        <div style="margin-right: 20px;margin-left: 20px">
            <table class="table" align="center" valign="center">
                <tr style="height: 70px">
                    <th width="33%"></th><th width="33%">普通型</th><th width="33%">高级型</th>
                </tr>
                <tr>
                    <td>线路</td><td>美国西海岸/东海岸/日本东京</td><td>任意</td>
                </tr>
                <tr>
                    <td>带宽分配</td><td>共享</td><td>独享</td>
                </tr>
                <tr>
                    <td>流量</td><td>不限，但受公平使用原则约束，月流量超过50GB以后，高峰时期分配带宽将下降</td><td>无限</td>
                </tr>
                <tr>
                    <td>允许同时用户数</td><td> 1（包括1 PC+1 Android+1 OS X）</td><td>按照情况商议而定</td>
                </tr>
                <tr>
                    <td>价格</td><td>￥15.00/月<br />￥40.00/季度</td><td>￥50.00/月<br />￥130.00/季度</td>
                </tr>
                <tr>
                    <td></td><td><div align="center"><p><a class="button button-glow button-border button-rounded button-primary button-large" href="./webserver.php" target="_blank" role="button">购买</a></div></td>
                    <td><div align="center"><p><a class="button button-glow button-border button-rounded button-primary button-large" href="./webserver.php" target="_blank" role="button">购买</a></div></td>
                </tr>
            </table>
        </div>
    </div>

</div>
<?php
include('footer.php');
?>
</body>
</html>

