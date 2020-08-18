<?php

/**
 * @param $root
 * 先序遍历：利用栈先进后出的特性，先访问根节点，再把右子树压入，再压入左子树。这样取出的时候是先取出左子树，最后取出右子树。
 * @link https://developer.aliyun.com/article/658081
 */
function preorder($root)
{
    $stack = array();
    array_push($stack, $root);
    while (!empty($stack)) {
        $center_node = array_pop($stack);
        echo $center_node->value; // 根节点
        if ($center_node->right != null)
            array_push($stack, $center_node->right); // 压入右子树
        if ($center_node->left != null)
            array_push($stack, $center_node->left); // 压入左子树
    }
}

/**
 * @param $root
 * 中序：需要从下向上遍历，所以先把左子树压入栈，然后逐个访问根节点和右子树。
 */
function inorder($root)
{
    $stack = array();
    $center_node = $root;
    while (!empty($stack) || $center_node != null) {
        while ($center_node != null) {
            array_push($stack, $center_node);
            $center_node = $center_node->left;
        }
        $center_node = array_pop($stack);
        echo $center_node->value;
        $center_node = $center_node->right;
    }
}

/**
 * @param $root
 * 后序：先把根节点存起来，然后依次储存左子树和右子树。然后输出。
 */
function tailorder($root)
{
    $stack = array();
    $outStack = array();
    array_push($$stack, $root);
    while (!empty($stack)) {
        $center_node = array_pop($stack);
        array_push($outStack, $center_node);
        if ($center_node->right != null)
            array_push($stack, $center_node->right);
        if ($center_node->left != null)
            array_push($stack, $center_node->left);
    }
    while (!empty($outStack)) {
        $center_node = array_pop($outStack);
        echo $center_node->value;
    }
}