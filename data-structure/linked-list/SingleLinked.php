<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/16
 * Time: 22:20
 */

class Node
{
    public $data;

    public $next;


    public function __construct($data)
    {
        $this->data = $data;
    }
}

class SingleLinked
{
    /**
     * 头节点
     */
    public $header;

    public function __construct($data)
    {
        $this->header = new Node($data);
    }

    /**
     * 查找节点
     */
    public function find($data)
    {
        $current = $this->header;
        while ($current != null && $current->data != $data) {
            $current = $current->next;
        }
        return $current;
    }

    /**
     * 目标节点的上一个节点
     */
    public function findPre($data)
    {
        $current = $this->header;
        if ($current->data == $data) {
            return null;
        }

        while ($current->next->data != $data) {
            if ($current->next->data == null) {
                goto end;
            }
            $current = $current->next;
        }
        return $current;
        end:
        return null;

    }

    /**
     * 尾节点
     */
    public function end()
    {
        $current = $this->header;
        while ($current->next != null) {
            $current = $current->next;
        }
        return $current;

    }

    /**
     * @param $data
     * @param $new
     * 在$data 节点后插入$new 节点
     * @return bool
     */
    public function insert($data, $new)
    {
        $current = $this->find($data);
        if ($current) {
            $newNode = new Node($new);
            $newNode->next = $current->next;
            $current->next = $newNode;
        } else {
            $current = $this->end();
            $current->next = new Node($new);
        }
        return true;
    }

    /**
     * 显示链表所有节点
     */
    public function display()
    {
        $current = $this->header;
        while ($current != null) {
            echo $current->data . "<br/>";
            $current = $current->next;
        }
    }

    public function delete($data)
    {
        $current = $this->find($data);
        if ($current == null) {
            echo "该节点不存在";
            die;
        }
        $preNode = $this->findPre($data);
        if ($current && $preNode == null) {
            $this->header = $current->next;
        } else {
            $preNode->next = $current->next;
            $current->next = null;
        }
    }

    /**
   * 判断一个链表是否有环
   * 方案1：规定一个时间，循环1秒后，链表是否结束
   * 方案2：使用set或者类set的数组，循环链表的时候将node节点数据和set中的数据进行对比，若有重复值则是有环
   * 方案3：使用快慢两个指针，如果快指针追上了慢指针说明有环
   */
    public function isClose()
    {
        $slow = $this->header;
        $fast = $this->header->next;
        while (isset($fast->next)) {
            if ($fast->data == $slow->data)
                goto end;
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        return 0;
        end:
        return 1;
    }
}

// 1->2->3->5

//header xiaobei xiaoming dahai

$linkList = new SingleLinked('header');
$linkList->insert('header', '小明');
$linkList->insert('', '大海');
$linkList->insert('header', '小贝');
$linkList->insert('大海', '小红');
// 制造有环单链表
//$end = $linkList->end();
//$end->next = $linkList->find('小贝');
echo $linkList->isClose();



