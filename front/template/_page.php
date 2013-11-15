<!DOCTYPE html>
<html class="<?php print $class; ?>">
<head>
    <title><?php print front()->charset($title); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <?php if(isset($meta) && is_array($meta)): ?>
    <?php foreach($meta as $name => $content): ?>
    <meta name="<?php print $name; ?>" content="<?php print $content; ?>" />
    <?php endforeach; ?>
    <?php endif;?>

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="/assets/styles/reset.css" />
    
    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="/assets/styles/fonts.css" />
    <link rel="stylesheet" type="text/css" href="/assets/styles/global.css" />
    <link rel="stylesheet" type="text/css" href="/assets/styles/style.css" />

    <!-- Javascripts -->

</head>

<body>
    <section class="page">
        <section class="head"><?php print $head; ?></section>
        <section class="body"><?php print $body; ?></section>
        <section class="foot"><?php print $foot; ?></section>
    </section>

    <!-- Javascripts -->
</body>
</html>