<?php
/*
Plugin Name: plugin-practice
Plugin URI:
Description: 練習の為だけのプラグイン。ランダムな記事をn個表示できるように
Author:
Version: 0.1
Author URI:
*/

$random = new Random(2);

Class Random
{
    private $num = 0;

    public function __construct($num)
    {
        $this->num = $num;
    }

    public function run()
    {
        $this->display();
    }

    private function display()
    {
        if (have_posts()) {
            $i = 0;
            while ($i <= $this->nun + 1) {
                $this->loop();
                the_post();
                $i++;
            }
        }
    }

    private function loop()
    {
        echo '<article>test</article>';
    }

}
