<?php


namespace practice\algorithm;

/**
 * trie 树 用来在一组字符串中找出给定字符串
 * 借助散列表思想，假设字符中只包含26个英文字母, 那么可以有一个大小26的素数组，
 * 每一个元素存储指向字母子节点的指针，当没有该字母子节点时，存储值为null
 * 当trie 树构建完毕后，查询某字符串（长K）的时间复杂度为 O(K)
 *      优点： 查询快，适合根据前缀查找，比如百度搜索下拉框，IDE字符串自动补全功能
 *      缺点： 占用内存高，如果前缀重付少会导致内容浪费
*/
class Trie
{
    private $root;

    public function __construct()
    {
        $this->root = new TrieNode('/');
    }

    //往trie树中插入一个字符串
    public function insert($str)
    {
        $p = $this->root;
        for ($i = 0; $i < strlen($str); $i++) {
            $index = ord($str[$i]) - ord('a');
            if ($p->children[$index] == null) {
                $p->children[$index] = new TrieNode($str[$index]);
            }
            $p = $p->children[$index];
        }
        $p->isEndingNode = true;
    }

    public function find($str)
    {
        $p = $this->root;
        for ($i = 0; $i < strlen($str); $i++) {
            $index = ord($str[$i]) - ord('a');
            if ($p->children[$index] == null) {
                return false;
            }
            $p = $p->children[$index];
        }
        //当字符串寻找完毕后，如果是结尾
        if ($p->isEndingNode == false) return false;
        return true;
    }
}