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

    public function display()
    {
        $current = $this->header;
        while ($current != null) {
            echo $current->data . "<br/>";
            $current = $current->next;
        }
    }

    public function addCloseNode($new,$data)
    {

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


}

// 1->2->3->5

//header xiaobei xiaoming dahai

$linkList = new SingleLinked('header');
$linkList->insert('header', '小明');
$linkList->insert('', '大海');
$linkList->insert('header', '小贝');
$linkList->display();
