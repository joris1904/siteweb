<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= NOM_BASE_SITE ? NOM_BASE_SITE : 'Tako | Hell' ?></title>
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea', plugins: "media image emoticons",image_description: false, 
  toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | image emoticons', menubar: true, });</script>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
        <?php html(array('type' => 'css','path'=> 'public')) ?>
    </head>
    <body>
        <?php html(['type' =>'html','partials' => 'header']) ?>
            <?= $Session->Flash()  ?>
            <?php  echo $content ?>
        <?php html(['type' =>'html','partials' => 'footer']) ?>
        <?php html(array('type' => 'js','path' => 'public')) ?>
    </body>
</html>