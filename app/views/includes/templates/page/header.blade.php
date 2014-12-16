        <?php $routeName = Route::getCurrentRoute()->getPath();?>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><span>BIKA</span> Health</a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li <?php if($routeName =="/"):?>class="active"<?php endif;?>>
							<a href="<?php echo URL::to('/'); ?>">Home</a>
                        </li>
                        <li <?php if($routeName =="users"):?>class="active"<?php endif;?>>
                            <a href="<?php echo URL::to('/users'); ?>">Users </a>
                        </li>
                        <li <?php if($routeName =="lab-information"):?>class="active"<?php endif;?>>
							<a href="<?php echo URL::to('/lab-information'); ?>">
								Lab Information
							</a>
						</li>
                        <li><a href="contact.html">Contact</a></li>
                         @if(!Auth::check())
						 
							<li>{{ HTML::link('users/login', 'Login') }}</li>   
						@else
							<li>{{ HTML::link('users/logout', 'logout') }}</li>
						@endif
                    </ul>
                </div>
            </div>
        </div>


