        <?php $routeName = Route::getCurrentRoute()->getPath();
        $breadcrumbs = new Creitive\Breadcrumbs\Breadcrumbs();
        $breadcrumbs->addCrumb('Home', URL::to('/'));
	    if( $routeName != "/"):
			$breadcrumbs->addCrumb(ucwords($routeName), "$routeName");
	    endif;

        ?>
        <div class="container">
			<div class="row">
			  <div class="col-lg-12">
					<?php echo $breadcrumbs->render();?>
				</div>
			</div>
	</div>

