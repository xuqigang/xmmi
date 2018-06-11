<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>H+ 后台主题UI框架 - 项目</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.css?v=4.4.0" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=4.1.0" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-sm-12">

                <div class="ibox">
                    <div class="ibox-title">
                        <h5>小猫咪的疑问：<?php echo $problem->problem ?> ?</h5>
                        <div class="ibox-tools">
                            <a href="#" class="btn btn-primary btn-xs">创建新借口</a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row m-b-sm m-t-sm">
                            <div class="col-md-1">
                                <button type="button" id="loading-example-btn" class="btn btn-white btn-sm"><i class="fa fa-refresh"></i> 刷新</button>
                            </div>
                            <div class="col-md-11">
                                <div class="input-group">
                                    <input type="text" placeholder="请输入借口" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-primary"> 搜索</button> </span>
                                </div>
                            </div>
                        </div>

                        <div class="project-list">

                            <table class="table table-hover">
                                <tbody id = "problemList" >
                                    <?php
                                        $length = count($answerList);
                                        for($i = 0; $i < $length; $i ++){
                                            $answer = $answerList[$i];
                                            echo '<tr id ="answer' . $answer->id . '" >';
                                            echo '<td class="project-status"><span class="label label-primary">小猫咪</td>';
                                            echo '<td class="project-title">' . $answer->answer . '<br/><small>更新于   ' . $answer->updateTime . '</small></td>';
                                            echo '<td class="project-actions"><a href="javascript:void(0)" class="btn btn-white btn-sm" onclick="editAnswer(' . $answer->id . ',' . $answer->hot . ',\'' . htmlspecialchars($answer->answer,ENT_QUOTES) .  '\')"><i class="fa fa-pencil"></i> 编辑 </a></td>';
                                            echo '</tr>';
                                        }
                            
                                        ?>


                                </tbody>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="modal-form" class="modal fade" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="m-t-none m-b">爱找借口的小猫咪</h3>
                        <p>正在编辑(⊙o⊙)</p>
                        <div class="form-group">
                            <label>id：</label>
                            <input id="edit_form_id" type="text" class="form-control" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label>热度：</label>
                            <input id="edit_form_hot" type="text" placeholder="热度" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>答案：</label>
                                <input id="edit_form_answer" type="text" placeholder="小猫咪的借口" class="form-control">
                            </div>
                        <div>
                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" onclick="saveAnswer()"><strong>保存</strong>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 全局js -->
    <script src="js/jquery.min.js?v=2.1.4"></script>
    <script src="js/bootstrap.min.js?v=3.3.6"></script>

    <!-- Sweet alert -->
    <script src="js/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- 自定义js -->
    <script src="js/content.js?v=1.0.0"></script>


    <script>
        $(document).ready(function(){

            $('#loading-example-btn').click(function () {
                btn = $(this);
                simpleLoad(btn, true)

                // Ajax example
//                $.ajax().always(function () {
//                    simpleLoad($(this), false)
//                });

                simpleLoad(btn, false)
            });
        });

        function simpleLoad(btn, state) {
            if (state) {
                btn.children().addClass('fa-spin');
                btn.contents().last().replaceWith(" Loading");
            } else {
                setTimeout(function () {
                    btn.children().removeClass('fa-spin');
                    btn.contents().last().replaceWith(" Refresh");
                }, 2000);
            }
        }
    </script>
    <script>
        function editAnswer(answerId,hot,answer){
            $('#edit_form_id').val(answerId);
            $('#edit_form_hot').val(hot);
            $('#edit_form_answer').val(answer);
            $('#modal-form').modal('show');
            console.log(hot);
        }
function saveAnswer(){
    var answerId = $('#edit_form_id').val();
    var hot = $('#edit_form_hot').val();
    var answer =$('#edit_form_answer').val();
    $('#modal-form').modal('hide');
    console.log(answer);
    $.ajax({
           type : "get",
           url : "edit_answer/saveAnswer?answerId=" + answerId + "&answer=" + answer + "&hot=" + hot,
           timeout : 3000,
           dataType:"json",
           success : function(response){
           if(response.code = 1){
           
           var trId = '#answer' + answerId;
           var html = '<td class="project-status"><span class="label label-primary">小猫咪</td><td class="project-title">' + answer + '<br/><small>更新于 ' + response.data + ' </small></td><td class="project-actions"><a href="javascript:void(0)" class="btn btn-white btn-sm" onclick="editAnswer(' + answerId + ',' + hot + ',\'' + answer + '\')"><i class="fa fa-pencil"></i> 编辑 </a></td>';
           $(trId).html(html);
           console.log("*******" + $(trId) + "************");
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
    return;
    
}
    </script>
    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script><!--统计代码，可删除-->

    </body>
</html>
