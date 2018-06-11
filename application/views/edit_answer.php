<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>H+ 后台主题UI框架 - 写信</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=4.1.0" rel="stylesheet">
    <!-- Sweet Alert -->
    <link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-content mailbox-content">
                        <div class="file-manager">
                            <a class="btn btn-block btn-primary compose-mail" href="mail_compose.html">写信</a>
                            <div class="space-25"></div>
                            <h5>文件夹</h5>
                            <ul class="folder-list m-b-md" style="padding: 0">
                                <li>
                                    <a href="mailbox.html"> <i class="fa fa-inbox "></i> 收件箱 <span class="label label-warning pull-right">16</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailbox.html"> <i class="fa fa-envelope-o"></i> 发信</a>
                                </li>
                                <li>
                                    <a href="mailbox.html"> <i class="fa fa-certificate"></i> 重要</a>
                                </li>
                                <li>
                                    <a href="mailbox.html"> <i class="fa fa-file-text-o"></i> 草稿 <span class="label label-danger pull-right">2</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailbox.html"> <i class="fa fa-trash-o"></i> 垃圾箱</a>
                                </li>
                            </ul>
                            <h5>分类</h5>
                            <ul class="category-list" style="padding: 0">
                                <li>
                                    <a href="mail_compose.html#"> <i class="fa fa-circle text-navy"></i> 工作</a>
                                </li>
                                <li>
                                    <a href="mail_compose.html#"> <i class="fa fa-circle text-danger"></i> 文档</a>
                                </li>
                                <li>
                                    <a href="mail_compose.html#"> <i class="fa fa-circle text-primary"></i> 社交</a>
                                </li>
                                <li>
                                    <a href="mail_compose.html#"> <i class="fa fa-circle text-info"></i> 广告</a>
                                </li>
                                <li>
                                    <a href="mail_compose.html#"> <i class="fa fa-circle text-warning"></i> 客户端</a>
                                </li>
                            </ul>

                            <h5 class="tag-title">标签</h5>
                            <ul class="tag-list" style="padding: 0">
                                <li><a href="mail_compose.html"><i class="fa fa-tag"></i> 朋友</a>
                                </li>
                                <li><a href="mail_compose.html"><i class="fa fa-tag"></i> 工作</a>
                                </li>
                                <li><a href="mail_compose.html"><i class="fa fa-tag"></i> 家庭</a>
                                </li>
                                <li><a href="mail_compose.html"><i class="fa fa-tag"></i> 孩子</a>
                                </li>
                                <li><a href="mail_compose.html"><i class="fa fa-tag"></i> 假期</a>
                                </li>
                                <li><a href="mail_compose.html"><i class="fa fa-tag"></i> 音乐</a>
                                </li>
                                <li><a href="mail_compose.html"><i class="fa fa-tag"></i> 照片</a>
                                </li>
                                <li><a href="mail_compose.html"><i class="fa fa-tag"></i> 电影</a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 animated fadeInRight">
                <div class="mail-box-header">
                    <div class="pull-right tooltip-demo">
                        <button class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Send" onclick="xuq()"><i class="fa fa-reply"></i>保存</button>
                        <a href="mailbox.html" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="放弃"><i class="fa fa-times"></i>放弃</a>
                    </div>
                    <h2>
                    小猫咪的借口
                    </h2>
                </div>
                <div class="mail-box">


                    <div class="mail-body">

                        <form class="form-horizontal" method="get">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">id：</label>

                                <div class="col-sm-10">
                                    <?PHP
                                        echo '<input id="answerId" type="text" class="form-control" readonly="readonly" value="' . $answer->id . '">';
                                        ?>
                                </div>
                            </div>
                            <div class="form-group">

                                <label class="col-sm-2 control-label">热度：</label>

                                <div class="col-sm-10">
                                <?PHP
                                    echo '<input id = "hot" type="text" class="form-control" value="' . $answer->hot . '">';
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">创建者：</label>

                                <div class="col-sm-10">
                                <?PHP
                                    echo '<input type="text" class="form-control" readonly="readonly" value="' . $answer->creatorId . '">';
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">更新于：</label>

                                <div class="col-sm-10">
                                <?PHP
                                    echo '<input type="text" class="form-control" readonly="readonly" value="' . $answer->updateTime . '">';
                                    ?>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div class="mail-text h-200">

                        <div id = "answer" class="summernote">
                            <?PHP echo $answer->answer ; ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- 全局js -->
    <script src="js/jquery.min.js?v=2.1.4"></script>
    <script src="js/bootstrap.min.js?v=3.3.6"></script>



    <!-- 自定义js -->
    <script src="js/content.js?v=1.0.0"></script>

    <!-- Sweet alert -->
    <script src="js/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>

    <!-- SUMMERNOTE -->
    <script src="js/plugins/summernote/summernote.min.js"></script>
    <script src="js/plugins/summernote/summernote-zh-CN.js"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });


            $('.summernote').summernote({
                lang: 'zh-CN'
            });

        });
        var edit = function () {
            $('.click2edit').summernote({
                focus: true
            });
        };
        var save = function () {
            var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
            $('.click2edit').destroy();
        };

    </script>

    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
    <!--统计代码，可删除-->
    <script>
        function xuq(){
            console.log("----------");
            var answerId = $("#answerId").val();
            var hot = $("#hot").val();
            var answer = $(".summernote").code();
            console.log(answerId,hot,answer);
            console.log("+++++++++++++");
            saveAnswer(answerId,hot,answer);
           
        }
        function saveAnswer(answerId,hot,answer){
            console.log(answer);
            $.ajax({
                   type : "get",
                   url : "edit_answer/saveAnswer?answerId=" + answerId + "&answer=" + answer + "&hot=" + hot,
                   timeout : 3000,
                   dataType:"json",
                   success : function(response){
                        if(response.code = 1){
                            swal({
                                 title: "太帅了",
                                 text: "小猫咪的借口已经保存成功！",
                                 type: "success"
                                 });
                        } else{
                            swal("好伤心", "保存失败！", "error");
                   
                        }
                   },
                   error : function(){
                        swal("好伤心", "保存失败！", "error");
                   }
            });
        }
    
    </script>

</body>

</html>
