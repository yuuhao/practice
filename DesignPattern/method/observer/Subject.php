<?php


namespace design\method\observer;


use design\structure\decorator\FileInputStream;
use SplObserver;

class Subject
{

    public FileInputStream $fileStream;
    public function __construct(FileInputStream $fileInputStream)
    {
        $this->fileStream = $fileInputStream;
    }

    /**
     * @var Observer[]
     */
    private array $observerList;

    public function attach(Observer $observer)
    {
       $this->observerList[] = $observer;
    }

    public function detach(Observer $observer)
    {
       $this->observerList = array_diff($this->observerList, [$observer]);
    }

    public function notify()
    {
       foreach ($this->observerList as $observer) {
           $observer->update($this->fileStream);
       }
    }
}