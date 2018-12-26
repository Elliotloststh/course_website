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
function admin_delete(arg) {
    var id = arg.toString();
    if(confirm("确认删除吗？") === true){
        $.ajax({
                type:"post",
                url:"admin_delete.php",
                async:true,
                data:
                    {
                        type:"notice",
                        id:id
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
            modal_content ="内容：<input type='text' id ='notice_content'><br>"
            break;
    }
    $("#add_notice").html(modal_content);

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
    }
    console.log(info);
    admin_insert(info);
}
