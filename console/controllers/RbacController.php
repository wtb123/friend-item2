<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
          $auth = Yii::$app->authManager;
          $auth->removeAll();

        // 添加 "deleteFriend" 权限
        $deleteFriend = $auth->createPermission('deleteFriend');
        $deleteFriend->description = '删除朋友圈';
        $auth->add($deleteFriend);

        // 添加 "viewFriend" 权限
        $viewFriend = $auth->createPermission('viewFriend');
        $viewFriend->description = '查看朋友圈';
        $auth->add($viewFriend);


        //添加"deleteComment"的权限
        $deleteComment=$auth->createPermission('deleteComment');
        $deleteComment->description='删除评论';
        $auth->add($deleteComment);

        //添加"viewComment"的权限
        $viewComment=$auth->createPermission('viewComment');
        $viewComment->description='查看评论';
        $auth->add($viewComment);

        //添加"friendAdmin"角色并赋予"updatePost""deletePost" "createPost"
        $friendAdmin=$auth->createRole('friendAdmin');
        $auth->add($friendAdmin);
        $auth->addChild($friendAdmin,$deleteFriend);
        $auth->addChild($friendAdmin,$viewFriend);


        //添加"commentAdmin"角色并赋予"approveComment"
        $commentAdmin=$auth->createRole('commentAdmin');
        $auth->add($commentAdmin);
        $auth->addChild($commentAdmin,$deleteComment);
        $auth->addChild($commentAdmin,$viewComment);


        // 添加 "admin" 角色并赋予其他角色拥有的权限
        $admin=$auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin,$friendAdmin);
        $auth->addChild($admin,$commentAdmin);

        //为用户指派角色。其中 1 和 2 是由 IdentityInterface::getId() 返回的id
        // 通常在你的 User 模型中实现这个函数。
        $auth->assign($admin,2);
        $auth->assign($friendAdmin,3);
        $auth->assign($commentAdmin,4);
    }
}
