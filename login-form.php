<div class="box-login">
<?php
	if (!is_user_logged_in() )
	{
	    $args = array(
	        //'redirect' => admin_url(),
	        'redirect' => get_permalink($post->ID) . 'area-restrita',
	        'form_id' => 'loginform',
	        'label_username' => __('Username'),
	        'label_password' => __('Password'),
	        'label_remember' => __('Remember Me'),
	        'label_log_in' => __('Log In'),
	        'remember' => true
	    );
?>
		<div class="title">
			<h6>Login</h6>
		</div>
		<div class="content">
			<?php wp_login_form($args); ?>
			<p>Se você é um <?php echo str_replace('res', 'r', get_the_title());?> EKO e não possui o seu Login, entre em contato com a EKO.</p>
		</div>
<?php
	}
	else
	{
		$user = wp_get_current_user();

		//if ($user->caps['administrator'])
		//{
			//$access = $user->caps['administrator'];
		//}
		//else
		//{
			$cap = strtolower(get_the_title($post->post_parent));

			if ($cap == 'corretores' || $cap == 'investidores')
				$cap = str_replace('res', 'r', $cap);

			$access = $user->caps[$cap];
		//}

		if (!$access)
		{
			$args = array(
		        'redirect' => get_permalink($post->ID) . 'area-restrita',
		        'form_id' => 'loginform',
		        'label_username' => __('Username'),
		        'label_password' => __('Password'),
		        'label_remember' => __('Remember Me'),
		        'label_log_in' => __('Log In'),
		        'remember' => true
		    );
?>
			<div class="title">
				<h6>Login</h6>
			</div>
			<div class="content">
				<?php wp_login_form($args); ?>
				<p>Se você é um <?php echo str_replace('res', 'r', get_the_title());?> EKO e não possui o seu Login, entre em contato com a EKO.</p>
			</div>
<?php
		}
		else
		{
?>
			<div class="title">
				<a href="<?php echo get_permalink($post->ID) . 'area-restrita' ?>">Área Restrita</a> | <?php wp_loginout(home_url()); ?>
			</div>
<?php
		}
	}
?>
</div>