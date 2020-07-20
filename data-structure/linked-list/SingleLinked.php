<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/16
 * Time: 22:20
 */

namespace practice\data_structue\link_list;
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

    public function add($data)
    {
        $current = $this->end();
        $current->next = new Node($data);
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
            $preNode->next = $preNode->next->next;
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

    /**
     * 翻转单链表
     */
    public function rev()
    {
        //　想到的思路，　将链表循环出来放入ｐｈｐ数组中
        // 将数组进行栈操作，然后取出后重新链接
        $current = $this->header; //
        $stock = []; // 栈
        while ($current != null) {
            array_unshift($stock, $current);
            $current = $current->next;
        }
        $this->header = null;
        $i = 0;
        while ($i < count($stock)) {
            if ($this->header == null) {
                $current = $this->header = $stock[$i];
            } else {
                $current->next = $stock[$i];
            }
            $i++;
        }
    }
    /**
     * 翻转单链表2
     * 妙解： 提前保持current 节点的下一节点
     */
    public function revGoods()
    {
        if ($this->header->next == null) return $this->header;
        $pre = $this->header;
        $pre->next = null;
        $current = $this->header->next;
        $next = null;

        while ($current != null) {
            $next = $current->next;
            $current->next = $pre;
            $pre = $current;
            $current = $next;
        }
    }


    /**
     * 合并两个有序单链表
     * @param $linkList1
     * @param $linkList2
     */
    public function merge($linkList1, $linkList2)
    {
        // 前提两个有序的单链表
        // 可以使用循环两个链表法解决
        // 类似于两个有序数组的合并
        
    }

    /**
     * 删除　链表第ｎ个节点
     */
    public function deleteN()
    {
        // 循环变量找到第n个
    }

    /**
     * 获取链表　中间节点
     */
    public function getMidNode()
    {
        //
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



