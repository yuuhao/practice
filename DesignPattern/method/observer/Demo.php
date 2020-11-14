<?php


namespace design\method\observer;


use design\structure\decorator\FileInputStream;

class Demo
{

    public function login()
    {
        $subject = new Subject(new FileInputStream());
        $subject->attach(new PointObserver());
        $subject->attach(new QuenenObserver());
        $subject->notify();
    }
}