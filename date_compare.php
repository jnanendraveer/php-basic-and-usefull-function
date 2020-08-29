function date_compare($a, $b) {
    $t1 = strtotime($a['datetime'] . ' 11:29:45');
    $t2 = strtotime($b['datetime'] . ' 11:29:45');
    return $t1 - $t2;
}
