<?php
namespace Admin\Controller;

use Think\Controller;
class TypeController extends CommonController
{
    public function index()
    {
        $Plate = M('plate');
        //记录数
        $count = $Plate->count();
        //显示数
        $showNum = 10;
        //最大页数
        $maxPage = ceil($count / $showNum);
        //纠正当前页
        $_GET['p'] = $_GET['p'] < 1 ? 1 : $_GET['p'];
        $_GET['p'] = $_GET['p'] > $maxPage ? $maxPage : $_GET['p'];
        //获取分类
        $arr = $this->getPlateList();
        //实例化分页类
        $Page = new \Think\Page($count, $showNum);
        //获取分页html代码
        $show = $Page->show();
        $this->assign('p', $_GET['p'] - 1);
        $this->assign('showNum', $showNum);
        $this->assign('page', $show);
        $this->assign('arr', $arr);
        $this->display();
    }
    public function getPlateList($pid = 0, &$data = array(), $i = 0)
    {
        $plate = M('plate');
        $arr = $plate->query("select * from " . C('DB_PREFIX') . "plate  where pid={$pid} order by createDate asc");
        $i += 5;
        foreach ($arr as $key => $val) {
            if ($val['pid'] != 0) {
                $val['title'] = str_repeat('&nbsp;', $i) . "|--" . $val['title'] . "--";
            } else {
                $val['f'] = true;
            }
            $data[] = $val;
            $this->getPlateList($val['id'], $data, $i);
        }
        return $data;
    }
    public function Add()
    {
        if (empty($_POST)) {
            //显示
            //获取分类
            $arr = $this->getPlateList();
            $this->assign('arr', $arr);
            $this->display();
        } else {
            //处理数据
            //过滤数据
            $post = I('post.');
            $post['title'] = empty($post['title']) ? $this->error('板块名不能为空') : $post['title'];
            $post['pid'] = $post['pid'] == null ? $this->error('请选择一个板块') : $post['pid'];
            if ($post['pid'] != 0) {
                $where['id'] = $post['pid'];
                $num = M('plate')->where($where)->count();
                $num = $num < 1 ? $this->error('板块不存在') : $num;
            }
            $data['pid'] = $post['pid'];
            $data['title'] = $post['title'];
            $data['createDate'] = date('Y-m-d H:i:s');
            $result = M('plate')->add($data);
            $result = $result == true ? $this->success('增加成功') : $this->error('增加失败');
        }
    }
    public function Edit()
    {
        if (empty($_POST)) {
            //显示
            //过滤数据
            $id = $_GET['id'];
            $id = empty($id) ? $this->error('参数异常,板块ID不能为空') : $id;
            $id = !is_numeric($id) ? $this->error('参数异常,板块ID只能是数字') : $id;
            //检查分类是否存在
            $where['id'] = $id;
            $info = M('plate')->where($where)->find();
            $info = empty($info) ? $this->error('板块不存在') : $info;
            $this->assign('info', $info);
            $arr = $this->getPlateList();
            $this->assign('arr', $arr);
            $this->display();
        } else {
            //修改
            $post = I('post.');
            //过滤数据
            $id = $post['id'];
            $where['id'] = $id;
            $id = empty($id) ? $this->error('参数异常,板块ID不能为空') : $id;
            $id = !is_numeric($id) ? $this->error('参数异常,板块ID只能是数字') : $id;
            $id = $post['pid'] == $id ? $this->error('不能移动到自己') : $id;
            $id = empty($post['title']) ? $this->error('板块名不能为空') : $id;
            //检查分类是否存在
            $where['id'] = $id;
            $num = M('plate')->where($where)->count();
            $num = $num < 1 ? $this->error('板块不存在') : $num;
            if ($post['pid'] != 0) {
                //检查移动的到的分类是否存在
                $where1['id'] = $post['pid'];
                $num = M('plate')->where($where1)->count();
                $num = $num < 1 ? $this->error('要移动到的板块不存在') : $num;
            }
            //创建数据
            $data = M('plate')->create();
            $result = M('plate')->where($where)->save($data);
            $result = $result == true ? $this->success('更新成功') : $this->error('更新失败');
        }
    }
    public function Delete()
    {
        //过滤数据
        $id = $_GET['id'];
        $id = empty($id) ? $this->error('参数异常,板块ID不能为空') : $id;
        $id = !is_numeric($id) ? $this->error('参数异常,板块ID只能是数字') : $id;
        //检查分类是否存在
        $where['id'] = $id;
        $num = M('plate')->where($where)->count();
        $num = $num < 1 ? $this->error('板块不存在') : $num;
        //检查分类是否有子分类
        $where1['pid'] = $id;
        $num = M('plate')->where($where1)->count();
        $num = $num > 0 ? $this->error('这个板块下存在子板块,请先删除该板块下的子板块') : $num;
        //删除
        $result = M('plate')->delete($id);
        $result = $result == true ? $this->success('删除成功') : $this->error('删除失败');
    }
    public function DeleteAll()
    {
        $obj = M('plate');
        if (empty($_POST['selected'])) {
            $this->error('请选择一个项目');
        } else {
            foreach ($_POST['selected'] as $key => $val) {
                if (!is_numeric($val)) {
                    $this->error('参数异常');
                }
                $count = $obj->where("pid={$val}")->count();
                if ($count > 0) {
                    $this->error("板块ID是：{$val}的板块下有子版块");
                }
            }
            $in = implode($_POST['selected'], ',');
            $where['id'] = array('IN', $in);
            $result = $obj->where($where)->delete();
            $result = $result == true ? $this->success('删除成功') : $this->error('删除失败');
        }
    }
}