<?php
/**
 * Created by PhpStorm.
 * User: 黄亦非
 * Date: 2018/12/15
 * Time: 22:17
 */
session_start();
require("sidebar_home.php");
?>
    <!--    右侧工作区  -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>教师简介</h4>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">邢卫</a>
                            </li>
                            <li><a href="#profile" data-toggle="tab">金波</a>
                            </li>
                            <li><a href="#messages" data-toggle="tab">林海</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="home">
                                <h5 style="margin: 10px;line-height: 30px">
                                    &#12288;&#12288;邢卫，男，1967年生，浙江大学计算机科学与技术学院博士，副教授，硕士生导师。1992年起先后在浙江大学工业控制技术国家实验室、浙江大学信息学院控制科学与工程系、浙江大学计算机科学与技术学院任职；1994年晋升讲师，2000年12月晋升副教授；2011年2月至2012年7月作为援疆干部，任塔里木大学信息工程学院副院长，学校信息化工作领导小组办公室常务副主任。近年来，作为课题负责人承担国家科技支撑计划项目课题“动漫内容的发布交易技术与服务”和浙江省重大科技计划项目“数字媒体网络家庭智能终端研究与开发”、“多层次职业技术教育网络平台研究与应用示范”等多项；作为技术负责人或主要骨干承担国家自然科学基金重点项目“数字媒体网络系统及关键技术研究”、国家科技支撑计划项目“现代农村信息化关键技术研究与示范”项目“基层农村综合信息服务技术集成与应用”课题、教育部“百万册数字图书服务系统IPv6升级”项目、浙江省重大科技攻关项目“浙江省信息化科技村镇建设与示范”、“农村党员干部现代远程教育工程关键技术与设备研究及其应用”等多项。获得科研成果3项、获省部级科技奖励2项，获发明专利授权4项，发表学术论文20余篇，持有软件著作权20余项。主要研究方向包括计算机网络技术和多媒体技术。近十年已有30多位研究生在他指导下毕业并获得学位。
                                </h5>
                            </div>
                            <div class="tab-pane fade" id="profile">
                                <h5 style="margin: 10px;line-height: 30px">
                                    副教授，1971年6月生，工学博士。主要从事电液控制系统与深海机电装备的研究工作，共在国内外学术刊物与国际会议上发表论文60余篇，其中作为第一作者或通讯作者被SCI收录5篇，EI收录15篇，ISTP收录5篇。作为第一、二发明人获得国家发明专利、软件著作权共8项。作为主要完成人获得国家技术发明奖二等奖一项，省部级科技进步一等奖两项...
                                </h5>
                            </div>
                            <div class="tab-pane fade" id="messages">
                                <h5 style="margin: 10px;line-height: 30px">
                                    主要从事计算机图形学、科学计算可视化、虚拟现实等方面的研究，承担国家自然科学基金项目三项，国家863科技计划项目二项，军工项目多项。目前的研究工作具体主要在：高分辨率多屏拼接显示技术;体数据可视化算法研究;医学数据可视化;基于CPU/GPU混合集群的大规模体数据可视化;基于图形加速的计算电磁学等方面。
                                </h5>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="../vendor/raphael/raphael.min.js"></script>
<script src="../vendor/morrisjs/morris.min.js"></script>
<script src="../data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
