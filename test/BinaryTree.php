<?php


class BinaryTree
{
    function preOrder($root)
    {
        if ($root == null) return;
        print $root; //打印root节点
        $this->preOrder($root->left);
        $this->preOrder($root->right);
    }

    function inOrder($root)
    {
        if ($root == null) return;
        $this->inOrder($root->left);
        print $root;
        $this->inOrder($root->right);
    }

    function postOrder($root)
    {
        if  ($root == null) return;
        $this->postOrder($root->left);
        $this->postOrder($root->right);
        print $root;
    }

    /**
     * 二叉搜索树插入实现
     * 插入思想： 节点不存在
     * @param $data
     * @param $root
     */
    function insert($data, $root)
    {
        while (true) {
            if ($data > $root->data) {
                if ($root->right == null) {
                    $root->right = $data;
                    break;
                } else {
                    $root = $root->right;
                    continue;
                }
            }
            if ($data < $root->data) {
                if ($root->left == null) {
                    $root->left = $data;
                    break;
                } else {
                    $root = $root->left;
                    continue;
                }
            }
        }
    }
}