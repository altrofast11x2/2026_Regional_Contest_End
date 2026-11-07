<?php
function script($s)
{
    echo "<script>$s</script>";
}
function move($a, $m)
{
    echo "<script>alert('$a');location.href='$m'</script>";
}
function back($a)
{
    echo "<script>alert('$a');history.back();</script>";
}
function alert($a)
{
    echo "<script>alert('$a');</script>";
}
