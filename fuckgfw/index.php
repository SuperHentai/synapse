<!DOCTYPE html>
<html>
  <?php
  include('header.php');
  include ('logo.php');
  require_once("dbConn.php");
  if($_SERVER['REQUEST_METHOD']=="POST"){
      function getIP() {
          if (getenv('HTTP_CLIENT_IP')) {
              $ip = getenv('HTTP_CLIENT_IP');
          }
          elseif (getenv('HTTP_X_FORWARDED_FOR')) {
              $ip = getenv('HTTP_X_FORWARDED_FOR');
          }
          elseif (getenv('HTTP_X_FORWARDED')) {
              $ip = getenv('HTTP_X_FORWARDED');
          }
          elseif (getenv('HTTP_FORWARDED_FOR')) {
              $ip = getenv('HTTP_FORWARDED_FOR');

          }
          elseif (getenv('HTTP_FORWARDED')) {
              $ip = getenv('HTTP_FORWARDED');
          }
          else {
              $ip = $_SERVER['REMOTE_ADDR'];
          }
          return $ip;
      }
      if(isset($_POST['author'])){
          if(isset($_POST['content'])){
              $time = time();
              $content = htmlspecialchars($_POST['content'],ENT_COMPAT);
              $author = htmlspecialchars($_POST['author'],ENT_COMPAT);
              $display =1;
              $ip = getIP();
              $hash = md5($author.$content.$time.$ip);
              $sql = sprintf("insert into comment (author,content,time,display,ip,hash) VALUES ('%s','%s','%s',%d,'%s','%s')",$author,$content,$time,$display,$ip,$hash);
              $result = mysql_query($sql,dbConn());
              $postStatus = "success";

          }
      }
  }

  ?>
  <div align="center" style="width:75%;margin-left: auto;margin-right: auto;">
  <div align="center" class="alert alert-success" role="alert"><p><h4><strong>交流QQ群：325928205</strong</h4></p></div>
  <div align="center" class="alert alert-danger" role="alert"><p><h4><strong>警告：</strong>据相关报告，360系列产品存在主动上报翻墙软件等恶意行为！<br />请在使用本翻墙工具的时候务必关闭360系列软件以及一些国产安全软件</h4></p></div>
  <div class="panel panel-success" align="left">
      <div class="panel-heading">
          <div align="left">
              <button type="button" class="button button-glow button-border button-rounded button-primary button-large" data-toggle="modal" data-target="#myModal">留言</button>
          </div>
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">发表留言</h4>
                      </div>
                      <form name="comment" id="comment" method="post" onsubmit="return checkComment()">
                          <div class="modal-body">
                              <div id="authordiv" align="left"><p><label for="author">显示名称：</label><input name="author" id="author" type="text" class="form-control" placeholder="输入你想对外显示的名称"></p></div>
                              <div  align="left"><label for="author">留言内容：</label></div>
                              <div id="contentdiv"><textarea name="content" id="content" class="form-control" rows="5" placeholder="请输入留言内容"></textarea></div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                              <button type="submit" class="btn btn-primary">发表留言</button>
                          </div>

                      </form>
                  </div>
              </div>
          </div>
      </div>
      <div class="panel-body">
          <?php

            $sql = "select count(*) from comment";
            $rawNum = mysql_query($sql,dbConn());
            $numArray = mysql_fetch_array($rawNum);
            for($i=1;$i<=$numArray[0];$i++){
                $count = $numArray[0]-$i+1;
                $sql = "select * from comment where id=$count";
                $rawResult = mysql_query($sql,dbConn());
                $result = mysql_fetch_array($rawResult);
                if($result['display']==1){
                    $author = htmlspecialchars($result['author'],ENT_COMPAT);
                    $content = htmlspecialchars($result['content'],ENT_COMPAT);
                    $date = date("Y年m月d日 H:i:s",$result['time']);
                    $num = $result['id'];
                    $comment = sprintf("<div class=\"panel panel-default\">
                                          <div class=\"panel-heading\"><strong>#%d&nbsp;</strong>&nbsp;%s&nbsp;|&nbsp;%s</div>
                                          <div class=\"panel-body\">%s</div>
                                          </div>",$num,$author,$date,$content);
                    echo $comment;
                }
            }
          ?>

      </div>


  </div>
  </div>
<script>
    function checkComment(){
        var author;
        var content;
        author = document.getElementById("author").value;
        content = document.getElementById("content").value;


        if(author==""){
            document.getElementById("authordiv").setAttribute("class","has-error");
            document.getElementById("author").setAttribute("placeholder","请输入要对外显示的发布者名称");

            return false;
        }else{
            if(content==""){
                document.getElementById("contentdiv").setAttribute("class","has-error");
                document.getElementById("content").setAttribute("placeholder","请输入留言内容");

                return false;
            }else{

                return true;
            }
        }

    }
</script>
<?php
include('footer.php');
?>    
	</body>
	</html>

