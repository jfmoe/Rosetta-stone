<?php
    /*
     * 分页函数
     * @param type $p
     * @param type $page
     */
    function paging($p, $page)
    {
        $next = ($p == $page) ? 0 : ($p + 1);//下一页
        $prev = ($p == 1) ? 0 : ($p - 1);//前一页
        echo "<ul class = 'pagination'>";
        echo "<li><a href='index.php?page=1'>首页</a></li>";
        if ($p == 1) {
            echo "<li class='disabled'><a href='javascript:;'>«</a></li>";
        } else {
            echo "<li><a href='index.php?page={$prev}'>«</a></li>";
        }
        for ($i = 1; $i <= $page; $i++) {
            if ($p == $i) {
                $active = 'active';
            } else {
                $active = '';
            }
            echo "<li><a href='index.php?page={$i}' class='{$active}' >{$i}</a></li>";
        }
        if ($p == $page) {
            echo "<li class='disabled'><a href='javascript:;'>»</a></li>";
        } else {
            echo "<li><a href='index.php?page={$next}'>»</a></li>";
        }
        echo "<li><a href='index.php?page={$page}'>尾页</a></li>";
        echo "</ul>";
    }
