<?php
foreach($styles as $key => $val){
    if($val['queue']){
        $v = '';
        if(!empty($val['v'])){
            $v = '?v=' . $val['v'];
        }
        echo '<link rel="stylesheet" href="'. $val['url'] . $v .'">
    ';
    }
}
?>
<?php /**PATH C:\xampp\htdocs\nfz\NFZ\app\Modules/Backend/Views/components/styles.blade.php ENDPATH**/ ?>