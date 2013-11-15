<!-- if mail, use this part to send to email -->
<?php if(isset($mail) && $mail) : ?>
    <p>
        <strong><?php echo $type; ?> <?php echo $level; ?></strong> from 
        <strong><?php echo $class; ?></strong> in 
        <strong><?php echo $file; ?></strong> on line 
        <strong><?php echo $line; ?></strong>
    </p>
    <p><strong>Eden Says:</strong> <?php echo $message; ?></p>
    <table width="100%%" border="1" cellspacing="0" cellpadding="5">
    <?php foreach($history as $line): ?>
    <tr><td><?php echo $line[0]; ?></td><td><?php echo $line[1]; ?>(<?php echo $line[2]; ?>)</td></tr>
    <?php endforeach; ?>
    </table>
    <?php echo $url; ?>
<?php elseif(isset($report) && $report) : ?>
<!-- if report, use this part to show in the front as error page -->
	<html class="error">
    <head>
        <title>Kosmos.com.ph - Error</title>
        <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="/assets/styles/front.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="/assets/styles/bootstrap.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="/assets/styles/bootstrap.min.css" />
    </head>
    <body>
        <div class="page">
            <div class="body">
            	<div class="clearfix">
                    <div class="error-logo"><a href="/"><img src="/assets/images/main-logo.png" /></a></div>
                    <div class="error-content">
                        <div class="error-message left">
                            <strong>You found an error in our system!</strong>
                            <p>
                            It appears that something went wrong here! If this occurs upon Check Out, please be advised that your order details has been stored in our database and will be processed further.  However, you need to send us a report about this bug at info@kosmos.com.ph.<br /><br />
                            You may also send your inquiries on the same email address.<br /><br />
                            Our apologies for the inconvenience and rest assured that we will get this resolved as soon as we can.<br /><br /><br />
                            Kosmos E-Commerce, Inc.
                            </p>
                        </div>
                        <div class="right"><img src="/assets/images/broken-cart.png" /></div>
                    </div>
                    <a href="/" class="btn btn-primary"><i class="icon-white icon-home"></i> Back to Homepage</a>
                 </div>
            </div>
            
        </div>
    </body>
<?php else : ?>
<!-- else, show this eden error -->
    <p>
        <strong><?php echo $type; ?> <?php echo $level; ?></strong> from 
        <strong><?php echo $class; ?></strong> in 
        <strong><?php echo $file; ?></strong> on line 
        <strong><?php echo $line; ?></strong>
    </p>
    <p><strong>Eden Says:</strong> <?php echo $message; ?></p>
    <table width="100%%" border="1" cellspacing="0" cellpadding="5">
    <?php foreach($history as $line): ?>
    <tr><td><?php echo $line[0]; ?></td><td><?php echo $line[1]; ?>(<?php echo $line[2]; ?>)</td></tr>
    <?php endforeach; ?>
    </table>
<?php endif; ?>
