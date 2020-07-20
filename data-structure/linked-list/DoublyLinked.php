<?php
namespace practice\data_structue\link_list;

/**
 * 双向链表
 * 1<==> 3 <==> 5
 * 单个节点的属性：
 *         data
 *         pre_node
 *         next_node
 */
class Node
{

    public $data;

    public $next;

    public $pre;

    function __construct($data)
    {
        $this->data = $data;
    }
}



class DoublyLinked
{
    public Node $header;

    public function __construct()
    {
        $this->header = new Node(null);
    }

    public function add($data)
    {
        $endNode = $this->end();
        $newNode = new Node($data);
        $endNode->next = $newNode;
        $newNode->pre = $endNode;
        return true;
    }

    public function insert($data, $newData)
    {

    }
    /**
     * 获取末尾节点
     */
    public function end()
    {
        $endNode = $this->header;
        while ($endNode->next != null) {
            $endNode = $endNode->next;
        }
        return $endNode;
    }

}

//初始化链表,哨兵链表
$doublyLinked = new  DoublyLinked();

//在链表尾部添加一个节点
$doublyLinked->add('小红');
$doublyLinked->insert('小红', '小明');