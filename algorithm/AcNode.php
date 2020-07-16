<?php


namespace practice\algorithm;

/**
 * 多模式串匹配算法： 即多个模式串去匹配一个主串，；例如过滤评论内容的敏感词汇
 * ac自动机： 建立在Trie树之上，加了类似KMP的next数组, 模式串构建Trie树
 * AC自动机构建包含两个操作：
 *      1. 将多模式串构建成Trie树
 *      2. 在Trie树上构建失败指针（相当于KMP中的失效函数next数组）
*/
class AcNode
{
    public $data;

    public $children; // count = 26； AcNode 字符只包含26字母

    public $isEndingChar = false;// 结尾字符为true

    public $len = -1; // 当$isEndingChar = true时， 记录模式串长度

    /**
     * @var AcNode
    */
    public $fail; // 失败指针

    public function __construct($data)
    {
        $this->data = $data;
    }
}