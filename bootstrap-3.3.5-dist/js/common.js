/**
 * Created by zhangmingwen on 15/12/25.
 */

/*
tooltip 鼠标放在按钮上提示信息的提示框
按钮内部设置属性例子:
 <button type="button"
 class="btn btn-default"
 data-toggle="tooltip"
 data-placement="left"
 data-original-title="提示框居左"
 title="">
 提示框居左
 </button>
*/
$(function(){
    //按钮内部设置属性
    $('[data-toggle="tooltip"]').tooltip();
    //按钮外部设置属性方法（此处为重置密码按钮的调用）
    $('.rePassword').tooltip({
        title:"重置密码为abc123",
        placement:'right'
    });
    //列表显示的标题分类
    $('.num').tooltip({
        title:"序号",
        placement:'top'
    });
    $('.name').tooltip({
        title:"名称",
        placement:'top'
    });
    $('.email').tooltip({
        title:"用户邮箱",
        placement:'top'
    });
    $('.section').tooltip({
        title:"部门",
        placement:'top'
    });
    $('.password').tooltip({
        title:"用户密码",
        placement:'top'
    });
    $('.admin').tooltip({
        title:"管理员权限",
        placement:'top'
    });
    $('.block').tooltip({
        title:"冻结用户",
        placement:'top'
    });
    $('.control').tooltip({
        title:"操作",
        placement:'top'
    });
    $('.del').tooltip({
        title:"删除",
        placement:'right'
    });
    $('.edit').tooltip({
        title:"编辑",
        placement:'left'
    });
    $('.newUer').tooltip({
        title:"增加新用户",
        placement:'left'
    });
    $('.root').tooltip({
        title:"禁止修改",
        placement:'right'
    });
    $('.details').tooltip({
        title:"详情",
        placement:'top'
    });
    $('.newSection').tooltip({
        title:"增加新部门",
        placement:'left'
    });
    $('.location').tooltip({
        title:"地点",
        placement:'top'
    });
    $('.summary').tooltip({
        title:"摘要",
        placement:'top'
    });
    $('.time').tooltip({
        title:"时间",
        placement:'top'
    });
    $('.participant').tooltip({
        title:"参与者",
        placement:'top'
    });
    $('.compere').tooltip({
        title:"主持人",
        placement:'top'
    });
    $('.scorer').tooltip({
        title:"记录员",
        placement:'top'
    });
    $('.newRecord').tooltip({
        title:"增加新会议记录",
        placement:'left'
    });


});


//模态框,弹出层

