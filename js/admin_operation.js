function admin_insert(info) {

    $.ajax({
        type:"post",
        url:"admin_insert.php",
        async:true,
        // data:JSON.stringify(info),
        data:info,//是js obeject而不是json
        dataType:"text",
        success:function (code) {
            console.log(code);
            if(code==="200"){
                alert("添加成功！");
                window.location.reload();

            }else if(code === "502"){
                alert("添加失败！");
            }
        }
    })
}
function admin_delete(id,type) {
    // var id = id.toString();
    console.log(id.toString());
    if(confirm("确认删除吗？") === true){
        $.ajax({
                type:"post",
                url:"admin_delete.php",
                async:true,
                data:
                    {
                        type:type.toString(),
                        id:id.toString()
                    },
                dataType:"text",
                success:function (code) {
                    if(code==="200"){
                        alert("修改成功！");
                        window.location.reload();
                        // document.getElementById("content").

                    }else if(code === "502"){
                        alert("修改失败！");
                    }
                }
            }

        )
    }

}

function show_modal(arg) {
    var type = arg.toString();
    var modal_content;
    switch (type){
        case "notice":
            modal_content ="内容：<input type='text' id ='notice_content'><br>";
            $("#add_notice").html(modal_content);
            break;
        case "message":
            modal_content ="内容：<input type='text' id ='content'><br><br>发言人：<input type='text' id ='name'><br>";
            $("#add_message").html(modal_content);
            break;
        case "link":
            modal_content ="内容：<input type='text' id ='content'><br>";
            $("#add").html(modal_content);
            break;
        case "curriculum":
            modal_content ="课程名：<input type='text' id ='name'><br><br>课程介绍：<input type='text' id ='intro'><br>";
            $("#add").html(modal_content);
            break;
        case "account":
            modal_content ="账号类型：<input type='text' id ='atype'><br>" +
                "<br>用户名：<input id='user' type ='text'><br>"+
                "<br>密码：<input id='pswd' type ='text'><br>"+
                "<br>名称：<input id='name' type ='text'><br>"+
                "<br>学号：<input id='_number' type ='text'><br>"+
                "<br>电话：<input id='telephone' type ='text'><br>"+
                "<br>邮箱：<input id='email' type ='text'><br>"+
                "<br>介绍：<input id='intro' type ='text'><br>";
            $("#add").html(modal_content);
            break;
    }

}

function pack_add(arg) {
    var type = arg.toString();
    console.log(type);
    var info;
    switch (type){
        case"notice":
            info ={
                type:"notice",
                notice_content:$("#notice_content").val()};
            break;
        case "message":
            info={
                type:"message",
                content:$("#content").val(),
                name:$("#name").val()
            };
            break;
        case "link":
            info={
                type:"link",
                content:$("#content").val()
            };
            break;
        case "curriculum":
            info={
                type:"curriculum",
                name:$("#name").val(),
                intro:$("#intro").val()
            };
            break;
        case "account":
            info={
                type:"account",
                atype:$("#atype").val(),
                user:$("#user").val(),
                pswd:$("#pswd").val(),
                name:$("#name").val(),
                number:$("#_number").val(),
                telephone:$("#telephone").val(),
                email:$("#email").val(),
                intro:$("#intro").val()
            };
            break;
    }
    console.log(info);
    admin_insert(info);
}
