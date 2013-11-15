<?php if(!empty($messages)): ?>
<ul class="message-stack message-<?php echo $messages[0]['type']; ?>">
	<span class="icon">&nbsp;</span>
    <?php foreach($messages as $message): ?>
    <li class="alert alert-<?php echo $message['type']; ?>"><?php echo $message['message']; ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>
