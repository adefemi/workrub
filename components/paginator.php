<div class="paginator">
    <div class="page-list">

        <?php 
            for($j=$startloop; $j<=($end); $j++){
            ?>
            <a href="<?php
                $url = $_SERVER['REQUEST_URI'];
                $parts = parse_url($url);
                parse_str($parts['query'], $query);
                if(isset($query['page'])){
                    echo preg_replace('/page=[0-9]+/', 'page='.$j, $_SERVER['REQUEST_URI']);
                } 
                else if(!empty($query)){
                    echo $_SERVER['REQUEST_URI']."&page=".$j;
                }
                else{
                    echo $_SERVER['REQUEST_URI']."?page=".$j;
                }
            ?>">
                <li class="<?php if($j == $start) echo "active" ?>"><?php echo $j ?></li>
            </a>
        <?php } ?>
    </div>

    <div class="page-sum">
        Page <?php echo $start." of ".$decoded_count?>
    </div>
</div>