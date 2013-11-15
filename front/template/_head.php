<header>
	<section class="wrapper">
    	<div class="header-content clearfix">
            <h1 class="logo pull-left">
                <span>Site name</span>
                <a href=""><img src="/assets/images/logo.png" /></a>
            </h1>
            <nav class="pull-right">
            	<ul>
                	<li>
                    	<a href="/" class="<?php echo ($active == 'home')
						? 'active' : NULL ?>">Home</a>
                    </li>
                	<li>
                    	<a href="/package/location" class="<?php echo ($active == 'location')
						? 'active' : NULL ?>">Re-Packing</a>
                    </li>
                	<li><a href="/reports" class="<?php echo ($active == 'reports')
                        ? 'active' : NULL ?>">Reports</a></li>
                </ul>
            </nav>
        </div>
    </section>
</header>