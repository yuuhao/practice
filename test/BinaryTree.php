<?php


class BinaryTree
{
    public int $pre = PHP_INT_MIN;

    function preOrder($root)
    {
        if ($root == null) return;
        print $root; //打印root节点
        $this->preOrder($root->left);
        $this->preOrder($root->right);
    }

    function inOrder($root)
    {
        // 中序遍历并且判断是否时合格的搜索树
        // 搜索树， 左节点小于父节点，优子节点大于父节点
        if ($root == null) return true;

        if (!$this->inOrder($root->left)) {
            return false;
        }

        if ($root->val <= $this->pre) {
            return false;
        }
        $this->pre = $root->val;

        return $this->inOrder($root->right);
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