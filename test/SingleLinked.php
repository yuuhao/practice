<?php


namespace practice\test;


class SingleLinked
{

    public SingleNode $header;

    public function __construct()
    {
        // 添加哨兵，　算法注意边界处理
        $this->header = new SingleNode(null);
    }

    public function add($data)
    {

    }

    public function find($data)
    {
        $current = $this->header->next ?? null;

        while ($current != null && $current->data != $data) {
            $current = $current->next;
        }

        return $current;
    }

    public function end()
    {
        $current =  $this->header->next ?? $this->header;

        while ($current != null) {
            $current = $current->next;
        }

        return $current;
    }

    /**
     * 反转链表
     *              pre curr  next
     *  null   A---->B-> c    ->d  ->e->f
     * A<-B<-c<-d<-e<-f
     */
    public function rev()
    {
        $pre = null;
        $current = $this->header;

        while ($current->next != null) {
            $next = $current->next;
            $current->next = $pre;
            $pre = $current;
            $current = $next;
        }

    }
}