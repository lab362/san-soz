<?php include('autoload.php');?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php $san = (isset($_GET['san'])) ? $_GET['san'] : "" ?>
<!-- Последняя компиляция и сжатый CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Дополнение к теме -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>
<!-- Последняя компиляция и сжатый JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


  <meta name="description" content="Сандарды қазақша жазба түріне аудару">
  <meta name="keywords" content="Қазақша, сандар, тез сана, аудару">

<title>Сандарды қазақша жазбаға аудару</title>
</head>
<body>

<div class="container">
<div class="row">
<div class="col-xs-12">
<form action=? method="get">
    <div class="form-group">
     <label>Сандарды еңгізіңіз</label>
    <div class="input-group">
      <input type="text" class="form-control number-to-spell-input" placeholder="Санды еңгізіңіз" name="san" autofocus value='<?=$san?>'>
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit" disabled id="spell-number-submit">Аудару</button>
      </span>
    </div><!-- /input-group -->
    </div>
</form>

</div><!-- /.col-lg-6 -->
</div><!-- /.row -->

<div class="row">
    <div class="col-xs-12">
        <?php foreach(Speller::getInstance($san)->renderAll() as $template): ?>
        <div class="form-group">
        <textarea class="form-control spelled-number-input"><?= $template?></textarea>
        </div>
        <?php endforeach;?>
    </div>
</div>

</div>
<script type="text/javascript">
$(document).ready(function(){

    var regexp = /^\d+(\.{0,1}\d{1,2}){0,1}$/

    function checkForSubmit(val){
        if (regexp.test(val)){
            $("#spell-number-submit").removeAttr('disabled')
        }else{
            $("#spell-number-submit").attr('disabled', true)
        }
    }

    checkForSubmit($(".number-to-spell-input").val())

    $(".number-to-spell-input").on('keyup', function(event){
        checkForSubmit($(this).val())
    })

    $(".spelled-number-input").on('focus', function(event){
        $(this).select()
    })
})
</script>
</body>
</html>
