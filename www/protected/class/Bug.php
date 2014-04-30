<?php
class Bug{
    public static function show($data=null,$echo=false){
        if($data === null) return false;
        
        ob_start();
        print_r($data);
        echo '<pre>
'.ob_get_clean().'<pre>';
        if(!$echo) exit;
    }
    
    
    
    public static function SqlExec($sql, $die = true) {

        echo self::show($sql,true);
        
        $items = Yii::app()->db->createCommand($sql)->queryAll();

        $keys = array();
        foreach ($items AS $item) {
            foreach ($item AS $key => $val)
                $keys[$key] = 1;
        }
        
        //Bug::show($keys);
        ?>

        <table border="1">
            <thead>
                <tr><th>№ п/п</th>
                    <?php foreach($keys AS $key=>$val)echo '<th>'.$key.'</th>'; ?>
                </tr>
                   
                
            </thead>
            <tbody>
                <?php
                $i=1;
                foreach($items AS $item){
                    
                    echo '<tr>';
                    echo '<td>'.$i.'</td>';
                    foreach($item AS $val)echo '<td>'.$val.'</td>';
                    
                    echo '</tr>';
                    $i++;
                }
                
                ?>
            </tbody>
        </table>

        <?php

        if ($die)
            exit;
    }
}